using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;

public partial class drop_items : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void spec_d_SelectedIndexChanged(object sender, EventArgs e)
    {
        spec_t.Text = spec_d.SelectedItem.Text;
        spec_t.Focus();
      
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        SqlDataSource1.Insert();
        spec_t.Focus();
        spec_t.Text = "";
    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        SqlDataSource1.Update();
        spec_t.Focus();
        spec_t.Text = "";
    }
    protected void LinkButton3_Click(object sender, EventArgs e)
    {
        SqlDataSource1.Delete();
        spec_t.Focus();
        spec_t.Text = "";
    }
    protected void LinkButton4_Click(object sender, EventArgs e)
    {
        SqlDataSource2.Insert();
        size_type_t.Focus();
        size_type_t.Text = "";
        vol.Text = "";
    }
    protected void LinkButton5_Click(object sender, EventArgs e)
    {
        SqlDataSource2.Update();
        size_type_t.Focus();
        size_type_t.Text = "";
        vol.Text = "";
    }
    protected void LinkButton6_Click(object sender, EventArgs e)
    {
        SqlDataSource2.Delete();
        size_type_t.Focus();
        size_type_t.Text = "";
        vol.Text = "";
    }
    protected void size_type_d_SelectedIndexChanged(object sender, EventArgs e)
    {

        DataView dv=(DataView)(SqlDataSource4.Select(DataSourceSelectArguments.Empty));
        if(dv.Table.Rows.Count!=0)
        {
        
        size_type_t.Text = dv.Table.Rows[0][1].ToString();
        vol.Text = dv.Table.Rows[0][2].ToString();
        size_type_t.Focus();
        }
    }
    protected void LinkButton7_Click(object sender, EventArgs e)
    {
        SqlDataSource3.Insert();
        grade_t.Focus();
        grade_t.Text = "";
    }
    protected void LinkButton8_Click(object sender, EventArgs e)
    {
        SqlDataSource3.Update();
        grade_t.Focus();
        grade_t.Text = "";
    }
    protected void LinkButton9_Click(object sender, EventArgs e)
    {
        SqlDataSource3.Delete();
        grade_t.Focus();
        grade_t.Text = "";
    }
    protected void grade_d_SelectedIndexChanged(object sender, EventArgs e)
    {
        grade_t.Text = grade_d.SelectedItem.Text;
        grade_t.Focus();
    }
}