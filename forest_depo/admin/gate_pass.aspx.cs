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

public partial class gate_pass : System.Web.UI.Page
{
    string date_auc, name_kind, size, no, vol, amt;
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            Session.Remove("dts5");

            bnk();
        }
    }
    private void bnk()
    {
        Session.Remove("dts5");

        DataTable tb = new DataTable();
        tb.Columns.Add(new DataColumn("name_div", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("date_auc", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("spec", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("name_kind", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("size", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("no", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("vol", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("amt", Type.GetType("System.String")));
      



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
        Int32 i;
        for (i = 0; i < GridView1.Rows.Count; i++)
        {
            SqlDataSource11.InsertParameters["name_div"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("name_div"))).Text;
            SqlDataSource11.InsertParameters["date_auc"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("date_auc"))).Text;
            SqlDataSource11.InsertParameters["spec"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("spec"))).Text; 
            SqlDataSource11.InsertParameters["name_kind"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("name_kind"))).Text;
            SqlDataSource11.InsertParameters["size"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("size"))).Text; 
            SqlDataSource11.InsertParameters["no"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("no"))).Text;

            SqlDataSource11.InsertParameters["vol"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("vol"))).Text; 
            SqlDataSource11.InsertParameters["amt"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("amt"))).Text;


            SqlDataSource11.Insert();
            Label1.Text = "Sucessfull....";
        }

        Response.Redirect("gate_pass_report.aspx?challan_no=" + DropDownList1.SelectedItem.Text);
    }
    //protected void Wizard1_FinishButtonClick(object sender, WizardNavigationEventArgs e)
    //{
    //    SqlDataSource2.InsertParameters["challan_no"].DefaultValue = DropDownList1.SelectedItem.Text.ToString();
    //    SqlDataSource1.Insert();
    //    SqlDataSource2.Insert();
    //    Label1.Text = "Sucessfull....";
    //}
    //protected void Wizard1_NextButtonClick(object sender, WizardNavigationEventArgs e)
    //{
      
    //}
    protected void rel_no_TextChanged(object sender, EventArgs e)
    {
        decimal iAmt = Convert.ToDecimal(rel_no.Text);
        string strAmount = wordify(iAmt);
        wrd.Text = strAmount;
    }
    static string wordify(decimal v)
{
if (v == 0) return "zero";
var units = "|One|Two|Three|Four|Five|Six|Seven|Eight|Nine".Split('|');
var teens = "|eleven|twelve|thir#|four#|fif#|six#|seven#|eigh#|nine#".Replace("#", "teen").Split('|');
var tens = "|Ten|Twenty|Thirty|Forty|Fifty|Sixty|Seventy|Eighty|Ninety".Split('|');
var thou = "|Thousand|m#|b#|tr#|quadr#|quint#|sex#|sept#|oct#".Replace("#", "illion").Split('|');
//var g = (v  +"<style=color: rgb(163, 21, 21);>minus :");
var w = "";
var p = 0;
v = Math.Abs(v);
while (v > 0)
{
int b = (int)(v % 1000);
if (b > 0)
{
var h = (b / 100);
var t = (b - h * 100) / 10;
var u = (b - h * 100 - t * 10);
var s = ((h > 0) ? units[h] + " Hundred" + ((t > 0 | u > 0) ? " and " : "") : "") + ((t > 0) ? (t == 1 && u > 0) ? teens[u] : tens[t] + ((u > 0) ? "-" : "") : "") + ((t != 1) ? units[u] : ""); s = (((v > 1000) && (h == 0) && (p == 0)) ? " and " : (v > 1000) ? ", " : "") + s; w = s + " " + thou[p] + w;
} v = v / 1000; p++;
}
return  w ;
}

    protected void GridView1_RowCommand(object sender, GridViewCommandEventArgs e)
    {
        if (e.CommandName == "insert")
        {


            //       DropDownList challan_no;


            DropDownList name_div = ((DropDownList)(GridView1.FooterRow.FindControl("DropDownList2")));
            date_auc = ((TextBox)(GridView1.FooterRow.FindControl("date_auc"))).Text;
            DropDownList spec = ((DropDownList)(GridView1.FooterRow.FindControl("DropDownList2")));
            name_kind= ((TextBox)(GridView1.FooterRow.FindControl("name_kind"))).Text;
            size = ((TextBox)(GridView1.FooterRow.FindControl("size"))).Text;
         
            no = ((TextBox)(GridView1.FooterRow.FindControl("no"))).Text;
            vol = ((TextBox)(GridView1.FooterRow.FindControl("vol"))).Text;
           amt = ((TextBox)(GridView1.FooterRow.FindControl("amt"))).Text;
          
            if (Session["dts5"] == null)
            {

                DataTable tb = new DataTable();
                tb.Columns.Add(new DataColumn("name_div", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("date_auc", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("spec", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("name_kind", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("size", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("no", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("vol", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("amt", Type.GetType("System.String")));
                Session["dts5"] = tb;
            }
            else
            {


                DataTable tb = new DataTable();
                tb = (DataTable)(Session["dts5"]);
                DataRow r;
                r = tb.NewRow();

                r[0] = name_div.SelectedItem.Text;
                r[1] = date_auc;
                r[2] = spec.SelectedItem.Text;
                r[3] = name_kind;
                r[4] = size;
                r[5] = no;
                r[6] = vol;
                r[7] = amt;
                
                tb.Rows.Add(r);
                GridView1.DataSource = tb;
                GridView1.DataBind();
            }

        }
    }
    protected void GridView1_RowDeleting(object sender, GridViewDeleteEventArgs e)
    {
        DataTable tb = new DataTable();
        tb = (DataTable)(Session["dts5"]);
        tb.Rows.RemoveAt(e.RowIndex);
        GridView1.DataSource = tb;
        GridView1.DataBind();
       // GridView1.Rows[0].Visible = false;
    }
    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {




      
            DataTable tb2 = new DataTable();
            DataView dv = (DataView)(SqlDataSource12.Select(DataSourceSelectArguments.Empty));
            if (dv.Table.Rows.Count != 0)
            {
                LinkButton2.Visible = true;
                TextBox3.Text = Convert.ToDateTime(dv.Table.Rows[0]["date"]).ToString("MM/dd/yyyy");

                veh_no.Text = dv.Table.Rows[0]["veh_no"].ToString();

                rel_no.Text = dv.Table.Rows[0]["rel_order"].ToString();

                decimal iAmt = Convert.ToDecimal(dv.Table.Rows[0]["rel_order"].ToString());
                string strAmount = wordify(iAmt);
                wrd.Text = strAmount;


                name_add.Text = dv.Table.Rows[0]["name_add"].ToString();
                veh_no.Text = dv.Table.Rows[0]["veh_no"].ToString();
                name_driver.Text = dv.Table.Rows[0]["name_driver"].ToString();



                GridView1.DataSource = SqlDataSource12;
                GridView1.DataBind();

                Int32 i;
                for (i = 0; i < GridView1.Rows.Count; i++)
                {




                    if (i == 0)
                    {
                        DataTable tb = new DataTable();
                        tb.Columns.Add(new DataColumn("name_div", Type.GetType("System.String")));
                        tb.Columns.Add(new DataColumn("date_auc", Type.GetType("System.String")));
                        tb.Columns.Add(new DataColumn("spec", Type.GetType("System.String")));
                        tb.Columns.Add(new DataColumn("name_kind", Type.GetType("System.String")));
                        tb.Columns.Add(new DataColumn("size", Type.GetType("System.String")));
                        tb.Columns.Add(new DataColumn("no", Type.GetType("System.String")));
                        tb.Columns.Add(new DataColumn("vol", Type.GetType("System.String")));
                        tb.Columns.Add(new DataColumn("amt", Type.GetType("System.String")));
                        Session["dts5"] = tb;



                    }



                    tb2 = (DataTable)(Session["dts5"]);
                    DataRow r;
                    r = tb2.NewRow();

                    r[0] = ((Label)(GridView1.Rows[i].FindControl("name_div"))).Text;
                    r[1] = ((Label)(GridView1.Rows[i].FindControl("date_auc"))).Text;
                    r[2] = ((Label)(GridView1.Rows[i].FindControl("spec"))).Text;
                    r[3] = ((Label)(GridView1.Rows[i].FindControl("name_kind"))).Text;
                    r[4] = ((Label)(GridView1.Rows[i].FindControl("size"))).Text;
                    r[5] = ((Label)(GridView1.Rows[i].FindControl("no"))).Text;

                    r[6] = ((Label)(GridView1.Rows[i].FindControl("vol"))).Text;
                    r[7] = ((Label)(GridView1.Rows[i].FindControl("amt"))).Text;
                    tb2.Rows.Add(r);


                }
                GridView1.DataSource = tb2;
                GridView1.DataBind();
            }
            else
            {

                DataTable tb3 = new DataTable();
                DataView dv3 = (DataView)(SqlDataSource13.Select(DataSourceSelectArguments.Empty));
                if (dv3.Table.Rows.Count != 0)
                {

                    TextBox3.Text = Convert.ToDateTime(dv3.Table.Rows[0]["date_of_chl"]).ToString("MM/dd/yyyy");

                    veh_no.Text = dv3.Table.Rows[0]["truck_no"].ToString();
                }

                //LinkButton2.Visible = false;
                bnk();

                //TextBox3.Text = "";

                //rel_no.Text = "";


                //wrd.Text = "";


                //name_add.Text = "";
                //veh_no.Text = "";
                //name_driver.Text = "";

            }
        
    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        Response.Redirect("gate_pass_report.aspx?challan_no=" + DropDownList1.SelectedItem.Text);
    }
}
