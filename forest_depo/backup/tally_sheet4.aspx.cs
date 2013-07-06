using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class tally_sheet4 : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void GridView1_SelectedIndexChanged(object sender, EventArgs e)
    {

    }
    protected void DropDownList5_SelectedIndexChanged(object sender, EventArgs e)
    {
        SqlDataSource1.SelectParameters["stack"].DefaultValue = chl_d.SelectedItem.Text;
        Label1.Text = chl_d.SelectedItem.Text;
        // SqlDataSource1.SelectCommand = "select * from tally_sheet where challan_no='" + chl_d.SelectedItem.Text + "'";
        GridView1.DataSource = SqlDataSource1;
        GridView1.DataBind();
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            string mark = ((Label)(e.Row.FindControl("mark"))).Text;
            CheckBox chk;
            chk = ((CheckBox)(e.Row.FindControl("chk")));
            if (mark == "true")
            {
                chk.Checked = true;
            }
           

        }
    }
    protected void GridView1_RowUpdating(object sender, GridViewUpdateEventArgs e)
    {
        Int32 code;
        
        code = Convert.ToInt32(GridView1.DataKeys[e.RowIndex].Value);
        CheckBox chk;
        chk = ((CheckBox)(GridView1.Rows[e.RowIndex].FindControl("chk")));

        if (chk.Checked==true)
        {
            SqlDataSource1.UpdateParameters["mark_to_auction"].DefaultValue = "true".ToString();
        }
        else
        {
            SqlDataSource1.UpdateParameters["mark_to_auction"].DefaultValue = "false".ToString();
        }

        

        SqlDataSource1.UpdateParameters["code"].DefaultValue = code.ToString();
        SqlDataSource1.Update();
        GridView1.DataBind();
       
    }
    protected void GridView1_RowCommand(object sender, GridViewCommandEventArgs e)
    {
        if (e.CommandName == "all")
        {
            Int32 code;
           
            Int32 i;
            for(i=0;i<GridView1.Rows.Count;i++)
            {
                code = Convert.ToInt32(((Label)(GridView1.Rows[i].FindControl("id_i"))).Text);


                CheckBox chk;
                chk = ((CheckBox)(GridView1.Rows[i].FindControl("chk")));

                if (chk.Checked == true)
                {
                    SqlDataSource1.UpdateParameters["mark_to_auction"].DefaultValue = "true".ToString();
                }
                else
                {
                    SqlDataSource1.UpdateParameters["mark_to_auction"].DefaultValue = "false".ToString();
                }

               

                SqlDataSource1.UpdateParameters["code"].DefaultValue = code.ToString();
                SqlDataSource1.Update();

            }


           
            //hsd = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("hsd_lot"))).Text;

            //SqlDataSource1.UpdateParameters["hsd_lot_no"].DefaultValue = hsd;

            //SqlDataSource1.UpdateParameters["code"].DefaultValue = code.ToString();
            //SqlDataSource1.Update();
            //GridView1.DataBind();
            //chl_d.DataBind();
        }
    }
    protected void RadioButtonList1_SelectedIndexChanged(object sender, EventArgs e)
    {
        switch (RadioButtonList1.SelectedIndex)
        {
            case 0:
                SqlDataSource2.SelectCommand = "SELECT hsd_lot_no FROM [tally_sheet] where mark_to_auction='false' or mark_to_auction is null GROUP BY hsd_lot_no";
       
        chl_d.DataBind();
                break;
                            case 1:
                SqlDataSource2.SelectCommand = "SELECT hsd_lot_no FROM [tally_sheet] where mark_to_auction='true' or mark_to_auction is null GROUP BY hsd_lot_no";
     
        chl_d.DataBind();
                break;
        }
        
    }
}