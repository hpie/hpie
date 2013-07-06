using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
public partial class broad_level_timber_add : System.Web.UI.Page
{
    public Int32 count = 0;
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            bnk();
        }

    }
    protected void GridView1_RowCommand(object sender, GridViewCommandEventArgs e)
    {
        if (e.CommandName == "insert")
        {
            string lot_no, stack, size, no, vol, ctt, remarks, name_party, bid;
            DropDownList chl = ((DropDownList)(GridView2.FooterRow.FindControl("chl")));
            lot_no = ((TextBox)(GridView2.FooterRow.FindControl("lot_no"))).Text;
            stack = ((DropDownList)(GridView2.FooterRow.FindControl("stack_no"))).SelectedItem.Text;
            size = ((DropDownList)(GridView2.FooterRow.FindControl("size_drp"))).Text;
            no = ((TextBox)(GridView2.FooterRow.FindControl("no"))).Text;
            vol = ((TextBox)(GridView2.FooterRow.FindControl("vol"))).Text;
            ctt = ((TextBox)(GridView2.FooterRow.FindControl("ctt"))).Text;
            remarks = ((TextBox)(GridView2.FooterRow.FindControl("remarks"))).Text;
            name_party = ((TextBox)(GridView2.FooterRow.FindControl("name_party"))).Text;
            bid = ((TextBox)(GridView2.FooterRow.FindControl("bid"))).Text;


            SqlDataSource1.InsertParameters["challan_no"].DefaultValue = chl.SelectedItem.Text.ToString();
            SqlDataSource1.InsertParameters["date"].DefaultValue = TextBox2.Text;
            SqlDataSource1.InsertParameters["stack"].DefaultValue = stack.ToString();
            SqlDataSource1.InsertParameters["lot_no"].DefaultValue = lot_no.ToString();
            SqlDataSource1.InsertParameters["size"].DefaultValue = size.ToString();
            SqlDataSource1.InsertParameters["no"].DefaultValue = no;
            SqlDataSource1.InsertParameters["vol"].DefaultValue = vol.ToString();
            SqlDataSource1.InsertParameters["ctt"].DefaultValue = ctt.ToString();
            SqlDataSource1.InsertParameters["remarks"].DefaultValue = remarks.ToString();
            SqlDataSource1.InsertParameters["bid"].DefaultValue = bid.ToString();
            SqlDataSource1.InsertParameters["name_party"].DefaultValue = name_party.ToString();

            SqlDataSource1.Insert();
            Response.Redirect("broad_level_timber.aspx?chl="+chl.SelectedItem.Text);
        }
      
    }
    protected void GridView1_SelectedIndexChanged(object sender, EventArgs e)
    {
       
    }
    private void bnk()
    {
        Session.Remove("dts");

        DataTable tb = new DataTable();
        tb.Columns.Add(new DataColumn("challan_no", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("lot_no", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("stack", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("size", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("no", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("vol", Type.GetType("System.String")));
        //tb.Columns.Add(new DataColumn("total_vol", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("ctt", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("remarks", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("name_party", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("bid", Type.GetType("System.String")));



        DataRow r;
        r = tb.NewRow();

        r[4] = "0";
        r[5] = "0";
        r[6] = "0";
        tb.Rows.Add(r);
        GridView2.DataSource = tb;
        GridView2.DataBind();
        GridView2.Rows[0].Visible = false;
    }
    protected void GridView2_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        //if (e.Row.RowType == DataControlRowType.DataRow)
        //{
        //    if (count == 0)
        //    {
        //        count = 1;
        //    }
        //    else
        //    {
        //        count++;
        //    }

        //    ((Label)(e.Row.FindControl("srn"))).Text = count.ToString();
        //}
        //if (e.Row.RowType == DataControlRowType.Footer)
        //{
        //    count++;
        //    ((Label)(e.Row.FindControl("srn"))).Text = count.ToString();
        //}
    }
    protected void stack_no_SelectedIndexChanged(object sender, EventArgs e)
    {
        SqlDataSource2.SelectParameters["stack"].DefaultValue = ((DropDownList)(GridView2.FooterRow.FindControl("stack_no"))).SelectedItem.Text;
        DataView dv = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));
        if (dv.Table.Rows.Count != 0)
        {
            DropDownList chl =((DropDownList)(GridView2.FooterRow.FindControl("chl")));

            chl.Items.FindByText(chl.SelectedItem.Text).Selected = false;
            chl.Items.FindByText(dv.Table.Rows[0]["challan_no"].ToString()).Selected = true;
            ((TextBox)(GridView2.FooterRow.FindControl("lot_no"))).Text = dv.Table.Rows[0]["lot_no"].ToString();
           
            DropDownList size2 = ((DropDownList)(GridView2.FooterRow.FindControl("size_drp")));
         
            size2.Items.FindByText(size2.SelectedItem.Text).Selected = false;
            size2.Items.FindByText(dv.Table.Rows[0]["size_type"].ToString()).Selected = true;
            ((TextBox)(GridView2.FooterRow.FindControl("no"))).Text = dv.Table.Rows[0]["no"].ToString();
            ((TextBox)(GridView2.FooterRow.FindControl("vol"))).Text = dv.Table.Rows[0]["total_vol"].ToString();
            //((TextBox)(GridView2.FooterRow.FindControl("ctt"))).Text = dv.Table.Rows[0]["ctt"].ToString();

        }
    }
    protected void TextBox2_TextChanged(object sender, EventArgs e)
    {

    }
}