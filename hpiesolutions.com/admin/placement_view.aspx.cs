using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
public partial class user_placement_view : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            SqlDataSource1.DataBind();
            SqlDataSource2.DataBind();

            DropDownList1.DataBind();
            DropDownList2.DataBind();
            SqlDataSource4.DataBind();

            DropDownList3.DataBind();
            SqlDataSource5.DataBind();
            DataView dv = (DataView)(SqlDataSource5.Select(DataSourceSelectArguments.Empty));
            if (dv != null)
            {
                if (dv.Table.Rows.Count != 0)
                {
                    GridView1.DataBind();
                }
            }
        }
    }
    protected void DropDownList2_SelectedIndexChanged(object sender, EventArgs e)
    {
        DropDownList3.DataBind();
        DataView dv = (DataView)(SqlDataSource5.Select(DataSourceSelectArguments.Empty));
        if (dv != null)
        {
            if (dv.Table.Rows.Count != 0)
            {
                GridView1.DataBind();
            }
        }
    }
    protected void DropDownList3_SelectedIndexChanged(object sender, EventArgs e)
    {
        DataView dv = (DataView)(SqlDataSource5.Select(DataSourceSelectArguments.Empty));
        if (dv != null)
        {
            if (dv.Table.Rows.Count != 0)
            {
                GridView1.DataBind();
            }
        }
    }
    protected void RadioButtonList1_SelectedIndexChanged(object sender, EventArgs e)
    {
        if (Convert.ToInt32(RadioButtonList1.SelectedValue) == 1)
        {
            DropDownList2.Visible = true;
            DropDownList3.Visible = true;
        }
        if (Convert.ToInt32(RadioButtonList1.SelectedValue) == 2)
        {
            DropDownList2.Visible = false;
            DropDownList3.Visible = false;
        }
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        if (Convert.ToInt32(RadioButtonList1.SelectedValue) == 1)
        {
            GridView1.DataSource = SqlDataSource5;
            GridView1.DataBind();
        }
        if (Convert.ToInt32(RadioButtonList1.SelectedValue) == 2)
        {
            GridView1.DataSource = SqlDataSource7;
            GridView1.DataBind();
        }
    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        export_to_excel exl = new export_to_excel();
        exl.exporttoexcel("Placement_details.xls", GridView1);
    }
    public override void VerifyRenderingInServerForm(Control control)
    {

    }
}