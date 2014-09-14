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

public partial class _Default : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
        Int32 k;
        for (k = 0; k < dv.Table.Rows.Count; k++)
        {
            Int32 ac = Convert.ToInt32(dv.Table.Rows[k]["ac"]);
            decimal ob = Convert.ToDecimal(dv.Table.Rows[k]["ob"]);
            decimal ob1 = Convert.ToDecimal(dv.Table.Rows[k]["ob1"]);
            SqlDataSource2.UpdateParameters["ac"].DefaultValue = ac.ToString();
            SqlDataSource2.UpdateParameters["OB"].DefaultValue =ob.ToString();
            SqlDataSource2.UpdateParameters["Ins_ob"].DefaultValue = ob1.ToString();
            SqlDataSource2.Update();
        }
    }
}
