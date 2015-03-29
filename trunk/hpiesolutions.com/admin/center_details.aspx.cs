using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class admin_center_details : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void GridView1_SelectedIndexChanging(object sender, GridViewSelectEventArgs e)
    {
        //string cd = GridView1.DataKeys[e.NewSelectedIndex].Value.ToString();
        //LinkButton ss;
        //ss = ((LinkButton)(GridView1.Rows[e.NewSelectedIndex].FindControl("LinkButton1")));
        //ss.Attributes.Add("class", "iframe");
        //ss.Attributes.Add("href", "profile2.aspx?cd="+cd);
        //ss.DataBind();
       
    }

    protected void GridView1_SelectedIndexChanged(object sender, EventArgs e)
    {
       
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {         
            
            string cd = GridView1.DataKeys[e.Row.RowIndex].Value.ToString();
            LinkButton ss;
            ss = ((LinkButton)(e.Row.FindControl("LinkButton1")));
            ss.Attributes.Add("class", "iframe");
            ss.Attributes.Add("href", "profile2.aspx?cd=" + cd);
            ss.DataBind();
        }
    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        GridView2.Visible = true;
        export_to_excel exl = new export_to_excel();
        exl.exporttoexcel("Center_details.xls", GridView2);
        GridView2.Visible = false;
    }
    public override void VerifyRenderingInServerForm(Control control)
    {

    }
    protected void LinkButton3_Click(object sender, EventArgs e)
    {
        GridView1.DataSource = SqlDataSource1;
        GridView1.DataBind();
        GridView2.DataSource = SqlDataSource1;
        GridView2.DataBind();

        Int32 i;
        for (i = 0; i < GridView1.Rows.Count; i++)
        {
            if (i != 0)
            {
                string code_c = GridView1.Rows[i - 1].Cells[0].Text;
                string code_c2 = GridView1.Rows[i].Cells[0].Text;
                if (code_c == code_c2)
                {
                    GridView1.Rows[i].Visible = false;
                }
            }
        }

        Int32 i2;
        for (i2 = 0; i2 < GridView2.Rows.Count; i2++)
        {
            if (i2 != 0)
            {
                string code_c = GridView2.Rows[i2 - 1].Cells[0].Text;
                string code_c2 = GridView2.Rows[i2].Cells[0].Text;
                if (code_c == code_c2)
                {
                    GridView2.Rows[i2].Visible = false;
                }
            }
        }


    }
}