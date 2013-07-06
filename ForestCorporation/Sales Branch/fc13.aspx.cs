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

public partial class fc13 : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        
        if (!Page.IsPostBack)
        {
            pn();
            bind();
        }
    }
    private void bind1()
    {
        SqlDataSource1.SelectCommand = "SELECT * FROM [fc13] where fac_ord_no=" + DropDownList4.SelectedValue;
        DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
        GridView1.DataSource = dv;
        GridView1.DataBind();
    }
    private void bind()
    {
        SqlDataSource1.SelectCommand = "SELECT * FROM [fc13] where pro_size='ss'";
        DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
        GridView1.DataSource = dv;
        GridView1.DataBind();
    }

    private void pn()
    {
    

        DataView dv = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));
       

        Int32 rr = 3001;
        if (dv.Table.Rows.Count >= 1)
        {
            rr = Convert.ToInt32(dv.Table.Rows[dv.Table.Rows.Count - 1]["fac_ord_no"]);
            rr++;
        }
     TextBox1.Text = rr.ToString();
    }
  
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            string des = ((Label)(e.Row.FindControl("label4"))).Text;
            if (des == "ss")
            {
                e.Row.Visible = false;
            }
            else
            {
                e.Row.Visible = true;
            }
        }
    }
    protected void GridView1_RowCommand(object sender, GridViewCommandEventArgs e)
    {
        if (e.CommandName == "Add")
        {
            string des = ((DropDownList)(GridView1.FooterRow.FindControl("DropDownList3"))).SelectedItem.Text ;
            string des1 = ((DropDownList)(GridView1.FooterRow.FindControl("DropDownList5"))).SelectedItem.Text;
        
            Int32    qty = Convert.ToInt32(((TextBox)(GridView1.FooterRow.FindControl("TextBox18"))).Text);
         Int32 qtl = Convert.ToInt32(((TextBox)(GridView1.FooterRow.FindControl("TextBox22"))).Text);
         Int32 kg = Convert.ToInt32(((TextBox)(GridView1.FooterRow.FindControl("TextBox23"))).Text);
         decimal  rate = Convert.ToDecimal(((TextBox)(GridView1.FooterRow.FindControl("TextBox21"))).Text);
         string rem = ((TextBox)(GridView1.FooterRow.FindControl("TextBox12"))).Text;
         SqlDataSource1.InsertParameters["pro_size"].DefaultValue = des.ToString();
         SqlDataSource1.InsertParameters["qty"].DefaultValue = qty.ToString();
         SqlDataSource1.InsertParameters["rate"].DefaultValue = rate.ToString();
         SqlDataSource1.InsertParameters["remark"].DefaultValue = rem.ToString();
         SqlDataSource1.InsertParameters["wtqtl"].DefaultValue = qtl.ToString();
         SqlDataSource1.InsertParameters["wtkg"].DefaultValue = kg.ToString();
         SqlDataSource1.InsertParameters["dt"].DefaultValue = DateTime.Parse(TextBox4.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
         SqlDataSource1.InsertParameters["type"].DefaultValue = des1.ToString();

         SqlDataSource1.Insert();

         SqlDataSource1.SelectCommand = "SELECT * FROM [fc13] where fac_ord_no=" + TextBox1.Text;
         GridView1.DataBind();
         DropDownList4.DataBind();
        }
    }
    protected void GridView1_RowDeleting(object sender, GridViewDeleteEventArgs e)
    {
        SqlDataSource1.DeleteParameters["code"].DefaultValue = GridView1.DataKeys[e.RowIndex].Value.ToString();
        SqlDataSource1.Delete();
        GridView1.DataBind();
    }
    protected void Button3_Click(object sender, EventArgs e)
    {

        SqlDataSource1.SelectCommand = "SELECT * FROM [fc13] where fac_ord_no=" + DropDownList4.SelectedValue;
        DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
        TextBox1.Text = dv.Table.Rows[0]["fac_ord_no"].ToString();
        TextBox2.Text = dv.Table.Rows[0]["pri_no"].ToString();
        TextBox3.Text = dv.Table.Rows[0]["your_o_no"].ToString();
        TextBox4.Text = Convert.ToDateTime(dv.Table.Rows[0]["dt"]).ToString("dd/MM/yyyy");
        TextBox5.Text = dv.Table.Rows[0]["ms"].ToString();
        TextBox19.Text = dv.Table.Rows[0]["desti"].ToString();
        TextBox20.Text = dv.Table.Rows[0]["consi"].ToString();
        GridView1.DataSource = dv;
        GridView1.DataBind();
    }
    protected void Button5_Click(object sender, EventArgs e)
    {
        Response.Redirect("fc13_report.aspx?ord="+DropDownList4.SelectedValue);
    }
    protected void Button6_Click(object sender, EventArgs e)
    {
        SqlDataSource3.InsertParameters["dt"].DefaultValue = DateTime.Parse(TextBox4.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
        SqlDataSource3.Insert();

    }
    protected void GridView1_RowUpdating(object sender, GridViewUpdateEventArgs e)
    {
        decimal rate = Convert.ToDecimal(((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox15"))).Text);
         SqlDataSource1.UpdateParameters["code"].DefaultValue=GridView1.DataKeys[e.RowIndex].Value.ToString();
        SqlDataSource1.UpdateParameters["rate"].DefaultValue=rate.ToString();
        SqlDataSource1.Update();
        GridView1.EditIndex =-1;
        bind1();

    }
    protected void GridView1_RowEditing(object sender, GridViewEditEventArgs e)
    {
        GridView1.EditIndex = e.NewEditIndex;
        bind1();
    }
}
