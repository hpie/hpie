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
using System.Data;
public partial class receipt_book : System.Web.UI.Page
{
    Int32 i;
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            bb();
        }
    }
    private void bb()
    {
        try
        {
         DataView dv = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));
         if (dv.Table.Rows.Count != 0)
         {
             Int32 ii;
             for (ii = 0; ii < dv.Table.Rows.Count; ii++)
             {
                 i = Convert.ToInt32(dv.Table.Rows[ii][1]);
             }
             i++;
             no.Text = i.ToString();
         }
         else
         {
             no.Text = "101".ToString();
         }
        }
        catch(Exception t)
        {

            no.Text = "101".ToString();
        }
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        try
        {
            Label1.Text = "";
            DataView dv = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));
            if (dv.Table.Rows.Count == 0)
            {

                SqlDataSource1.Insert();
                Label1.Text = "Successfully Submited...";
            }
            else
            {
                Label1.Text = "Receipt No Allready in your Database...";
            }
        }
        catch (Exception r)
        {
            Label1.Text = r.Message.ToString();
        }
    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        Response.Redirect("receipt_book_report.aspx");
    }
}