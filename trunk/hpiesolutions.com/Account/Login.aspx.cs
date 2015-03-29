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
using System.Data.SqlClient;
using System.Security.Cryptography;
public partial class Account_Login : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        //Session.Remove("start_a");
        FormsAuthentication.SignOut();
        Response.Cache.SetNoStore();
        //RegisterHyperLink.NavigateUrl = "Register.aspx?ReturnUrl=" + HttpUtility.UrlEncode(Request.QueryString["ReturnUrl"]);
    }
    private void trac()
    {

        string EventTimeZoneId = "India Standard Time"; // for instance, this should be stored in DB as varchar[32]
        DateTime EventLocalTime = TimeZoneInfo.ConvertTimeBySystemTimeZoneId(DateTime.UtcNow, EventTimeZoneId);
        SqlDataSource1.InsertParameters["login_id"].DefaultValue = LoginUser.UserName.ToString();
        SqlDataSource1.InsertParameters["date"].DefaultValue = EventLocalTime.ToString();
        SqlDataSource1.InsertParameters["location"].DefaultValue = Request.ServerVariables["REMOTE_ADDR"].ToString();
        SqlDataSource1.InsertParameters["system_type"].DefaultValue = Request.Browser.Platform.ToString() + ", " + HttpContext.Current.Request.Browser.Type.ToString();
        SqlDataSource1.InsertParameters["result"].DefaultValue = "Sucessfull".ToString();
        SqlDataSource1.InsertParameters["city"].DefaultValue = "";
        SqlDataSource1.InsertParameters["state"].DefaultValue = "";
        SqlDataSource1.InsertParameters["country"].DefaultValue = "";
        SqlDataSource1.Insert();
    }
    private void trac2()
    {

        string EventTimeZoneId = "India Standard Time"; // for instance, this should be stored in DB as varchar[32]
        DateTime EventLocalTime = TimeZoneInfo.ConvertTimeBySystemTimeZoneId(DateTime.UtcNow, EventTimeZoneId);
        SqlDataSource1.InsertParameters["login_id"].DefaultValue = LoginUser.UserName.ToString();
        SqlDataSource1.InsertParameters["date"].DefaultValue = EventLocalTime.ToString();
        SqlDataSource1.InsertParameters["location"].DefaultValue = Request.ServerVariables["REMOTE_ADDR"].ToString();
        SqlDataSource1.InsertParameters["system_type"].DefaultValue = Request.Browser.Platform.ToString() + ", " + HttpContext.Current.Request.Browser.Type.ToString();
        SqlDataSource1.InsertParameters["result"].DefaultValue = "Unsuccessfull..".ToString();
        SqlDataSource1.InsertParameters["city"].DefaultValue = "";
        SqlDataSource1.InsertParameters["state"].DefaultValue = "";
        SqlDataSource1.InsertParameters["country"].DefaultValue = "";
        SqlDataSource1.Insert();
    }

    protected void LoginButton_Click1(object sender, EventArgs e)
    {
        SqlConnection con = new SqlConnection();
        //string hh = "select *from tbuser where uname='" + Login1.UserName + "' and upass='" + Encrypt(Login1.Password, true).ToString() + "'";
        con.ConnectionString = ConfigurationManager.ConnectionStrings["hpieConnectionString"].ConnectionString;
        con.Open();
        SqlCommand cmd = new SqlCommand();
        cmd.CommandText = "user_log";
        cmd.CommandType = CommandType.StoredProcedure;
        cmd.Connection = con;
        cmd.Parameters.Add("@un", SqlDbType.VarChar, 50).Value = LoginUser.UserName.ToString();
        cmd.Parameters.Add("@up", SqlDbType.VarChar, 50).Value = LoginUser.Password.ToString();
        SqlDataReader dr = cmd.ExecuteReader();
        dr.Read();
        if (dr.HasRows)
        {

            FormsAuthenticationTicket tkt = new FormsAuthenticationTicket(1, LoginUser.UserName, DateTime.Now, DateTime.Now.AddMinutes(160), false, dr["role"].ToString(), FormsAuthentication.FormsCookiePath);
            string st1;
            st1 = FormsAuthentication.Encrypt(tkt);
            HttpCookie ck = new HttpCookie(FormsAuthentication.FormsCookieName, st1);
            Response.Cookies.Add(ck);
            trac();
            string cc1 = dr[5].ToString();
            Session["start_a"] = dr[5].ToString();

            if (dr["role"].ToString() == "admin")
            {
                Response.Redirect("~/admin/reportcard_all.aspx");
            }
            if (dr["role"].ToString() == "user")
            {
                Response.Redirect("~/user/Details.aspx");
            }
            if (dr["role"].ToString() == "support")
            {
                Response.Redirect("~/support/");
            }
            if (dr["role"].ToString() == "rep")
            {
                Response.Redirect("~/reports/reportcard_all.aspx");
            }
        }

        else
        {
            trac2();
            //Label1.Text = "Wrong UserName or Password";
        }
    }
    protected void LoginUser_Authenticate(object sender, AuthenticateEventArgs e)
    {
        SqlConnection con = new SqlConnection();
        //string hh = "select *from tbuser where uname='" + Login1.UserName + "' and upass='" + Encrypt(Login1.Password, true).ToString() + "'";
        con.ConnectionString = ConfigurationManager.ConnectionStrings["hpieConnectionString"].ConnectionString;
        con.Open();
        SqlCommand cmd = new SqlCommand();
        cmd.CommandText = "user_log";
        cmd.CommandType = CommandType.StoredProcedure;
        cmd.Connection = con;
        cmd.Parameters.Add("@un", SqlDbType.VarChar, 50).Value = LoginUser.UserName.ToString();
        cmd.Parameters.Add("@up", SqlDbType.VarChar, 50).Value = LoginUser.Password.ToString();
        SqlDataReader dr = cmd.ExecuteReader();
        dr.Read();
        if (dr.HasRows)
        {

            FormsAuthenticationTicket tkt = new FormsAuthenticationTicket(1, LoginUser.UserName, DateTime.Now, DateTime.Now.AddMinutes(160), false, dr["role"].ToString(), FormsAuthentication.FormsCookiePath);
            string st1;
            st1 = FormsAuthentication.Encrypt(tkt);
            HttpCookie ck = new HttpCookie(FormsAuthentication.FormsCookieName, st1);
            Response.Cookies.Add(ck);
            trac();
            string cc1 = dr[5].ToString();
            Session["start_a"] = dr[5].ToString();

            if (dr["role"].ToString() == "admin")
            {
                Response.Redirect("~/admin/reportcard_all.aspx");
            }
            if (dr["role"].ToString() == "user")
            {
                Response.Redirect("~/user/Details.aspx");
            }
            if (dr["role"].ToString() == "support")
            {
                Response.Redirect("~/support/");
            }
            if (dr["role"].ToString() == "rep")
            {
                Response.Redirect("~/reports/reportcard_all.aspx");
            }
        }

        else
        {
            trac2();
            //Label1.Text = "Wrong UserName or Password";
        }
    }
}
