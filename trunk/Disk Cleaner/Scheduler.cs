/*
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
using Disk_Cleaner.TaskScheduler;

namespace Disk_Cleaner
{
    public partial class Scheduler : Form
    {
        public Scheduler()
        {
            InitializeComponent();

            this.comboBoxDay.DataSource = Enum.GetValues(typeof(DaysOfTheWeek));
            this.comboBoxDay.SelectedItem = DaysOfTheWeek.Sunday;

            this.comboBoxDate.SelectedIndex = 0;

            GetJobInfo();
        }

        TaskService ts = new TaskService();

        /// <summary>
        /// Get scheduler info thru job ID
        /// </summary>
        private void GetJobInfo()
        {
            // Reset controls
            this.labelDay.Visible = false;
            this.labelDate.Visible = false;
            this.labelTime.Visible = false;
            this.dateTimePickerSched.Visible = false;
            this.comboBoxDate.Visible = false;
            this.comboBoxDay.Visible = false;

            using (Task t = ts.GetTask("Disk Cleaner"))
            {
                if (t == null)
                {
                    // Task not found
                    this.radioButtonNever.Checked = true;
                    return;
                }

                TaskDefinition td = t.Definition;

                if (td.Triggers.Count == 0)
                {
                    // Task is invalid
                    this.radioButtonNever.Checked = true;
                    return;
                }

                Trigger trigger = td.Triggers[0];
                if (trigger is DailyTrigger)
                {
                    this.radioButtonDaily.Checked = true;
                    UpdateScheduler(null, new EventArgs());

                    int hour = (trigger as DailyTrigger).StartBoundary.Hour;
                    int min = (trigger as DailyTrigger).StartBoundary.Minute;
                    this.dateTimePickerSched.Value = new DateTime(DateTime.Today.Year, DateTime.Today.Month, DateTime.Today.Day, hour, min, 0);
                }
                else if (trigger is WeeklyTrigger)
                {
                    this.radioButtonWeekly.Checked = true;
                    UpdateScheduler(null, new EventArgs());

                    int hour = (trigger as WeeklyTrigger).StartBoundary.Hour;
                    int min = (trigger as WeeklyTrigger).StartBoundary.Minute;
                    this.dateTimePickerSched.Value = new DateTime(DateTime.Today.Year, DateTime.Today.Month, DateTime.Today.Day, hour, min, 0);

                    DaysOfTheWeek dow = (trigger as WeeklyTrigger).DaysOfWeek;
                    this.comboBoxDay.SelectedItem = dow;
                }
                else if (trigger is MonthlyTrigger)
                {
                    this.radioButtonMonthly.Checked = true;
                    UpdateScheduler(null, new EventArgs());

                    this.comboBoxDate.SelectedItem = (trigger as MonthlyTrigger).DaysOfMonth[0].ToString();

                    int hour = (trigger as MonthlyTrigger).StartBoundary.Hour;
                    int min = (trigger as MonthlyTrigger).StartBoundary.Minute;
                    this.dateTimePickerSched.Value = new DateTime(DateTime.Today.Year, DateTime.Today.Month, DateTime.Today.Day, hour, min, 0);
                }
            }
        }

        private void SaveJobInfo()
        {
            if (ts.GetTask("Disk Cleaner") != null)
                ts.RootFolder.DeleteTask("Disk Cleaner");

            TaskDefinition td = ts.NewTask();

            if (ts.HighestSupportedVersion.CompareTo(new Version(1, 1)) > 0)
            {
                // Only applies to Task Scheduler 2.0 (Vista or higher)
                td.RegistrationInfo.Date = DateTime.Now;
                td.RegistrationInfo.Source = "Disk Cleaner";
                td.Principal.RunLevel = TaskRunLevel.Highest;
            }

            td.RegistrationInfo.Description = "Runs a scan with Disk Cleaner";

            if (this.radioButtonNever.Checked)
            {
                return;
            }
            else if (this.radioButtonDaily.Checked)
            {
                td.Triggers.Add(new DailyTrigger() { StartBoundary = this.dateTimePickerSched.Value });
            }
            else if (this.radioButtonWeekly.Checked)
            {
                DaysOfTheWeek dow = (DaysOfTheWeek)this.comboBoxDay.SelectedItem;

                td.Triggers.Add(new WeeklyTrigger(dow) { StartBoundary = this.dateTimePickerSched.Value });
            }
            else if (this.radioButtonMonthly.Checked)
            {
                int dom = Convert.ToInt32(this.comboBoxDate.SelectedItem);

                td.Triggers.Add(new MonthlyTrigger(dom) { StartBoundary = this.dateTimePickerSched.Value });
            }

            td.Actions.Add(new ExecAction(Application.ExecutablePath, "/scan"));

            ts.RootFolder.RegisterTaskDefinition("Disk Cleaner", td);
        }

        private void UpdateScheduler(object sender, EventArgs e)
        {
            // Reset controls
            this.labelDay.Visible = false;
            this.labelDate.Visible = false;
            this.labelTime.Visible = false;
            this.dateTimePickerSched.Visible = false;
            this.comboBoxDate.Visible = false;
            this.comboBoxDay.Visible = false;

            if (this.radioButtonNever.Checked)
            {
                this.groupBoxSchedule.Visible = false;
                this.groupBoxDesc.Visible = false;

                this.labelDescription.Text = "";
            }
            else if (this.radioButtonDaily.Checked)
            {
                this.groupBoxSchedule.Visible = true;
                this.groupBoxDesc.Visible = true;
                this.labelTime.Visible = true;
                this.dateTimePickerSched.Visible = true;

                this.labelDescription.Text = string.Format("A disk scan will be run every day at {0}", this.dateTimePickerSched.Value.ToShortTimeString());
            }
            else if (this.radioButtonWeekly.Checked)
            {
                this.groupBoxSchedule.Visible = true;
                this.labelTime.Visible = true;
                this.dateTimePickerSched.Visible = true;
                this.labelDay.Visible = true;
                this.comboBoxDay.Visible = true;
                this.groupBoxDesc.Visible = true;

                this.labelDescription.Text = string.Format("A disk scan will be run every week on {0} at {1}", this.comboBoxDay.SelectedItem, this.dateTimePickerSched.Value.ToShortTimeString());
            }
            else if (this.radioButtonMonthly.Checked)
            {
                this.groupBoxSchedule.Visible = true;
                this.labelTime.Visible = true;
                this.dateTimePickerSched.Visible = true;
                this.labelDate.Visible = true;
                this.comboBoxDate.Visible = true;
                this.groupBoxDesc.Visible = true;

                string numSuffix = Utils.GetNumberSuffix(Convert.ToInt32(this.comboBoxDate.SelectedItem));
                this.labelDescription.Text = string.Format("A disk scan will be run every month on the {0} day at {1}", numSuffix, this.dateTimePickerSched.Value.ToShortTimeString());
            }
        }

        private void buttonOk_Click(object sender, EventArgs e)
        {
            SaveJobInfo();

            this.Close();
        }
    }
}
