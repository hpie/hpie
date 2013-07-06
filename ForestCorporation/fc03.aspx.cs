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

public partial class fc03 : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        pn();

    }
    private void pn()
    {


        DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
        Int32 rr = Convert.ToInt32(dv.Table.Rows[dv.Table.Rows.Count - 1][0]);
        rr++;
        Label1.Text = rr.ToString();
    }
}
