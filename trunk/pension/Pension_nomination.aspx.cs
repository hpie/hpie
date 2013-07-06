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
public partial class Pension_nomination : System.Web.UI.Page
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
            SqlDataSource1.SelectParameters["User"].DefaultValue = user.ToString();
          list();
            //if (Page.IsPostBack == false)
            //{
            //    //  DropDownList1.DataBind();
            //    // bind();
            // //   list();
            //}
          
        }
        else
        {
            Response.Redirect("default.aspx");
        }
       
        
    }
    private void list()
    {
        //SqlDataAdapter adp = new SqlDataAdapter("SELECT * FROM [nominee]   where  User1='" + user + "'", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        //DataSet ds = new DataSet();
        //adp.Fill(ds);
        //ArrayList arr = new ArrayList();
        //string ss = "";
        //for (Int32 a = 0; a < ds.Tables[0].Rows.Count; a++)
        //{
        //    ss = ss +ds.Tables[0].Rows[a]["ppo"].ToString()+ "','";
        //}
        //ss = ss.Substring(0, ss.Length - 2);
        //string st = "SELECT * FROM [joining]   where ppno  NOT IN ('" + ss + ") and  User1='" + user + "'";
        //SqlDataAdapter adp2 = new SqlDataAdapter(st, ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        //DataSet ds2 = new DataSet();
        //adp2.Fill(ds2);
        //DropDownList1.DataTextField = "ppno";
        //DropDownList1.DataValueField = "ppno";
        //DropDownList1.DataSource = ds2;
        //DropDownList1.DataBind();
        SqlDataAdapter adp1 = new SqlDataAdapter("SELECT * FROM [Joining]  where  Joining.User1='" + user + "' order by id", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        DataSet ds1 = new DataSet();
        adp1.Fill(ds1);
        if (DropDownList1.Items.Count != 0)
        {
            DropDownList1.Items.FindByValue(DropDownList1.SelectedValue).Selected = false; ;

            DropDownList1.Items.FindByValue(ds1.Tables[0].Rows[ds1.Tables[0].Rows.Count - 1]["ppno"].ToString()).Selected = true; ;
        }
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        Label1.Text = "";
       // list();
        SqlDataAdapter adp = new SqlDataAdapter("select *from nominee where PPo='" + DropDownList1.SelectedValue+ "'", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables[0].Rows.Count == 0)
        {
            if (TextBox3.Text != "")
            {
                SqlDataSource2.InsertParameters["NBirth_Date"].DefaultValue = DateTime.Parse(TextBox3.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
            }
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
    private void bind()
    {
        SqlDataAdapter adp = new SqlDataAdapter("select *from nominee where PPo='" + TextBox7.Text + "' and user1='"+user+"'", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables[0].Rows.Count != 0)
        {
            Button2.Visible = true;
            Button1.Visible = false;
            TextBox7.Enabled = false;
            TextBox1.Text = ds.Tables[0].Rows[0]["nominee"].ToString();
            TextBox2.Text = ds.Tables[0].Rows[0]["address"].ToString();
            TextBox3.Text = ds.Tables[0].Rows[0]["nbirth_date"].ToString();
            TextBox4.Text = ds.Tables[0].Rows[0]["share"].ToString();
            TextBox5.Text = ds.Tables[0].Rows[0]["gar_address"].ToString();
            TextBox6.Text = ds.Tables[0].Rows[0]["remarks"].ToString();
        }
        else
        {
            TextBox7.Enabled = true;
            TextBox1.Text = "".ToString();
            TextBox2.Text = "".ToString();
            TextBox3.Text = "".ToString();
            TextBox4.Text = "".ToString();
            TextBox5.Text = "".ToString();
            TextBox6.Text = "".ToString();
        }
    }
  
    protected void Button2_Click(object sender, EventArgs e)
    {
        Label1.Text = "";
        SqlDataAdapter adp = new SqlDataAdapter("select *from nominee where PPo='" + TextBox7.Text+ "'", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables[0].Rows.Count != 0)
        {
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
            Label1.Text = TextBox7.Text + " record not found";
        }
    }
    protected void Button3_Click(object sender, EventArgs e)
    {
        bind();
       
    }
   
}
