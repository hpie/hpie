using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class MasterPage : System.Web.UI.MasterPage
{
    public string ss = HttpContext.Current.User.Identity.Name.ToString();
    protected void Page_Load(object sender, EventArgs e)
    {
       
    }

    protected string RenderMenu()
    {
        var result = new StringBuilder();
        RenderMenuItem("Joining", "joining.aspx", result);
        RenderMenuItem("Joining Detail", "joining_view.aspx", result);
        RenderMenuItem("Other Action", "info.aspx", result);
        RenderMenuItem("Other Action Detail", "info_view.aspx", result);
        RenderMenuItem("Nominee", "nominee.aspx", result);
        RenderMenuItem("Nominee Detail", "nominee_view.aspx", result);
        RenderMenuItem("Bank", "Bank_detail.aspx", result);
        RenderMenuItem("Bank Detail", "Bank_view.aspx", result);
        RenderMenuItem("Recurring Payment", "recurring_payment.aspx", result);
        RenderMenuItem("Recurring Detail", "recurring_view.aspx", result);
        RenderMenuItem("Basic Pay", "basic.aspx", result);
        RenderMenuItem("Basic Pay Detail", "basic_view.aspx", result);
     
        RenderMenuItem("Pensioner", "pension_detail.aspx", result);
        RenderMenuItem("Pensioner Detail View", "pension_detail_view.aspx", result);
        //RenderMenuItem("PA", "PA.aspx", result);
        //RenderMenuItem("PSA", "PSA.aspx", result);
        //RenderMenuItem("Group", "group.aspx", result);
        //RenderMenuItem("Sub-Group", "subgroup.aspx", result);
        //RenderMenuItem("Action", "action.aspx", result);
        //RenderMenuItem("Reason", "actreason.aspx", result);
        //RenderMenuItem("Title", "title.aspx", result);
        //RenderMenuItem("Martial", "martial.aspx", result);
        //RenderMenuItem("Religon", "denomination.aspx", result);
        //RenderMenuItem("Gender", "status.aspx", result);
        return result.ToString();
    }

    void RenderMenuItem(string title, string address, StringBuilder output)
    {
        output.AppendFormat("<li><a href=\"{0}\" ", address);

        var requestUrl = HttpContext.Current.Request.Url;        
        if (requestUrl.Segments[requestUrl.Segments.Length - 1].Equals(address, StringComparison.OrdinalIgnoreCase)) // If the requested address is this menu item.
            output.Append("class=\"ActiveMenuButton\"");
        else
            output.Append("class=\"MenuButton\"");

        output.AppendFormat("><span>{0}</span></a></li> ", title);
    }
}