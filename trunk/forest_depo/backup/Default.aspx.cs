using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Data.SqlClient;
using System.Configuration;

public partial class _Default : System.Web.UI.Page
{
    public Int32 scant_auto=0;
    public string lot_auto = "";
    string scant_no, lot_no, date_of_chl, date_of_rec, size, size_type, grade, stack, size_vol, as_per_no, as_per_vol, kind;
    protected void Page_Load(object sender, EventArgs e)
    {


       
        if (Page.IsPostBack == false)
        {
             aut();
            bnk();
        }
    }

    private void aut()
    {
        string qry = "select * from tally_sheet order by code";

        // string qry = "select * from tally_sheet where challan_no='" + chl + "' and spec='" + spec + "' or challan_no='" + chl + "' and size_type='" + size_type + "' or challan_no='"+chl+"' and spec='"+spec+"'";
        SqlDataAdapter adp = new SqlDataAdapter(qry, ConfigurationManager.ConnectionStrings["forest_depoConnectionString"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables[0].Rows.Count != 0)
        {
            Int32 i;
            for (i = 0; i < ds.Tables[0].Rows.Count; i++)
            {
                scant_auto = Convert.ToInt32(ds.Tables[0].Rows[i]["scant_no"]);
            }
            scant_auto++;
            //((TextBox)(GridView1.FooterRow.FindControl("scant_no"))).Text = scant_auto.ToString();
            //string lot_auto;
            //lot_auto = ((TextBox)(GridView1.FooterRow.FindControl("lot_no"))).Text;
            //((TextBox)(GridView1.FooterRow.FindControl("lot_no"))).Text = lot_auto.ToString();

            ViewState["scant"] = scant_auto.ToString();
        }


    }
     private void aut2()
    {

        //Int32 i;
        //for (i = 1; i < GridView1.Rows.Count; i++)
        //{
        scant_auto = Convert.ToInt32(ViewState["scant"]);
        //}

      
            scant_auto++;
            ////((TextBox)(GridView1.FooterRow.FindControl("scant_no"))).Text = scant_auto.ToString();
            //string lot_auto;
            //lot_auto = ((TextBox)(GridView1.FooterRow.FindControl("lot_no"))).Text;
          //  ((TextBox)(GridView1.FooterRow.FindControl("lot_no"))).Text = ViewState["scant"].ToString();

        }
    private void bnk()
    {
        Session.Remove("dts6");

        DataTable tb = new DataTable();
        tb.Columns.Add(new DataColumn("scant_no", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("lot_no", Type.GetType("System.String")));
        //tb.Columns.Add(new DataColumn("date_of_chl", Type.GetType("System.String")));
        //tb.Columns.Add(new DataColumn("date_of_rec", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("spec", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("kind", Type.GetType("System.String")));
        
        tb.Columns.Add(new DataColumn("size", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("size_type", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("grade", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("stack", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("size_vol", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("as_per_no", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("as_per_vol", Type.GetType("System.String")));
       




        DataRow r;
        r = tb.NewRow();

        r[0] = "";
        tb.Rows.Add(r);
        GridView1.DataSource = tb;
        GridView1.DataBind();
        GridView1.Rows[0].Visible = false;
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {

        Label2.Text = "";

        DataView dv = (DataView)(chk_chl.Select(DataSourceSelectArguments.Empty));
        if (dv.Table.Rows.Count == 0)
        {

            Int32 i;
            for (i = 0; i < GridView1.Rows.Count; i++)
            {
                //if (i != 0)
                //{

                    SqlDataSource2.InsertParameters["scant_no"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("scant_no"))).Text;
                    SqlDataSource2.InsertParameters["lot_no"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("lot_no"))).Text;
                    //SqlDataSource2.InsertParameters["date_of_chl"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("date_of_chl"))).Text;
                    //SqlDataSource2.InsertParameters["date_of_rec"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("date_of_rec"))).Text;

                    SqlDataSource2.InsertParameters["date_of_chl"].DefaultValue = date_of_challan.Text.ToString();
                    SqlDataSource2.InsertParameters["date_of_rec"].DefaultValue = date_of_recept.Text.ToString();


                    SqlDataSource2.InsertParameters["spec"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("spec"))).Text;

                    SqlDataSource2.InsertParameters["kind"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("kind"))).Text;

                    SqlDataSource2.InsertParameters["size"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("size"))).Text;
                    SqlDataSource2.InsertParameters["size_type"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("size_type"))).Text;
                    SqlDataSource2.InsertParameters["grade"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("grade"))).Text;
                    SqlDataSource2.InsertParameters["stack"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("stack"))).Text;

                    SqlDataSource2.InsertParameters["size_vol"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("size_vol"))).Text;
                    SqlDataSource2.InsertParameters["as_per_no"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("as_per_no"))).Text;
                    SqlDataSource2.InsertParameters["as_per_vol"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("as_per_vol"))).Text;


                    SqlDataSource2.Insert();
                    Label1.Text = "Sucessfull....";
                //}
            }


            // SqlDataSource2.Insert();

