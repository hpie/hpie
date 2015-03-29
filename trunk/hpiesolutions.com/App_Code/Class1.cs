using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Text;
using System.IO;

/// <summary>
/// Summary description for Class1
/// </summary>
public class export_to_excel
{
    public void exporttoexcel(string filename, GridView gv)
    {

        System.Web.HttpContext.Current.Response.ClearContent();
        System.Web.HttpContext.Current.Response.AddHeader("content-disposition", "attachment;filename=" + filename);
        System.Web.HttpContext.Current.Response.ContentType = "applicatio/excel";
        StringWriter sw = new StringWriter(); ;
        HtmlTextWriter htm = new HtmlTextWriter(sw);
        gv.RenderControl(htm);
        System.Web.HttpContext.Current.Response.Write(sw.ToString());
        System.Web.HttpContext.Current.Response.End();
    }
   
}