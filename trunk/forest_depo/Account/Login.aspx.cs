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
        //FormsAuthentication.SignOut();
        //Response.Cache.SetNoStore();
        ////RegisterHyperLink.NavigateUrl = "Register.aspx?ReturnUrl=" + HttpUtility.UrlEncode(Request.QueryString["ReturnUrl"]);
    }
    protected void LoginButton_Click(object sender, EventArgs e)
    {
        
        SqlConnection con = new SqlConnection();
        //string hh = "select *from tbuser where uname='" + Login1.UserName + "' and upass='" + Encrypt(Login1.Password, true).ToString() + "'";
        con.ConnectionString = ConfigurationManager.ConnectionStrings["forest_depoConnectionString"].ConnectionString;
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

            FormsAuthenticationTicket tkt = new FormsAuthenticationTicket(1, LoginUser.UserName, DateTime.Now, DateTime.Now.AddHours(2), false, dr[3].ToString(), FormsAuthentication.FormsCookiePath);
            string st1;
            st1 = FormsAuthentication.Encrypt(tkt);
            HttpCookie ck = new HttpCookie(FormsAuthentication.FormsCookieName, st1);
            Response.Cookies.Add(ck);
            string role = dr[3].ToString();

            //if (dr[3].ToString() == "admin".ToString())
            //{
            //    //Response.Redirect("focus1/admin/");
                Session["start_a"] = "start";
                if (dr["role"].ToString() == "admin")
                {
                    Response.Redirect("../admin/speces_size_type.aspx");
                }
                if (dr["role"].ToString() == "admin2")
                {
                    Response.Redirect("../admin2/auc_cal.aspx");
                }
                if (dr["role"].ToString() == "admin3")
                {
                    Response.Redirect("../admin3/gate_pass.aspx");
                }
                if (dr["role"].ToString() == "admin4")
                {
                    Response.Redirect("../admin4/");
                }
              

            }
        //    else
        //    {
        //        Session["start_u"] = "start";
        //        // Response.Redirect("focus1/user/");
        //        Response.Redirect("user/");
        //    }
        //}

        else
        {
             //LoginUser.FailureText= "Wrong UserName or Password";
             Response.Redirect("error.aspx");
        }
    }
    protected void LoginUser_Authenticate(object sender, AuthenticateEventArgs e)
    {
        SqlConnection con = new SqlConnection();
        //string hh = "select *from tbuser where uname='" + Login1.UserName + "' and upass='" + Encrypt(Login1.Password, true).ToString() + "'";
        con.ConnectionString = ConfigurationManager.ConnectionStrings["forest_depoConnectionString"].ConnectionString;
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

            FormsAuthenticationTicket tkt = new FormsAuthenticationTicket(1, LoginUser.UserName, DateTime.Now, DateTime.Now.AddHours(2), false, dr[3].ToString(), FormsAuthentication.FormsCookiePath);
            string st1;
            st1 = FormsAuthentication.Encrypt(tkt);
            HttpCookie ck = new HttpCookie(FormsAuthentication.FormsCookieName, st1);
            Response.Cookies.Add(ck);
            string role = dr[3].ToString();

            //if (dr[3].ToString() == "admin".ToString())
            //{
            //    //Response.Redirect("focus1/admin/");
            Session["start_a"] = "start";
            if (dr["role"].ToString() == "admin")
            {
                Response.Redirect("../admin/speces_size_type.aspx");
            }
            if (dr["role"].ToString() == "admin2")
            {
                Response.Redirect("../admin2/auc_cal.aspx");
            }
            if (dr["role"].ToString() == "admin3")
            {
                Response.Redirect("../admin3/gate_pass.aspx");
            }
            if (dr["role"].ToString() == "admin4")
            {
                Response.Redirect("../admin4/");
            }


        }
        //    else
        //    {
        //        Session["start_u"] = "start";
        //        // Response.Redirect("focus1/user/");
        //        Response.Redirect("user/");
        //    }
        //}

        else
        {
            LoginUser.FailureText = "Wrong UserName or Password";
            //Response.Redirect("error.aspx");
        }
    }
}
