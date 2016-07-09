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
using System.IO;
using System.Text;
public partial class detail : System.Web.UI.Page
{    
     protected void Page_Load(object sender, EventArgs e)
    {
        if (!Page.IsPostBack)
        {
            session();
          //  bind();
        }
    }
    

    private void session()
    {
        for (Int32 y = 2008; y < DateTime.Now.Year + 1; y++)
        {
            DropDownList2.Items.Add(y.ToString() + "-" + Convert.ToInt32(y + 1));
        }
    }
    private void bind()
    {
        ArrayList arr = new ArrayList();
        arr.Add("APRIL");
        arr.Add("MAY");
        arr.Add("JUNE");
        arr.Add("JULY");
        arr.Add("AUGUST");
        arr.Add("SEPTEMBER");
        arr.Add("OCTOBER");
        arr.Add("NOVEMBER");
        arr.Add("DECEMBER");
        arr.Add("JANUARY");
        arr.Add("FEBRUARY");
        arr.Add("MARCH"); 
    }

   
    
    protected void Button1_Click(object sender, EventArgs e)
    {
        table.Visible = true;

        String session = DropDownList2.SelectedItem.Text;
        DateTime sdate = Convert.ToDateTime("04/01/" + session.Substring(0, 4));
        DateTime edate = Convert.ToDateTime("03/31/" + session.Substring(5, 4));
        String ac = DropDownList1.SelectedValue;


        LabelSession.Text = session;
        String empSql = "SELECT * from employee where ac=" + ac;

        SqlDataAdapter empAdp = new SqlDataAdapter(empSql, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
        DataSet empDs = new DataSet();
        empAdp.Fill(empDs);
        LabelName.Text = empDs.Tables[0].Rows[0]["name"].ToString();
        LabelDesignation.Text = empDs.Tables[0].Rows[0]["des"].ToString();
        LabelAccountNo.Text = empDs.Tables[0].Rows[0]["ac"].ToString();


        String reportSql = "SELECT * from employee_opening_balance where ac='" + ac + "' and Year_End_Balance='" + edate + "'";
        SqlDataAdapter reportAdp = new SqlDataAdapter(reportSql, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
        DataSet reportDs = new DataSet();
        reportAdp.Fill(reportDs);

        LabelBalanceOn.Text = sdate.ToString();
        LabelBalance.Text = reportDs.Tables[0].Rows[0]["opening_balance"].ToString();
        LabelRefundAdvance.Text = reportDs.Tables[0].Rows[0]["Total_Subription_Recovery"].ToString();
        LabelInterestDuringYear.Text = reportDs.Tables[0].Rows[0]["yearly_interest"].ToString();
        LabelTotal.Text = reportDs.Tables[0].Rows[0]["balance_end_of_year"].ToString();
        LabelWithdrawl.Text = reportDs.Tables[0].Rows[0]["total_advance"].ToString();
        LabelCreditMonth.Text = "31 March";
        LabelCredit.Text = reportDs.Tables[0].Rows[0]["balance_end_of_year"].ToString();
        
        bind(); 
    }
    
}
