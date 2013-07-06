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
using System.Data.SqlClient;

public partial class fc20_report : System.Web.UI.Page
{
    public Int32 qty=0;
    public Int32 sr = 0;
    public Int32 sr1 = 0;
    protected void Page_Load(object sender, EventArgs e)
    {
      
        if (!Page.IsPostBack)
        {
            pn();
            //bind();
            //Session["ckk"] = DropDownList1.SelectedItem.Text.ToString();

        }
    }
    private void bind()
    {
        sr = 1;
        DataView dv;
       
           // SqlDataSource1.SelectParameters["fac_ord_no"].DefaultValue = DropDownList1.SelectedValue.ToString();
            dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
            if (dv.Table.Rows.Count !=0)
            {
            //    Label1.Text = dv.Table.Rows[1]["Challanno"].ToString();
         TextBox4.Text = Convert.ToDateTime(dv.Table.Rows[0]["dt"]).ToString("dd/MM/yyyy");
        TextBox2.Text = dv.Table.Rows[0]["ms"].ToString();
            //    TextBox4.Text = Convert.ToDateTime(dv.Table.Rows[1]["dt1"]).ToString("dd/MM/yyyy");
           Label23 .Text = dv.Table.Rows[0]["fac_ord_no"].ToString();
                GridView1.DataSource = dv;
                GridView1.DataBind();
            }
            else
            {
                ////Label1.Text = "".ToString();
                //TextBox1.Text ="".ToString();
                //TextBox2.Text = "".ToString();
                //TextBox4.Text ="".ToString();
                //TextBox3.Text = "".ToString();
                //pn();
            }
        }

     
        //if (dv.Table.Rows.Count >= 1)
        //{

        //}


