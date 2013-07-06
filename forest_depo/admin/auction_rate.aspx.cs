using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
public partial class auction_rate : System.Web.UI.Page
{
    Int32 no, rt1;
    decimal prc;
    string hsd_lot_no, spec, kind, grade, size_type;
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            ViewState["grade"] = "grade";
        }

    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        GridView1.DataBind();
    }
    protected void GridView1_RowCommand(object sender, GridViewCommandEventArgs e)
    {
    
        if (e.CommandName == "add")
        {
            Int32 r;
            for (r = 0; r < GridView1.Rows.Count; r++)
            {
                prc += Math.Round(Convert.ToDecimal(((TextBox)(GridView1.Rows[r].FindControl("rate"))).Text),0);
                rt1 += 1;
               no+= Convert.ToInt32(((Label)(GridView1.Rows[r].FindControl("no"))).Text);
            }


            Int32 i;
            for(i=0;i<GridView1.Rows.Count;i++)
            {
                string hsd_lot_no, spec, kind, grade, size_type, rate;
            rate = ((TextBox)(GridView1.Rows[i].FindControl("rate"))).Text;
           //decimal bid1 =Math.Round(Convert.ToDecimal(((Label)(GridView1.Rows[i].FindControl("bid"))).Text),0);
            hsd_lot_no = ((Label)(GridView1.Rows[i].FindControl("hsd_lot_no"))).Text;
            spec = ((Label)(GridView1.Rows[i].FindControl("spec"))).Text;
            kind = ((Label)(GridView1.Rows[i].FindControl("kind"))).Text;
            grade = ((Label)(GridView1.Rows[i].FindControl("grade"))).Text;
            size_type = ((Label)(GridView1.Rows[i].FindControl("size_type"))).Text;
           
            //Int32 avr = Convert.ToInt32(rate);
          //  no= Convert.ToInt32(((Label)(GridView1.Rows[i].FindControl("no"))).Text);
            //Int32 bid = Convert.ToInt32(bid1);
            Int32 avr2 =Convert.ToInt32(prc) / rt1;
            //Int32 bid2 = bid / no;
            SqlDataSource1.UpdateParameters["hsd_lot_no"].DefaultValue = hsd_lot_no;
            SqlDataSource1.UpdateParameters["spec"].DefaultValue = spec;
            SqlDataSource1.UpdateParameters["kind"].DefaultValue = kind;
            SqlDataSource1.UpdateParameters["grade"].DefaultValue = grade;
            SqlDataSource1.UpdateParameters["size_type"].DefaultValue = size_type;
            SqlDataSource1.UpdateParameters["rate"].DefaultValue = rate;
            SqlDataSource1.UpdateParameters["average"].DefaultValue = avr2.ToString();
            //SqlDataSource1.UpdateParameters["bid_avg"].DefaultValue = bid2.ToString();

            SqlDataSource1.Update();

            }
            Response.Redirect("purchaser.aspx");
        }
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
         
        if (e.Row.RowType == DataControlRowType.DataRow)
        {

            string grade = ((Label)(e.Row.FindControl("grade"))).Text;

            if (grade == ViewState["grade"].ToString())
            {

            }
            ViewState["grade"] = grade;
            
            
            hsd_lot_no = ((Label)(e.Row.FindControl("hsd_lot_no"))).Text;
            spec = ((Label)(e.Row.FindControl("spec"))).Text;
            kind = ((Label)(e.Row.FindControl("kind"))).Text;
            grade = ((Label)(e.Row.FindControl("grade"))).Text;
            size_type = ((Label)(e.Row.FindControl("size_type"))).Text;
            SqlDataSource2.SelectParameters["hsd_lot_no"].DefaultValue = hsd_lot_no;
            SqlDataSource2.SelectParameters["spec"].DefaultValue = spec;
            SqlDataSource2.SelectParameters["kind"].DefaultValue = kind;
            SqlDataSource2.SelectParameters["grade"].DefaultValue = grade;
            SqlDataSource2.SelectParameters["size_type"].DefaultValue = size_type;

            DataView dv=(DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));
            if (dv==null)
            {
                //((Label)(e.Row.FindControl("bid"))).Text = "Not Set".ToString();
            }
            else
            {
                ((TextBox)(e.Row.FindControl("rate"))).Text = dv.Table.Rows[0]["rate"].ToString();
                //((Label)(e.Row.FindControl("bid"))).Text = dv.Table.Rows[0]["bid_amt"].ToString();
            }
        }
    }
}