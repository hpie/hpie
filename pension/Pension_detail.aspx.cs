using System;
using System.Collections;
using System.Configuration;
using System.Data;
using System.Linq;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.HtmlControls;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;
using System.Xml.Linq;
using System.Data.SqlClient;
public partial class Pension_detail : System.Web.UI.Page
{
    string user = "";
    string ud = "";
    protected void Page_Load(object sender, EventArgs e)
    {

        user = User.Identity.Name.ToString();
        if (user != "")
        {
            FormsIdentity fi;
            fi = (FormsIdentity)(User.Identity);
            FormsAuthenticationTicket tkt;
            tkt = fi.Ticket;

            ud = tkt.UserData;
            if (Page.IsPostBack == false)
            {
                // SqlDataSource1.SelectParameters["user"].DefaultValue = User.Identity.Name;
                SqlDataAdapter adp5 = new SqlDataAdapter("select *from joining where user1='" + user + "' order by id desc", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
                DataSet ds5 = new DataSet();
                adp5.Fill(ds5);
                TextBox28.Text = ds5.Tables[0].Rows[ds5.Tables[0].Rows.Count - 1]["ppno"].ToString();
                //bind();
            }
        }
        else
        {
            Response.Redirect("default.aspx");
        }

    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        Label1.Text = "";
         SqlDataAdapter adp5 = new SqlDataAdapter("select *from joining where ppno='" + TextBox28.Text + "'", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        DataSet ds5 = new DataSet();
        adp5.Fill(ds5);
        if (ds5.Tables[0].Rows.Count != 0)
        {
            SqlDataAdapter adp = new SqlDataAdapter("select *from info where PPno='" + TextBox28.Text + "'", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
            DataSet ds = new DataSet();
            adp.Fill(ds);
            if (ds.Tables[0].Rows.Count == 0)
            {
                SqlDataSource1.InsertParameters["Start_Date"].DefaultValue = DateTime.Parse(TextBox1.Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
                SqlDataSource1.InsertParameters["End_Date"].DefaultValue = DateTime.Parse(TextBox2.Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
                SqlDataSource1.InsertParameters["Retirment"].DefaultValue = DateTime.Parse(TextBox5.Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
                if (TextBox24.Text != "")
                {
                    SqlDataSource1.InsertParameters["pay_scale"].DefaultValue = TextBox24.Text.ToString();

                }
                else
                {
                    SqlDataSource1.InsertParameters["pay_scale"].DefaultValue = DropDownList5.SelectedItem.Text.ToString(); ;

                }
                if (TextBox25.Text != "")
                {
                    SqlDataSource1.InsertParameters["exst_pension"].DefaultValue = TextBox25.Text.ToString();

                }
                else
                {
                    SqlDataSource1.InsertParameters["exst_pension"].DefaultValue = DropDownList6.SelectedItem.Text.ToString(); ;

                }
                if (TextBox26.Text != "")
                {
                    SqlDataSource1.InsertParameters["Revi_scal"].DefaultValue = TextBox26.Text.ToString();

                }
                else
                {
                    SqlDataSource1.InsertParameters["Revi_scal"].DefaultValue = DropDownList7.SelectedItem.Text.ToString(); ;

                }
                if (TextBox27.Text != "")
                {
                    SqlDataSource1.InsertParameters["Rev_amt"].DefaultValue = TextBox27.Text.ToString();

                }
                else
                {
                    SqlDataSource1.InsertParameters["Rev_amt"].DefaultValue = DropDownList8.SelectedItem.Text.ToString(); ;

                }
                SqlDataSource1.InsertParameters["User1"].DefaultValue = user.ToString();

                SqlDataSource1.Insert();

                Label1.Text = TextBox28.Text + " Record saved";
                TextBox3.Text = "";
                TextBox4.Text = "";
                TextBox6.Text = "";
                TextBox7.Text = "";
                TextBox8.Text = "";
                TextBox9.Text = "";
                //TextBox10.Text = "";
                //TextBox11.Text = "";
                //TextBox12.Text = "";
                //TextBox13.Text = "";
                //TextBox14.Text = "";
                TextBox15.Text = "";
                TextBox16.Text = "";
                TextBox17.Text = "";
                TextBox18.Text = "";
                TextBox19.Text = "";
                TextBox20.Text = "";
                TextBox21.Text = "";
                TextBox22.Text = "";
                TextBox23.Text = "";

            }
            else
            {
                Label1.Text = TextBox28.Text + " Already Saved";
            }
        }
       
             else
        {
            Label1.Text = TextBox28.Text + "PPno Is Not Exist in Joining";
        }
        
    }
    private void bind()
    {
        DropDownList6.DataBind();
        SqlDataAdapter adp = new SqlDataAdapter("select *from info where PPno='" + TextBox29.Text + "'", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables[0].Rows.Count != 0)
        {
           
                TextBox1.Text = Convert.ToDateTime(ds.Tables[0].Rows[0]["Start_date"]).ToString("dd/MM/yyyy");
                TextBox2.Text = Convert.ToDateTime(ds.Tables[0].Rows[0]["End_date"]).ToString("dd/MM/yyyy");
                TextBox3.Text = ds.Tables[0].Rows[0]["family_member"].ToString();
                TextBox4.Text = ds.Tables[0].Rows[0]["comm_per"].ToString();
                TextBox2.Text = Convert.ToDateTime(ds.Tables[0].Rows[0]["retirment"]).ToString("dd/MM/yyyy");
                TextBox6.Text = ds.Tables[0].Rows[0]["quali_service_yy"].ToString();
                TextBox7.Text = ds.Tables[0].Rows[0]["quali_service_mm"].ToString();
                TextBox8.Text = ds.Tables[0].Rows[0]["quali_service_dd"].ToString();
                TextBox9.Text = ds.Tables[0].Rows[0]["six_month"].ToString();
                TextBox14.Text = ds.Tables[0].Rows[0]["rev_pay_scale"].ToString();
                TextBox15.Text = ds.Tables[0].Rows[0]["con_pension"].ToString();
                TextBox16.Text = ds.Tables[0].Rows[0]["rev_pension"].ToString();
                TextBox17.Text = ds.Tables[0].Rows[0]["add_pension"].ToString();
                TextBox18.Text = ds.Tables[0].Rows[0]["pension"].ToString();
                TextBox19.Text = ds.Tables[0].Rows[0]["ext_pension"].ToString();
                TextBox20.Text = ds.Tables[0].Rows[0]["fam_pension"].ToString();
                TextBox21.Text = ds.Tables[0].Rows[0]["pb_gp"].ToString();
                TextBox22.Text = ds.Tables[0].Rows[0]["fp_au"].ToString();
                TextBox23.Text = ds.Tables[0].Rows[0]["addtion_pn"].ToString();
                 DropDownList2.Items.FindByValue(DropDownList2.SelectedValue).Selected = false;
                DropDownList2.Items.FindByValue(ds.Tables[0].Rows[0]["status"].ToString()).Selected = true;
                DropDownList3.Items.FindByValue(DropDownList3.SelectedValue).Selected = false;
                DropDownList3.Items.FindByValue(ds.Tables[0].Rows[0]["bank_option"].ToString()).Selected = true;
                DropDownList4.Items.FindByValue(DropDownList4.SelectedValue).Selected = false;
                DropDownList4.Items.FindByValue(ds.Tables[0].Rows[0]["medical_all"].ToString()).Selected = true;
                DropDownList5.Items.FindByValue(DropDownList5.SelectedValue).Selected = false;
                DropDownList5.Items.Add(ds.Tables[0].Rows[0]["pay_scale"].ToString());
                DropDownList5.Items.FindByValue(ds.Tables[0].Rows[0]["pay_scale"].ToString()).Selected = true;
                DropDownList6.Items.FindByValue(DropDownList6.SelectedValue).Selected = false;
                DropDownList6.Items.Add(ds.Tables[0].Rows[0]["exst_pension"].ToString());
                DropDownList6.Items.FindByValue(ds.Tables[0].Rows[0]["exst_pension"].ToString()).Selected = true;
                DropDownList7.Items.FindByValue(DropDownList7.SelectedValue).Selected = false;
                DropDownList7.Items.Add(ds.Tables[0].Rows[0]["revi_scal"].ToString());
                DropDownList7.Items.FindByValue(ds.Tables[0].Rows[0]["revi_scal"].ToString()).Selected = true;
                DropDownList8.Items.FindByValue(DropDownList8.SelectedValue).Selected = false;
                DropDownList8.Items.Add(ds.Tables[0].Rows[0]["rev_amtl"].ToString());
                DropDownList8.Items.FindByValue(ds.Tables[0].Rows[0]["rev_amt"].ToString()).Selected = true;
           
        }
        else
        {
            TextBox1.Text = ""; ;
            TextBox2.Text = ""; ;
            TextBox3.Text = ""; ;
            TextBox4.Text = ""; ;
            TextBox2.Text = ""; ;
            TextBox6.Text = ""; ;
            TextBox7.Text = ""; ;
            TextBox8.Text = ""; ;
            TextBox9.Text = ""; ;
            TextBox14.Text = ""; ;
            TextBox15.Text = ""; ;
            TextBox16.Text = ""; ;
            TextBox17.Text = ""; ;
            TextBox18.Text = ""; ;
            TextBox19.Text = ""; ;
            TextBox20.Text = ""; ;
            TextBox21.Text = ""; ;
            TextBox22.Text = ""; ;
            TextBox23.Text = ""; ;
        }
    }
    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {

    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        Int32 mm=Convert.ToInt32(TextBox7.Text);
        Int32 yy = 0;
        if (mm >= 3 && mm <= 8)
        {
            yy = 1;
        }
        else if (mm >= 9)
        {
            yy = 2;
        }
        else
        {
            yy = 0;
        }
        TextBox9.Text = ((Convert.ToInt32(TextBox6.Text)*2) + yy).ToString();


    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        bind();
    }
    protected void Button3_Click(object sender, EventArgs e)
    {
        SqlDataAdapter adp = new SqlDataAdapter("select *from info where PPno='" + TextBox28.Text + "'", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
            DataSet ds = new DataSet();
            adp.Fill(ds);
            if (ds.Tables[0].Rows.Count != 0)
            {
                SqlDataSource1.UpdateParameters["Start_Date"].DefaultValue = DateTime.Parse(TextBox1.Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
                SqlDataSource1.UpdateParameters["End_Date"].DefaultValue = DateTime.Parse(TextBox2.Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
                SqlDataSource1.UpdateParameters["Retirment"].DefaultValue = DateTime.Parse(TextBox5.Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
                if (TextBox24.Text != "")
                {
                    SqlDataSource1.UpdateParameters["pay_scale"].DefaultValue = TextBox24.Text.ToString();

                }
                else
                {
                    SqlDataSource1.UpdateParameters["pay_scale"].DefaultValue = DropDownList5.SelectedItem.Text.ToString(); ;

                }
                if (TextBox25.Text != "")
                {
                    SqlDataSource1.UpdateParameters["exst_pension"].DefaultValue = TextBox25.Text.ToString();

                }
                else
                {
                    SqlDataSource1.UpdateParameters["exst_pension"].DefaultValue = DropDownList6.SelectedItem.Text.ToString(); ;

                }
                if (TextBox26.Text != "")
                {
                    SqlDataSource1.UpdateParameters["Revi_scal"].DefaultValue = TextBox26.Text.ToString();

                }
                else
                {
                    SqlDataSource1.UpdateParameters["Revi_scal"].DefaultValue = DropDownList7.SelectedItem.Text.ToString(); ;

                }
                if (TextBox27.Text != "")
                {
                    SqlDataSource1.UpdateParameters["Rev_amt"].DefaultValue = TextBox27.Text.ToString();

                }
                else
                {
                    SqlDataSource1.UpdateParameters["Rev_amt"].DefaultValue = DropDownList8.SelectedItem.Text.ToString(); ;

                }
                //SqlDataSource1.InsertParameters["User1"].DefaultValue = user.ToString();

                SqlDataSource1.Update();

                Label1.Text = TextBox29.Text + " Record Update";
            }
            else
            {
                Label1.Text = TextBox29.Text + " Record Not Found";
            }
    }
}
