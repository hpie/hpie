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

public partial class div : System.Web.UI.Page
{
    String msg = ""; 
    protected void Page_Load(object sender, EventArgs e)
    {
        if (!Page.IsPostBack)
        {

            session();
        }
    }

    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {
        string st1 = "SELECT  *from employee where ac=" + DropDownList1.SelectedValue;

        SqlDataAdapter adp1 = new SqlDataAdapter(st1, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
        DataSet ds1 = new DataSet();
        adp1.Fill(ds1);
        Label1.Text = ds1.Tables[0].Rows[0]["name"].ToString();
        Label2.Text = "";
    }

    private void session()
    {
        for (Int32 y = 2008; y < DateTime.Now.Year + 1; y++)
        {
            DropDownList2.Items.Add(y.ToString() + "-" + Convert.ToInt32(y + 1));
        }
    }

    protected void Button1_Click(object sender, EventArgs e)
    {
        DateTime sdate = Convert.ToDateTime("04/01/" + DropDownList2.SelectedItem.Text);
        //DateTime edate = Convert.ToDateTime("03/31/" + session.Substring(5, 4));
        String ac = DropDownList1.SelectedItem.Text;
        triggerRecalculation(DropDownList1.SelectedItem.Text.ToString(), sdate);

        triggerRecalculationBoardShare(DropDownList1.SelectedItem.Text.ToString(), sdate);

        if (msg.Equals(""))
        {
            msg = "Recalculation Done, Please check the records";
        }
        Label2.Text = msg;
    }


    protected void triggerRecalculation(String account, DateTime sdate)
    {
        try
        {
            //String session = DropDownList1.SelectedItem.Text;
            //DateTime sdate = Convert.ToDateTime("04/01/" + DropDownList1.SelectedItem.Text);
            //DateTime edate = Convert.ToDateTime("03/31/" + session.Substring(5, 4));
            //String ac = DropDownList3.SelectedItem.Text;

            SqlConnection conn = new SqlConnection(ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
            SqlCommand sqlComm = new SqlCommand("employeeEpfBalanceCalculation", conn);
            sqlComm.Parameters.AddWithValue("@account", account);
            sqlComm.Parameters.AddWithValue("@year", sdate);
            sqlComm.CommandType = CommandType.StoredProcedure;

            conn.Open();
            int rowAffected = sqlComm.ExecuteNonQuery();
            conn.Close();
        }
        catch (SqlException ex)
        {
            msg += "CPF Calculation Error : ";
            msg += ex.Message.ToString();
            //Console.WriteLine("SQL Error " + msg);
        }

    }

    protected void triggerRecalculationBoardShare(String account, DateTime sdate)
    {
        try
        {
            //String session = DropDownList1.SelectedItem.Text;
            //DateTime sdate = Convert.ToDateTime("04/01/" + DropDownList1.SelectedItem.Text);
            //DateTime edate = Convert.ToDateTime("03/31/" + session.Substring(5, 4));
            //String ac = DropDownList3.SelectedItem.Text;

            SqlConnection conn = new SqlConnection(ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
            SqlCommand sqlComm = new SqlCommand("employeeEpfSharedBalanceCalculation", conn);
            sqlComm.Parameters.AddWithValue("@account", account);
            sqlComm.Parameters.AddWithValue("@year", sdate);
            sqlComm.CommandType = CommandType.StoredProcedure;

            conn.Open();
            int rowAffected = sqlComm.ExecuteNonQuery();
            conn.Close();
        }
        catch (SqlException ex)
        {
            msg += "BoardShare Calculation Error : ";
            msg += ex.Message.ToString();
            //Console.WriteLine("SQL Error" + msg);
        }
    }

}
