﻿/*
    Little Disk Cleaner
    Copyright (C) 2008 Little Apps  (http://www.little-apps.org/)

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using System.IO;

namespace Disk_Cleaner
{
    public partial class Main : Form
    {
        private LittleSoftwareStats.Watcher m_watcher;

        public Main()
        {
            InitializeComponent();

            this.m_watcher = new LittleSoftwareStats.Watcher();
            LittleSoftwareStats.Config.Enabled = true;
            this.m_watcher.Start("90e5a0f8f727288797059ed635e28bb1", "1.0");

            // Tracks Exceptions Automatically
            AppDomain.CurrentDomain.UnhandledException += (s, e) => this.m_watcher.Exception(e.ExceptionObject as Exception);

            // Track WinForms Exceptions Automatically
            Application.ThreadException += (s, e) => this.m_watcher.Exception(e.Exception);

            PopulateDiskDrives();

            if (Properties.Settings.Default.includedFolders == null)
                PopulateIncludeFolders();

            
        }

        private void PopulateIncludeFolders()
        {
            Properties.Settings.Default.includedFolders = new System.Collections.Specialized.StringCollection();

            Properties.Settings.Default.includedFolders.Add(Environment.GetEnvironmentVariable("TEMP", EnvironmentVariableTarget.User));
            Properties.Settings.Default.includedFolders.Add(Environment.GetEnvironmentVariable("TEMP", EnvironmentVariableTarget.Machine));
            Properties.Settings.Default.includedFolders.Add(Environment.GetFolderPath(Environment.SpecialFolder.Recent));
            Properties.Settings.Default.includedFolders.Add(Environment.GetFolderPath(Environment.SpecialFolder.InternetCache));
        }

        private void PopulateDiskDrives()
        {
            if (Properties.Settings.Default.diskDrives == null)
                Properties.Settings.Default.diskDrives = new System.Collections.ArrayList();
            else
                Properties.Settings.Default.diskDrives.Clear();

            string winDir = Environment.GetFolderPath(Environment.SpecialFolder.System);
            foreach (DriveInfo driveInfo in DriveInfo.GetDrives())
            {
                if (!driveInfo.IsReady || driveInfo.DriveType != DriveType.Fixed)
                    continue;

                string freeSpace = Utils.ConvertSizeToString(driveInfo.TotalFreeSpace);
                string totalSpace = Utils.ConvertSizeToString(driveInfo.TotalSize);

                ListViewItem listViewItem = new ListViewItem(new string[] { driveInfo.Name, driveInfo.DriveFormat, totalSpace, freeSpace });
                if (winDir.Contains(driveInfo.Name))
                    listViewItem.Checked = true;
                listViewItem.Tag = driveInfo;

                // Store as listviewitem cause im too lazy 
                Properties.Settings.Default.diskDrives.Add(listViewItem);
            }
        }

        private void Options(object sender, EventArgs e)
        {
            Options options = new Options();
            options.ShowDialog(this);
        }

        private void ScanDisk(object sender, EventArgs e)
        {
            this.fileInfoCtrl1.ResetInfo();
            this.listViewProblems.Items.Clear();

            DateTime timeStarted = DateTime.Now;

            List<DriveInfo> selDrives = new List<DriveInfo>();
            foreach (ListViewItem lvi in Properties.Settings.Default.diskDrives)
            {
                if (lvi.Checked)
                    selDrives.Add(lvi.Tag as DriveInfo);
            }

            if (selDrives.Count == 0)
            {
                MessageBox.Show(this, "No drives selected", Application.ProductName, MessageBoxButtons.OK, MessageBoxIcon.Error);
                return;
            }

            Analyze analyze = new Analyze(selDrives);
            DialogResult dlgResult = analyze.ShowDialog(this);

            if (dlgResult == System.Windows.Forms.DialogResult.OK)
            {
                this.notifyIcon1.ShowBalloonTip(6000, "Disk Cleaner", "Finished analyzing hard drive(s)", ToolTipIcon.Info);

                this.m_watcher.EventPeriod("Main", "Scan", (int)DateTime.Now.Subtract(timeStarted).TotalSeconds, true);
            }
            else
            {
                this.notifyIcon1.ShowBalloonTip(6000, "Disk Cleaner", "Aborted analyzing hard drive(s)", ToolTipIcon.Info);

                this.m_watcher.EventPeriod("Main", "Scan", (int)DateTime.Now.Subtract(timeStarted).TotalSeconds, false);
            }

            foreach (FileInfo fileInfo in Analyze.fileList)
            {
                string fileName = fileInfo.Name;
                string filePath = fileInfo.DirectoryName;
                string fileSize = Utils.ConvertSizeToString(fileInfo.Length);

                ListViewItem listViewItem = new ListViewItem(new string[] { fileName, filePath, fileSize });
                listViewItem.Checked = true;
                listViewItem.Tag = fileInfo;
                this.listViewProblems.Items.Add(listViewItem);
            }

            this.listViewProblems.AutoResizeColumns(ColumnHeaderAutoResizeStyle.HeaderSize);

            if (Properties.Settings.Default.autoClean)
                CleanDisk(this, new EventArgs());
            else
            {
                this.cleanToolStripMenuItem.Enabled = true;
                this.toolStripButtonRemove.Enabled = true;
            }
        }


        private void CleanDisk(object sender, EventArgs e)
        {
            if (this.listViewProblems.Items.Count > 0)
            {
                if (!Properties.Settings.Default.autoClean)
                    if (MessageBox.Show(this, "Are you sure you want to remove these files?", Application.ProductName, MessageBoxButtons.YesNo, MessageBoxIcon.Question) != System.Windows.Forms.DialogResult.Yes)
                        return;

                long lSeqNum = 0;
                SysRestore.StartRestore("Before Disk Cleaner Cleaning", out lSeqNum);

                foreach (ListViewItem lvi in this.listViewProblems.Items)
                {
                    if (!lvi.Checked)
                        continue;

                    try
                    {
                        FileInfo fileInfo = lvi.Tag as FileInfo;

                        // Make sure file exists
                        if (!fileInfo.Exists)
                            continue;

                        if (Properties.Settings.Default.removeMode == 0)
                        {
                            // Remove permanately
                            fileInfo.Delete();
                        }
                        else if (Properties.Settings.Default.removeMode == 1)
                        {
                            // Recycle file
                            Utils.SendFileToRecycleBin(fileInfo.FullName);
                        }
                        else
                        {
                            // Move file to specified directory
                            if (!Directory.Exists(Properties.Settings.Default.moveFolder))
                                Directory.CreateDirectory(Properties.Settings.Default.moveFolder);

                            File.Move(fileInfo.FullName, string.Format(@"{0}\{1}", Properties.Settings.Default.moveFolder, fileInfo.Name));
                        }
                    }
                    catch (Exception ex)
                    {
                        this.m_watcher.Exception(ex);
                    }
                }

                if (lSeqNum != 0)
                {
                    SysRestore.EndRestore(lSeqNum);
                }

                MessageBox.Show(this, "Successfully cleaned files from disk", Application.ProductName, MessageBoxButtons.OK, MessageBoxIcon.Information);

                this.m_watcher.Event("Main", "Clean");

                // Clear problems
                this.listViewProblems.Items.Clear();
                Analyze.fileList.Clear();
                this.fileInfoCtrl1.ResetInfo();

                // Disable clean disk
                this.toolStripButtonRemove.Enabled = false;
                this.cleanToolStripMenuItem.Enabled = false;
            }
        }

        private void listViewProblems_SelectedIndexChanged(object sender, EventArgs e)
        {
            if (this.listViewProblems.SelectedItems.Count > 0)
            {
                fileInfoCtrl1.UpdateInfo(this.listViewProblems.SelectedItems[0].Tag as FileInfo);
            }
            else
            {
                fileInfoCtrl1.ResetInfo();
            }
        }

        private void aboutToolStripMenuItem_Click(object sender, EventArgs e)
        {
            About about = new About();
            about.ShowDialog(this);
        }

        private void selectAllToolStripMenuItem_Click(object sender, EventArgs e)
        {
            if (this.listViewProblems.Items.Count > 0)
            {
                foreach (ListViewItem lvi in this.listViewProblems.Items)
                    lvi.Checked = true;
            }
        }

        private void selectNoneToolStripMenuItem_Click(object sender, EventArgs e)
        {
            if (this.listViewProblems.Items.Count > 0)
            {
                foreach (ListViewItem lvi in this.listViewProblems.Items)
                    lvi.Checked = false;
            }
        }

        private void invertSelectionToolStripMenuItem_Click(object sender, EventArgs e)
        {
            if (this.listViewProblems.Items.Count > 0)
            {
                foreach (ListViewItem lvi in this.listViewProblems.Items)
                    lvi.Checked = !lvi.Checked;
            }
        }

        private void toolStripButtonOpenFile_Click(object sender, EventArgs e)
        {
            if (this.listViewProblems.SelectedItems.Count > 0)
            {
                FileInfo fileInfo = this.listViewProblems.SelectedItems[0].Tag as FileInfo;

                // Make sure file exists
                if (!fileInfo.Exists)
                    return;

                this.m_watcher.Event("Main", "Open File");

                // Open file
                try {
                    System.Diagnostics.ProcessStartInfo procStartInfo = new System.Diagnostics.ProcessStartInfo(fileInfo.FullName);
                    procStartInfo.ErrorDialog = true;
                    procStartInfo.ErrorDialogParentHandle = this.Handle;
                    System.Diagnostics.Process.Start(procStartInfo);
                } catch (Exception ex) {
                    MessageBox.Show(this, "Error opening file: " + ex.Message, "Disk Cleaner", MessageBoxButtons.OK, MessageBoxIcon.Error);
                }
            }
        }

        private void toolStripButtonProperties_Click(object sender, EventArgs e)
        {
            if (this.listViewProblems.SelectedItems.Count > 0)
            {
                FileInfo fileInfo = this.listViewProblems.SelectedItems[0].Tag as FileInfo;

                // Make sure file exists
                if (!fileInfo.Exists)
                    return;

                Utils.ShowFileProperties(fileInfo.FullName);
            }
        }

        private void exitToolStripMenuItem_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void Main_FormClosing(object sender, FormClosingEventArgs e)
        {
            if (e.CloseReason == CloseReason.UserClosing)
            {
                // Dont close if not accepted
                e.Cancel = !AskIfClose();

                if (e.Cancel)
                    return;
            }

            this.m_watcher.Stop();
        }

        private void HideShow(object sender, EventArgs e)
        {
            if (this.WindowState == FormWindowState.Minimized)
            {
                this.Show();
                this.WindowState = FormWindowState.Normal;
            }
            else
            {
                this.Hide();
                this.WindowState = FormWindowState.Minimized;
            }
        }

        private void notifyIcon1_MouseDoubleClick(object sender, MouseEventArgs e)
        {
            if (this.WindowState == FormWindowState.Minimized)
            {
                this.Show();
                this.WindowState = FormWindowState.Normal;
            }
            else
            {
                this.Hide();
                this.WindowState = FormWindowState.Minimized;
            }
        }

        private void checkForUpdatesToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Updater updater = new Updater();
            updater.ShowDialog(this);
        }

        private void restoreSystemToolStripMenuItem_Click(object sender, EventArgs e)
        {
            try
            {
                System.Diagnostics.Process.Start("rstrui.exe");
            }
            catch (Exception ex)
            {
                MessageBox.Show(this, string.Format("An error occured trying to launch System Restore ({0})", ex.Message), Application.ProductName, MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }

        private bool AskIfClose()
        {
            bool blnClose = false;

            //If asking disabled or user accepted
            if (MessageBox.Show(this, "Are you sure?", "Close", MessageBoxButtons.YesNo, MessageBoxIcon.Question) == DialogResult.Yes)
            {
                blnClose = true;
            }
            else
            {
                blnClose = false;
            }

            return blnClose;
        }

        private void schedulerToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Scheduler scheduler = new Scheduler();
            scheduler.ShowDialog(this);
        }

        private void Main_Shown(object sender, EventArgs e)
        {
            /***********************************************************************************************************/
            /* THE CODE BELOW IS LICENSED UNDER THE CREATIVE COMMONS ATTRIBUTION NON-COMMERCIAL NO DERIVATIVES LICENSE */
            if (Properties.Settings.Default.firstRun)
            {
                MessageBox.Show(this, "This program is Licensed. If you havent paid for a copy of this program, uninstall!", "Disk Cleaner", MessageBoxButtons.OK, MessageBoxIcon.Information);
                Properties.Settings.Default.firstRun = false;
            }
            /* THE CODE ABOVE IS LICENSED UNDER THE CREATIVE COMMONS ATTRIBUTION NON-COMMERCIAL NO DERIVATIVES LICENSE */
            /***********************************************************************************************************/

            // If /scan passed as argument -> Start scanning
            foreach (string arg in Environment.GetCommandLineArgs())
            {
                if (arg == "/scan")
                {
                    ScanDisk(this, new EventArgs());
                }
            }
        }

    }

    
}