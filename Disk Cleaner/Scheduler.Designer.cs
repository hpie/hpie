namespace Disk_Cleaner
{
    partial class Scheduler
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.groupBox1 = new System.Windows.Forms.GroupBox();
            this.radioButtonMonthly = new System.Windows.Forms.RadioButton();
            this.radioButtonWeekly = new System.Windows.Forms.RadioButton();
            this.radioButtonDaily = new System.Windows.Forms.RadioButton();
            this.radioButtonNever = new System.Windows.Forms.RadioButton();
            this.groupBoxSchedule = new System.Windows.Forms.GroupBox();
            this.comboBoxDay = new System.Windows.Forms.ComboBox();
            this.labelDay = new System.Windows.Forms.Label();
            this.dateTimePickerSched = new System.Windows.Forms.DateTimePicker();
            this.labelTime = new System.Windows.Forms.Label();
            this.labelDate = new System.Windows.Forms.Label();
            this.comboBoxDate = new System.Windows.Forms.ComboBox();
            this.groupBoxDesc = new System.Windows.Forms.GroupBox();
            this.labelDescription = new System.Windows.Forms.Label();
            this.buttonCancel = new System.Windows.Forms.Button();
            this.buttonOk = new System.Windows.Forms.Button();
            this.groupBox1.SuspendLayout();
            this.groupBoxSchedule.SuspendLayout();
            this.groupBoxDesc.SuspendLayout();
            this.SuspendLayout();
            // 
            // groupBox1
            // 
            this.groupBox1.Controls.Add(this.radioButtonMonthly);
            this.groupBox1.Controls.Add(this.radioButtonWeekly);
            this.groupBox1.Controls.Add(this.radioButtonDaily);
            this.groupBox1.Controls.Add(this.radioButtonNever);
            this.groupBox1.Location = new System.Drawing.Point(12, 12);
            this.groupBox1.Name = "groupBox1";
            this.groupBox1.Size = new System.Drawing.Size(363, 48);
            this.groupBox1.TabIndex = 0;
            this.groupBox1.TabStop = false;
            this.groupBox1.Text = "Perform";
            // 
            // radioButtonMonthly
            // 
            this.radioButtonMonthly.AutoSize = true;
            this.radioButtonMonthly.Location = new System.Drawing.Point(187, 19);
            this.radioButtonMonthly.Name = "radioButtonMonthly";
            this.radioButtonMonthly.Size = new System.Drawing.Size(62, 17);
            this.radioButtonMonthly.TabIndex = 3;
            this.radioButtonMonthly.TabStop = true;
            this.radioButtonMonthly.Text = "Monthly";
            this.radioButtonMonthly.UseVisualStyleBackColor = true;
            this.radioButtonMonthly.CheckedChanged += new System.EventHandler(this.UpdateScheduler);
            // 
            // radioButtonWeekly
            // 
            this.radioButtonWeekly.AutoSize = true;
            this.radioButtonWeekly.Location = new System.Drawing.Point(120, 19);
            this.radioButtonWeekly.Name = "radioButtonWeekly";
            this.radioButtonWeekly.Size = new System.Drawing.Size(61, 17);
            this.radioButtonWeekly.TabIndex = 2;
            this.radioButtonWeekly.TabStop = true;
            this.radioButtonWeekly.Text = "Weekly";
            this.radioButtonWeekly.UseVisualStyleBackColor = true;
            this.radioButtonWeekly.CheckedChanged += new System.EventHandler(this.UpdateScheduler);
            // 
            // radioButtonDaily
            // 
            this.radioButtonDaily.AutoSize = true;
            this.radioButtonDaily.Location = new System.Drawing.Point(66, 19);
            this.radioButtonDaily.Name = "radioButtonDaily";
            this.radioButtonDaily.Size = new System.Drawing.Size(48, 17);
            this.radioButtonDaily.TabIndex = 1;
            this.radioButtonDaily.TabStop = true;
            this.radioButtonDaily.Text = "Daily";
            this.radioButtonDaily.UseVisualStyleBackColor = true;
            this.radioButtonDaily.CheckedChanged += new System.EventHandler(this.UpdateScheduler);
            // 
            // radioButtonNever
            // 
            this.radioButtonNever.AutoSize = true;
            this.radioButtonNever.Location = new System.Drawing.Point(6, 19);
            this.radioButtonNever.Name = "radioButtonNever";
            this.radioButtonNever.Size = new System.Drawing.Size(54, 17);
            this.radioButtonNever.TabIndex = 0;
            this.radioButtonNever.TabStop = true;
            this.radioButtonNever.Text = "Never";
            this.radioButtonNever.UseVisualStyleBackColor = true;
            this.radioButtonNever.CheckedChanged += new System.EventHandler(this.UpdateScheduler);
            // 
            // groupBoxSchedule
            // 
            this.groupBoxSchedule.Controls.Add(this.comboBoxDay);
            this.groupBoxSchedule.Controls.Add(this.labelDay);
            this.groupBoxSchedule.Controls.Add(this.dateTimePickerSched);
            this.groupBoxSchedule.Controls.Add(this.labelTime);
            this.groupBoxSchedule.Location = new System.Drawing.Point(12, 66);
            this.groupBoxSchedule.Name = "groupBoxSchedule";
            this.groupBoxSchedule.Size = new System.Drawing.Size(363, 45);
            this.groupBoxSchedule.TabIndex = 1;
            this.groupBoxSchedule.TabStop = false;
            this.groupBoxSchedule.Text = "Schedule Task";
            // 
            // comboBoxDay
            // 
            this.comboBoxDay.DropDownStyle = System.Windows.Forms.ComboBoxStyle.DropDownList;
            this.comboBoxDay.FormattingEnabled = true;
            this.comboBoxDay.Items.AddRange(new object[] {
            "Sunday",
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday"});
            this.comboBoxDay.Location = new System.Drawing.Point(280, 17);
            this.comboBoxDay.Name = "comboBoxDay";
            this.comboBoxDay.Size = new System.Drawing.Size(77, 21);
            this.comboBoxDay.TabIndex = 3;
            this.comboBoxDay.SelectedIndexChanged += new System.EventHandler(this.UpdateScheduler);
            // 
            // labelDay
            // 
            this.labelDay.AutoSize = true;
            this.labelDay.Location = new System.Drawing.Point(245, 20);
            this.labelDay.Name = "labelDay";
            this.labelDay.Size = new System.Drawing.Size(29, 13);
            this.labelDay.TabIndex = 2;
            this.labelDay.Text = "Day:";
            // 
            // dateTimePickerSched
            // 
            this.dateTimePickerSched.Checked = false;
            this.dateTimePickerSched.CustomFormat = "hh:mm tt";
            this.dateTimePickerSched.Format = System.Windows.Forms.DateTimePickerFormat.Custom;
            this.dateTimePickerSched.Location = new System.Drawing.Point(39, 17);
            this.dateTimePickerSched.Name = "dateTimePickerSched";
            this.dateTimePickerSched.ShowUpDown = true;
            this.dateTimePickerSched.Size = new System.Drawing.Size(75, 20);
            this.dateTimePickerSched.TabIndex = 1;
            this.dateTimePickerSched.ValueChanged += new System.EventHandler(this.UpdateScheduler);
            // 
            // labelTime
            // 
            this.labelTime.AutoSize = true;
            this.labelTime.Location = new System.Drawing.Point(6, 20);
            this.labelTime.Name = "labelTime";
            this.labelTime.Size = new System.Drawing.Size(33, 13);
            this.labelTime.TabIndex = 0;
            this.labelTime.Text = "Time:";
            // 
            // labelDate
            // 
            this.labelDate.AutoSize = true;
            this.labelDate.Location = new System.Drawing.Point(275, 86);
            this.labelDate.Name = "labelDate";
            this.labelDate.Size = new System.Drawing.Size(33, 13);
            this.labelDate.TabIndex = 2;
            this.labelDate.Text = "Date:";
            // 
            // comboBoxDate
            // 
            this.comboBoxDate.DropDownStyle = System.Windows.Forms.ComboBoxStyle.DropDownList;
            this.comboBoxDate.FormattingEnabled = true;
            this.comboBoxDate.Items.AddRange(new object[] {
            "1",
            "2",
            "3",
            "4",
            "5",
            "6",
            "7",
            "8",
            "9",
            "10",
            "11",
            "12",
            "13",
            "14",
            "15",
            "16",
            "17",
            "18",
            "19",
            "20",
            "21",
            "22",
            "23",
            "24",
            "25",
            "26",
            "27",
            "28",
            "29",
            "30",
            "31"});
            this.comboBoxDate.Location = new System.Drawing.Point(314, 83);
            this.comboBoxDate.Name = "comboBoxDate";
            this.comboBoxDate.Size = new System.Drawing.Size(56, 21);
            this.comboBoxDate.TabIndex = 3;
            this.comboBoxDate.SelectedIndexChanged += new System.EventHandler(this.UpdateScheduler);
            // 
            // groupBoxDesc
            // 
            this.groupBoxDesc.Controls.Add(this.labelDescription);
            this.groupBoxDesc.Location = new System.Drawing.Point(12, 117);
            this.groupBoxDesc.Name = "groupBoxDesc";
            this.groupBoxDesc.Size = new System.Drawing.Size(363, 39);
            this.groupBoxDesc.TabIndex = 4;
            this.groupBoxDesc.TabStop = false;
            this.groupBoxDesc.Text = "Description";
            // 
            // labelDescription
            // 
            this.labelDescription.Location = new System.Drawing.Point(6, 16);
            this.labelDescription.Name = "labelDescription";
            this.labelDescription.Size = new System.Drawing.Size(352, 17);
            this.labelDescription.TabIndex = 0;
            // 
            // buttonCancel
            // 
            this.buttonCancel.DialogResult = System.Windows.Forms.DialogResult.Cancel;
            this.buttonCancel.Location = new System.Drawing.Point(314, 162);
            this.buttonCancel.Name = "buttonCancel";
            this.buttonCancel.Size = new System.Drawing.Size(61, 23);
            this.buttonCancel.TabIndex = 5;
            this.buttonCancel.Text = "Cancel";
            this.buttonCancel.UseVisualStyleBackColor = true;
            // 
            // buttonOk
            // 
            this.buttonOk.Location = new System.Drawing.Point(274, 162);
            this.buttonOk.Name = "buttonOk";
            this.buttonOk.Size = new System.Drawing.Size(34, 23);
            this.buttonOk.TabIndex = 6;
            this.buttonOk.Text = "OK";
            this.buttonOk.UseVisualStyleBackColor = true;
            this.buttonOk.Click += new System.EventHandler(this.buttonOk_Click);
            // 
            // Scheduler
            // 
            this.AcceptButton = this.buttonOk;
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.CancelButton = this.buttonCancel;
            this.ClientSize = new System.Drawing.Size(387, 191);
            this.Controls.Add(this.buttonOk);
            this.Controls.Add(this.buttonCancel);
            this.Controls.Add(this.groupBoxDesc);
            this.Controls.Add(this.comboBoxDate);
            this.Controls.Add(this.labelDate);
            this.Controls.Add(this.groupBoxSchedule);
            this.Controls.Add(this.groupBox1);
            this.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedSingle;
            this.MaximizeBox = false;
            this.MinimizeBox = false;
            this.Name = "Scheduler";
            this.ShowIcon = false;
            this.ShowInTaskbar = false;
            this.Text = "Disk Cleaner - Scheduler";
            this.groupBox1.ResumeLayout(false);
            this.groupBox1.PerformLayout();
            this.groupBoxSchedule.ResumeLayout(false);
            this.groupBoxSchedule.PerformLayout();
            this.groupBoxDesc.ResumeLayout(false);
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.GroupBox groupBox1;
        private System.Windows.Forms.RadioButton radioButtonMonthly;
        private System.Windows.Forms.RadioButton radioButtonWeekly;
        private System.Windows.Forms.RadioButton radioButtonDaily;
        private System.Windows.Forms.RadioButton radioButtonNever;
        private System.Windows.Forms.GroupBox groupBoxSchedule;
        private System.Windows.Forms.Label labelDay;
        private System.Windows.Forms.DateTimePicker dateTimePickerSched;
        private System.Windows.Forms.Label labelTime;
        private System.Windows.Forms.ComboBox comboBoxDay;
        private System.Windows.Forms.Label labelDate;
        private System.Windows.Forms.ComboBox comboBoxDate;
        private System.Windows.Forms.GroupBox groupBoxDesc;
        private System.Windows.Forms.Label labelDescription;
        private System.Windows.Forms.Button buttonCancel;
        private System.Windows.Forms.Button buttonOk;
    }
}