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

public partial class fc221 : System.Web.UI.Page
{
    public Int32 sr = 0;
    public Int32 sr1 = 0;
    protected void Page_Load(object sender, EventArgs e)
    {
        if (!Page.IsPostBack)
        {
            bind();
         //   pn();
        }
    }
    private void bind()
    {
        DataView dv;
        //if (DropDownList5 .Text != "")
        //{
            //SqlDataSource1.SelectParameters["prno"].DefaultValue = Request.QueryString["cn"].ToString();
            //SqlDataSource1.SelectParameters["prno"].DefaultValue =  "2201".ToString();
           
            
            dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
            if (dv.Table.Rows.Count >= 2)
            {
                Label1.Text = dv.Table.Rows[1]["prno"].ToString();
                TextBox1.Text = Convert.ToDateTime(dv.Table.Rows[1]["dt"]).ToString("dd/MM/yyyy");
                TextBox2.Text = dv.Table.Rows[1]["no"].ToString();
                //TextBox4.Text = Convert.ToDateTime(dv.Table.Rows[1]["dt1"]).ToString("dd/MM/yyyy");
                TextBox3.Text = dv.Table.Rows[1]["ms"].ToString();
            }
            else
            {
                ////Label1.Text = "".ToString();
                // TextBox1.Text = "".ToString();
                //  //TextBox2.Text = "".ToString();
                //  //TextBox4.Text = "".ToString();
                //TextBox3.Text = "".ToString();
                //  //pn();
            }
        //}

        //else
        //{
        //    SqlDataSource1.SelectParameters["prno"].DefaultValue = "1";
        //    dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
        //}
        //if (dv.Table.Rows.Count >= 1)
        //{

        //}
        GridView2.DataSource = dv;
        GridView2.DataBind();
    }
    private void pn()
    {


        DataView dv = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));


        Int32 rr = 2201;
        if (dv.Table.Rows.Count >= 2)
        {
            rr = Convert.ToInt32(dv.Table.Rows[dv.Table.Rows.Count - 1][0]);
            rr++;
        }
        Label1.Text = rr.ToString();
    }
    protected void GridView2_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        sr = sr + 1;
        sr1 = sr - 1;
        if (e.Row.RowType == DataControlRowType.DataRow && e.Row.RowState == DataControlRowState.Normal || e.Row.RowState == DataControlRowState.Alternate)
        {

            string des = ((Label)(e.Row.FindControl("Label3"))).Text;
            if (des == "ss")
            {
                e.Row.Visible = false;
            }
            else
            {

                e.Row.Visible = true;
                Label7.Text = (Convert.ToDecimal(Label7.Text) + Convert.ToDecimal(((Label)(e.Row.FindControl("Label6"))).Text)).ToString();
            }

        }
    }
    protected void GridView2_RowCommand(object sender, GridViewCommandEventArgs e)
    {
        if (e.CommandName == "Add")
        {

            Int32 prno;
            string no, ms, des;
            decimal qty, rate, amount;
            DateTime dt;
            des = ((DropDownList)(GridView2.FooterRow.FindControl("DropDownList4"))).Text;

            qty = Convert.ToDecimal(((TextBox)(GridView2.FooterRow.FindControl("TextBox5"))).Text);
            rate = Convert.ToDecimal(((TextBox)(GridView2.FooterRow.FindControl("TextBox6"))).Text);
            amount = Convert.ToDecimal(qty * rate);

            dt = DateTime.Parse(TextBox1.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA"));
            no = TextBox2.Text;
            ms = TextBox3.Text;
            SqlDataSource1.InsertParameters["prno"].DefaultValue = Label1.Text.ToString();
            SqlDataSource1.InsertParameters["no"].DefaultValue = no.ToString();
            SqlDataSource1.InsertParameters["dt"].DefaultValue = dt.ToString();
            SqlDataSource1.InsertParameters["ms"].DefaultValue = ms.ToString();
            SqlDataSource1.InsertParameters["des"].DefaultValue = des.ToString();
            SqlDataSource1.InsertParameters["qty"].DefaultValue = qty.ToString();
            SqlDataSource1.InsertParameters["rate"].DefaultValue = rate.ToString();
            SqlDataSource1.InsertParameters["amt"].DefaultValue = amount.ToString();
            SqlDataSource1.Insert();
            bind();
        }
    }
    protected void Button3_Click(object sender, EventArgs e)
    {
        bind();
    }
}
