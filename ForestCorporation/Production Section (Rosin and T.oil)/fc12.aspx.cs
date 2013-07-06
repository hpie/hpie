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

public partial class fc12 : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        pn();
        if (!Page.IsPostBack)
        {
            DataTable dt = new DataTable("tbemp");
            dt.Columns.Add(new DataColumn("des",Type.GetType("System.String")));
            dt.Columns.Add(new DataColumn("no", Type.GetType("System.Int32")));

            dt.Columns.Add(new DataColumn("wtqtl", Type.GetType("System.Decimal")));
            dt.Columns.Add(new DataColumn("wtkg", Type.GetType("System.Decimal")));
           
            dt.Columns.Add(new DataColumn("wtqtl1", Type.GetType("System.Decimal")));
            
            dt.Columns.Add(new DataColumn("wt1", Type.GetType("System.Decimal")));
            dt.Columns.Add(new DataColumn("batch", Type.GetType("System.String")));
            dt.Columns.Add(new DataColumn("remark", Type.GetType("System.String")));
            DataRow r;
            r = dt.NewRow();
            r[0] = "";
            r[1] = 0;
            r[2] = 0;
            r[3] = 0;
            r[4] = 0;
            r[5] = 0;
            
            r[6] = "";
            r[7] = "";
            dt.Rows.Add(r);
            ViewState["ab"] = dt;
            GridView2.DataSource = dt;
            GridView2.DataBind();



        }
    }
    private void pn()
    {


        DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
        if (dv.Table.Rows.Count != 0)
        {
            Int32 rr = Convert.ToInt32(dv.Table.Rows[dv.Table.Rows.Count - 1]["no_pre"]);
            rr++;
            Label1.Text = rr.ToString();
        }
        else
        {
            Label1.Text = "1001".ToString();
        }
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        Button1.Enabled = false;
        if (GridView2.Rows.Count >= 1)
        {
            Int32 j = 0, no_pack;
            string des, batch_no, remark;
            decimal pack_size, wt, pack_size1,wt1;
            for (j = 0; j < GridView2.Rows.Count; j++)
            {
                if ( ((Label)(GridView2.Rows[j].FindControl("des"))).Text    != "")
                {
                    des = ((Label)(GridView2.Rows[j].FindControl("des"))).Text.ToString();
                    batch_no = ((Label)(GridView2.Rows[j].FindControl("batch1"))).Text.ToString();
                    remark = ((Label)(GridView2.Rows[j].FindControl("remark1"))).Text.ToString();
                    no_pack = Convert.ToInt32(((Label)(GridView2.Rows[j].FindControl("no1"))).Text);
                    pack_size = Convert.ToDecimal(((Label)(GridView2.Rows[j].FindControl("wtqtl1"))).Text);
                    wt1 = Convert.ToDecimal(((Label)(GridView2.Rows[j].FindControl("wtkg11"))).Text);

                    pack_size1 = Convert.ToDecimal(((Label)(GridView2.Rows[j].FindControl("Label5"))).Text);
                   
                    wt = Convert.ToDecimal(((Label)(GridView2.Rows[j].FindControl("wtkg1"))).Text);
                    SqlDataSource1.InsertParameters["des"].DefaultValue = des.ToString();
                    SqlDataSource1.InsertParameters["no_pack"].DefaultValue = no_pack.ToString();

                    SqlDataSource1.InsertParameters["pack_size"].DefaultValue = pack_size.ToString();
                    SqlDataSource1.InsertParameters["wt"].DefaultValue =wt.ToString();
                    SqlDataSource1.InsertParameters["remark"].DefaultValue = remark.ToString();
                    SqlDataSource1.InsertParameters["batch_no"].DefaultValue = batch_no.ToString();
                    SqlDataSource1.InsertParameters["dt"].DefaultValue = DateTime.Parse(TextBox1.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
                    SqlDataSource1.InsertParameters["no_pack1"].DefaultValue = pack_size1.ToString();
                    SqlDataSource1.InsertParameters["wt1"].DefaultValue = wt1.ToString();
                   
                    SqlDataSource1.Insert();
                }
            }

            Response.Redirect("fc12_report.aspx?code=" + Label1.Text );
          
        }
    }
    protected void TextBox7_TextChanged(object sender, EventArgs e)
    {
        //decimal wt, pack, net;
        //pack = Convert.ToDecimal(TextBox3.Text);
        //wt = Convert.ToDecimal(TextBox7.Text);
        //net = Math.Round(pack * wt, 2);
        //TextBox4.Text = net.ToString();
        //TextBox5.Focus();
    }
    protected void GridView2_RowCommand(object sender, GridViewCommandEventArgs e)
    {
        if (e.CommandName == "Add")
        {
            DataTable dt = (DataTable)(ViewState["ab"]);
            string des = ((DropDownList)(GridView2.FooterRow.FindControl("des1"))).SelectedItem.Text.ToString();
            Int32 no = Convert.ToInt32(((TextBox)(GridView2.FooterRow.FindControl("no"))).Text);
            decimal wtqtl = Convert.ToDecimal(((TextBox)(GridView2.FooterRow.FindControl("wtqtl"))).Text);
            decimal wtkg = Convert.ToDecimal(((TextBox)(GridView2.FooterRow.FindControl("wtkg"))).Text);
            decimal wtqtl1 = Convert.ToDecimal(((TextBox)(GridView2.FooterRow.FindControl("textbox17"))).Text);

            decimal wt1 = Convert.ToDecimal(((TextBox)(GridView2.FooterRow.FindControl("wtkg1"))).Text);

            string batch = ((TextBox)(GridView2.FooterRow.FindControl("batch"))).Text.ToString();
            string remark = ((TextBox)(GridView2.FooterRow.FindControl("remark"))).Text.ToString();
            DataRow r;
            r = dt.NewRow();
            r[0] = des;
            r[1] = no;
            r[2] = wtqtl;
            r[3] = wtkg;
            r[4] = wtqtl1;
            r[5] = wt1;

            r[6] = batch;
            r[7] = remark;
            dt.Rows.Add(r);
        
            GridView2.DataSource = dt;
            GridView2.DataBind();
        }
    }
    protected void GridView2_RowDeleting(object sender, GridViewDeleteEventArgs e)
    {
        DataTable dt = (DataTable)(ViewState["ab"]);
        dt.Rows.RemoveAt(e.RowIndex);
        GridView2.DataSource = dt;
        GridView2.DataBind();
    }
    protected void GridView2_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            if (e.Row.RowIndex == 0)
            {
                e.Row.Visible = false;

            }
            else
            {
                e.Row.Visible =true;
            }
        }
    }
    protected void Button5_Click(object sender, EventArgs e)
    {
        Response.Redirect("fc12_report.aspx?code="+DropDownList1.SelectedValue.ToString());
    }
}
