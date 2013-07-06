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
public partial class bank_detail : System.Web.UI.Page
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
        }
        else
        {
            Response.Redirect("default.aspx");
        }
        if (Page.IsPostBack == false)
        {
            //SqlDataSource1.SelectParameters["user"].DefaultValue = User.Identity.Name;

            //DropDownList1.DataBind();
            //DropDownList2.DataBind();
            //bind();
            SqlDataSource1.SelectParameters["user"].DefaultValue = User.Identity.Name;
            SqlDataAdapter adp5 = new SqlDataAdapter("select *from joining where user1='" + user + "' order by id desc", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
            DataSet ds5 = new DataSet();
            adp5.Fill(ds5);
            TextBox9.Text = ds5.Tables[0].Rows[ds5.Tables[0].Rows.Count - 1]["ppno"].ToString();
        }


    }
    private void bind()
    {
        SqlDataAdapter adp = new SqlDataAdapter("select *from bank_detail where PPo_no='" + TextBox8.Text + "'", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables[0].Rows.Count != 0)
        {
            TextBox1.Text = ds.Tables[0].Rows[0]["bank_ac"].ToString();
            TextBox2.Text = ds.Tables[0].Rows[0]["bank_name"].ToString();
            TextBox3.Text = ds.Tables[0].Rows[0]["bank_city"].ToString();
            TextBox4.Text = ds.Tables[0].Rows[0]["branch_code"].ToString();
            TextBox5.Text = ds.Tables[0].Rows[0]["bank_branch"].ToString();
            TextBox6.Text = ds.Tables[0].Rows[0]["bank_address"].ToString();
            TextBox7.Text = ds.Tables[0].Rows[0]["remarks"].ToString();
            DropDownList2.Items.FindByValue(DropDownList2.SelectedValue).Selected = false;
            DropDownList2.Items.FindByValue(ds.Tables[0].Rows[0]["payment_method"].ToString()).Selected = true;
        }
        else
        {
            TextBox1.Text ="".ToString();
            TextBox2.Text = "".ToString();
            TextBox3.Text = "".ToString();
            TextBox4.Text = "".ToString();
            TextBox5.Text = "".ToString();
            TextBox6.Text = "".ToString();
            TextBox7.Text = "".ToString();
           DropDownList2.DataBind();
        }
    }
    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {
       // bind();
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        Label1.Text = "";
          SqlDataAdapter adp5 = new SqlDataAdapter("select *from joining where ppno='" + TextBox9.Text + "'", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        DataSet ds5 = new DataSet();
        adp5.Fill(ds5);
        if (ds5.Tables[0].Rows.Count != 0)
        {
            SqlDataAdapter adp = new SqlDataAdapter("select *from bank_detail where PPo_no='" + TextBox9.Text + "'", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
            DataSet ds = new DataSet();
            adp.Fill(ds);
            if (ds.Tables[0].Rows.Count == 0)
            {
                //if (TextBox3.Text != "")
                //{
                //    SqlDataSource2.InsertParameters["NBirth_Date"].DefaultValue = DateTime.Parse(TextBox3.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
                //}
                SqlDataSource3.InsertParameters["User1"].DefaultValue = user.ToString();

                SqlDataSource3.Insert();
                Response.Redirect("bank_detail.aspx");
                Label1.Text = "Record Saved";
            }
            else
            {
                Label1.Text = TextBox9.Text + " Already Exists";
            }
        }
        else
        {
            Label1.Text = TextBox9.Text + "PPno Is Not Exist in Joining";
        }
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        Label1.Text = "";
        SqlDataAdapter adp = new SqlDataAdapter("select *from bank_detail where PPo_no='" + TextBox8.Text+ "'", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables[0].Rows.Count != 0)
        {
            //if (TextBox3.Text != "")
            //{
            //    SqlDataSource2.InsertParameters["NBirth_Date"].DefaultValue = DateTime.Parse(TextBox3.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
            //}
            //SqlDataSource3.UpdateParameters["User1"].DefaultValue = user.ToString();

            SqlDataSource3.Update();
            Response.Redirect("bank_detail.aspx");
            Label1.Text = TextBox8.Text + " Record Update";
           
        }
        else
        {
            Label1.Text = "Record Not Found";
        }
    }
    protected void Button3_Click(object sender, EventArgs e)
    {
        bind();
    }
}
