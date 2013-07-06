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
using System.Globalization;
using System.Threading;
public partial class login : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        
    }
    private Int32 checkuser(string u, string p)
    {
        SqlConnection con = new SqlConnection(ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
        con.Open();
        SqlCommand cmd = new SqlCommand("login", con);
        cmd.CommandType = CommandType.StoredProcedure;
        cmd.Parameters.Add("@u", SqlDbType.VarChar, 50).Value = u;
        cmd.Parameters.Add("@p", SqlDbType.VarChar, 50).Value = p;
        SqlParameter p1 = new SqlParameter("@ret", SqlDbType.Int);
        p1.Direction = ParameterDirection.ReturnValue;
        cmd.Parameters.Add(p1);
        cmd.ExecuteReader();
        Int32 k = Convert.ToInt32(cmd.Parameters["@ret"].Value);
        return k;

    }
    protected void Login1_Authenticate(object sender, AuthenticateEventArgs e)
    {
        Int32 r = Convert.ToInt32(checkuser(Login1.UserName, Login1.Password));
        if (r == 1)
        {
            Login1.FailureText = "Wrong Employee ID";

        }
        if (r == 2)
        {
            CultureInfo cultureInfo = Thread.CurrentThread.CurrentCulture;
            TextInfo textInfo = cultureInfo.TextInfo;
            SqlDataAdapter adp111 = new SqlDataAdapter("select *from tblogin where user_id='" + Login1.UserName + "' and password='" + Login1.Password + "'", ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
            DataSet ds111 = new DataSet();
            adp111.Fill(ds111);
            if (ds111.Tables[0].Rows.Count != 0)
            {
                string unam1 = textInfo.ToTitleCase(Login1.UserName).ToString();
                FormsAuthenticationTicket tkt = new FormsAuthenticationTicket(1, unam1, DateTime.Now, DateTime.Now.AddHours(2), false, ds111.Tables[0].Rows[0]["role"].ToString(), FormsAuthentication.FormsCookiePath);
                string st1;
                st1 = FormsAuthentication.Encrypt(tkt);
                HttpCookie ck = new HttpCookie(FormsAuthentication.FormsCookieName, st1);
                Response.Cookies.Add(ck);
                string role = ds111.Tables[0].Rows[0]["role"].ToString();
                if (role == "admin")
                {
                    Response.Redirect("Admin/ob.aspx");
                }
                if (role == "RS")
                {
                    Response.Redirect("Resin section/fc01.aspx");
                }
                if (role == "PS")
                {
                    Response.Redirect("Production Section (Rosin and T.oil)/fc07.aspx");
                }
                if (role == "DS")
                {
                    Response.Redirect("Dispatch Section/fc14.aspx");

                }
                if (role == "PS1")
                {
                    Response.Redirect("Production Section (Black Japan, Varnish, Phenyl)/fc09.aspx");   
                }
                if (role == "SB")
                {
                    Response.Redirect("Sales Branch/fc13.aspx");   

                }
                if (role == "LB")
                {
                    //Response.Redirect("Laboratory/ob.aspx");  
                }
                if (role == "SS")
                {
                    Response.Redirect("Store Section/store.aspx");
                }
               
            }
          
        }
        if (r == 3)
        {
            Login1.FailureText = "Wrong Password";
        }
    }
}
