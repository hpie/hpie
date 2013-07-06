using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class tally_sheet3 : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            if (Request.QueryString["challan_no"] != null)
            {
                Label1.Text = Request.QueryString["challan_no"].ToString();
                chl_d.DataBind();
                chl_d.Items.FindByText(chl_d.SelectedItem.Text).Selected = false;
                chl_d.Items.FindByText(Request.QueryString["challan_no"].ToString()).Selected = true;
                // SqlDataSource1.SelectCommand = "select * from tally_sheet where challan_no='" + chl_d.SelectedItem.Text + "'";
                GridView1.DataSource = SqlDataSource1;
                GridView1.DataBind();

            }
        }
        //else
        //{
        //    Label1.Text = chl_d.SelectedItem.Text.ToString();
        //    // SqlDataSource1.SelectCommand = "select * from tally_sheet where challan_no='" + chl_d.SelectedItem.Text + "'";
        //    GridView1.DataSource = SqlDataSource3;
        //    GridView1.DataBind();
        //}
    }
    protected void DropDownList5_SelectedIndexChanged(object sender, EventArgs e)
    {
        SqlDataSource1.SelectParameters["stack"].DefaultValue = chl_d.SelectedItem.Text;
        Label1.Text = chl_d.SelectedItem.Text;
        // SqlDataSource1.SelectCommand = "select * from tally_sheet where challan_no='" + chl_d.SelectedItem.Text + "'";
        GridView1.DataSource = SqlDataSource1;
        GridView1.DataBind();
    }
    protected void GridView1_RowDeleting(object sender, GridViewDeleteEventArgs e)
    {

        Int32 code;

        code = Convert.ToInt32(GridView1.DataKeys[e.RowIndex].Value);
        SqlDataSource1.DeleteParameters["code"].DefaultValue = code.ToString();
        SqlDataSource1.Delete();
        GridView1.DataBind();
        chl_d.DataBind();
    }
    protected void GridView1_RowUpdating(object sender, GridViewUpdateEventArgs e)
    {
        Int32 code;
        string hsd;
        code = Convert.ToInt32(GridView1.DataKeys[e.RowIndex].Value);
        hsd = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("hsd_lot"))).Text;
       
        SqlDataSource1.UpdateParameters["hsd_lot_no"].DefaultValue = hsd;
       
        SqlDataSource1.UpdateParameters["code"].DefaultValue = code.ToString();
        SqlDataSource1.Update();
        GridView1.DataBind();
        chl_d.DataBind();

    }
    protected void GridView1_RowCommand(object sender, GridViewCommandEventArgs e)
    {
        //if (e.CommandName == "update")
        //{

        //}
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            //string ss = ((Label)(e.Row.FindControl("hsd"))).Text;
            //if (ss != "")
            //{
            //    CheckBox chk = ((CheckBox)(e.Row.FindControl("chk")));
            //    chk.Checked = true;
            //    chk.Enabled = false;
            //    Label st = ((Label)(e.Row.FindControl("hsd")));
            //    st.Visible = true;
            //}
            //else
            //{
            //    Label st = ((Label)(e.Row.FindControl("hsd")));
            //    st.Visible = false;
            //}

        }
    }
    protected void LinkButton3_Click(object sender, EventArgs e)
    {
        Int32 i;
        for (i = 0; i < GridView1.Rows.Count; i++)
        {
            string ss = ((Label)(GridView1.Rows[i].FindControl("hsd"))).Text;
            CheckBox chk = ((CheckBox)(GridView1.Rows[i].FindControl("chk")));
            if (chk.Checked == true)
            {
                Int32 code;
                string hsd;
                code = Convert.ToInt32(GridView1.DataKeys[i].Value);
                hsd = hsd_lot_no.Text.ToString();

                SqlDataSource1.UpdateParameters["hsd_lot_no"].DefaultValue = hsd;
                SqlDataSource1.UpdateParameters["code"].DefaultValue = code.ToString();
                SqlDataSource1.Update();

            }
        }

        GridView1.DataBind();
        chl_d.DataBind();



        //Label2.Text = "Check at list one item !";
        //Label2.Focus();
    }
    protected void LinkButton4_Click(object sender, EventArgs e)
    {
        SqlDataSource1.SelectParameters["stack"].DefaultValue = chl_d.SelectedItem.Text;
        Label1.Text = chl_d.SelectedItem.Text;
        // SqlDataSource1.SelectCommand = "select * from tally_sheet where challan_no='" + chl_d.SelectedItem.Text + "'";
        GridView1.DataSource = SqlDataSource1;
        GridView1.DataBind();
    }
}