using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
public partial class report_1 : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

        if (Page.IsPostBack == false)
        {
            bnk();
            ////GridView1.Rows[0].Visible = false;
        }

    }
    private void bnk()
    {
        Session.Remove("dts");

        DataTable tb = new DataTable();
        tb.Columns.Add(new DataColumn("date_of_opening", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("stack_no", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("speci_kind", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("size", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("no", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("total_no", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("total_vol", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("challan_no", Type.GetType("System.String")));
        //tb.Columns.Add(new DataColumn("species", Type.GetType("System.String")));
        //tb.Columns.Add(new DataColumn("size", Type.GetType("System.String")));
        //tb.Columns.Add(new DataColumn("no", Type.GetType("System.String")));
        //tb.Columns.Add(new DataColumn("vol", Type.GetType("System.String")));
        //tb.Columns.Add(new DataColumn("remarks", Type.GetType("System.String")));



        DataRow r;
        r = tb.NewRow();

        r[0] = "";
        tb.Rows.Add(r);
        GridView1.DataSource = tb;
        GridView1.DataBind();
        GridView1.Rows[0].Visible = false;
    }
    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {
        SqlDataSource5.DataBind();
        DropDownList chl = ((DropDownList)(GridView1.FooterRow.FindControl("DropDownList1")));
        SqlDataSource5.SelectParameters["chl"].DefaultValue = chl.SelectedItem.Text.ToString();
        DataView dv = (DataView)(SqlDataSource5.Select(DataSourceSelectArguments.Empty));
        if (dv.Table.Rows.Count != 0)
        {
            ((TextBox)(GridView1.FooterRow.FindControl("stack_no"))).Text = dv.Table.Rows[0]["stack"].ToString();
            ((TextBox)(GridView1.FooterRow.FindControl("spec_kind"))).Text = dv.Table.Rows[0]["spec"].ToString();

        }

    }
    protected void GridView1_SelectedIndexChanged(object sender, EventArgs e)
    {

    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        //if (e.Row.RowType == DataControlRowType.Footer)
        //{
        //    GridView1.Rows[0].Visible = false;
        //}
    }
    protected void GridView1_RowCommand(object sender, GridViewCommandEventArgs e)
    {
        if (e.CommandName == "insert")
        {
            string date, stack, spec, size, no, t_no, t_vol;
            DropDownList chl = ((DropDownList)(GridView1.FooterRow.FindControl("DropDownList1")));
            date = ((TextBox)(GridView1.FooterRow.FindControl("date_open"))).Text;
            stack = ((TextBox)(GridView1.FooterRow.FindControl("stack_no"))).Text;
            spec = ((TextBox)(GridView1.FooterRow.FindControl("spec_kind"))).Text;
            size = ((DropDownList)(GridView1.FooterRow.FindControl("size"))).Text;
            no = ((TextBox)(GridView1.FooterRow.FindControl("no"))).Text;
            t_no = ((TextBox)(GridView1.FooterRow.FindControl("total_no"))).Text;
            t_vol= ((TextBox)(GridView1.FooterRow.FindControl("total_vol"))).Text;

            SqlDataSource5.InsertParameters["challan_no"].DefaultValue = chl.SelectedItem.Text.ToString();
            SqlDataSource5.InsertParameters["date_of_opening"].DefaultValue = date.ToString();
            SqlDataSource5.InsertParameters["stack_no"].DefaultValue = stack.ToString();
            SqlDataSource5.InsertParameters["speci_kind"].DefaultValue = spec.ToString();
            SqlDataSource5.InsertParameters["size"].DefaultValue = size;
            SqlDataSource5.InsertParameters["no"].DefaultValue = no.ToString();
            SqlDataSource5.InsertParameters["total_no"].DefaultValue = t_no.ToString();
            SqlDataSource5.InsertParameters["total_vol"].DefaultValue = t_vol.ToString();
            SqlDataSource5.Insert();
            GridView1.DataSource = SqlDataSource1;
            GridView1.DataBind();
           // GridView1.Rows[0].Visible = false;
        }
    }
    protected void GridView1_RowDeleting(object sender, GridViewDeleteEventArgs e)
    {
        SqlDataSource5.DeleteParameters["code"].DefaultValue = GridView1.DataKeys[e.RowIndex].Value.ToString();
        SqlDataSource5.Delete();
        GridView1.DataBind();
        //GridView1.Rows[0].Visible = false;
    }
    protected void DropDownList2_SelectedIndexChanged(object sender, EventArgs e)
    {
        try
        {
            DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
            if (dv.Table.Rows.Count != 0)
            {

                GridView1.DataSource = SqlDataSource1;
                GridView1.DataBind();
            }
            else
            {
                bnk();
            }

        }
        catch
        {
            bnk();
            
        }
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        Response.Redirect("report_1_print.aspx");
    }
}