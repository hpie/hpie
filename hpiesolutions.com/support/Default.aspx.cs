using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
public partial class user_support_visit : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            DropDownList2.DataBind();
            DropDownList1.DataBind();
            bb();
        }
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        try
        {
            SqlDataSource2.InsertParameters["date"].DefaultValue = DateTime.Now.ToString();
            SqlDataSource2.Insert();
            Label1.Text = "Successfull..";
            Label1.Focus();
        }
        catch (Exception r)
        {
            Label1.Text = "Error!(" + r.Message + ")";
            Label1.Focus();
        }
    }
    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {
        bb();
    }
    protected void SqlDataSource2_Selecting(object sender, SqlDataSourceSelectingEventArgs e)
    {

    }
    private void bb()
    {
        DataView dv = (DataView)(SqlDataSource4.Select(DataSourceSelectArguments.Empty));
        if (dv != null)
        {
            if (dv.Table.Rows.Count != 0)
            {
                comp_addr.Text = dv.Table.Rows[0]["address"] + ", Distt:" + dv.Table.Rows[0]["distt"] + ", " + dv.Table.Rows[0]["city2"] + ", Pin: " + dv.Table.Rows[0]["pcode"].ToString();
                contact_per.Text = dv.Table.Rows[0]["name2"].ToString();
                phone.Text = dv.Table.Rows[0]["std_code"]+dv.Table.Rows[0]["ph"].ToString();
                mobile.Text = dv.Table.Rows[0]["mobile"].ToString();
                email.Text = dv.Table.Rows[0]["email"].ToString();
            }
        }
    }
}