using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;

public partial class user_training_status : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void DropDownList2_SelectedIndexChanged(object sender, EventArgs e)
    {
       
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            SqlDataSource4.SelectParameters["id"].DefaultValue = e.Row.FindControl("s_id").ToString();
            DataView dv = (DataView)(SqlDataSource4.Select(DataSourceSelectArguments.Empty));
            if (dv != null)
            {
                if (dv.Table.Rows.Count != 0)
                {
                    CheckBox chk = ((CheckBox)(e.Row.FindControl("chk")));
                    chk.Checked = false;
                   
                }
                else
                {
                    CheckBox chk = ((CheckBox)(e.Row.FindControl("chk")));
                    chk.Checked = true;
                 
                }
            }
        }
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        Int32 i, cnt=0;
        for (i = 0; i < GridView1.Rows.Count; i++)
        {
            CheckBox chk = ((CheckBox)(GridView1.Rows[i].FindControl("chk")));
            if (chk.Checked == true)
            {
                //try
                //{

                    SqlDataSource3.UpdateParameters["tr_date"].DefaultValue = ((TextBox)(GridView1.Rows[i].FindControl("TextBox4"))).Text;
                    SqlDataSource3.UpdateParameters["tr_status"].DefaultValue = ((DropDownList)(GridView1.Rows[i].FindControl("tr_status"))).SelectedItem.Text;
                    SqlDataSource3.UpdateParameters["tr_com_date"].DefaultValue = ((TextBox)(GridView1.Rows[i].FindControl("TextBox5"))).Text;
                    SqlDataSource3.UpdateParameters["id"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("s_id"))).Text;
                    SqlDataSource3.Update();
                    cnt++;
                //}
                //catch
                //{

                //}
 
            }
        }
        Label1.Text = cnt.ToString() + " Record saved Sucessfully..";
        GridView1.DataBind();
        Label1.Focus();
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        GridView1.DataBind();
    }
    protected void DropDownList5_SelectedIndexChanged(object sender, EventArgs e)
    {
        GridView1.DataBind();
    }
}