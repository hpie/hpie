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
public partial class fc21 : System.Web.UI.Page
{
    public Int32 r=1;
    protected void Page_Load(object sender, EventArgs e)
    {
        pn();

    }
    private void pn()
    {


        DataView dv = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));
        if (dv.Table.Rows.Count != 0)
        {
            Int32 rr = Convert.ToInt32(dv.Table.Rows[dv.Table.Rows.Count - 1]["sr"]);
            rr++;
            TextBox2.Text = rr.ToString();
        }
        else
        {
            TextBox2.Text = "1001".ToString();
        }
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            if (e.Row.RowState == DataControlRowState.Normal || e.Row.RowState == DataControlRowState.Alternate)
            {

                string dd = ((Label)(e.Row.FindControl("label7"))).Text;
                if (dd == "")
                {
                    ((Label)(e.Row.FindControl("label7"))).Text = "0".ToString();
                }
                string dd1 = ((Label)(e.Row.FindControl("label6"))).Text;
                if (dd1 == "")
                {
                    ((Label)(e.Row.FindControl("label6"))).Text = "0".ToString();
                }
                string jj = ((Label)(e.Row.FindControl("label1"))).Text;
                if (jj == "ss")
                {
                    e.Row.Visible = false;
                }
                else
                {
                    r = r + 1;
                    e.Row.Visible = true;
                   decimal rate = Convert.ToDecimal(((Label)(e.Row.FindControl("label3"))).Text);
                    decimal qty = Convert.ToDecimal(((Label)(e.Row.FindControl("label4"))).Text);
                   e.Row.Cells[5].Text = Math.Round((rate * qty), 2).ToString();
                    ((Label)(e.Row.FindControl("label8"))).Text = Math.Round(((rate * qty) + Convert.ToDecimal(((Label)(e.Row.FindControl("label6"))).Text) + Convert.ToDecimal(((Label)(e.Row.FindControl("label7"))).Text)), 2).ToString();
                 //((Label)(e.Row.FindControl("label15"))).Text=   retWord(8999).ToString();
                }
            }
        } 
    }
   

    protected void TextBox15_TextChanged(object sender, EventArgs e)
    {

    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        if (DropDownList1.SelectedIndex == 0)
        {
            SqlDataSource2.InsertParameters["vat"].DefaultValue = vat.Text;

        }
        else
        {
            SqlDataSource2.InsertParameters["cst"].DefaultValue = vat.Text;
        }
        SqlDataSource2.InsertParameters["sdate"].DefaultValue = DateTime.Parse(TextBox3.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
        SqlDataSource2.InsertParameters["fdate"].DefaultValue = DateTime.Parse(TextBox6.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
        SqlDataSource2.InsertParameters["odate"].DefaultValue = DateTime.Parse(TextBox47.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
        SqlDataSource2.InsertParameters["c_date"].DefaultValue = DateTime.Parse(TextBox18.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
        SqlDataSource2.InsertParameters["g_date"].DefaultValue = DateTime.Parse(TextBox21.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
        SqlDataSource2.InsertParameters["date"].DefaultValue = DateTime.Parse(TextBox39.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
        SqlDataSource2.Insert();
        Response.Redirect("fc21.aspx");
    }
    protected void GridView1_RowCommand(object sender, GridViewCommandEventArgs e)
    {
        if (e.CommandName == "Add")
        {
            string des = ((DropDownList)(GridView1.FooterRow.FindControl("textbox40"))).SelectedItem.Text;
            string s_good = ((TextBox)(GridView1.FooterRow.FindControl("textbox411"))).Text;
            string des_p = ((TextBox)(GridView1.FooterRow.FindControl("textbox41"))).Text;
            decimal qty =Convert.ToDecimal( ((TextBox)(GridView1.FooterRow.FindControl("textbox42"))).Text);
            decimal rate = Convert.ToDecimal(((TextBox)(GridView1.FooterRow.FindControl("textbox43"))).Text);
            string detail = ((TextBox)(GridView1.FooterRow.FindControl("textbox44"))).Text;
            decimal tariff = 0;
            if (((TextBox)(GridView1.FooterRow.FindControl("textbox45"))).Text.ToString()!="")
            {
          tariff= Convert.ToDecimal(((TextBox)(GridView1.FooterRow.FindControl("textbox45"))).Text);
            }
            Int32 sr = Convert.ToInt32(TextBox2.Text);
            SqlDataSource1.InsertParameters["des"].DefaultValue = des.ToString();
            SqlDataSource1.InsertParameters["s_good"].DefaultValue = s_good.ToString();
            SqlDataSource1.InsertParameters["des_p"].DefaultValue = des_p.ToString();
            SqlDataSource1.InsertParameters["wtqtl"].DefaultValue = qty.ToString();
            SqlDataSource1.InsertParameters["rate"].DefaultValue = rate.ToString();
            SqlDataSource1.InsertParameters["detail"].DefaultValue = detail.ToString();
            SqlDataSource1.InsertParameters["tariff"].DefaultValue = tariff.ToString();
            SqlDataSource1.InsertParameters["srno"].DefaultValue = sr.ToString();
            SqlDataSource1.Insert();
        }
    }


    protected void LinkButton3_Click(object sender, EventArgs e)
    {
        Response.Redirect("fc21_report.aspx?sr="+DropDownList1.SelectedValue);
    }
    protected void TextBox5_TextChanged(object sender, EventArgs e)
    {
        
    }
    protected void LinkButton4_Click(object sender, EventArgs e)
    {
        //SqlDataAdapter adp121 = new SqlDataAdapter("select *from c21 where  srno='" + TextBox2.Text + "'", ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
        //DataSet ds121 = new DataSet();
        //adp121.Fill(ds121);
        //if (ds121.Tables[0].Rows.Count != 0)
        //{
            SqlDataSource4.Delete();
       // }
        TextBox5.Text = DropDownList3.SelectedValue.ToString();
        SqlDataAdapter adp = new SqlDataAdapter("select *from fc13 where fac_ord_no='" + TextBox5.Text + "'", ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables[0].Rows.Count != 0)
        {

            TextBox6.Text = Convert.ToDateTime(ds.Tables[0].Rows[0]["dt"]).ToString("dd/MM/yyyy");
            TextBox7.Text = ds.Tables[0].Rows[0]["ms"].ToString();
            SqlDataAdapter adp1 = new SqlDataAdapter("select *from c21 where fc_ord='" + TextBox5.Text + "'", ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
            DataSet ds1 = new DataSet();
            adp1.Fill(ds1);
          

            if (ds1.Tables[0].Rows.Count == 0)
            {
               // String kk = "delete from c21 where srno='" + TextBox2.Text + "'";
                //SqlDataSource4.DeleteCommand = kk.ToString();
                
                for (Int16 a = 0; a < ds.Tables[0].Rows.Count; a++)
                {
                    decimal wtq = Convert.ToDecimal(ds.Tables[0].Rows[a]["wtqtl"]);
                    decimal wtk = Convert.ToDecimal(ds.Tables[0].Rows[a]["wtkg"]);
                    if (wtk== (wtq * 100))
                    {
                        SqlDataSource4.InsertParameters["wtqtl"].DefaultValue = ds.Tables[0].Rows[a]["wtqtl"].ToString();
                    }
                    else
                    {
                        decimal ww = Convert.ToDecimal(wtq.ToString() + "." + wtk.ToString());
                        SqlDataSource4.InsertParameters["wtqtl"].DefaultValue = ww.ToString();

                    }
                    SqlDataSource4.InsertParameters["des"].DefaultValue = ds.Tables[0].Rows[a]["pro_size"].ToString();
                    SqlDataSource4.InsertParameters["qty"].DefaultValue = ds.Tables[0].Rows[a]["qty"].ToString();
                 
                    SqlDataSource4.InsertParameters["rate"].DefaultValue = ds.Tables[0].Rows[a]["rate"].ToString();

                    SqlDataSource4.Insert();

                }
            }
            else
            {



                ArrayList arr = new ArrayList();
                ArrayList arr1 = new ArrayList();

                        SqlDataAdapter adp12 = new SqlDataAdapter("select *from c21 where fc_ord='" + TextBox5.Text + "'", ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
                        DataSet ds12 = new DataSet();
                        adp12.Fill(ds12);
                        string des = "", des1 = "";
                        decimal wt = 0, wt1 = 0, wt2 = 0;

                        for (Int16 a = 0; a < ds12.Tables[0].Rows.Count; a++)
                        {
                            arr.Add(ds12.Tables[0].Rows[a]["des"].ToString());

                            arr1.Add(ds12.Tables[0].Rows[a]["wtqtl"].ToString());
                      
                        }
                        SqlDataAdapter adp122 = new SqlDataAdapter("select sum(wtqtl) as wtqtl,pro_size,sum(qty) as qty,sum(rate) as rate from fc13 where fac_ord_no='" + TextBox5.Text + "' group by pro_size", ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
                        DataSet ds122 = new DataSet();
                        adp122.Fill(ds122);
                        for (Int16 a1 = 0; a1 < ds122.Tables[0].Rows.Count; a1++)
                        {
                            
                        //des = ds.Tables[0].Rows[a]["pro_size"].ToString();
                        des1 = ds122.Tables[0].Rows[a1]["pro_size"].ToString();
                        SqlDataAdapter adp121 = new SqlDataAdapter("select sum(wtqtl) as wtqtl,des from c21 where fc_ord='" + TextBox5.Text + "' and des='"+des1+"' group by des", ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
                        DataSet ds121 = new DataSet();
                        adp121.Fill(ds121);
                        if (ds121.Tables[0].Rows.Count != 0)
                        {
                            if (a1 < ds121.Tables[0].Rows.Count)
                            {
                                wt = Convert.ToDecimal(ds121.Tables[0].Rows[a1]["wtqtl"]);
                                wt1 = Convert.ToDecimal(ds122.Tables[0].Rows[a1]["wtqtl"]);
                                wt2 = wt1 - wt;
                                SqlDataSource4.InsertParameters["des"].DefaultValue = ds122.Tables[0].Rows[a1]["pro_size"].ToString();
                                SqlDataSource4.InsertParameters["qty"].DefaultValue = ds.Tables[0].Rows[a1]["qty"].ToString();
                                SqlDataSource4.InsertParameters["wtqtl"].DefaultValue = wt2.ToString();
                                SqlDataSource4.InsertParameters["rate"].DefaultValue = ds122.Tables[0].Rows[a1]["rate"].ToString();
                                SqlDataSource4.Insert();
                            }
                        }
                        else
                        {
                            decimal wtq = Convert.ToDecimal(ds.Tables[0].Rows[a1]["wtqtl"]);
                            decimal wtk = Convert.ToDecimal(ds.Tables[0].Rows[a1]["wtkg"]);
                            if (wtk == (wtq * 100))
                            {
                                SqlDataSource4.InsertParameters["wtqtl"].DefaultValue = ds.Tables[0].Rows[a1]["wtqtl"].ToString();
                            }
                            else
                            {
                                decimal ww = Convert.ToDecimal(wtq.ToString() + "." + wtk.ToString());
                                SqlDataSource4.InsertParameters["wtqtl"].DefaultValue = ww.ToString();

                            }
                            SqlDataSource4.InsertParameters["des"].DefaultValue = ds122.Tables[0].Rows[a1]["pro_size"].ToString();
                            SqlDataSource4.InsertParameters["qty"].DefaultValue = ds.Tables[0].Rows[a1]["qty"].ToString();
                            //SqlDataSource4.InsertParameters["wtqtl"].DefaultValue = ds.Tables[0].Rows[a1]["wtqtl"].ToString();
                            SqlDataSource4.InsertParameters["rate"].DefaultValue = ds.Tables[0].Rows[a1]["rate"].ToString();
                            SqlDataSource4.Insert();
                        }
                        //bool exists = arr.Contains(des1);

                        //if (exists==false)
                        //{
                           
                           //break;
                        //}
                        
                }
            }
            GridView1.DataBind();
        }
    }
    protected void GridView1_RowUpdating(object sender, GridViewUpdateEventArgs e)
    {
        //string des = ((DropDownList)(GridView1.Rows[e.RowIndex].FindControl("dropdownlist2"))).SelectedItem.Text;
        //string s_good = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("textbox413"))).Text;
        //string des_p = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("textbox414"))).Text;
        decimal qty = Convert.ToDecimal(((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox415"))).Text);
        //decimal rate = Convert.ToDecimal(((TextBox)(GridView1.Rows[e.RowIndex].FindControl("textbox416"))).Text);
        //string detail = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("textbox417"))).Text;
        //decimal tariff = Convert.ToDecimal(((TextBox)(GridView1.Rows[e.RowIndex].FindControl("textbox418"))).Text);
        Int32 id = Convert.ToInt32(GridView1.DataKeys[e.RowIndex].Value);
        //SqlDataSource1.UpdateParameters["des"].DefaultValue = des.ToString();
        //SqlDataSource1.UpdateParameters["s_good"].DefaultValue = s_good.ToString();
        //SqlDataSource1.UpdateParameters["des_p"].DefaultValue = des_p.ToString();
        SqlDataSource1.UpdateParameters["wtqtl"].DefaultValue = qty.ToString();
        //SqlDataSource1.UpdateParameters["rate"].DefaultValue = rate.ToString();
        //SqlDataSource1.UpdateParameters["detail"].DefaultValue = detail.ToString();
        //SqlDataSource1.UpdateParameters["tariff"].DefaultValue = tariff.ToString();
        SqlDataSource1.UpdateParameters["id"].DefaultValue = id.ToString();
        SqlDataSource1.Update();
        GridView1.EditIndex = -1;
        GridView1.DataBind();
    }
    protected void GridView1_RowDeleting(object sender, GridViewDeleteEventArgs e)
    {
        Int32 id = Convert.ToInt32(GridView1.DataKeys[e.RowIndex].Value);
        SqlDataSource1.DeleteParameters["id"].DefaultValue = id.ToString();
        SqlDataSource1.Delete();
        GridView1.DataBind();
    }
    protected void LinkButton5_Click(object sender, EventArgs e)
    {
        Response.Redirect("fc21_report1.aspx?sr=" + DropDownList1.SelectedValue);

    }
   
}
