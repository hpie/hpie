using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class tally_sheet2 : System.Web.UI.Page
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
        Label1.Text = chl_d.SelectedItem.Text;
       // SqlDataSource1.SelectCommand = "select * from tally_sheet where challan_no='" + chl_d.SelectedItem.Text + "'";
        GridView1.DataSource = SqlDataSource3;
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
            string stack, grade;
            code = Convert.ToInt32(GridView1.DataKeys[e.RowIndex].Value);
            stack = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("stack"))).Text;
            grade = ((DropDownList)(GridView1.Rows[e.RowIndex].FindControl("DropDownList6"))).Text;
            SqlDataSource1.UpdateParameters["stack"].DefaultValue = stack;
            SqlDataSource1.UpdateParameters["grade"].DefaultValue = grade;
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
    protected void LinkButton3_Click(object sender, EventArgs e)
    {

       
            Int32 i;
            for (i = 0; i < GridView1.Rows.Count; i++)
            {
                string ss = ((Label)(GridView1.Rows[i].FindControl("stk"))).Text;
                CheckBox chk = ((CheckBox)(GridView1.Rows[i].FindControl("CheckBox1")));
                if (chk.Checked == true)
                {
                    Int32 code;
                    string stack, grade;
                    code = Convert.ToInt32(GridView1.DataKeys[i].Value);
                    stack = stack_no.Text.ToString();
                    grade = ((DropDownList)(GridView1.Rows[i].FindControl("DropDownList6"))).Text;
                    SqlDataSource1.UpdateParameters["stack"].DefaultValue = stack;
                    SqlDataSource1.UpdateParameters["grade"].DefaultValue = grade;
                    SqlDataSource1.UpdateParameters["code"].DefaultValue = code.ToString();
                    SqlDataSource1.Update();
                   
                }
            }

 GridView1.DataBind();
                    chl_d.DataBind();


       
            //Label2.Text = "Check at list one item !";
            //Label2.Focus();
        
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            //string ss = ((Label)(e.Row.FindControl("stk"))).Text;
            //if (ss != "")
            //{
            //    CheckBox chk = ((CheckBox)(e.Row.FindControl("CheckBox1")));
            //    chk.Checked = true;
            //    //chk.Enabled = false;
            //    Label st = ((Label)(e.Row.FindControl("stk")));
            //    st.Visible = true;
            //}
            //else
            //{
            //    Label st = ((Label)(e.Row.FindControl("stk")));
            //    st.Visible = false;
            //}
            
        }
    }
    protected void LinkButton4_Click(object sender, EventArgs e)
    {
        Label1.Text = chl_d.SelectedItem.Text;
        // SqlDataSource1.SelectCommand = "select * from tally_sheet where challan_no='" + chl_d.SelectedItem.Text + "'";
        GridView1.DataSource = SqlDataSource3;
        GridView1.DataBind();
    }
}