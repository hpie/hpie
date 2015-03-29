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
public partial class user_details_1 : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void DataList1_EditCommand(object source, DataListCommandEventArgs e)
    {
        DataList1.EditItemIndex = e.Item.ItemIndex;
        DataList1.DataBind();
    }
   
    protected void DataList1_ItemDataBound(object sender, DataListItemEventArgs e)
    {

        if (e.Item.ItemType == ListItemType.EditItem)
        {
          

          



              DataView dv = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));
              if (dv != null)
              {
                  if (dv.Table.Rows.Count != 0)
                  {
                      DropDownList d1, d2, d3, d4;
                      d1 = ((DropDownList)(e.Item.FindControl("DropDownList2")));
                      d2 = ((DropDownList)(e.Item.FindControl("DropDownList3")));
                      d3 = ((DropDownList)(e.Item.FindControl("DropDownList5")));
                      d4 = ((DropDownList)(e.Item.FindControl("DropDownList6")));

                      SqlDataSource s1, s2, s3, s4;
                      s1 = ((SqlDataSource)(e.Item.FindControl("SqlDataSource1")));                     
                      d1.DataBind();
                      d1.Items.FindByText(d1.SelectedItem.Text).Selected = false;
                      d1.Items.FindByText(dv.Table.Rows[0]["distt"].ToString()).Selected = true;
                      s2 = ((SqlDataSource)(e.Item.FindControl("cc_city")));
                      s2.DataBind();
                      d2.DataBind();

                      s3 = ((SqlDataSource)(e.Item.FindControl("SqlDataSource8")));                    
                      d3.DataBind();

                      d3.Items.FindByText(d3.SelectedItem.Text).Selected = false;
                      d3.Items.FindByText(dv.Table.Rows[0]["distt2"].ToString()).Selected = true;
                      s4 = ((SqlDataSource)(e.Item.FindControl("cc_city2")));
                      s4.DataBind();
                      d4.DataBind();



                    
                      d2.Items.FindByText(d2.SelectedItem.Text).Selected =false;
                      string ccl = dv.Table.Rows[0]["city"].ToString();
                      d2.Items.FindByText(dv.Table.Rows[0]["city"].ToString()).Selected = true;

                      d4.Items.FindByText(d4.SelectedItem.Text).Selected = false;
                      d4.Items.FindByText(dv.Table.Rows[0]["city2"].ToString()).Selected = true;
                     
                     
                     
                  }
              }


           

          



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
    public long DateDiff(System.DateTime StartDate, System.DateTime EndDate)
    {
        long lngDateDiffValue = 0;
        System.TimeSpan TS = new System.TimeSpan(EndDate.Ticks - StartDate.Ticks);
        lngDateDiffValue = (long)(TS.Days / 365);
        return (lngDateDiffValue);
    }
    protected void DataList1_UpdateCommand(object source, DataListCommandEventArgs e)
    {
        try
        {
            Label5.Text = "";
            FileUpload File112 = ((FileUpload)(e.Item.FindControl("File112")));
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
                    SqlDataSource1.UpdateParameters["img"].DefaultValue = "images/" + MyString + ".jpg";

                }
                else
                {
                    SqlDataSource1.UpdateParameters["img"].DefaultValue = ((Label)(e.Item.FindControl("img"))).Text;
                    Label5.Text = "Image size too long..";
                    Label4.Focus();
                }
            }
            else
            {
                SqlDataSource1.UpdateParameters["img"].DefaultValue = ((Label)(e.Item.FindControl("img"))).Text;



            }

            SqlDataSource1.UpdateParameters["s_name"].DefaultValue = ((TextBox)(e.Item.FindControl("s_name"))).Text;
            SqlDataSource1.UpdateParameters["s_f_name"].DefaultValue = ((TextBox)(e.Item.FindControl("s_f_name"))).Text;
            SqlDataSource1.UpdateParameters["dob"].DefaultValue = ((TextBox)(e.Item.FindControl("dob"))).Text;
            SqlDataSource1.UpdateParameters["gen"].DefaultValue = ((RadioButtonList)(e.Item.FindControl("RadioButtonList2"))).SelectedValue;
            SqlDataSource1.UpdateParameters["email"].DefaultValue = ((TextBox)(e.Item.FindControl("email"))).Text;
            SqlDataSource1.UpdateParameters["landline"].DefaultValue = ((TextBox)(e.Item.FindControl("landline"))).Text;
            SqlDataSource1.UpdateParameters["mobile"].DefaultValue = ((TextBox)(e.Item.FindControl("mobile"))).Text;
            SqlDataSource1.UpdateParameters["addr"].DefaultValue = ((TextBox)(e.Item.FindControl("c_addr"))).Text;
            SqlDataSource1.UpdateParameters["city"].DefaultValue = ((DropDownList)(e.Item.FindControl("DropDownList3"))).SelectedValue;
            SqlDataSource1.UpdateParameters["distt"].DefaultValue = ((DropDownList)(e.Item.FindControl("DropDownList2"))).SelectedValue;
            SqlDataSource1.UpdateParameters["state"].DefaultValue = ((DropDownList)(e.Item.FindControl("DropDownList4"))).SelectedValue;
            SqlDataSource1.UpdateParameters["p_code"].DefaultValue = ((TextBox)(e.Item.FindControl("c_pin"))).Text;
            SqlDataSource1.UpdateParameters["degree"].DefaultValue = ((DropDownList)(e.Item.FindControl("DropDownList8"))).SelectedValue;
            SqlDataSource1.UpdateParameters["quli"].DefaultValue = ((DropDownList)(e.Item.FindControl("DropDownList9"))).SelectedValue;
            SqlDataSource1.UpdateParameters["an_income"].DefaultValue = ((TextBox)(e.Item.FindControl("ann_inc"))).Text;
            SqlDataSource1.UpdateParameters["social_status"].DefaultValue = ((DropDownList)(e.Item.FindControl("social_st"))).SelectedValue;
            SqlDataSource1.UpdateParameters["phy_chall"].DefaultValue = ((RadioButtonList)(e.Item.FindControl("RadioButtonList3"))).SelectedValue;
            SqlDataSource1.UpdateParameters["bank_ac"].DefaultValue = ((TextBox)(e.Item.FindControl("bank_no"))).Text;
            SqlDataSource1.UpdateParameters["bank_name"].DefaultValue = ((DropDownList)(e.Item.FindControl("DropDownList1"))).SelectedValue;
            SqlDataSource1.UpdateParameters["ifsc_code"].DefaultValue = ((TextBox)(e.Item.FindControl("ifsc_code"))).Text;
            SqlDataSource1.UpdateParameters["bpl_irdp_no"].DefaultValue = ((TextBox)(e.Item.FindControl("bpl_irdp"))).Text;

            SqlDataSource1.UpdateParameters["p_addr"].DefaultValue = ((TextBox)(e.Item.FindControl("p_addr"))).Text;
            SqlDataSource1.UpdateParameters["p_city"].DefaultValue = ((DropDownList)(e.Item.FindControl("DropDownList6"))).SelectedValue;
            SqlDataSource1.UpdateParameters["p_distt"].DefaultValue = ((DropDownList)(e.Item.FindControl("DropDownList5"))).SelectedValue;
            SqlDataSource1.UpdateParameters["p_state"].DefaultValue = ((DropDownList)(e.Item.FindControl("DropDownList7"))).SelectedValue;
            SqlDataSource1.UpdateParameters["p_p_code"].DefaultValue = ((TextBox)(e.Item.FindControl("p_pin"))).Text;

            SqlDataSource1.UpdateParameters["course"].DefaultValue = ((DropDownList)(e.Item.FindControl("DropDownList11"))).SelectedValue;
            SqlDataSource1.UpdateParameters["date_of_add"].DefaultValue = ((TextBox)(e.Item.FindControl("TextBox1"))).Text;

            SqlDataSource1.UpdateParameters["project_code"].DefaultValue = ((DropDownList)(e.Item.FindControl("p_code"))).Text;
            SqlDataSource1.UpdateParameters["tr_date"].DefaultValue = ((TextBox)(e.Item.FindControl("TextBox1"))).Text;
            SqlDataSource1.UpdateParameters["tr_com_date"].DefaultValue = ((TextBox)(e.Item.FindControl("TextBox2"))).Text;
            SqlDataSource1.UpdateParameters["s_name2"].DefaultValue = ((TextBox)(e.Item.FindControl("s_l_name"))).Text;
            SqlDataSource1.UpdateParameters["s_name3"].DefaultValue = ((TextBox)(e.Item.FindControl("s_l_name"))).Text;
            SqlDataSource1.UpdateParameters["f_name2"].DefaultValue = ((TextBox)(e.Item.FindControl("f_m_name"))).Text;
            SqlDataSource1.UpdateParameters["f_name3"].DefaultValue = ((TextBox)(e.Item.FindControl("f_l_name"))).Text;
            SqlDataSource1.UpdateParameters["m_status"].DefaultValue = ((RadioButtonList)(e.Item.FindControl("RadioButtonList4"))).SelectedValue;
            SqlDataSource1.UpdateParameters["addr2"].DefaultValue = ((TextBox)(e.Item.FindControl("c_addr2"))).Text;
            SqlDataSource1.UpdateParameters["addr3"].DefaultValue = ((TextBox)(e.Item.FindControl("c_addr3"))).Text;
            SqlDataSource1.UpdateParameters["travel"].DefaultValue = ((TextBox)(e.Item.FindControl("travel"))).Text;
            SqlDataSource1.UpdateParameters["other_inc"].DefaultValue = ((TextBox)(e.Item.FindControl("other_inc"))).Text;
            SqlDataSource1.UpdateParameters["tot_inc"].DefaultValue = ((TextBox)(e.Item.FindControl("other_inc"))).Text;

            DateTime dob1, dob2;
            dob1 = DateTime.Now;
            dob2 = Convert.ToDateTime(((TextBox)(e.Item.FindControl("dob"))).Text);
            long ag = DateDiff(dob2, dob1);


            SqlDataSource1.UpdateParameters["age"].DefaultValue = ag.ToString();
            SqlDataSource1.UpdateParameters["SSC_Sub"].DefaultValue = ((TextBox)(e.Item.FindControl("ssc"))).Text;
            SqlDataSource1.UpdateParameters["SSC_Yr"].DefaultValue = ((TextBox)(e.Item.FindControl("ssc_year"))).Text;
            SqlDataSource1.UpdateParameters["SSC_Per"].DefaultValue = ((TextBox)(e.Item.FindControl("ssc_per"))).Text;
            SqlDataSource1.UpdateParameters["HSC_Sub"].DefaultValue = ((TextBox)(e.Item.FindControl("hsc"))).Text;
            SqlDataSource1.UpdateParameters["HSC_Yr"].DefaultValue = ((TextBox)(e.Item.FindControl("hsc_year"))).Text;
            SqlDataSource1.UpdateParameters["HSC_Per"].DefaultValue = ((TextBox)(e.Item.FindControl("hsc_per"))).Text;
            SqlDataSource1.UpdateParameters["Gra_Sub"].DefaultValue = ((TextBox)(e.Item.FindControl("Gradu"))).Text;
            SqlDataSource1.UpdateParameters["Gra_Yr"].DefaultValue = ((TextBox)(e.Item.FindControl("gradu_year"))).Text;
            SqlDataSource1.UpdateParameters["Gra_Per"].DefaultValue = ((TextBox)(e.Item.FindControl("gradu_per"))).Text;
            SqlDataSource1.UpdateParameters["Post_Gra_Sub"].DefaultValue = ((TextBox)(e.Item.FindControl("post_gradu"))).Text;
            SqlDataSource1.UpdateParameters["Post_Gra_Yr"].DefaultValue = ((TextBox)(e.Item.FindControl("post_gradu_year"))).Text;
            SqlDataSource1.UpdateParameters["Post_Gra_Per"].DefaultValue = ((TextBox)(e.Item.FindControl("post_gradu_per"))).Text;
            SqlDataSource1.UpdateParameters["std_code"].DefaultValue = ((TextBox)(e.Item.FindControl("std"))).Text;
            SqlDataSource1.UpdateParameters["per_corres_same"].DefaultValue = ((CheckBox)(e.Item.FindControl("CheckBox1"))).Checked.ToString();
            SqlDataSource1.UpdateParameters["p_addr2"].DefaultValue = ((TextBox)(e.Item.FindControl("p_addr2"))).Text;
            SqlDataSource1.UpdateParameters["p_addr3"].DefaultValue = ((TextBox)(e.Item.FindControl("p_addr3"))).Text;

            SqlDataSource1.Update();
            DataList1.EditItemIndex = -1;
            DataList1.DataBind();

            Label4.Text = "Record Saved Successfully..";
            Label4.Focus();
        }
        catch (Exception r)
        {
            Label4.Focus();
            Label4.Text = "Error !("+r.Message+")";
        }







    }
    protected void DataList1_CancelCommand(object source, DataListCommandEventArgs e)
    {
        DataList1.EditItemIndex = -1;
        DataList1.DataBind();
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        Response.Redirect("Default.aspx");
    }
}