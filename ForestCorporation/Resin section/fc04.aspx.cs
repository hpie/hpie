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

public partial class fc04 : System.Web.UI.Page
{
    public Int32 r;
    protected void Page_Load(object sender, EventArgs e)
    {
        if (!Page.IsPostBack)
        {
            pn();
        }
    }
    private void pn()
    {
        DropDownList1.DataBind();

        DataView dv = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));
        DataView dv1 = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
        Label11.Text = DropDownList1.SelectedValue.ToString();
        Int32 rr = 1001;
        if (dv.Table.Rows.Count != 0)
        {
             rr = Convert.ToInt32(dv.Table.Rows[dv.Table.Rows.Count - 1][0]);
            rr++;
        }
        Label10.Text = rr.ToString();
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        r = r + 1;
        if (e.Row.RowType == DataControlRowType.DataRow && e.Row.RowState == DataControlRowState.Normal || e.Row.RowState == DataControlRowState.Alternate)
        {
            decimal sakki   =Convert.ToDecimal( ((Label)(e.Row.FindControl("Label8"))).Text);
            decimal sakki1 =Convert.ToDecimal( ((Label)(e.Row.FindControl("Label9"))).Text);
            ((Label)(e.Row.FindControl("Label12"))).Text = (sakki - sakki1).ToString();
            if (((Label)(e.Row.FindControl("Label13"))).Text == "")
            {
                ((Label)(e.Row.FindControl("Label13"))).Text = 0.ToString();
            }

            ((Label)(e.Row.FindControl("Label14"))).Text = Math.Round(((sakki - sakki1) * Convert.ToDecimal(((Label)(e.Row.FindControl("Label13"))).Text)), 2).ToString();

        }
    }
    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {
        //GridView1.DataBind();
    }
    private void bind()
    {
        DateTime sdate = Convert.ToDateTime(DateTime.Parse(TextBox2.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
        DateTime edate = Convert.ToDateTime(DateTime.Parse(TextBox3.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
        SqlDataSource1.SelectParameters["sdate"].DefaultValue = sdate.ToString();
        SqlDataSource1.SelectParameters["edate"].DefaultValue = edate.ToString();
        DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
        Label11.Text = DropDownList1.SelectedItem.Text;
        GridView1.DataSource = dv;
        GridView1.DataBind();
    }
   
    protected void Button1_Click(object sender, EventArgs e)
    {
        DateTime no = Convert.ToDateTime(DateTime.Parse(TextBox1.Text .ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
        DateTime sdate = Convert.ToDateTime(DateTime.Parse(TextBox2.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
        DateTime edate = Convert.ToDateTime(DateTime.Parse(TextBox3.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
        SqlDataSource2.InsertParameters["date"].DefaultValue = no.ToString();
        SqlDataSource2.InsertParameters["sdate"].DefaultValue = sdate.ToString();
        SqlDataSource2.InsertParameters["edate"].DefaultValue = edate.ToString();
        SqlDataSource2.Insert();
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        bind();

    }
    protected void GridView1_RowEditing(object sender, GridViewEditEventArgs e)
    {
        GridView1.EditIndex = e.NewEditIndex;
        bind();
    }
    protected void GridView1_RowUpdating(object sender, GridViewUpdateEventArgs e)
    {
        decimal rate = Convert.ToDecimal(((TextBox)(GridView1.Rows[e.RowIndex ].FindControl("textbox4"))).Text);
        SqlDataSource1.UpdateParameters["rate_fc04"].DefaultValue = rate.ToString();
        SqlDataSource1.UpdateParameters["preno"].DefaultValue = GridView1.DataKeys[e.RowIndex].Value.ToString();
        SqlDataSource1.Update();
        GridView1.EditIndex = -1;
        bind();
    }
}
