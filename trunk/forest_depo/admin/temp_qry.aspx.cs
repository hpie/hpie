using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.SqlClient;
using System.Configuration;
using System.Data;

public partial class temp_qry : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        Label1.Text = "";
        SqlConnection con = new SqlConnection();
        con.ConnectionString = ConfigurationManager.ConnectionStrings["forest_depoConnectionString"].ConnectionString;
        con.Open();
        SqlCommand cmd = new SqlCommand();
        cmd.CommandText = TextBox1.Text.ToString();
        cmd.Connection = con;
        cmd.ExecuteNonQuery();
        TextBox1.Text = "";
        cmd.Dispose();
        con.Close();
        Label1.Text = "successfully..";
        GridView1.DataSource = null;
        GridView1.DataBind();
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        try
        {
            Label1.Text = "";
            SqlDataAdapter sdp = new SqlDataAdapter(TextBox1.Text, ConfigurationManager.ConnectionStrings["forest_depoConnectionString"].ConnectionString);
            DataSet ds = new DataSet();
            sdp.Fill(ds);
            GridView1.DataSource = ds;
            GridView1.DataBind();
        }
        catch (Exception t)
        {
            Label1.Text = t.Message.ToString();
        }
    }
}