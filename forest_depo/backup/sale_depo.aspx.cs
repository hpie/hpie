using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
public partial class sale_depo : System.Web.UI.Page
{
    public string rem, sl, dtm;
    
    string name_div2, date2, sl_no2, date_of_dis2, rem_ord_no2, rem_date2, how_disp2, challan_no2, vehicle_no2, lot_no2, species2, size2, no2, vol2, remarks2;
    string sl_no, rem_ord_no, how_disp, vehicle_no, lot_no, species, size, no, vol, remarks;
    string date_of_dis, rem_date;
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            //bnk();
            dt();
        }
       
    }
    private void dt()
    {
        Int32 i;
        DateTime live=DateTime.Now;
        Int32 y=live.Year;
        for (i = y - 4; i < y + 20; i++)
        {
            year.Items.Add(i.ToString());
        }
    }
    private void bnk()
    {
        Session.Remove("dts");

        DataTable tb = new DataTable();
        tb.Columns.Add(new DataColumn("sl_no", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("date_of_dis", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("rem_ord_no", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("rem_date", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("how_disp", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("challan_no", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("vehicle_no", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("lot_no", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("species", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("size", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("no", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("vol", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("remarks", Type.GetType("System.String")));



        DataRow r;
        r = tb.NewRow();

        r[0] = "";
        tb.Rows.Add(r);
        GridView1.DataSource = tb;
        GridView1.DataBind();
        ((ImageButton)(GridView1.Rows[0].FindControl("ImageButton1"))).Visible = false;
    }
    protected void GridView1_RowCommand(object sender, GridViewCommandEventArgs e)
    {
        if (e.CommandName == "insert")
        {


     //       DropDownList challan_no;
      

            sl_no = ((TextBox)(GridView1.FooterRow.FindControl("sl_no"))).Text;
            date_of_dis = ((TextBox)(GridView1.FooterRow.FindControl("date_of_dis"))).Text;
            rem_ord_no = ((TextBox)(GridView1.FooterRow.FindControl("rem_ord"))).Text;
           rem_date =((TextBox)(GridView1.FooterRow.FindControl("remo_date"))).Text;
           how_disp = ((TextBox)(GridView1.FooterRow.FindControl("how_dis"))).Text;
        DropDownList challan_no = ((DropDownList)(GridView1.FooterRow.FindControl("challan_no")));
           vehicle_no = ((TextBox)(GridView1.FooterRow.FindControl("veh_no"))).Text;
           lot_no = ((TextBox)(GridView1.FooterRow.FindControl("lot_no"))).Text;
           species = ((TextBox)(GridView1.FooterRow.FindControl("species"))).Text;
            size = ((TextBox)(GridView1.FooterRow.FindControl("size"))).Text;
            no = ((TextBox)(GridView1.FooterRow.FindControl("no"))).Text;
            vol = ((TextBox)(GridView1.FooterRow.FindControl("vol"))).Text;
            remarks = ((TextBox)(GridView1.FooterRow.FindControl("remarks"))).Text;
            if (Session["dts"] == null)
            {
               
                DataTable tb = new DataTable();
                tb.Columns.Add(new DataColumn("sl_no", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("date_of_dis", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("rem_ord_no", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("rem_date", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("how_disp", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("challan_no", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("vehicle_no", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("lot_no", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("species", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("size", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("no", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("vol", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("remarks", Type.GetType("System.String")));
                Session["dts"] = tb;
            }
            else
            {


                DataTable tb = new DataTable();
                tb = (DataTable)(Session["dts"]);
                DataRow r;
                r = tb.NewRow();

                r[0] = sl_no_m;
                r[1] = date_of_dis;
                r[2] = rem_ord_no;
                r[3] = rem_date;
                r[4] = how_disp;
                r[5] = challan_no.SelectedItem.Text;
                r[6] = vehicle_no;
                r[7] = lot_no;
                r[8] = species;
                r[9] = size;
                r[10] = no;
                r[11] = vol;
                r[12] = remark;
                tb.Rows.Add(r);
                GridView1.DataSource = tb;
                GridView1.DataBind();
            }

        }
    }
    protected void GridView1_RowDeleting(object sender, GridViewDeleteEventArgs e)
    {
        DataTable tb = new DataTable();
        tb = (DataTable)(Session["dts"]);
        tb.Rows.RemoveAt(e.RowIndex);
        DataTable tb1 = new DataTable();
        tb1 = (DataTable)(Session["dts"]);
        GridView1.DataSource = tb1;
        GridView1.DataBind();
    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        int i;
          DateTime live = Convert.ToDateTime(mon.SelectedValue.ToString() + "/1/" + year.SelectedItem.Text.ToString());
        DateTime sec;
        Int32 dd=DateTime.DaysInMonth(live.Year, live.Month);
        sec=Convert.ToDateTime(live.Month.ToString()+"/"+dd.ToString()+"/"+live.Year.ToString());
        for (i = 0; i < GridView1.Rows.Count; i++)
        {

            sl_no2 = ((Label)(GridView1.Rows[i].FindControl("Label3"))).Text;
            date_of_dis2 = ((Label)(GridView1.Rows[i].FindControl("Label4"))).Text;
            rem_ord_no2 = ((Label)(GridView1.Rows[i].FindControl("Label5"))).Text;
            rem_date2 = ((Label)(GridView1.Rows[i].FindControl("rec_date"))).Text;
            how_disp2 = ((Label)(GridView1.Rows[i].FindControl("Label7"))).Text;
            string challan_no2 = ((Label)(GridView1.Rows[i].FindControl("Label8"))).Text;
            vehicle_no2 = ((Label)(GridView1.Rows[i].FindControl("Label9"))).Text;
            lot_no2 = ((Label)(GridView1.Rows[i].FindControl("Label10"))).Text;
            species2 = ((Label)(GridView1.Rows[i].FindControl("Label11"))).Text;
            size2 = ((Label)(GridView1.Rows[i].FindControl("Label12"))).Text;
            no2 = ((Label)(GridView1.Rows[i].FindControl("Label13"))).Text;
            vol2 = ((Label)(GridView1.Rows[i].FindControl("Label14"))).Text;
            remarks2 = ((Label)(GridView1.Rows[i].FindControl("Label15"))).Text;


            SqlDataSource1.InsertParameters["name_div"].DefaultValue = DropDownList1.SelectedItem.Text;

          

            SqlDataSource1.InsertParameters["date"].DefaultValue = live.ToString();
            SqlDataSource1.InsertParameters["sl_no"].DefaultValue = sl_no2;
            SqlDataSource1.InsertParameters["date_of_dis"].DefaultValue = date_of_dis2;
            SqlDataSource1.InsertParameters["rem_ord_no"].DefaultValue = rem_ord_no2;
            SqlDataSource1.InsertParameters["rem_date"].DefaultValue = rem_date2;
            SqlDataSource1.InsertParameters["how_disp"].DefaultValue = how_disp2;
            SqlDataSource1.InsertParameters["challan_no"].DefaultValue = challan_no2;
            SqlDataSource1.InsertParameters["vehicle_no"].DefaultValue = vehicle_no2;
            SqlDataSource1.InsertParameters["lot_no"].DefaultValue = lot_no2;
            SqlDataSource1.InsertParameters["species"].DefaultValue = species2;
            SqlDataSource1.InsertParameters["size"].DefaultValue = size2;
            SqlDataSource1.InsertParameters["no"].DefaultValue = no2;
            SqlDataSource1.InsertParameters["vol"].DefaultValue = vol2;
          
            SqlDataSource1.InsertParameters["remarks"].DefaultValue = remarks2;

            SqlDataSource1.Insert();

        }

        Label16.Text = "Successfull...";
       Response.Redirect("sale_depo_report.aspx?first="+live.ToString()+"&second="+sec.ToString()+"&div="+DropDownList1.SelectedItem.Text);
        
        
        
        
    }
    protected void TextBox1_TextChanged(object sender, EventArgs e)
    {
        DateTime live=Convert.ToDateTime(mon.SelectedValue.ToString()+"/1/"+year.SelectedItem.Text.ToString());
        Int32 yy, mm, dt;
        yy=live.Year;
        mm=live.Month;
        dt=DateTime.DaysInMonth(yy, mm);
        
        DateTime first, second;
        first=Convert.ToDateTime(mm.ToString()+"/1/"+yy.ToString());
        second=Convert.ToDateTime(mm.ToString()+"/"+dt.ToString()+"/"+yy.ToString());

        SqlDataSource4.SelectParameters["first"].DefaultValue = first.ToString();
        SqlDataSource4.SelectParameters["second"].DefaultValue =second.ToString();

        GridView1.DataSource = SqlDataSource4;
        GridView1.DataBind();

    }
    protected void LinkButton3_Click(object sender, EventArgs e)
    {
        sl = sl_no_m.Text;
        rem = remark.Text;
        


        DateTime live = Convert.ToDateTime(mon.SelectedValue.ToString() + "/1/" + year.SelectedItem.Text.ToString());
       
       dtm= live.ToString("MM-dd-yyyy");

        Int32 yy, mm, dt;
        yy = live.Year;
        mm = live.Month;
        dt = DateTime.DaysInMonth(yy, mm);

        DateTime first, second;
        first = Convert.ToDateTime(mm.ToString() + "/1/" + yy.ToString());
        second = Convert.ToDateTime(mm.ToString() + "/" + dt.ToString() + "/" + yy.ToString());

        SqlDataSource4.SelectParameters["first"].DefaultValue = first.ToString();
        SqlDataSource4.SelectParameters["second"].DefaultValue = second.ToString();

        GridView1.DataSource = SqlDataSource4;
        GridView1.DataBind();
    }
    protected void LinkButton4_Click(object sender, EventArgs e)
    {
        DateTime live = Convert.ToDateTime(mon.SelectedValue.ToString() + "/1/" + year.SelectedItem.Text.ToString());
        DateTime sec;
        Int32 dd = DateTime.DaysInMonth(live.Year, live.Month);
        sec = Convert.ToDateTime(live.Month.ToString() + "/" + dd.ToString() + "/" + live.Year.ToString());
        Response.Redirect("sale_depo_report.aspx?first=" + live.ToString() + "&second=" + sec.ToString() + "&div=" + DropDownList1.SelectedItem.Text);
    }
}