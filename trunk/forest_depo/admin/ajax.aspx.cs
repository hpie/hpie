using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Configuration;
using System.Data;
using System.Data.SqlClient;
using System.Collections.Generic;
public partial class ajax : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {

    }

    /// <summary>
    /// Summary description for WebService
    /// </summary>
    [WebService(Namespace = "http://tempuri.org/")]
    [WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
    // To allow this Web Service to be called from script, using ASP.NET AJAX, uncomment the following line.
    [System.Web.Script.Services.ScriptService]
    public class WebService : System.Web.Services.WebService
    {
        public WebService()
        {
            //Uncomment the following line if using designed components
            //InitializeComponent();
        }
        [WebMethod]
        public List<string> GetCountries(string prefixText)
        {
            SqlConnection con = new SqlConnection(ConfigurationManager.ConnectionStrings["dbconnection"].ToString());
            con.Open();
            SqlCommand cmd = new SqlCommand("select * from Country where CountryName like @Name+'%'", con);
            cmd.Parameters.AddWithValue("@Name", prefixText);
            SqlDataAdapter da = new SqlDataAdapter(cmd);
            DataTable dt = new DataTable();
            da.Fill(dt);
            List<string> CountryNames = new List<string>();
            for (int i = 0; i < dt.Rows.Count; i++)
            {
                CountryNames.Add(dt.Rows[i][1].ToString());
            }
            return CountryNames;
        }
    }
}