using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;

public partial class speces_size_type : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {
        Label1.Text = "";
        ListBox1.DataBind();
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        try
        {
            Label1.Text = "";
            DataView dv = (DataView)(SqlDataSource_chk.Select(DataSourceSelectArguments.Empty));
            if (dv.Table.Rows.Count == 0)
            {
                SqlDataSource_size_type.Insert();
                ListBox1.DataBind();
            }
            else
            {
                Label1.Text = "Size Type Allready in Your Selected Kind !";
            }
        }
        catch (Exception ex)
        {
            Label1.Text = ex.Message.ToString();
        }

    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        Label1.Text = "";
        SqlDataSource_size_type.Delete();
        Label1.Text = "Successfull.....";
        ListBox1.DataBind();
    }
}