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
    Int32 cc = 0;
    decimal t = 0, t1 = 0, t2 = 0, t3 = 0, t4 = 0, t5 = 0, t6 = 0;
    Int32 row_count = 0;
    Int32 a1 = 0;
    decimal total = 0;
    decimal tot = 0, tot1 = 0, tot2 = 0, fw = 0;
    decimal check = 2;
    decimal check1 = 2;
    DateTime ddate;
    DateTime dd125;
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
        //GridView1.DataSource = arr;
        //GridView1.DataBind();
        bindGridviewData();
    }


    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {

    }

    protected void Button1_Click(object sender, EventArgs e)
    {
        row_count = 0;
        a1 = 0;
        total = 0;
        tot = 0; tot1 = 0; tot2 = 0;
        
        String session = DropDownList2.SelectedItem.Text;
        DateTime sdate = Convert.ToDateTime("04/01/" + session.Substring(0, 4));
        DateTime edate = Convert.ToDateTime("03/31/" + session.Substring(5, 4));
        String ac = DropDownList1.SelectedItem.Text;
        LabelSession.Text = DropDownList2.SelectedItem.Text;
        LabelAccountNo.Text = DropDownList1.SelectedItem.Text;
        
        string empSql = "SELECT * from employee where ac='" + DropDownList1.SelectedValue + "'";
        SqlDataAdapter empAdp = new SqlDataAdapter(empSql, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
        DataSet empDs = new DataSet();
        empAdp.Fill(empDs);

        LabelName.Text = empDs.Tables[0].Rows[0]["name"].ToString();
        LabelDesignation.Text = empDs.Tables[0].Rows[0]["des"].ToString();
        
        bind();
        //Label13.Text = ((Convert.ToDecimal(Label9.Text) + Convert.ToDecimal(Label10.Text) + Convert.ToDecimal(Label11.Text)) - Convert.ToDecimal(Label12.Text)).ToString();

        // Get Opening balance and other details
        string balanceSql = "SELECT * from employee_share_opening_balance where AC='" + DropDownList1.SelectedValue + "' AND Year_End_Balance='" + edate + "'";
        SqlDataAdapter balAdp = new SqlDataAdapter(balanceSql, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
        DataSet balDs = new DataSet();
        balAdp.Fill(balDs);


        try
        {
           LabelFSession.Text = DropDownList2.SelectedItem.Text;

            if (balDs.Tables[0].Rows.Count == 0)
            {
                LabelShareOpeningBalance.Text = "0";
                LabelFShareOpeningBalance.Text = "0";

                LabelFShareInterest.Text = "0";

                LabelFAdvance.Text = "0";

                LabelFShareFinalPayment.Text = "0";
                LabelFShareCurrentBalance.Text = "0";

                bind();
            }
            else
            {
                LabelShareOpeningBalance.Text = balDs.Tables[0].Rows[0]["Share_Opening_Balance"].ToString();
                LabelFShareOpeningBalance.Text = balDs.Tables[0].Rows[0]["Share_Opening_Balance"].ToString(); //BALANCE FROM PREVIOUS YEAR

                LabelFShareInterest.Text = balDs.Tables[0].Rows[0]["Yearly_Interest"].ToString();  // INTEREST FOR

                LabelFAdvance.Text = balDs.Tables[0].Rows[0]["Total_Final_Withdrawal"].ToString();  //LESS ADVANCES/WITHDRAWLS(-)

                LabelFShareFinalPayment.Text = balDs.Tables[0].Rows[0]["Total"].ToString(); // DEPOSITS AND REFUNDS
                LabelFShareCurrentBalance.Text = balDs.Tables[0].Rows[0]["Share_Balance_End_Of_Year"].ToString(); //BALANCE AS ON

                bind();
            }

        }
        catch (Exception ex)
        {
            //Control dataDiv = FindControl("datadiv");
            //datadiv.InnerHtml = ex.ToString();
        }


        // bind();

    }

    protected void bindGridviewData()
    {
        //ob
        String session = DropDownList2.SelectedItem.Text;
        DateTime sdate = Convert.ToDateTime("04/01/" + session.Substring(0, 4));
        DateTime edate = Convert.ToDateTime("03/31/" + session.Substring(5, 4));
        String ac = LabelAccountNo.Text;


        try
        {
            SqlConnection conn = new SqlConnection(ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
            SqlCommand sqlComm = new SqlCommand("employeeShareCPF", conn);
            sqlComm.Parameters.AddWithValue("@account", ac);
            sqlComm.Parameters.AddWithValue("@date", sdate);
            sqlComm.CommandType = CommandType.StoredProcedure;

            conn.Open();

            int rowAffected = sqlComm.ExecuteNonQuery();

            SqlDataAdapter adp1 = new SqlDataAdapter(sqlComm);

            DataSet ds = new DataSet();
            adp1.Fill(ds);

            if (ds.Tables[0].Rows.Count == 0)
            {
                ds.Tables[0].Rows.Add(ds.Tables[0].NewRow());
                boardShareGridView.DataSource = ds;
                boardShareGridView.DataBind();
                int columncount = boardShareGridView.Rows[0].Cells.Count;
                boardShareGridView.Rows[0].Cells.Clear();
                boardShareGridView.Rows[0].Cells.Add(new TableCell());
                boardShareGridView.Rows[0].Cells[0].ColumnSpan = columncount;
                boardShareGridView.Rows[0].Cells[0].Text = "No Records Found";
            }
            else
            {
                boardShareGridView.DataSource = ds;
                boardShareGridView.DataBind();
            }

            conn.Close();
        }
        catch (Exception ex)
        {
            //Control dataDiv = FindControl("datadiv");
            //datadiv.InnerHtml = ex.ToString();
        }
    }

    protected void boardShareGridView_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        Label9.Text = "0".ToString();
        Label10.Text = "0".ToString();
        Label11.Text = "0".ToString();
        Label12.Text = "0".ToString();
        Label6.Text = "0".ToString();


        DateTime recordDate;
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            // if not last row
            if (!e.Row.Cells[1].Text.Equals(" "))
            {
                recordDate = DateTime.ParseExact(e.Row.Cells[1].Text, "yyyy-MM-dd", null);
                e.Row.Cells[1].Text = recordDate.ToString("MMM");
                //e.Row.Cells[10].Text = "if";
            }
            else
            {
                e.Row.Cells[1].Text = "<b> Total </b>";
                e.Row.Cells[2].Text = "<b>" + e.Row.Cells[2].Text + "</b>";
                e.Row.Cells[3].Text = "<b>" + e.Row.Cells[3].Text + "</b>";
                e.Row.Cells[4].Text = "<b>" + e.Row.Cells[4].Text + "</b>";
                e.Row.Cells[5].Text = "<b>" + e.Row.Cells[5].Text + "</b>";
                

                // calculate interest
                //decimal sumForYear = Convert.ToDecimal(e.Row.Cells[8].Text);
                //decimal tempInterest = (sumForYear * 8) / 1200;
                //decimal intForYear = Math.Round(tempInterest,0);

                // make bold
                e.Row.Cells[6].Text = "<b>" + e.Row.Cells[6].Text + "</b>";


                

                
                //LabelFCurrentBalance = (LabelFOpeningBalance.Text + LabelFDepositRefunds.Text + LabelFInterest.Text) - LabelFAdvance.Text;
            }

        }
    }


    public static void GenerateExcel(GridView grdSource)
    {

        StringBuilder sbDocBody = new StringBuilder(); ;
        try
        {
            // Declare Styles
            sbDocBody.Append("<style>");
            sbDocBody.Append(".Header {  background-color:Navy; color:#ffffff; font-weight:bold;font-family:Verdana; font-size:12px;}");
            sbDocBody.Append(".SectionHeader { background-color:#8080aa; color:#ffffff; font-family:Verdana; font-size:12px;font-weight:bold;}");
            sbDocBody.Append(".Content { background-color:#ccccff; color:#000000; font-family:Verdana; font-size:12px;text-align:left}");
            sbDocBody.Append(".Label { background-color:#ccccee; color:#000000; font-family:Verdana; font-size:12px; text-align:right;}");
            sbDocBody.Append("</style>");
            //
            StringBuilder sbContent = new StringBuilder(); ;

            sbDocBody.Append("<br><table align=\"center\" cellpadding=1 cellspacing=0 style=\"background-color:#000000;\">");
            sbDocBody.Append("<tr><td width=\"500\">");
            sbDocBody.Append("<table width=\"100%\" cellpadding=1 cellspacing=2 style=\"background-color:#ffffff;\">");

            // Populate the Employee Details

            //
            if (grdSource.Rows.Count > 0)
            {
                sbDocBody.Append("<tr><td>");
                // Inner Table for Employee Details
                sbDocBody.Append("<table width=\"600\" cellpadding=\"0\" cellspacing=\"2\"><tr><td>");
                //
                // Add Column Headers
                sbDocBody.Append("<tr><td width=\"25\"> </td></tr>");
                sbDocBody.Append("<tr>");
                sbDocBody.Append("<td> </td>");
                for (int i = 0; i < grdSource.Columns.Count; i++)
                {
                    sbDocBody.Append("<td class=\"Header\" width=\"120\">" + grdSource.Columns[i].HeaderText + "</td>");
                }
                sbDocBody.Append("</tr>");
                //
                // Add Data Rows
                for (int i = 0; i < grdSource.Rows.Count; i++)
                {
                    sbDocBody.Append("<tr>");
                    sbDocBody.Append("<td> </td>");
                    for (int j = 0; j < grdSource.Columns.Count; j++)
                    {
                        if (grdSource.Rows[i].Cells[j].Controls.Count == 0)
                        {
                            sbDocBody.Append("<td class=\"Content\">" + grdSource.Rows[i].Cells[j].Text + "</td>");
                        }
                        else
                        {
                            if (grdSource.Rows[i].Cells[j].Controls[1].ToString() == "System.Web.UI.WebControls.LinkButton")
                            {
                                LinkButton lnkBtn = (LinkButton)grdSource.Rows[i].Cells[j].Controls[1];
                                sbDocBody.Append("<td class=\"Content\">" + lnkBtn.Text + "</td>");
                            }
                            else if (grdSource.Rows[i].Cells[j].Controls[1].ToString() == "System.Web.UI.WebControls.Label")
                            {
                                Label lblData = (Label)grdSource.Rows[i].Cells[j].Controls[1];
                                sbDocBody.Append("<td class=\"Content\">" + lblData.Text + "</td>");
                            }
                        }
                    }
                    sbDocBody.Append("</tr>");
                }
                sbDocBody.Append("</table>");
                sbDocBody.Append("</td></tr></table>");
                sbDocBody.Append("</td></tr></table>");
            }
            //
            HttpContext.Current.Response.Clear();
            HttpContext.Current.Response.Buffer = true;
            //
            HttpContext.Current.Response.AppendHeader("Content-Type", "application/ms-excel");
            HttpContext.Current.Response.AppendHeader("Content-disposition", "attachment; filename=EmployeeDetails.xls");
            HttpContext.Current.Response.Write(sbDocBody.ToString());
            HttpContext.Current.Response.End();
        }
        catch (Exception ex)
        {
            // Ignore this error as this is caused due to termination of the Response Stream.
        }
    }


    protected void LinkButton2_Click(object sender, EventArgs e)
    {

        string attachment = "attachment; filename=Contacts.xls";

        Response.ClearContent();

        Response.AddHeader("content-disposition", attachment);

        Response.ContentType = "application/ms-excel";

        StringWriter sw = new StringWriter();

        HtmlTextWriter htw = new HtmlTextWriter(sw);

        HtmlForm frm = new HtmlForm();

        boardShareGridView.Parent.Controls.Add(frm);

        frm.Attributes["runat"] = "server";

        frm.Controls.Add(boardShareGridView);

        frm.RenderControl(htw);

        Response.Write(sw.ToString());

        Response.End();


    }


    protected void GridView1_RowCreated(object sender, GridViewRowEventArgs e)
    {


    }
}
