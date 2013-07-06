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
public partial class recurring_payment : System.Web.UI.Page
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
           // SqlDataSource1.SelectParameters["user"].DefaultValue = User.Identity.Name;
            if (!Page.IsPostBack)
            {
                SqlDataAdapter adp5 = new SqlDataAdapter("select *from joining where user1='" + user + "' order by id desc", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
                DataSet ds5 = new DataSet();
                adp5.Fill(ds5);
                TextBox5.Text = ds5.Tables[0].Rows[ds5.Tables[0].Rows.Count - 1]["ppno"].ToString();
            }
        }
        else
        {
            Response.Redirect("default.aspx");
        }

    }
    public string getdate(DateTime dr)
    {
     
            return dr.ToString("dd/MM/yyyy");
       
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.Footer)
        {
            ((TextBox)(e.Row.FindControl("TextBox1"))).Text = "01/01/2006".ToString();
            ((TextBox)(e.Row.FindControl("TextBox2"))).Text = "31/12/9999".ToString();
        }
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            string rem = "";
            rem = ((Label)(e.Row.FindControl("Label5"))).Text.ToString();
            if (rem == "ss")
            {
                e.Row.Visible = false;
            }
            else
            {
                e.Row.Visible = true;
            }
            //if (((Label)(e.Row.FindControl("Label3"))).Text != "")
            //{
            //    ((Label)(e.Row.FindControl("Label3"))).Text = getdate(Convert.ToDateTime(((Label)(e.Row.FindControl("Label3"))).Text)).ToString();
            //}
            if (((Label)(e.Row.FindControl("Label1"))).Text != "")
            {
                ((Label)(e.Row.FindControl("Label1"))).Text = getdate(Convert.ToDateTime(((Label)(e.Row.FindControl("Label1"))).Text)).ToString();
            }
            if (((Label)(e.Row.FindControl("Label2"))).Text != "")
            {
                ((Label)(e.Row.FindControl("Label2"))).Text = getdate(Convert.ToDateTime(((Label)(e.Row.FindControl("Label2"))).Text)).ToString();
            }
        }
    }
    protected void GridView1_RowCommand(object sender, GridViewCommandEventArgs e)
    {
        if (e.CommandName == "Add")
        {
            string sdate = ((TextBox)(GridView1.FooterRow.FindControl("Textbox1"))).Text.ToString();
            string edate = ((TextBox)(GridView1.FooterRow.FindControl("Textbox2"))).Text.ToString();
            string wage = ((DropDownList)(GridView1.FooterRow.FindControl("Dropdownlist2"))).SelectedValue.ToString();
            string rem = ((TextBox)(GridView1.FooterRow.FindControl("Textbox4"))).Text.ToString();
            SqlDataSource2.InsertParameters["Start_Date"].DefaultValue = DateTime.Parse(sdate.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
            SqlDataSource2.InsertParameters["End_Date"].DefaultValue = DateTime.Parse(edate.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
            SqlDataSource2.InsertParameters["Wage_Type"].DefaultValue = wage.ToString();
            string amt1 = ((TextBox)(GridView1.FooterRow.FindControl("Textbox3"))).Text.ToString();
            if (amt1 != "")
            {
                Decimal amt =Convert.ToDecimal( ((TextBox)(GridView1.FooterRow.FindControl("Textbox3"))).Text.ToString());

                SqlDataSource2.InsertParameters["amount"].DefaultValue = amt.ToString();
            }
            SqlDataSource2.InsertParameters["remarks"].DefaultValue = rem.ToString();
            SqlDataSource2.InsertParameters["User1"].DefaultValue = user.ToString();
            
            SqlDataSource2.Insert();

        }
    }
    protected void GridView1_RowDeleting(object sender, GridViewDeleteEventArgs e)
    {
        SqlDataSource2.DeleteParameters["id"].DefaultValue = GridView1.DataKeys[e.RowIndex].Value.ToString();
        SqlDataSource2.Delete();
    }

    protected void Button2_Click(object sender, EventArgs e)
    {
        GridView1.DataBind();
    }
}
