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

public partial class fc06 : System.Web.UI.Page
{
   
    public Int32 sr = 0;
    public Int32 sr1 = 0;
    protected void Page_Load(object sender, EventArgs e)
    {
        //pn();
       // bind();
    }
 
   
    private void bind()
    {
        SqlDataSource1.SelectParameters["preno"].DefaultValue = DropDownList1.SelectedValue .ToString();
        DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
        if (dv.Table.Rows.Count >= 1)
        {
            Label9 .Text = Convert.ToDateTime(dv.Table.Rows[0]["date"]).ToString("dd/MM/yyyy");
            Label8.Text = dv.Table.Rows[0]["des"].ToString();
            Label7.Text = dv.Table.Rows[0]["preno"].ToString();
            Label10.Text = dv.Table.Rows[0]["reqslipno"].ToString();
            Label11.Text = dv.Table.Rows[0]["section"].ToString();
        }
        GridView1.DataSource = dv;
        GridView1.DataBind();
    }

    protected void Button1_Click(object sender, EventArgs e)
    {
        bind();
    }
}
