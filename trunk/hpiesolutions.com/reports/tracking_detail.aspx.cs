using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
public partial class user_tracking_detail : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void s_code_SelectedIndexChanged(object sender, EventArgs e)
    {
        //DataView dv = (DataView)(SqlDataSource7.Select(DataSourceSelectArguments.Empty));
        //if (dv != null)
        //{
        //    if (dv.Table.Rows.Count != 0)
        //    {
        //        name.Text = dv.Table.Rows[0]["s_name"].ToString();
        //    }
        //}
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        GridView1.DataBind();
    }
    protected void LinkButton3_Click(object sender, EventArgs e)
    {
        export_to_excel exl = new export_to_excel();
        exl.exporttoexcel("StudentReport.xls", GridView1);
    }
    public override void VerifyRenderingInServerForm(Control control)
    {

    }
}