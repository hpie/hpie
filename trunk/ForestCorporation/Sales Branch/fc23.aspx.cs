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

public partial class fc23 : System.Web.UI.Page
{
    public Int32 sr = 0;
    public Int32 sr1 = 0;
    public decimal kg = 0, kg1 = 0;
    DateTime dt=Convert.ToDateTime("01/01/1900");
    DateTime dt1=Convert.ToDateTime("01/01/1900");
    protected void Page_Load(object sender, EventArgs e)
    {
        if (!Page.IsPostBack)
        {
           // bind();
         pn();
        }
    }
    private void bind()
    {
        DataView dv;
        if (DropDownList5 .Text != "")
        {
            SqlDataSource1.SelectParameters["prno"].DefaultValue = DropDownList5.Text;
            dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
            if (dv.Table.Rows.Count >= 2)
            {
                Label1.Text = dv.Table.Rows[1]["prno"].ToString();
                TextBox1.Text = dv.Table.Rows[1]["truckno"].ToString();
                TextBox2.Text = dv.Table.Rows[1]["s_no"].ToString();
               TextBox6.Text = Convert.ToDateTime(dv.Table.Rows[1]["dt"]).ToString("dd/MM/yyyy");
               TextBox7.Text = Convert.ToDateTime(dv.Table.Rows[1]["dt1"]).ToString("dd/MM/yyyy");
                TextBox3.Text = dv.Table.Rows[1]["nameofd"].ToString();
                  TextBox4.Text = dv.Table.Rows[1]["challanno"].ToString();
                  TextBox5.Text = dv.Table.Rows[1]["cashmemo"].ToString();
                  TextBox8.Text = dv.Table.Rows[1]["nameofpur"].ToString();
            }
            else
            {
                ////Label1.Text = "".ToString();
                TextBox1.Text = "".ToString();
                //TextBox2.Text = "".ToString();
                //TextBox4.Text = "".ToString();
                TextBox3.Text = "".ToString();
                //pn();
            }
        }

        else
        {
            SqlDataSource1.SelectParameters["prno"].DefaultValue = "1";
            dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
        }
        //if (dv.Table.Rows.Count >= 1)
        //{

        //}
        GridView1.DataSource = dv;
        GridView1.DataBind();
    }
    private void pn()
    {


        DataView dv = (DataView)(SqlDataSource5.Select(DataSourceSelectArguments.Empty));


        Int32 rr = 2301;
        if (dv.Table.Rows.Count >= 2)
        {
            rr = Convert.ToInt32(dv.Table.Rows[dv.Table.Rows.Count - 1][0]);
            rr++;
        }
        Label1.Text = rr.ToString();
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        sr = sr + 1;
        String ss = "";
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
           kg =kg+ Convert.ToDecimal(((Label)(e.Row.FindControl("Label5"))).Text);
        ss = ((Label)(e.Row.FindControl("Label6"))).Text.ToString();
        if (ss != "")
        {
            kg1 = kg1 + Convert.ToDecimal(((Label)(e.Row.FindControl("Label6"))).Text);
        }
        }
        if (e.Row.RowType == DataControlRowType.Footer)
        {
           // ((Label)(GridView1.FooterRow.FindControl("Label8"))).Text = kg.ToString();
        }
       
    }
    protected void GridView1_RowCommand(object sender, GridViewCommandEventArgs e)
    {
       
    }
    protected void GridView1_RowEditing(object sender, GridViewEditEventArgs e)
    {
        
    }
    protected void GridView1_RowUpdating(object sender, GridViewUpdateEventArgs e)
    {
       
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        Response.Redirect("fc23_report.aspx?ch=" + DropDownList5.SelectedValue);

        ////bind();
        ////SqlDataSource1.SelectCommand = "SELECT *FROM fc22 WHERE (Des = 'ss') OR prno='"+;
        //SqlDataSource1.SelectCommand = "SELECT pro_size as a,wtkg as b,qty as c,dt FROM fc13 where fac_ord_no='"+DropDownList3.SelectedValue+"'" ;
        //DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
        //GridView1.DataSource = dv;
        //GridView1.DataBind();
        //TextBox4.Text = DropDownList3.SelectedItem.Text.ToString();
        //TextBox6.Text =Convert.ToDateTime( dv.Table.Rows[0]["dt"]).ToString("dd/MM/yyyy");
        //TextBox5.Text = "";
        //TextBox7.Text = "";

    }
    protected void GridView1_RowDeleting(object sender, GridViewDeleteEventArgs e)
    {
        
    }
    protected void Button4_Click(object sender, EventArgs e)
    {
        SqlDataSource1.SelectCommand = "SELECT Des as a,Qty as b,qq as c FROM c21 where Srno=" + DropDownList4.SelectedItem.Text ;
        DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
        GridView1.DataSource = dv;
        GridView1.DataBind();
        TextBox5.Text = DropDownList4.SelectedItem.Text.ToString();
        TextBox7.Text = Convert.ToDateTime(DropDownList4.SelectedValue).ToString("dd/MM/yyyy");
        TextBox4.Text = "";
        TextBox6.Text = "";
    }
    protected void Button5_Click(object sender, EventArgs e)
    {
        
        if(TextBox6.Text!="")
        {
         dt = DateTime.Parse(TextBox6.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA"));
        }
        if (TextBox7.Text != "")
        {
            dt1 = DateTime.Parse(TextBox7.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA"));
        }
        SqlDataSource1.InsertParameters["dt"].DefaultValue = dt.ToString();
        SqlDataSource1.InsertParameters["dt1"].DefaultValue = dt1.ToString();
        SqlDataSource1.Insert();
        Response.Redirect("fc23_report.aspx?ch="+Label1.Text );
    }
}
