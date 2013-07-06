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
            SqlDataSource1.SelectParameters["User1"].DefaultValue = user.ToString();
            FormsIdentity fi;
            fi = (FormsIdentity)(User.Identity);
            FormsAuthenticationTicket tkt;
            tkt = fi.Ticket;

            ud = tkt.UserData;
            SqlDataSource1.SelectParameters["User1"].DefaultValue = user.ToString();
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
        }
    }
    private void bind()
    {
        string st = "";
        if (ud == "adm")
        {
            st = "SELECT Joining.Ppno, Joining.First, Joining.Last, Nominee.CPS, Nominee.Nominee, Nominee.Address, Nominee.NBirth_Date, Nominee.Relition, Nominee.Share, Nominee.Gar_Address, Joining.Panno, Joining.BirthDate, Joining.GPF, Nominee.remarks FROM Joining INNER JOIN Nominee ON Joining.Ppno = Nominee.PPO ";

        }
        else
        {
            st = "SELECT Joining.Ppno, Joining.First, Joining.Last, Nominee.CPS, Nominee.Nominee, Nominee.Address, Nominee.NBirth_Date, Nominee.Relition, Nominee.Share, Nominee.Gar_Address, Joining.Panno, Joining.BirthDate, Joining.GPF, Nominee.remarks FROM Joining INNER JOIN Nominee ON Joining.Ppno = Nominee.PPO WHERE Nominee.User1 ='" + User.Identity.Name.ToString() +"'";

        }
        //string st = "SELECT Joining.Ppno, Joining.First, Joining.Last, Nominee.CPS, Nominee.Nominee, Nominee.Address, Nominee.NBirth_Date, Nominee.Relition, Nominee.Share, Nominee.Gar_Address, Joining.Panno, Joining.BirthDate, Joining.GPF, Nominee.remarks FROM Joining INNER JOIN Nominee ON Joining.Ppno = Nominee.PPO WHERE Nominee.User1 ='" + User.Identity.Name.ToString() + "' and nominee.ppo='"+TextBox1.Text+"'";
        SqlDataAdapter adp2 = new SqlDataAdapter(st, ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        DataSet ds2 = new DataSet();
        adp2.Fill(ds2);

        GridView1.DataSource = ds2;
        GridView1.DataBind();
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        string st = "";
        if (ud == "adm")
        {
            st = "SELECT Joining.Ppno, Joining.First, Joining.Last, Nominee.CPS, Nominee.Nominee, Nominee.Address, Nominee.NBirth_Date, Nominee.Relition, Nominee.Share, Nominee.Gar_Address, Joining.Panno, Joining.BirthDate, Joining.GPF, Nominee.remarks FROM Joining INNER JOIN Nominee ON Joining.Ppno = Nominee.PPO WHERE  nominee.ppo='" + TextBox1.Text + "'";

        }
        else
        {
            st = "SELECT Joining.Ppno, Joining.First, Joining.Last, Nominee.CPS, Nominee.Nominee, Nominee.Address, Nominee.NBirth_Date, Nominee.Relition, Nominee.Share, Nominee.Gar_Address, Joining.Panno, Joining.BirthDate, Joining.GPF, Nominee.remarks FROM Joining INNER JOIN Nominee ON Joining.Ppno = Nominee.PPO WHERE Nominee.User1 ='" + User.Identity.Name.ToString() + "' and nominee.ppo='" + TextBox1.Text + "'";

        }
        //string st = "SELECT Joining.Ppno, Joining.First, Joining.Last, Nominee.CPS, Nominee.Nominee, Nominee.Address, Nominee.NBirth_Date, Nominee.Relition, Nominee.Share, Nominee.Gar_Address, Joining.Panno, Joining.BirthDate, Joining.GPF, Nominee.remarks FROM Joining INNER JOIN Nominee ON Joining.Ppno = Nominee.PPO WHERE Nominee.User1 ='" + User.Identity.Name.ToString() + "' and nominee.ppo='"+TextBox1.Text+"'";
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
             st = "SELECT Joining.Ppno, Joining.First, Joining.Last, Nominee.CPS, Nominee.Nominee, Nominee.Address, Nominee.NBirth_Date, Nominee.Relition, Nominee.Share, Nominee.Gar_Address, Joining.Panno, Joining.BirthDate, Joining.GPF, Nominee.remarks FROM Joining INNER JOIN Nominee ON Joining.Ppno = Nominee.PPO";

         }
         else
         {
           st = "SELECT Joining.Ppno, Joining.First, Joining.Last, Nominee.CPS, Nominee.Nominee, Nominee.Address, Nominee.NBirth_Date, Nominee.Relition, Nominee.Share, Nominee.Gar_Address, Joining.Panno, Joining.BirthDate, Joining.GPF, Nominee.remarks FROM Joining INNER JOIN Nominee ON Joining.Ppno = Nominee.PPO WHERE Nominee.User1 ='" + User.Identity.Name.ToString() + "'";

         }
        //string st = "SELECT Joining.Ppno, Joining.First, Joining.Last, Nominee.CPS, Nominee.Nominee, Nominee.Address, Nominee.NBirth_Date, Nominee.Relition, Nominee.Share, Nominee.Gar_Address, Joining.Panno, Joining.BirthDate, Joining.GPF, Nominee.remarks FROM Joining INNER JOIN Nominee ON Joining.Ppno = Nominee.PPO WHERE Nominee.User1 ='" + User.Identity.Name.ToString() + "'";
        SqlDataAdapter adp2 = new SqlDataAdapter(st, ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        DataSet ds2 = new DataSet();
        adp2.Fill(ds2);

        GridView1.DataSource = ds2;
        GridView1.DataBind();
    }
}
