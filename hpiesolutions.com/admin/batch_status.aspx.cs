using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class admin_batch_status : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        GridView1.DataBind();
    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        export_to_excel exl = new export_to_excel();
        exl.exporttoexcel("BatchReport.xls", GridView1);
    }
    public override void VerifyRenderingInServerForm(Control control)
    {

    }
}