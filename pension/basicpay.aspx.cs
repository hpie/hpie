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

public partial class basicpay : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    public string getdate(DateTime dr)
    {

        return dr.ToString("dd/MM/yyyy");

    }
    
   
    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {
        GridView3.DataBind();
    }
    protected void GridView3_RowCommand(object sender, GridViewCommandEventArgs e)
    {
        if (e.CommandName == "Add")
        {
            string sdate = ((TextBox)(GridView3.FooterRow.FindControl("Textbox1"))).Text.ToString();
            string edate = ((TextBox)(GridView3.FooterRow.FindControl("Textbox2"))).Text.ToString();
            string pstype = ((TextBox)(GridView3.FooterRow.FindControl("Textbox3"))).Text.ToString();
            string psarea = ((TextBox)(GridView3.FooterRow.FindControl("Textbox4"))).Text.ToString();
            string psgroup = ((DropDownList)(GridView3.FooterRow.FindControl("Dropdownlist2"))).SelectedValue.ToString();
            string pslevel = ((DropDownList)(GridView3.FooterRow.FindControl("Dropdownlist3"))).SelectedValue.ToString();
            //string pslevel = ((DropDownList)(GridView1.FooterRow.FindControl("Dropdownlist4"))).SelectedValue.ToString();
            string wagetype = ((DropDownList)(GridView3.FooterRow.FindControl("Dropdownlist4"))).SelectedValue.ToString();
            SqlDataSource2.InsertParameters["Start_Date"].DefaultValue = DateTime.Parse(sdate.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
            SqlDataSource2.InsertParameters["End_Date"].DefaultValue = DateTime.Parse(edate.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
            SqlDataSource2.InsertParameters["ps_type"].DefaultValue = pstype;
            SqlDataSource2.InsertParameters["ps_area"].DefaultValue = psarea;
            SqlDataSource2.InsertParameters["ps_group"].DefaultValue = psgroup;
            SqlDataSource2.InsertParameters["ps_level"].DefaultValue = pslevel;
            SqlDataSource2.InsertParameters["Wage_Type"].DefaultValue = wagetype.ToString();
            Decimal amt = Convert.ToDecimal(((TextBox)(GridView3.FooterRow.FindControl("Textbox5"))).Text.ToString());
            SqlDataSource2.InsertParameters["amount"].DefaultValue = amt.ToString();
            SqlDataSource2.Insert();

        }
    }
    protected void GridView3_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.Footer)
        {
            ((TextBox)(e.Row.FindControl("TextBox1"))).Text = "01/01/2006".ToString();
            ((TextBox)(e.Row.FindControl("TextBox2"))).Text = "31/12/9999".ToString();
        }
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            //string rem = "";
            //rem = ((Label)(e.Row.FindControl("Label5"))).Text.ToString();
            //if (rem == "ss")
            //{
            //    e.Row.Visible = false;
            //}
            //else
            //{
            //    e.Row.Visible = true;
            //}
            //if (((Label)(e.Row.FindControl("Label3"))).Text != "")
            //{
            //    ((Label)(e.Row.FindControl("Label3"))).Text = getdate(Convert.ToDateTime(((Label)(e.Row.FindControl("Label3"))).Text)).ToString();
            //}
            if (((Label)(e.Row.FindControl("Label1"))).Text != "")
            {
                ((Label)(e.Row.FindControl("Label1"))).Text = getdate(Convert.ToDateTime(((Label)(e.Row.FindControl("Label1"))).Text)).ToString();
            }
            if (((Label)(e.Row.FindControl("Label3"))).Text != "")
            {
                ((Label)(e.Row.FindControl("Label3"))).Text = getdate(Convert.ToDateTime(((Label)(e.Row.FindControl("Label3"))).Text)).ToString();
            }
        }
    }
}
