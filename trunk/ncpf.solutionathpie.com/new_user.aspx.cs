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
public partial class new_user : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            TextBox1.Text = "";
            TextBox2.Text = "";
        }
    }
    protected void TextBox1_TextChanged(object sender, EventArgs e)
    {
        string st="select *from tblogin where user_id='"+TextBox1.Text+"'";
        SqlDataAdapter adp = new SqlDataAdapter(st, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables[0].Rows.Count != 0)
        {
            TextBox1.Focus();
            Label1.Text = "User ID Already Exist";
        }
        else
        {
            TextBox2.Focus();
            Label1.Text = "";
        }
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        Int32 a;
        string st = "";
        string st1 = "";
        for (a = 0; a < CheckBoxList1.Items.Count; a++)
        {
            if (CheckBoxList1.Items[a].Selected == true)
            {
                st = st + CheckBoxList1.Items[a].Value + ";";
            }
        }
        if (st != "")
        {
            st1 = st.Substring(0, st.Length - 1);

        }
        SqlDataSource2.InsertParameters["role"].DefaultValue = st1.ToString();
        SqlDataSource2.Insert();
        Label2.Text = "Record Saved";

    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        Button1.Enabled = true;
    }
    protected void Button3_Click(object sender, EventArgs e)
    {
        Int32 a;
        string st = "";
        string st1 = "admin";
        for (a = 0; a < CheckBoxList1.Items.Count; a++)
        {
            if (CheckBoxList1.Items[a].Selected == true)
            {
                st = st + CheckBoxList1.Items[a].Value + ";";
            }
        }
        if (st != "")
        {
            st1 = st.Substring(0, st.Length - 1);

        }

        if (TextBox2.Text != "")
        {
            SqlDataSource2.UpdateParameters["password"].DefaultValue = TextBox2.Text.ToString();
        }
        else
        {
            SqlDataSource2.UpdateParameters["password"].DefaultValue = Label3.Text.ToString();

        }
        SqlDataSource2.UpdateParameters["role"].DefaultValue = st1.ToString();
        SqlDataSource2.Update();
        Label2.Text = "Record Updated";
    }
    protected void Button4_Click(object sender, EventArgs e)
    {
        SqlDataSource2.Delete();
        Label2.Text = "Record Deleted";
    }
    protected void ListBox1_SelectedIndexChanged(object sender, EventArgs e)
    {
        Button3.Enabled = true;
        Button4.Enabled = true;

        DataView dv = (DataView)(SqlDataSource3.Select(DataSourceSelectArguments.Empty));
      
        TextBox1.Text = dv.Table.Rows[0]["user_id"].ToString();
        TextBox2.Text = dv.Table.Rows[0]["password"].ToString();
        Label3.Text = dv.Table.Rows[0]["password"].ToString();
        string jj = dv.Table.Rows[0]["role"].ToString();
        string[] arr=jj.Split(';');
        for (Int32 i1 = 0; i1 < CheckBoxList1.Items.Count; i1++)
        {
            CheckBoxList1.Items[i1].Selected = false;
        }
        for (Int32 i = 0; i < CheckBoxList1.Items.Count; i++)
        {
            for (Int32 j = 0; j < arr.Length; j++)
            {
                if (arr[j].ToString() == CheckBoxList1.Items[i].Value.ToString())
                {
                    CheckBoxList1.Items[i].Selected = true;
                }
            }
        }
    }
}
