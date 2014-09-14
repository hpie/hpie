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
public partial class empdetail : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
            session();
    }
    private void session()
    {
        for (Int32 y = 2000; y < DateTime.Now.Year + 1; y++)
        {
            //DropDownList3.Items.Add(y.ToString() + "-" + Convert.ToInt32(y + 1));
            DateTime dt = Convert.ToDateTime("04/01/" + y);
DropDownList3.Items.Add(new ListItem(y.ToString() + "-" + Convert.ToInt32(y + 1),dt.ToString()));
//DropDownList3.Items.Add(new ListItem(dt.ToString(), dt.ToString()));
       
        }
    }
    protected void Button4_Click(object sender, EventArgs e)
    {
        Button1.Enabled = true;
        TextBox1.Text = "";
        TextBox2.Text = "";
        TextBox3.Text = "";
    }
    protected void ListBox1_SelectedIndexChanged(object sender, EventArgs e)
    {
        DataView dv = (DataView)(SqlDataSource4.Select(DataSourceSelectArguments.Empty));
        TextBox1.Text = dv.Table.Rows[0][1].ToString();
        TextBox2.Text = dv.Table.Rows[0][2].ToString();
        TextBox3.Text = dv.Table.Rows[0][3].ToString();
        DropDownList1.Items.FindByValue(dv.Table.Rows[0][4].ToString());
        DropDownList2.Items.FindByValue(dv.Table.Rows[0][5].ToString());
        DropDownList3.Items.FindByValue(dv.Table.Rows[0][6].ToString());
        Button2.Enabled = true;
        Button3.Enabled = true;
        Button1.Enabled = false;
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        Label1.Text = "";
       // string st12 = "SELECT date, During_Year, Recovery_o_adv FROM cpf where date<'" + sdate + "' and ac=" + ac + "; SELECT  * FROM cpf_detail where date<'" + sdate + "' and ac=" + ac;
        string st12 = "select *from employee where ac='" + TextBox1.Text+"'";

        SqlDataAdapter adp12 = new SqlDataAdapter(st12, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
        DataSet ds12 = new DataSet();
        adp12.Fill(ds12);
        if (ds12.Tables[0].Rows.Count == 0)
        {
            SqlDataSource3.Insert();
            //TextBox1.Text = "";
            //TextBox2.Text = "";
            //TextBox3.Text = "";
            Response.Redirect("empdetail.aspx");
        }
        else
        {
            Label1.Text = TextBox1.Text + " Ac Already Exists";
        }
      
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        SqlDataSource3.Update();
        Response.Redirect("empdetail.aspx");
    }
    protected void Button3_Click(object sender, EventArgs e)
    {
        SqlDataSource3.Delete();
        TextBox1.Text = "";
        TextBox2.Text = "";
        TextBox3.Text = "";
    }
    protected void Button5_Click(object sender, EventArgs e)
    {
        DataView dv = (DataView)(SqlDataSource4.Select(DataSourceSelectArguments.Empty));
        TextBox1.Text = dv.Table.Rows[0][1].ToString();
        TextBox2.Text = dv.Table.Rows[0][2].ToString();
        TextBox3.Text = dv.Table.Rows[0][3].ToString();
        TextBox4.Text = dv.Table.Rows[0]["share_ob"].ToString();
        TextBox5.Text = dv.Table.Rows[0]["ins_ob"].ToString();
        DropDownList1.Items.FindByValue(DropDownList1.SelectedValue).Selected = false; ;
        DropDownList1.Items.FindByValue(dv.Table.Rows[0][4].ToString()).Selected = true; ;
        DropDownList2.Items.FindByValue(DropDownList2.SelectedValue).Selected = false;
        DropDownList2.Items.FindByValue(dv.Table.Rows[0][5].ToString()).Selected=true;
        DateTime yy =Convert.ToDateTime( dv.Table.Rows[0]["session"].ToString());
        //string yy1 = yy.ToString("MM/dd/yyyy");
        DropDownList3.Items.FindByValue(DropDownList3.SelectedValue).Selected = false;
        DropDownList3.Items.FindByValue(dv.Table.Rows[0]["session"].ToString()).Selected = true; ;
        Button2.Enabled = true;
        Button3.Enabled = true;
        Button1.Enabled = false;
    }
}
