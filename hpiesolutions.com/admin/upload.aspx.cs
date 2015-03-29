using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.SqlClient;
using System.Configuration;
using System.Data;
using System.IO;
using System.Drawing;
using System.Drawing.Imaging;
using System.Threading;
using System.IO;
public partial class admin_upload : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        try
        {


            int maxSize = 1000000;
            if (FileUpload1.HasFile)
            {


                string ss1 = FileUpload1.PostedFile.ContentLength.ToString();
                Int64 ss = Convert.ToInt64(ss1);
                if (ss < maxSize)
                {
                    string nm = FileUpload1.PostedFile.FileName;
                    Int32 i = nm.LastIndexOf('\\');
                    string nam = nm.Substring(i + 1);
                    string urlr = Server.MapPath("../");
                    string uniq = DateTime.Now.ToString("ddmmyyyyhhmmss");
                    urlr = urlr + "download/" + uniq + nam;
                   string urlr2 = urlr + "user/upload" + uniq + nam;
                    FileUpload1.PostedFile.SaveAs(urlr);
                    SqlDataSource1.InsertParameters["file_name"].DefaultValue =uniq + nam;
                    SqlDataSource1.InsertParameters["date"].DefaultValue = DateTime.Now.ToString();
                    SqlDataSource1.InsertParameters["file_type"].DefaultValue = Path.GetExtension(this.FileUpload1.PostedFile.FileName).ToString();
                    SqlDataSource1.InsertParameters["con_type"].DefaultValue = FileUpload1.PostedFile.ContentType.ToString();
                    SqlDataSource1.InsertParameters["file_loc"].DefaultValue = "~/download/" + uniq + nam;
                    SqlDataSource1.Insert();
                    lblmessage.Text = "Successfull..";
                    TextBox1.Text = "";

                }
            }
            else
            {
                lblmessage.Text = "File size too long...";
            }
        }
        catch (Exception r)
        {
            lblmessage.Text = "Error! ("+r.Message+")";
        }
    }
}