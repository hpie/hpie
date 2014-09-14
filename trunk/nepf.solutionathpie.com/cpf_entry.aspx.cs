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
public partial class cpf_entry : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (!Page.IsPostBack)
        {
            //DropDownList3.Items.Add("----");
           
            Label1.Text = DropDownList3.SelectedValue.ToString();
            session();
            list();
           
            Button3.Enabled = false;
        }
    }
    private void list()
    {
        DateTime dt = Convert.ToDateTime(DropDownList2.SelectedValue + "/01/" + DropDownList1.SelectedValue);
        Int32 day = DateTime.DaysInMonth(Convert.ToInt32(DropDownList1.SelectedValue), Convert.ToInt32(DropDownList2.SelectedValue));

        DateTime dt1 = Convert.ToDateTime(DropDownList2.SelectedValue + "/"+day+"/" + DropDownList1.SelectedValue);
       
        SqlDataSource3.SelectParameters["date"].DefaultValue = dt.ToString();
        SqlDataSource3.SelectParameters["date1"].DefaultValue = dt1.ToString();

        DataView dv = (DataView)(SqlDataSource3.Select(DataSourceSelectArguments.Empty));
        ListBox1.DataSource = dv;
        ListBox1.DataBind();

    }
    private void session()
    {
        for (Int32 y = 2011; y < DateTime.Now.Year + 1; y++)
        {
            DropDownList1.Items.Add(y.ToString());
        }
        for (Int32 y1 = 1; y1 <=12; y1++)
        {
            DropDownList2.Items.Add(y1.ToString());
        }
    }
    protected void DropDownList3_SelectedIndexChanged(object sender, EventArgs e)
    {
         DateTime dt = Convert.ToDateTime(DropDownList2.SelectedValue + "/01/" + DropDownList1.SelectedValue);
        //SqlDataSource2.InsertParameters["date"].DefaultValue = dt.ToString();
        //SqlDataSource2.InsertParameters["div"].DefaultValue = DropDownList4.SelectedValue.ToString();
        //SqlDataSource2.InsertParameters["AC"].DefaultValue = DropDownList3.SelectedItem.Text.ToString();
        //SqlDataSource2.InsertParameters["Arear"].DefaultValue =arear.Text .ToString();
      string st="select * from cpf where ac='"+DropDownList3.SelectedItem.Text+"' and date<'"+dt+"' order by date desc";
      SqlDataAdapter adp = new SqlDataAdapter(st, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables[0].Rows.Count != 0)
        {
            // During_Year, Recovery_o_adv,date,div,Arear
            Label3.Text = ds.Tables[0].Rows[0]["During_Year"].ToString();
            Label4.Text = ds.Tables[0].Rows[0]["Recovery_o_adv"].ToString();

            Label5.Text = ds.Tables[0].Rows[0]["Arear"].ToString();

        }


        string st1 = "SELECT  *from employee where ac=" + DropDownList3.SelectedValue;



        SqlDataAdapter adp1 = new SqlDataAdapter(st1, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
        DataSet ds1 = new DataSet();
        adp1.Fill(ds1);
        Label1.Text = ds1.Tables[0].Rows[0]["name"].ToString();
        list();
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        DateTime dt = Convert.ToDateTime(DropDownList2.SelectedValue + "/01/" + DropDownList1.SelectedValue);
        SqlDataSource2.InsertParameters["date"].DefaultValue = dt.ToString();
        SqlDataSource2.InsertParameters["div"].DefaultValue = DropDownList4.SelectedValue.ToString();
        SqlDataSource2.InsertParameters["AC"].DefaultValue = DropDownList3.SelectedItem.Text.ToString();
        SqlDataSource2.InsertParameters["Arear"].DefaultValue =arear.Text .ToString();
      string st="select * from cpf_detail where ac='"+DropDownList3.SelectedItem.Text+"' and date='"+dt+"'";
      SqlDataAdapter adp = new SqlDataAdapter(st, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables[0].Rows.Count == 0)
        {
            SqlDataSource2.Insert();
        }
        else
        {
            Label2.Text = "Record Already Saved Please Update Record";
        }
        //TextBox1.Text = "0";
        //arear.Text = "0";
        //TextBox3.Text = "0";
        Label2.Text = "Record Saved";
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        TextBox1.Text = "0";
        arear.Text = "0";
        TextBox3.Text = "0";
        Label2.Text = "";
      //  Response.Redirect("cpf_entry.aspx");
        Button1.Enabled = true;
    }
    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {
        list();
    }
    protected void DropDownList2_SelectedIndexChanged(object sender, EventArgs e)
    {
        list();
    }
    protected void ListBox1_SelectedIndexChanged(object sender, EventArgs e)
    {
        Button3.Enabled = true;
        TextBox1.Text = "0";
    // TextBox4.Text = "";
        TextBox3.Text = "0";
        DataView dv = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));
        TextBox3.Text = dv.Table.Rows[0]["during_year"].ToString();
        TextBox1.Text = dv.Table.Rows[0]["recovery_o_adv"].ToString();
        arear.Text = dv.Table.Rows[0]["Arear"].ToString();
        shared.Text = dv.Table.Rows[0]["Shared"].ToString();
        //TextBox4.Text = dv.Table.Rows[0]["div"].ToString();
        DropDownList4.Items.FindByValue(DropDownList4.SelectedValue).Selected = false;
        DropDownList4.Items.FindByValue(dv.Table.Rows[0]["div"].ToString()).Selected = true;
        //if (dv.Table.Rows[0]["CPF_adv"].ToString() != "")
        //{
        //    TextBox3.Text = dv.Table.Rows[0]["CPF_adv"].ToString();
        //}
        //else
        //{
        //    TextBox3.Text = "0";
        //}
    }
    protected void Button3_Click(object sender, EventArgs e)
    {
        //DateTime dt = Convert.ToDateTime(DropDownList2.SelectedValue + "/01/" + DropDownList1.SelectedValue);
        //SqlDataSource2.UpdateParameters["date"].DefaultValue = dt.ToString();
        //SqlDataSource2.UpdateParameters["div"].DefaultValue = DropDownList4.SelectedValue.ToString();
        //SqlDataSource2.UpdateParameters["Arear"].DefaultValue = arear.Text.ToString();
        
        SqlDataSource2.Update();
        TextBox1.Text = "0";
        arear.Text = "0";
        TextBox3.Text = "0";
        Label2.Text = "Record Updated";
        list();
    }
}
