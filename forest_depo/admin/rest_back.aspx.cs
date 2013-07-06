using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Data.SqlClient;
using System.Configuration;
using Microsoft.SqlServer.Management.Smo;



public partial class admin_rest_back : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
     
    }
    private static void BackupDatabase()
    {
        //var srv = new Server(@".\SQLEXPRESS");
        //var db = default(Database);
        //db = srv.Databases["forest_depo"];
        ////Define a Backup object variable.
        //var backup = new Backup();
        //// Describes the backup operation
        //backup.Action = BackupActionType.Database;
        //backup.BackupSetDescription = "Full backup of MySuperDB on October 12, 2011";
        //backup.BackupSetName = "BackUp1.bak";
        //backup.Database = "MySuperDB";
        //// Set the backup device to 'file'
        //var bdi = default(BackupDeviceItem);
        //bdi = new BackupDeviceItem("MySuperDB_Full_Backup_forest_depo2", DeviceType.File);
        //backup.Devices.Add(bdi);
        //// If 'false', the backup will be full
        //backup.Incremental = false;
        //// Backup expiration date
        //var backupdate = new DateTime();
        //backupdate = new System.DateTime(2006, 10, 5);
        //backup.ExpirationDate = backupdate;
        //// The log will be truncated after backup completion
        //backup.LogTruncation = BackupTruncateLogType.Truncate;
        //// Execute the backup process
        //backup.SqlBackup(srv);
        ////Remove the backup device from the Backup object.
        //backup.Devices.Remove(bdi);
    }
    private static void RestoreDatabase()
    {
        //var srv = new Server(@".\SQLEXPRESS");
        //var db = default(Database);
        //db = srv.Databases["forest_depo2"];
        //// Drop the database before to restore it
        //db.Drop();
        ////Define a Restore object variable.
        //Restore restore = new Restore();
        //restore.NoRecovery = true;
        //// Set the backup device to 'file'
        //var bdi = default(BackupDeviceItem);
        //bdi = new BackupDeviceItem("MySuperDB_Full_Backup_forest_depo2", DeviceType.File);
        ////Add the device that contains the full database backup
        //restore.Devices.Add(bdi);
        ////Specify the database name.
        //restore.Database = "MySuperDB";
        ////Restore the full database.
        //restore.SqlRestore(srv);
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        try
        {
            SqlConnection con = new SqlConnection();
            con.ConnectionString = ConfigurationManager.ConnectionStrings["forest_depoConnectionString"].ConnectionString;
            con.Open();
            SqlCommand cmd = new SqlCommand();
            string rt = Server.MapPath("");
            rt = rt + "\\";
            //rt="D:\\inetpub\\vhosts\\solutionathpie.com\\hsd1\\Database\\";
            cmd.CommandText = @"backup database forest_depo1 to disk ='BackUp1.bak' with init,stats=10 ";
            cmd.Connection = con;
            cmd.ExecuteNonQuery();
            cmd.Dispose();
            //BackupDatabase();
            Response.Write("Successfull..");
        }
        catch (Exception r)
        {
            Response.Write(r.Message);
        }


    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        try
        {
            //RestoreDatabase();
            SqlConnection con = new SqlConnection();
            con.ConnectionString = ConfigurationManager.ConnectionStrings["forest_depoConnectionString2"].ConnectionString;
            con.Open();
            SqlCommand cmd = new SqlCommand();
            string rt = Server.MapPath("");
            rt = rt + "\\Database\\";
            //rt="D:\\inetpub\\vhosts\\solutionathpie.com\\hsd1\\Database\\";
            cmd.CommandText = @"RESTORE DATABASE forest_depo2 FROM disk = 'BackUp1.bak'
WITH
   MOVE 'the logical name from previous operation check row 1' TO 'forest_depo2.mdf',
   MOVE 'the logical name from previous operation check row 2' TO 'forest_depo2_log.ldf'";
            cmd.Connection = con;
            cmd.ExecuteNonQuery();
            cmd.Dispose();
            Response.Write("Successfull..");
        }
        catch (Exception r)
        {
            Response.Write(r.Message);
        }
    }
}