            Label1.Text = "Sucessfull...";
            Response.Redirect("tally_sheet2.aspx?challan_no=" + challan_no.Text);
        }
        else
        {
            Label2.Text = "Challan No. not Available ! Please Write Different Challan No.";
        }
    }
    protected void scant_no_TextChanged(object sender, EventArgs e)
    {

    }
    protected void GridView1_RowCommand(object sender, GridViewCommandEventArgs e)
    {

        ViewState["scant"] = ((TextBox)(GridView1.FooterRow.FindControl("scant_no"))).Text.ToString();
        ViewState["lot"] = ((TextBox)(GridView1.FooterRow.FindControl("lot_no"))).Text.ToString();
        ((TextBox)(GridView1.FooterRow.FindControl("lot_no"))).Text = ViewState["lot"].ToString();
        if (e.CommandName == "insert")
        {

Label2.Text = "";

        DataView dv = (DataView)(chk_chl.Select(DataSourceSelectArguments.Empty));
        if (dv.Table.Rows.Count == 0)
        {
            //       DropDownList challan_no;


            DropDownList spec = ((DropDownList)(GridView1.FooterRow.FindControl("DropDownList4")));
            scant_no = ((TextBox)(GridView1.FooterRow.FindControl("scant_no"))).Text;

            lot_no = ((TextBox)(GridView1.FooterRow.FindControl("lot_no"))).Text;
            //date_of_chl = ((TextBox)(GridView1.FooterRow.FindControl("date_of_chl"))).Text;

            //date_of_rec = ((TextBox)(GridView1.FooterRow.FindControl("date_of_rec"))).Text;
            size = ((TextBox)(GridView1.FooterRow.FindControl("size"))).Text;

            DropDownList kind2 = ((DropDownList)(GridView1.FooterRow.FindControl("kind")));

            grade = ((DropDownList)(GridView1.FooterRow.FindControl("grade"))).Text;
            stack = ((TextBox)(GridView1.FooterRow.FindControl("stack"))).Text;
            size_type = ((DropDownList)(GridView1.FooterRow.FindControl("size_type"))).SelectedItem.Text;
            size_vol = ((TextBox)(GridView1.FooterRow.FindControl("size_vol"))).Text;
            as_per_no = ((TextBox)(GridView1.FooterRow.FindControl("as_per_no"))).Text;
            as_per_vol = ((TextBox)(GridView1.FooterRow.FindControl("as_per_vol"))).Text;

            if (Session["dts6"] == null)
            {

                DataTable tb = new DataTable();
                tb.Columns.Add(new DataColumn("scant_no", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("lot_no", Type.GetType("System.String")));
                //tb.Columns.Add(new DataColumn("date_of_chl", Type.GetType("System.String")));
                //tb.Columns.Add(new DataColumn("date_of_rec", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("spec", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("kind", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("size", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("size_type", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("grade", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("stack", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("size_vol", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("as_per_no", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("as_per_vol", Type.GetType("System.String")));
                Session["dts6"] = tb;
            }
            else
            {


                DataTable tb = new DataTable();
                tb = (DataTable)(Session["dts6"]);
                DataRow r;
                r = tb.NewRow();

                r[0] = scant_no;
                r[1] = lot_no;
                //r[2] = date_of_chl;
                //r[3] = date_of_rec;
                r[2] = spec.SelectedItem.Text;
                r[3] = kind2.SelectedItem.Text;
                r[4] = size;
                r[5] = size_type;
                r[6] = grade;
                r[7] = stack;
                r[8] = size_vol;
                r[9] = as_per_no;
                r[10] = as_per_vol;

                ViewState["lot"] = lot_no;
                aut2();
                tb.Rows.Add(r);
                GridView1.DataSource = tb;
                GridView1.DataBind();
                ((TextBox)(GridView1.FooterRow.FindControl("lot_no"))).Text = ViewState["lot"].ToString();
            }
        }

        else
        {
            Label2.Text = "Challan No. not Available ! Please Write Different Challan No.";
        }

        }
    }
    protected void GridView1_RowDeleting(object sender, GridViewDeleteEventArgs e)
    {
        DataTable tb = new DataTable();
        tb = (DataTable)(Session["dts6"]);
        tb.Rows.RemoveAt(e.RowIndex);
        GridView1.DataSource = tb;
        GridView1.DataBind();
    }
    protected void size_type_SelectedIndexChanged(object sender, EventArgs e)
    {

        DropDownList size_type = ((DropDownList)(GridView1.FooterRow.FindControl("size_type")));

        string qry = "select * from size_type where size_type='" + size_type.SelectedItem.Text + "'";

        // string qry = "select * from tally_sheet where challan_no='" + chl + "' and spec='" + spec + "' or challan_no='" + chl + "' and size_type='" + size_type + "' or challan_no='"+chl+"' and spec='"+spec+"'";
        SqlDataAdapter adp = new SqlDataAdapter(qry, ConfigurationManager.ConnectionStrings["forest_depoConnectionString"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables[0].Rows.Count != 0)
        {
            ((TextBox)(GridView1.FooterRow.FindControl("as_per_vol"))).Text = ds.Tables[0].Rows[0][2].ToString();
            ((TextBox)(GridView1.FooterRow.FindControl("size_vol"))).Text = ds.Tables[0].Rows[0][2].ToString();

        }
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.Footer)
        {
            //aut();
        }
    }
}
