using System;
using System.Collections;
using System.Configuration;
using System.Data;
using System.Linq;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;
using System.Web.UI.HtmlControls;
using System.Xml.Linq;
using System.Drawing;
using iTextSharp.text;
using iTextSharp.text.pdf;
using iTextSharp.text.html.simpleparser;
using System.Text;
using System.IO;

public partial class MasterPage : System.Web.UI.MasterPage
{
    protected void Page_Load(object sender, EventArgs e)
    {
        Response.Buffer = true;
        Response.ExpiresAbsolute = DateTime.Now.AddDays(-1d);
        Response.Expires = -1500;
        Response.CacheControl = "no-cache";
        HyperLink2.Attributes.Add("onclick", "return confirm('You want to LogOut');");
        Label4.Text = Context.User.Identity.Name;
        
    }
    public static void PrintWebControl(Control ctrl, string Script)
    {
        StringWriter stringWrite = new StringWriter();
        System.Web.UI.HtmlTextWriter htmlWrite = new System.Web.UI.HtmlTextWriter(stringWrite);
        if (ctrl is WebControl)
        {
            Unit w = new Unit(100, UnitType.Percentage); ((WebControl)ctrl).Width = w;
        }
        Page pg = new Page();
        pg.EnableEventValidation = false;
        if (Script != string.Empty)
        {
            pg.ClientScript.RegisterStartupScript(pg.GetType(), "PrintJavaScript", Script);
            pg.ClientScript.RegisterStartupScript(pg.GetType(), "ScriptManager", Script);
        }
        HtmlForm frm = new HtmlForm();
        pg.Controls.Add(frm);
        frm.Attributes.Add("runat", "server");
        frm.Controls.Add(ctrl);
        pg.DesignerInitialize();

        pg.RenderControl(htmlWrite);
        string strHTML = stringWrite.ToString();
        HttpContext.Current.Response.Clear();


        HttpContext.Current.Response.Write(strHTML);
        HttpContext.Current.Response.Write("<script>window.print();</script>");

        HttpContext.Current.Response.End();
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        PrintWebControl(divPrint, string.Empty);
    }
}
