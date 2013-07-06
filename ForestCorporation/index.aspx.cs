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
public partial class index : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        Response.Cookies["abc"].Expires = DateTime.Now;
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
    protected void Button2_Click(object sender, EventArgs e)
    {
        Int32 r = Convert.ToInt32(checkuser(TextBox1.Text ,TextBox2.Text));
        if (r == 1)
        {
        Label1.Text= "Wrong Employee ID";

        }
        if (r == 2)
        {
            SqlDataAdapter adp111 = new SqlDataAdapter("select *from tblogin where user_id='" + TextBox1.Text  + "' and password='" + TextBox2.Text + "'", ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
            DataSet ds111 = new DataSet();
            adp111.Fill(ds111);
            if (ds111.Tables[0].Rows.Count != 0)
            {
                FormsAuthenticationTicket tkt = new FormsAuthenticationTicket(1, TextBox1.Text, DateTime.Now, DateTime.Now.AddHours(2), false, ds111.Tables[0].Rows[0]["role"].ToString(), FormsAuthentication.FormsCookiePath);
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
                    Response.Redirect("Laboratory/fc02.aspx");  
                }
                if (role == "SS")
                {
                    Response.Redirect("Store Section/store.aspx");
                }
                if (role == "RE")
                {
                    Response.Redirect("report/monthly.aspx");
                }


            }

        }
        if (r == 3)
        {
           Label1.Text = "Wrong Password";
        }
    }

    
}

