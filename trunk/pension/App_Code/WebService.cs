using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Services;
using System.Data.SqlClient;
using System.Data;
using System.Configuration;
/// <summary>
/// Summary description for WebService
/// </summary>
[WebService(Namespace = "http://tempuri.org/")]
[WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
// To allow this Web Service to be called from script, using ASP.NET AJAX, uncomment the following line. 
// [System.Web.Script.Services.ScriptService]
public class WebService : System.Web.Services.WebService {

    public WebService () {

        //Uncomment the following line if using designed components 
        //InitializeComponent(); 
    }

    [WebMethod]
    public string HelloWorld() {
        return "Hello World";
    }
    public string[] GetCountryInfo(string prefixText)
{
 int count = 10;
 string sql = "Select * from joining Where user1=@prefixText";
 SqlDataAdapter da = new SqlDataAdapter(sql,ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
 da.SelectCommand.Parameters.Add("@prefixText", SqlDbType.VarChar, 50).Value = prefixText;
 DataTable dt = new DataTable();
 da.Fill(dt);
 string[] items = new string[dt.Rows.Count];
 int i = 0;
 foreach (DataRow dr in dt.Rows)
 {
  items.SetValue(dr["ppno"].ToString(),i);
  i++;
 }
 return items;
} 
    
}
