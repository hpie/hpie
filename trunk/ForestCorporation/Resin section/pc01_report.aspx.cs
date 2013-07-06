using System;
using System.Collections;
using System.Configuration;
using System.Data;
using System.Linq;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.HtmlControls;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;
using System.Xml.Linq;
using System.Web.UI.HtmlControls;

public partial class pc01_report : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
   
    
  
    public override void VerifyRenderingInServerForm(Control control)
    {

        // Confirms that an HtmlForm control is rendered for the
        //specified ASP.NET server control at run time.

    }
    public string tt(DateTime dt)
    {
        return dt.ToString("HH:mm tt");
    }
   
    protected void BtnExportGrid_Click(object sender, EventArgs e)
    {
          Response.Clear();

        Response.AddHeader("content-disposition", "attachment;filename=FileName.xls");

        Response.Charset = "";

        // If you want the option to open the Excel file without saving than

        // comment out the line below

        // Response.Cache.SetCacheability(HttpCacheability.NoCache);

        Response.ContentType = "application/vnd.xls";

        System.IO.StringWriter stringWrite = new System.IO.StringWriter();

        System.Web.UI.HtmlTextWriter htmlWrite =
        new HtmlTextWriter(stringWrite);

        DataList1.RenderControl(htmlWrite);

        Response.Write(stringWrite.ToString());

        Response.End();
    }
}
