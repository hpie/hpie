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
    public Int32 sr = 0;
     string ud;
    protected void Page_Load(object sender, EventArgs e)
    {
        string user = User.Identity.Name.ToString();
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
        //if (!Page.IsPostBack)
        //{
            bind();
        //}
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
        Response.AddHeader("content-disposition", "attachment;filename=GridView2.xls");
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
        }
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        bind();
    }
    private void bind()
    {
        string st = "";
        if (ud == "adm")
        {
            st = "SELECT Joining.First,joining.personnelarea,joining.personnel_subarea,joining.employee_group,joining.employee_sub, Joining.Last, Joining.Panno, Joining.BirthDate, Joining.GPF, Other_Action.ActionType, Other_Action.Start_Date, Other_Action.End_Date, Other_Action.Action_Reason, Other_Action.Position, Other_Action.PA, Other_Action.Group1, Other_Action.Sub_Group1, Other_Action.PSA, Other_Action.Payroll_Area, Other_Action.Remarks, Other_Action.PPONo, Other_Action.CPSNo FROM Joining INNER JOIN Other_Action ON Joining.Ppno = Other_Action.PPONo";

        }
        else
        {
            st = "SELECT Joining.First,joining.personnelarea,joining.personnel_subarea,joining.employee_group,joining.employee_sub,Joining.Last, Joining.Panno, Joining.BirthDate, Joining.GPF, Other_Action.ActionType, Other_Action.Start_Date, Other_Action.End_Date, Other_Action.Action_Reason, Other_Action.Position, Other_Action.PA, Other_Action.Group1, Other_Action.Sub_Group1, Other_Action.PSA, Other_Action.Payroll_Area, Other_Action.Remarks, Other_Action.PPONo, Other_Action.CPSNo FROM Joining INNER JOIN Other_Action ON Joining.Ppno = Other_Action.PPONo where Other_Action.User1='" + User.Identity.Name.ToString() + "'";

        }
        ////string st = "SELECT Joining.Ppno, Joining.First, Joining.Last, Nominee.CPS, Nominee.Nominee, Nominee.Address, Nominee.NBirth_Date, Nominee.Relition, Nominee.Share, Nominee.Gar_Address, Joining.Panno, Joining.BirthDate, Joining.GPF, Nominee.remarks FROM Joining INNER JOIN Nominee ON Joining.Ppno = Nominee.PPO WHERE Nominee.User1 ='" + User.Identity.Name.ToString() + "'";
        //SqlDataAdapter adp2 = new SqlDataAdapter(st, ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        //DataSet ds2 = new DataSet();
        //adp2.Fill(ds2);
        SqlDataSource2.SelectCommand = st;
        DataView dv = ((DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty)));
        GridView1.DataSource = dv;
        GridView1.DataBind();
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        string st = "";
        if (ud == "adm")
        {
            st = "SELECT Joining.First,joining.personnelarea,joining.personnel_subarea,joining.employee_group,joining.employee_sub, Joining.Last, Joining.Panno, Joining.BirthDate, Joining.GPF, Other_Action.ActionType, Other_Action.Start_Date, Other_Action.End_Date, Other_Action.Action_Reason, Other_Action.Position, Other_Action.PA, Other_Action.Group1, Other_Action.Sub_Group1, Other_Action.PSA, Other_Action.Payroll_Area, Other_Action.Remarks, Other_Action.PPONo, Other_Action.CPSNo FROM Joining INNER JOIN Other_Action ON Joining.Ppno = Other_Action.PPONo";

        }
        else
        {
            st = "SELECT Joining.First,joining.personnelarea,joining.personnel_subarea,joining.employee_group,joining.employee_sub,Joining.Last, Joining.Panno, Joining.BirthDate, Joining.GPF, Other_Action.ActionType, Other_Action.Start_Date, Other_Action.End_Date, Other_Action.Action_Reason, Other_Action.Position, Other_Action.PA, Other_Action.Group1, Other_Action.Sub_Group1, Other_Action.PSA, Other_Action.Payroll_Area, Other_Action.Remarks, Other_Action.PPONo, Other_Action.CPSNo FROM Joining INNER JOIN Other_Action ON Joining.Ppno = Other_Action.PPONo where Other_Action.User1='" + User.Identity.Name.ToString() + "'";

        }
        //string st = "SELECT Joining.Ppno, Joining.First, Joining.Last, Nominee.CPS, Nominee.Nominee, Nominee.Address, Nominee.NBirth_Date, Nominee.Relition, Nominee.Share, Nominee.Gar_Address, Joining.Panno, Joining.BirthDate, Joining.GPF, Nominee.remarks FROM Joining INNER JOIN Nominee ON Joining.Ppno = Nominee.PPO WHERE Nominee.User1 ='" + User.Identity.Name.ToString() + "'";
        SqlDataAdapter adp2 = new SqlDataAdapter(st, ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        DataSet ds2 = new DataSet();
        adp2.Fill(ds2);

        GridView1.DataSource = ds2;
        GridView1.DataBind();
    }
}
