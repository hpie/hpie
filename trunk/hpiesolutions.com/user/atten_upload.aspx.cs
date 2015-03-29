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


public partial class user_atten_upload : System.Web.UI.Page
{
    Bitmap image;
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        DateTime live = Convert.ToDateTime(TextBox1.Text);
        DateTime l1 = Convert.ToDateTime(live.Month + "/1/" + live.Year);
        DateTime l2 = Convert.ToDateTime(live.Month +"/"+ DateTime.DaysInMonth(live.Year, live.Month)+"/" + live.Year);
        SqlDataSource3.SelectParameters["first"].DefaultValue = l1.ToString();
        SqlDataSource3.SelectParameters["second"].DefaultValue = l2.ToString();
           DataView dv = (DataView)(SqlDataSource3.Select(DataSourceSelectArguments.Empty));
           if (dv != null)
           {
               if (dv.Table.Rows.Count == 0)
               {
                   try
                   {
                       string st;
                       st = FileUpload1.PostedFile.FileName;
                       Int32 i5;
                       Int32 a;
                       a = st.LastIndexOf("\\");
                       string fn;
                       fn = st.Substring(a + 1);
                       string fp;
                       fp = Server.MapPath("upload");
                       string fname = DateTime.Now.ToString("yyyyMMddhhmmssfffffff");
                       fp = fp + "\\";
                       fp = fp + fname + fn;

                       FileUpload1.PostedFile.SaveAs(fp);

                       //DateTime MyDate = DateTime.Now;
                       //String MyString = MyDate.ToString("ddMMyyhhmmss");
                       //image = ResizeImage(FileUpload1.PostedFile.InputStream, 1024, 768);  
                       //image.Save(Server.MapPath("upload/") + MyString + ".jpg", ImageFormat.Jpeg);
                       //image.Dispose();
                       SqlDataSource1.InsertParameters["file_name"].DefaultValue = "../user/upload/" + fname + fn;
                       SqlDataSource1.InsertParameters["date_act"].DefaultValue = DateTime.Now.ToShortDateString();
                       SqlDataSource1.InsertParameters["con_type"].DefaultValue = FileUpload1.PostedFile.ContentType.ToString();
                       SqlDataSource1.Insert();
                       Label1.Text = "Upload Successfully....";
                   }
                   catch (Exception r)
                   {
                       Label1.Text = "Error !(" + r.Message + ")";
                   }

               }
               else
               {
                   Label1.Text = "You have allready uploaded attendance sheet for this month ....";
               }
           }
           else
           {
               Label1.Text = "error....!";
           }

    }
    private Bitmap ResizeImage(Stream streamImage, int maxWidth, int maxHeight)
    {
        Bitmap originalImage = new Bitmap(streamImage);
        int newWidth = originalImage.Width;
        int newHeight = originalImage.Height;
        double aspectRatio = (double)originalImage.Width / (double)originalImage.Height;

        if (aspectRatio <= 1 && originalImage.Width > maxWidth)
        {
            newWidth = maxWidth;
            newHeight = (int)Math.Round(newWidth / aspectRatio);
        }
        else if (aspectRatio > 1 && originalImage.Height > maxHeight)
        {
            newHeight = maxHeight;
            newWidth = (int)Math.Round(newHeight * aspectRatio);
        }

        Bitmap newImage = new Bitmap(originalImage, newWidth, newHeight);

        Graphics g = Graphics.FromImage(newImage);
        g.InterpolationMode = System.Drawing.Drawing2D.InterpolationMode.HighQualityBilinear;
        g.DrawImage(originalImage, 0, 0, newWidth, newHeight);

        originalImage.Dispose();

        return newImage;
    }
}