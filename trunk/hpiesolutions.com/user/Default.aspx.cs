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

public partial class user_Default : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            
          
            cen_code();
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
    private void cen_code()
    {
        DataView dv = (DataView)(SqlDataSource4.Select(DataSourceSelectArguments.Empty));
        if (dv != null)
        {
            if (dv.Table.Rows.Count != 0)
            {
                Int32 i;
                i = Convert.ToInt32(dv.Table.Rows[0]["s_id"]);

                string ss = Session["start_a"].ToString();
                string[] dd = ss.Split('/');

                i++;
                t1.Text = i.ToString();
                s_id.Text = dd[0].ToString() + "/" + i.ToString();
            }
            else
            {
                string ss = Session["start_a"].ToString();
                string[] dd = ss.Split('/');
                t1.Text = "1001".ToString();
                s_id.Text = dd[0].ToString() + "/1001".ToString();
            }
        }
    }
    private void ClearInputs(ControlCollection ctrls)
    {
        foreach (Control ctrl in ctrls)
        {
            if (ctrl is TextBox)
                ((TextBox)ctrl).Text = string.Empty;
            else if (ctrl is DropDownList)
                ((DropDownList)ctrl).ClearSelection();
            else if (ctrl is CheckBox)
                ((CheckBox)ctrl).Checked = false;

            ClearInputs(ctrl.Controls);
        }
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        try
        {
          
            
             int maxSize = 1000000;
             if (File112.HasFile)
             {


                 string ss1 = File112.PostedFile.ContentLength.ToString();
                 Int64 ss = Convert.ToInt64(ss1);
                 if (ss < maxSize)
                 {
                     DateTime MyDate = DateTime.Now;

                     String MyString = MyDate.ToString("ddMMyyhhmmss");

                     Bitmap image = ResizeImage(File112.PostedFile.InputStream, 200, 200);
                     image.Save(Server.MapPath("images/") + MyString + ".jpg", ImageFormat.Jpeg);
                     image.Dispose();
                     cen_code();
                     SqlDataSource4.InsertParameters["img"].DefaultValue = "images/" + MyString + ".jpg";
                     SqlDataSource4.InsertParameters["sub_date"].DefaultValue =DateTime.Now.ToString();
                     SqlDataSource4.Insert();
                 
                     Label1.Text = "Record Saved Successfully..";
                     Response.Redirect("details_1.aspx?sid=" + s_id.Text);
                     cen_code();
                 }
                 else
                 {
                     Label1.Text = "Image size too long..";
                     Label1.Focus();
                 }
             }
             else
             {
                 cen_code();
                 SqlDataSource4.InsertParameters["img"].DefaultValue = "images/photo_not_available_large_T.png";

                 string EventTimeZoneId = "India Standard Time"; // for instance, this should be stored in DB as varchar[32]
                 DateTime EventLocalTime = TimeZoneInfo.ConvertTimeBySystemTimeZoneId(DateTime.UtcNow, EventTimeZoneId);


                 //SqlDataSource1.InsertParameters["login_date"].DefaultValue = EventLocalTime.ToString();

                 SqlDataSource4.InsertParameters["sub_date"].DefaultValue = EventLocalTime.ToString();
                 SqlDataSource4.Insert();
                 Label1.Text = "Record Saved Successfully..";
                 Response.Redirect("details_1.aspx?sid=" + s_id.Text);
                 cen_code();
             }
           
        }
        catch (Exception r)
        {
            Label1.Text ="<blink>Error !</blink> (" +r.Message+")";
            Label1.Focus();
        }
    }
    protected void DropDownList2_SelectedIndexChanged(object sender, EventArgs e)
    {
        c_pin.Focus();
    }
    protected void DropDownList5_SelectedIndexChanged(object sender, EventArgs e)
    {
        p_pin.Focus();
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        
        Thread.Sleep(50000);
    }
   
    public long DateDiff(System.DateTime StartDate, System.DateTime EndDate)
    {
        long lngDateDiffValue = 0;
        System.TimeSpan TS = new System.TimeSpan(EndDate.Ticks - StartDate.Ticks);
        lngDateDiffValue = (long)(TS.Days / 365);
        return (lngDateDiffValue);
    }
    protected void dob_TextChanged(object sender, EventArgs e)
    {
        DateTime dob1, dob2;
        dob1 = DateTime.Now;
        dob2 = Convert.ToDateTime(dob.Text);
        long ag = DateDiff(dob2, dob1);
        age.Text = ag.ToString();
    }
    protected void CheckBox1_CheckedChanged(object sender, EventArgs e)
    {
        p_addr.Text = c_addr.Text;
        p_addr2.Text = c_addr2.Text;
        p_addr3.Text = c_addr3.Text;
        string d1 = DropDownList2.SelectedItem.Text;
        string d2 = DropDownList3.SelectedItem.Text;
        DropDownList5.Items.FindByText(DropDownList5.SelectedItem.Text).Selected = false;
        DropDownList5.Items.FindByText(d1).Selected = true;
        DropDownList6.DataBind();
        DropDownList6.Items.FindByText(DropDownList6.SelectedItem.Text).Selected = false;
        DropDownList6.Items.FindByText(d2).Selected = true;
        p_pin.Text = c_pin.Text;
    }
}