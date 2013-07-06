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

public partial class nominee : System.Web.UI.Page
{
    string user = "";
   string ud = "";
    protected void Page_Load(object sender, EventArgs e)
    {
        user = User.Identity.Name.ToString();
        //SqlDataSource1.SelectParameters["user"].DefaultValue = User.Identity.Name;
    string ss=    DropDownList1.SelectedValue.ToString();
        if (user != "")
        {
            FormsIdentity fi;
            fi = (FormsIdentity)(User.Identity);
            FormsAuthenticationTicket tkt;
            tkt = fi.Ticket;

            ud = tkt.UserData;
          //  SqlDataSource1.SelectParameters["User1"].DefaultValue = user.ToString();
            // list();


        }
        else
        {
            Response.Redirect("default.aspx");
            
        }
        if (Page.IsPostBack == false)
        {
            SqlDataSource1.SelectParameters["user"].DefaultValue = User.Identity.Name;
            SqlDataAdapter adp5 = new SqlDataAdapter("select *from joining where user1='" + user + "' order by id desc", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
            DataSet ds5 = new DataSet();
            adp5.Fill(ds5);
           TextBox8.Text = ds5.Tables[0].Rows[ds5.Tables[0].Rows.Count - 1]["ppno"].ToString();
        }
      
        //if (Page.IsPostBack == false)
        //{
        //    user = User.Identity.Name.ToString();
        //    dd.Text = user.ToString();
        //    SqlDataSource1.SelectCommand="select *from joining where user1='Web'";
        //    DataView dv=(DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
        //    DropDownList1.DataValueField="ppno";
        //    DropDownList1.DataTextField="ppno";
        //    DropDownList1.DataSource=dv;
        //    DropDownList1.DataBind();


        //   // list1();
        //}
        
    }

    private void bind()
    {
        SqlDataAdapter adp = new SqlDataAdapter("select *from nominee where PPo='" + TextBox7.Text + "' and user1='" + user + "'", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables[0].Rows.Count != 0)
        {
            //Button2.Visible = true;
            if (ds.Tables[0].Rows[0]["address"].ToString() != "")
            {
                Panel1.Visible = false;
                TextBox14.Visible = true;
            }
            else
            {
                Panel1.Visible = true;
                TextBox14.Visible = false;
            }
           // Button1.Visible = false;
           //TextBox7.Enabled = false;
            TextBox1.Text = ds.Tables[0].Rows[0]["nominee"].ToString();
            TextBox14.Text = ds.Tables[0].Rows[0]["address"].ToString();
            TextBox3.Text = ds.Tables[0].Rows[0]["nbirth_date"].ToString();
            TextBox4.Text = ds.Tables[0].Rows[0]["share"].ToString();
            TextBox5.Text = ds.Tables[0].Rows[0]["gar_address"].ToString();
            TextBox6.Text = ds.Tables[0].Rows[0]["remarks"].ToString();
        }
        else
        {
            Panel1.Visible = true;
            TextBox7.Enabled = true;
            TextBox1.Text = "".ToString();
            TextBox2.Text = "".ToString();
            TextBox3.Text = "".ToString();
            TextBox4.Text = "".ToString();
            TextBox5.Text = "".ToString();
            TextBox6.Text = "".ToString();
        }
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
      // SqlDataSource1.SelectParameters["user"].DefaultValue = User.Identity.Name;
        Label1.Text = "";
        // list();
        SqlDataAdapter adp5 = new SqlDataAdapter("select *from joining where ppno='" + TextBox8.Text + "'", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        DataSet ds5 = new DataSet();
        adp5.Fill(ds5);
        if (ds5.Tables[0].Rows.Count != 0)
        {
            SqlDataAdapter adp = new SqlDataAdapter("select *from nominee where PPo='" + TextBox8.Text + "'", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
            DataSet ds = new DataSet();
            adp.Fill(ds);
            if (ds.Tables[0].Rows.Count == 0)
            {
                if (TextBox3.Text != "")
                {
                    SqlDataSource2.InsertParameters["NBirth_Date"].DefaultValue = DateTime.Parse(TextBox3.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
                }
                string address = TextBox2.Text + " ,Vill.-" + TextBox9.Text + " ,P.O.-" + TextBox10.Text + " ,Teh.-" + TextBox11.Text + " ,Distt.-" + TextBox12.Text + ", State-" + TextBox13.Text.ToString();
                SqlDataSource2.InsertParameters["address"].DefaultValue = address.ToString();
                SqlDataSource2.InsertParameters["User1"].DefaultValue = user.ToString();
                SqlDataSource2.InsertParameters["ppo"].DefaultValue = DropDownList1.SelectedValue.ToString();
                SqlDataSource2.Insert();
                Label1.Text = "Record Saved";
            }
            else
            {
                Label1.Text = DropDownList1.SelectedValue + " Already Exists";
            }
        }
        else
        {
            Label1.Text = TextBox8.Text + "PPno Is Not Exist in Joining";

        }
     
    }
    protected void Button3_Click(object sender, EventArgs e)
    {
       
        bind();
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        Label1.Text = "";
        SqlDataAdapter adp = new SqlDataAdapter("select *from nominee where PPo='" + TextBox7.Text + "'", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables[0].Rows.Count != 0)
        {
            if (ds.Tables[0].Rows[0]["address"].ToString() != "")
            {
                SqlDataSource1.UpdateParameters["address"].DefaultValue = TextBox14.Text.ToString();

            }
            else
            {
                string address = TextBox2.Text + " ,Vill.-" + TextBox9.Text + " ,P.O.-" + TextBox10.Text + " ,Teh.-" + TextBox11.Text + " ,Distt.-" + TextBox12.Text + ", State-" + TextBox13.Text.ToString();
                SqlDataSource1.UpdateParameters["address"].DefaultValue = address.ToString();

            }
            if (TextBox3.Text != "")
            {
                SqlDataSource1.UpdateParameters["NBirth_Date"].DefaultValue = DateTime.Parse(TextBox3.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
            }
            // SqlDataSource2.InsertParameters["User1"].DefaultValue = user.ToString();

            SqlDataSource1.Update();
            // Label1.Text = "Record updated";
            Label1.Text = TextBox7.Text + " Record Updated";

        }
        else
        {
            //Panel1.Visible = true;
            Label1.Text = TextBox7.Text + " record not found";
        }
    }
    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {
        string jj = DropDownList1.SelectedValue.ToString();
    }
    protected void RadioButtonList1_SelectedIndexChanged(object sender, EventArgs e)
    {
        if (RadioButtonList1.SelectedIndex == 0)
        {
            string address = TextBox2.Text + " ,Vill.-" + TextBox9.Text + " ,P.O.-" + TextBox10.Text + " ,Teh.-" + TextBox11.Text + " ,Distt.-" + TextBox12.Text + ", State-" + TextBox13.Text.ToString();
            TextBox5.Text = address.ToString();
        }
        else
        {
            TextBox5.Text = "";
        }
    }
}