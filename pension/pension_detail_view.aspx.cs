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
using System.Text;
using System.IO;
using System.Data.SqlClient;
public partial class Joining_view : System.Web.UI.Page
{
    public Int32 sr;
    string ud;
    protected void Page_Load(object sender, EventArgs e)
    {
        string user = User.Identity.Name.ToString();
       
        //if (ud == "user")
        //{

        //   // SqlDataSource1.SelectCommand = "SELECT dbo.Joining.Ppno, dbo.Joining.First, dbo.Joining.Last, dbo.Joining.Panno, dbo.Joining.BirthDate, dbo.Joining.GPF, dbo.info.Personnel_No, dbo.info.Start_date, dbo.info.End_date, dbo.info.Status, dbo.info.Family_member, dbo.info.FFrist, dbo.info.FLast, dbo.info.PPNo AS Expr1, dbo.info.Fbirth_date, dbo.info.Bank_option, dbo.Bank_Detail.Bank_name, dbo.Bank_Detail.Bank_City, dbo.Bank_Detail.Branch_code, dbo.Bank_Detail.Bank_branch, dbo.info.Personnal_area, dbo.info.Medical_all, dbo.info.Comm_per, dbo.info.Retirment, dbo.info.Quali_Service_yy, dbo.info.Quali_Service_mm, dbo.info.Quali_Service_dd, dbo.info.Six_month, dbo.info.Pay_scale, dbo.info.Exst_pension, dbo.info.Revi_scal, dbo.info.Rev_amt, dbo.info.Rev_pay_scale, dbo.info.Con_pension, dbo.info.Rev_pension, dbo.info.Add_pension, dbo.info.Pension, dbo.info.Ext_pension, dbo.info.Fam_pension, dbo.info.PB_GP, dbo.info.FP_Au, dbo.info.Addtion_Pn FROM dbo.Joining INNER JOIN dbo.info ON dbo.Joining.Ppno = dbo.info.PPNo INNER JOIN dbo.Bank_Detail ON dbo.info.PPNo = dbo.Bank_Detail.PPO_NO where info.user1='" + user + "'";
        //    //SqlDataSource1.SelectParameters["User1"].DefaultValue = user.ToString();
        //}
        //else if (ud == "adm")
        //{
        //   // SqlDataSource1.SelectCommand = "SELECT dbo.Joining.Ppno, dbo.Joining.First, dbo.Joining.Last, dbo.Joining.Panno, dbo.Joining.BirthDate, dbo.Joining.GPF, dbo.info.Personnel_No, dbo.info.Start_date, dbo.info.End_date, dbo.info.Status, dbo.info.Family_member, dbo.info.FFrist, dbo.info.FLast, dbo.info.PPNo AS Expr1, dbo.info.Fbirth_date, dbo.info.Bank_option, dbo.Bank_Detail.Bank_name, dbo.Bank_Detail.Bank_City, dbo.Bank_Detail.Branch_code, dbo.Bank_Detail.Bank_branch, dbo.info.Personnal_area, dbo.info.Medical_all, dbo.info.Comm_per, dbo.info.Retirment, dbo.info.Quali_Service_yy, dbo.info.Quali_Service_mm, dbo.info.Quali_Service_dd, dbo.info.Six_month, dbo.info.Pay_scale, dbo.info.Exst_pension, dbo.info.Revi_scal, dbo.info.Rev_amt, dbo.info.Rev_pay_scale, dbo.info.Con_pension, dbo.info.Rev_pension, dbo.info.Add_pension, dbo.info.Pension, dbo.info.Ext_pension, dbo.info.Fam_pension, dbo.info.PB_GP, dbo.info.FP_Au, dbo.info.Addtion_Pn FROM dbo.Joining INNER JOIN dbo.info ON dbo.Joining.Ppno = dbo.info.PPNo INNER JOIN dbo.Bank_Detail ON dbo.info.PPNo = dbo.Bank_Detail.PPO_NO";

        //}
        if (user != "")
        {
            FormsIdentity fi;
            fi = (FormsIdentity)(User.Identity);
            FormsAuthenticationTicket tkt;
            tkt = fi.Ticket;
          
            ud = tkt.UserData;
        }
        else
        {
            Response.Redirect("default.aspx");
        }
        bind();
    }
    public string getdate(DateTime dr)
    {
        if (dr != null)
        {
            return dr.ToString("dd.MM.yyyy");
        }
        else
        {
            return "";
        }
    }

    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        Response.Clear();
        Response.AddHeader("content-disposition", "attachment;filename=GridView1.xls");
        Response.Charset = "";
        Response.ContentType = "application/vnd.xls";
        StringWriter StringWriter = new System.IO.StringWriter();
        HtmlTextWriter HtmlTextWriter = new HtmlTextWriter(StringWriter);
        GridView1.RenderControl(HtmlTextWriter);
        Response.Write(StringWriter.ToString());
        Response.End();
    }
    public override void VerifyRenderingInServerForm(Control control)
    {

        /* Verifies that a Form control was rendered */

    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        sr = sr + 1;
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
           
            if (((Label)(e.Row.FindControl("Label1"))).Text != "")
            {
                ((Label)(e.Row.FindControl("Label1"))).Text = getdate(Convert.ToDateTime(((Label)(e.Row.FindControl("Label1"))).Text)).ToString();
            }
            if (((Label)(e.Row.FindControl("Label2"))).Text != "")
            {
                ((Label)(e.Row.FindControl("Label2"))).Text = getdate(Convert.ToDateTime(((Label)(e.Row.FindControl("Label2"))).Text)).ToString();
            }
            if (((Label)(e.Row.FindControl("Label3"))).Text != "")
            {
                ((Label)(e.Row.FindControl("Label3"))).Text = getdate(Convert.ToDateTime(((Label)(e.Row.FindControl("Label3"))).Text)).ToString();
            }
            if (((Label)(e.Row.FindControl("Label16"))).Text != "")
            {
                ((Label)(e.Row.FindControl("Label16"))).Text = getdate(Convert.ToDateTime(((Label)(e.Row.FindControl("Label16"))).Text)).ToString();
            }
        }
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        string st = "";
        if (ud == "adm")
        {
            st = "SELECT dbo.Joining.Ppno, dbo.Joining.First, dbo.Joining.Last, dbo.Joining.Panno, dbo.Joining.BirthDate, dbo.Joining.GPF, dbo.info.Personnel_No, dbo.info.Start_date, dbo.info.End_date, dbo.info.Status, dbo.info.Family_member, dbo.info.FFrist, dbo.info.FLast, dbo.info.PPNo AS Expr1, dbo.info.Fbirth_date, dbo.info.Bank_option, dbo.Bank_Detail.Bank_name, dbo.Bank_Detail.Bank_City, dbo.Bank_Detail.Branch_code, dbo.Bank_Detail.Bank_branch, dbo.info.Personnal_area, dbo.info.Medical_all, dbo.info.Comm_per, dbo.info.Retirment, dbo.info.Quali_Service_yy, dbo.info.Quali_Service_mm, dbo.info.Quali_Service_dd, dbo.info.Six_month, dbo.info.Pay_scale, dbo.info.Exst_pension, dbo.info.Revi_scal, dbo.info.Rev_amt, dbo.info.Rev_pay_scale, dbo.info.Con_pension, dbo.info.Rev_pension, dbo.info.Add_pension, dbo.info.Pension, dbo.info.Ext_pension, dbo.info.Fam_pension, dbo.info.PB_GP, dbo.info.FP_Au, dbo.info.Addtion_Pn FROM dbo.Joining INNER JOIN dbo.info ON dbo.Joining.Ppno = dbo.info.PPNo INNER JOIN dbo.Bank_Detail ON dbo.info.PPNo = dbo.Bank_Detail.PPO_NO where  info.ppno='" + TextBox1.Text + "'";

        }
        else
        {
            st = "SELECT dbo.Joining.Ppno, dbo.Joining.First, dbo.Joining.Last, dbo.Joining.Panno, dbo.Joining.BirthDate, dbo.Joining.GPF, dbo.info.Personnel_No, dbo.info.Start_date, dbo.info.End_date, dbo.info.Status, dbo.info.Family_member, dbo.info.FFrist, dbo.info.FLast, dbo.info.PPNo AS Expr1, dbo.info.Fbirth_date, dbo.info.Bank_option, dbo.Bank_Detail.Bank_name, dbo.Bank_Detail.Bank_City, dbo.Bank_Detail.Branch_code, dbo.Bank_Detail.Bank_branch, dbo.info.Personnal_area, dbo.info.Medical_all, dbo.info.Comm_per, dbo.info.Retirment, dbo.info.Quali_Service_yy, dbo.info.Quali_Service_mm, dbo.info.Quali_Service_dd, dbo.info.Six_month, dbo.info.Pay_scale, dbo.info.Exst_pension, dbo.info.Revi_scal, dbo.info.Rev_amt, dbo.info.Rev_pay_scale, dbo.info.Con_pension, dbo.info.Rev_pension, dbo.info.Add_pension, dbo.info.Pension, dbo.info.Ext_pension, dbo.info.Fam_pension, dbo.info.PB_GP, dbo.info.FP_Au, dbo.info.Addtion_Pn FROM dbo.Joining INNER JOIN dbo.info ON dbo.Joining.Ppno = dbo.info.PPNo INNER JOIN dbo.Bank_Detail ON dbo.info.PPNo = dbo.Bank_Detail.PPO_NO WHERE info.User1 ='" + User.Identity.Name.ToString() + "' and info.ppno='" + TextBox1.Text + "'";

        }
        //string st = "SELECT Joining.Ppno, Joining.First, Joining.Last, Nominee.CPS, Nominee.Nominee, Nominee.Address, Nominee.NBirth_Date, Nominee.Relition, Nominee.Share, Nominee.Gar_Address, Joining.Panno, Joining.BirthDate, Joining.GPF, Nominee.remarks FROM Joining INNER JOIN Nominee ON Joining.Ppno = Nominee.PPO WHERE Nominee.User1 ='" + User.Identity.Name.ToString() + "' and nominee.ppo='"+TextBox1.Text+"'";
        SqlDataAdapter adp2 = new SqlDataAdapter(st, ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        DataSet ds2 = new DataSet();
        adp2.Fill(ds2);

        GridView1.DataSource = ds2;
        GridView1.DataBind();
    }
    private void bind()
    {
        string st = "";
        if (ud == "adm")
        {
            st = "SELECT dbo.Joining.Ppno, dbo.Joining.First, dbo.Joining.Last, dbo.Joining.Panno, dbo.Joining.BirthDate, dbo.Joining.GPF, dbo.info.Personnel_No, dbo.info.Start_date, dbo.info.End_date, dbo.info.Status, dbo.info.Family_member, dbo.info.FFrist, dbo.info.FLast, dbo.info.PPNo AS Expr1, dbo.info.Fbirth_date, dbo.info.Bank_option, dbo.Bank_Detail.Bank_name, dbo.Bank_Detail.Bank_City, dbo.Bank_Detail.Branch_code, dbo.Bank_Detail.Bank_branch, dbo.info.Personnal_area, dbo.info.Medical_all, dbo.info.Comm_per, dbo.info.Retirment, dbo.info.Quali_Service_yy, dbo.info.Quali_Service_mm, dbo.info.Quali_Service_dd, dbo.info.Six_month, dbo.info.Pay_scale, dbo.info.Exst_pension, dbo.info.Revi_scal, dbo.info.Rev_amt, dbo.info.Rev_pay_scale, dbo.info.Con_pension, dbo.info.Rev_pension, dbo.info.Add_pension, dbo.info.Pension, dbo.info.Ext_pension, dbo.info.Fam_pension, dbo.info.PB_GP, dbo.info.FP_Au, dbo.info.Addtion_Pn FROM dbo.Joining INNER JOIN dbo.info ON dbo.Joining.Ppno = dbo.info.PPNo INNER JOIN dbo.Bank_Detail ON dbo.info.PPNo = dbo.Bank_Detail.PPO_NO";

        }
        else
        {
            st = "SELECT dbo.Joining.Ppno, dbo.Joining.First, dbo.Joining.Last, dbo.Joining.Panno, dbo.Joining.BirthDate, dbo.Joining.GPF, dbo.info.Personnel_No, dbo.info.Start_date, dbo.info.End_date, dbo.info.Status, dbo.info.Family_member, dbo.info.FFrist, dbo.info.FLast, dbo.info.PPNo AS Expr1, dbo.info.Fbirth_date, dbo.info.Bank_option, dbo.Bank_Detail.Bank_name, dbo.Bank_Detail.Bank_City, dbo.Bank_Detail.Branch_code, dbo.Bank_Detail.Bank_branch, dbo.info.Personnal_area, dbo.info.Medical_all, dbo.info.Comm_per, dbo.info.Retirment, dbo.info.Quali_Service_yy, dbo.info.Quali_Service_mm, dbo.info.Quali_Service_dd, dbo.info.Six_month, dbo.info.Pay_scale, dbo.info.Exst_pension, dbo.info.Revi_scal, dbo.info.Rev_amt, dbo.info.Rev_pay_scale, dbo.info.Con_pension, dbo.info.Rev_pension, dbo.info.Add_pension, dbo.info.Pension, dbo.info.Ext_pension, dbo.info.Fam_pension, dbo.info.PB_GP, dbo.info.FP_Au, dbo.info.Addtion_Pn FROM dbo.Joining INNER JOIN dbo.info ON dbo.Joining.Ppno = dbo.info.PPNo INNER JOIN dbo.Bank_Detail ON dbo.info.PPNo = dbo.Bank_Detail.PPO_NO WHERE info.User1 ='" + User.Identity.Name.ToString() + "'";

        }
        //string st = "SELECT Joining.Ppno, Joining.First, Joining.Last, Nominee.CPS, Nominee.Nominee, Nominee.Address, Nominee.NBirth_Date, Nominee.Relition, Nominee.Share, Nominee.Gar_Address, Joining.Panno, Joining.BirthDate, Joining.GPF, Nominee.remarks FROM Joining INNER JOIN Nominee ON Joining.Ppno = Nominee.PPO WHERE Nominee.User1 ='" + User.Identity.Name.ToString() + "'";
        SqlDataAdapter adp2 = new SqlDataAdapter(st, ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        DataSet ds2 = new DataSet();
        adp2.Fill(ds2);

        GridView1.DataSource = ds2;
        GridView1.DataBind();
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        string st = "";
        if (ud == "adm")
        {
            st = "SELECT dbo.Joining.Ppno, dbo.Joining.First, dbo.Joining.Last, dbo.Joining.Panno, dbo.Joining.BirthDate, dbo.Joining.GPF, dbo.info.Personnel_No, dbo.info.Start_date, dbo.info.End_date, dbo.info.Status, dbo.info.Family_member, dbo.info.FFrist, dbo.info.FLast, dbo.info.PPNo AS Expr1, dbo.info.Fbirth_date, dbo.info.Bank_option, dbo.Bank_Detail.Bank_name, dbo.Bank_Detail.Bank_City, dbo.Bank_Detail.Branch_code, dbo.Bank_Detail.Bank_branch, dbo.info.Personnal_area, dbo.info.Medical_all, dbo.info.Comm_per, dbo.info.Retirment, dbo.info.Quali_Service_yy, dbo.info.Quali_Service_mm, dbo.info.Quali_Service_dd, dbo.info.Six_month, dbo.info.Pay_scale, dbo.info.Exst_pension, dbo.info.Revi_scal, dbo.info.Rev_amt, dbo.info.Rev_pay_scale, dbo.info.Con_pension, dbo.info.Rev_pension, dbo.info.Add_pension, dbo.info.Pension, dbo.info.Ext_pension, dbo.info.Fam_pension, dbo.info.PB_GP, dbo.info.FP_Au, dbo.info.Addtion_Pn FROM dbo.Joining INNER JOIN dbo.info ON dbo.Joining.Ppno = dbo.info.PPNo INNER JOIN dbo.Bank_Detail ON dbo.info.PPNo = dbo.Bank_Detail.PPO_NO";

        }
        else
        {
            st = "SELECT dbo.Joining.Ppno, dbo.Joining.First, dbo.Joining.Last, dbo.Joining.Panno, dbo.Joining.BirthDate, dbo.Joining.GPF, dbo.info.Personnel_No, dbo.info.Start_date, dbo.info.End_date, dbo.info.Status, dbo.info.Family_member, dbo.info.FFrist, dbo.info.FLast, dbo.info.PPNo AS Expr1, dbo.info.Fbirth_date, dbo.info.Bank_option, dbo.Bank_Detail.Bank_name, dbo.Bank_Detail.Bank_City, dbo.Bank_Detail.Branch_code, dbo.Bank_Detail.Bank_branch, dbo.info.Personnal_area, dbo.info.Medical_all, dbo.info.Comm_per, dbo.info.Retirment, dbo.info.Quali_Service_yy, dbo.info.Quali_Service_mm, dbo.info.Quali_Service_dd, dbo.info.Six_month, dbo.info.Pay_scale, dbo.info.Exst_pension, dbo.info.Revi_scal, dbo.info.Rev_amt, dbo.info.Rev_pay_scale, dbo.info.Con_pension, dbo.info.Rev_pension, dbo.info.Add_pension, dbo.info.Pension, dbo.info.Ext_pension, dbo.info.Fam_pension, dbo.info.PB_GP, dbo.info.FP_Au, dbo.info.Addtion_Pn FROM dbo.Joining INNER JOIN dbo.info ON dbo.Joining.Ppno = dbo.info.PPNo INNER JOIN dbo.Bank_Detail ON dbo.info.PPNo = dbo.Bank_Detail.PPO_NO WHERE info.User1 ='" + User.Identity.Name.ToString() + "'";

        }
        //string st = "SELECT Joining.Ppno, Joining.First, Joining.Last, Nominee.CPS, Nominee.Nominee, Nominee.Address, Nominee.NBirth_Date, Nominee.Relition, Nominee.Share, Nominee.Gar_Address, Joining.Panno, Joining.BirthDate, Joining.GPF, Nominee.remarks FROM Joining INNER JOIN Nominee ON Joining.Ppno = Nominee.PPO WHERE Nominee.User1 ='" + User.Identity.Name.ToString() + "'";
        SqlDataAdapter adp2 = new SqlDataAdapter(st, ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        DataSet ds2 = new DataSet();
        adp2.Fill(ds2);

        GridView1.DataSource = ds2;
        GridView1.DataBind();
    }
}