    private void pn()
    {


        DataView dv = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));


        Int32 rr = 201;
        if (dv.Table.Rows.Count >= 2)
        {
            rr = Convert.ToInt32(dv.Table.Rows[dv.Table.Rows.Count - 1][0]);
            rr++;
        }
        Label1.Text = rr.ToString();
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        
       
        if (e.Row.RowType == DataControlRowType.DataRow && e.Row.RowState == DataControlRowState.Normal || e.Row.RowState == DataControlRowState.Alternate)
        {
            sr = sr + 1;
            string des = ((Label)(e.Row.FindControl("Label2"))).Text;
            if (des == "ss")
            {
                e.Row.Visible = false;
            }
            else
            {

                e.Row.Visible = true;
            }
            
           

        }
        //if (e.Row.RowType == DataControlRowType.Footer)
        //{
        //   DropDownList1.DataBind();
        //   if (Session["ckk"] != null)
        //   {
        //       DropDownList1.Items.FindByText(Session["ckk"].ToString()).Selected = true;
        //   }
        //    SqlDataAdapter adp = new SqlDataAdapter("SELECT * FROM fc13 WHERE fac_ord_no=" + DropDownList1.SelectedItem.Text, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
        //    DataSet ds = new DataSet();
        //    adp.Fill(ds);

        //    // dv = (DataView)(SqlDataSource4.Select(DataSourceSelectArguments.Empty));
        //    if (ds.Tables[0].Rows.Count != 0)
        //    {

        //        TextBox4.Text = Convert.ToDateTime(ds.Tables[0].Rows[0]["dt"]).ToString("dd/MM/yyyy");
        //        TextBox2.Text = ds.Tables[0].Rows[0]["ms"].ToString();

        //        TextBox text = ((TextBox)(e.Row.FindControl("TextBox7")));

        //        text.Text = ds.Tables[0].Rows[0]["qty"].ToString();
        //    }
        //    else
        //    {
        //        ////Label1.Text = "".ToString();
        //        //TextBox1.Text ="".ToString();
        //        //TextBox2.Text = "".ToString();
        //        //TextBox4.Text ="".ToString();
        //        //TextBox3.Text = "".ToString();
        //        pn();
        //    }
        //}
    }
    protected void GridView1_RowCommand(object sender, GridViewCommandEventArgs e)
    {
        if (e.CommandName == "Add")
        {
            string des, name_party;
            Int32 challanno, no;
            decimal q_lit, q_kg, f_o_n;
            DateTime dt, dt1;
            des = ((DropDownList)(GridView1.FooterRow.FindControl("DropDownList2"))).SelectedItem.Text;
            name_party = TextBox2.Text;
            challanno = Convert.ToInt32(Label1.Text);
            no = Convert.ToInt32(((TextBox)(GridView1.FooterRow.FindControl("TextBox6"))).Text);
            q_lit = Convert.ToDecimal(((TextBox)(GridView1.FooterRow.FindControl("TextBox7"))).Text);
            q_kg = Convert.ToDecimal(((TextBox)(GridView1.FooterRow.FindControl("TextBox8"))).Text);
            f_o_n = Convert.ToDecimal(Label23 .Text);
            dt = DateTime.Parse(TextBox1.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA"));
            dt1 = DateTime.Parse(TextBox4.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA"));

            SqlDataSource1.InsertParameters["Description"].DefaultValue = des.ToString();
            SqlDataSource1.InsertParameters["No"].DefaultValue = no.ToString();
            SqlDataSource1.InsertParameters["Qtl_lit"].DefaultValue = q_lit.ToString();
            SqlDataSource1.InsertParameters["Kg"].DefaultValue = q_kg.ToString();
            SqlDataSource1.InsertParameters["F_o_no"].DefaultValue = f_o_n.ToString();
            SqlDataSource1.InsertParameters["dt"].DefaultValue = dt.ToString();
            SqlDataSource1.InsertParameters["Challanno"].DefaultValue = challanno.ToString();
            SqlDataSource1.InsertParameters["dt1"].DefaultValue = dt1.ToString();
            SqlDataSource1.InsertParameters["Nameofparty"].DefaultValue = name_party.ToString();
            SqlDataSource1.Insert();

            bind();

        }
    }
    protected void TextBox3_TextChanged(object sender, EventArgs e)
    {
        bind();
    }
    protected void GridView1_RowDeleting(object sender, GridViewDeleteEventArgs e)
    {
        SqlDataSource1.DeleteParameters["code"].DefaultValue = GridView1.DataKeys[e.RowIndex].Value.ToString();
        SqlDataSource1.Delete();
        bind();
    }
    protected void GridView1_RowUpdating(object sender, GridViewUpdateEventArgs e)
    {
        string des;
        Int32 no, code;
        decimal q_lit, q_kg;
        des = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox9"))).Text;
     string   des1 = ((DropDownList)(GridView1.Rows[e.RowIndex].FindControl("Dropdownlist4"))).SelectedItem.Text;
        
        no = Convert.ToInt32(((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox10"))).Text);
        q_lit = Convert.ToDecimal(((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox7"))).Text);
        q_kg = Convert.ToDecimal(((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox12"))).Text);
        code = Convert.ToInt32(GridView1.DataKeys[e.RowIndex].Value);
        SqlDataSource1.UpdateParameters["Description"].DefaultValue = des.ToString();
        SqlDataSource1.UpdateParameters["No"].DefaultValue = no.ToString();
        SqlDataSource1.UpdateParameters["Qtl_lit"].DefaultValue = q_lit.ToString();
        SqlDataSource1.UpdateParameters["Kg"].DefaultValue = q_kg.ToString();
        SqlDataSource1.UpdateParameters["code"].DefaultValue = code.ToString();
        SqlDataSource1.Update();
        GridView1.EditIndex = -1;
        bind();
    }
    protected void GridView1_RowEditing(object sender, GridViewEditEventArgs e)
    {
        GridView1.EditIndex = e.NewEditIndex;
        bind();
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        SqlDataSource1.InsertParameters["dt"].DefaultValue = DateTime.Parse(TextBox1.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
        SqlDataSource1.Insert();
        Response.Redirect("fc20_report.aspx?ch=" + Label23.Text  );
    }
    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {
        DataView dv;
       
           // SqlDataSource1.SelectParameters["F_o_no"].DefaultValue = DropDownList1.SelectedItem.Text.ToString();
            dv = (DataView)(SqlDataSource4.Select(DataSourceSelectArguments.Empty));
            if (dv.Table.Rows.Count != 0)
            {
                
                TextBox4.Text = Convert.ToDateTime(dv.Table.Rows[0]["dt"]).ToString("dd/MM/yyyy");
                TextBox2.Text = dv.Table.Rows[0]["ms"].ToString();

                Label23.Text = dv.Table.Rows[0]["fac_ord_no"].ToString();
                Session["ckk"] = DropDownList1.SelectedItem.Text.ToString();
                bind();
            }
            else
            {
                ////Label1.Text = "".ToString();
                //TextBox1.Text ="".ToString();
                //TextBox2.Text = "".ToString();
                //TextBox4.Text ="".ToString();
                //TextBox3.Text = "".ToString();
                pn();
            }
        
    }
    protected void Button3_Click(object sender, EventArgs e)
    {
        bind();
    }
    protected void Button4_Click(object sender, EventArgs e)
    {
        Response.Redirect("fc20_report.aspx?ch=" + DropDownList3.SelectedValue.ToString());
    }
}
