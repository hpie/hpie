using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class user_support_visit_view : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        LinkButton2.Attributes.Add("Onclick", "getPrint('printarea');");
    }
    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {
        DataList1.DataBind();
    }
    protected void DropDownList3_SelectedIndexChanged(object sender, EventArgs e)
    {
        DropDownList1.DataBind();
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        DataList1.DataBind();
    }
    //Generating Pop-up Print Preview page

    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        LinkButton2.Attributes.Add("Onclick", "getPrint('printarea');");
    }
    protected void LinkButton2_Click1(object sender, EventArgs e)
    {
        LinkButton2.Attributes.Add("Onclick", "getPrint('printarea');");
    }
    protected void DropDownList4_SelectedIndexChanged(object sender, EventArgs e)
    {
        DropDownList1.DataBind();
    }
    protected void LinkButton1_Click1(object sender, EventArgs e)
    {
        DataList1.DataBind();
    }
    protected void LinkButton3_Click(object sender, EventArgs e)
    {
        try
        {
            Response.Clear();
            Response.Buffer = true;
            Response.AddHeader("content-disposition", string.Format("attachment; filename={0}", "CenterWiseDetail.xls"));
            Response.ContentType = "application/ms-excel";
            Response.Charset = "";
            this.EnableViewState = false;
            System.IO.StringWriter writer = new System.IO.StringWriter();
            System.Web.UI.HtmlTextWriter html = new System.Web.UI.HtmlTextWriter(writer);
            DataList1.DataBind();
            DataList1.RenderControl(html);
            Response.Write(writer.ToString());
            Response.Flush();
            Response.End();
        }
        catch (Exception ex)
        {
        }
    }
    protected void LinkButton4_Click(object sender, EventArgs e)
    {
        SqlDataSource1.Delete();
        DropDownList1.DataBind();
        DropDownList4.DataBind();
    }
}