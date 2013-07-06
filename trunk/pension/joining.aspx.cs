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
public partial class joining : System.Web.UI.Page
{
  string user="";
string ud="";
    protected void Page_Load(object sender, EventArgs e)
    {

          user = User.Identity.Name.ToString();
          if (user!="")
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

    }
    private void bind()
    {
        SqlDataAdapter adp = new SqlDataAdapter("select *from joining where PPno='" + TextBox16.Text + "' and user1='" + user + "'", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables[0].Rows.Count != 0)
        {
            Button3.Visible = true;
            Button1.Visible = false;
            TextBox16.Enabled = false;
            TextBox1.Text = ds.Tables[0].Rows[0]["panno"].ToString();
            TextBox2.Text = ds.Tables[0].Rows[0]["gpf"].ToString();
            TextBox3.Text = ds.Tables[0].Rows[0]["ppno"].ToString();
            if (ds.Tables[0].Rows[0]["joindate"].ToString() != "")
            {
                TextBox4.Text = Convert.ToDateTime(ds.Tables[0].Rows[0]["joindate"]).ToString("dd/MM/yyyy");
            }
            if (ds.Tables[0].Rows[0]["birthdate"].ToString() != "")
            {
                TextBox5.Text = Convert.ToDateTime(ds.Tables[0].Rows[0]["birthdate"]).ToString("dd/MM/yyyy");
            }
            TextBox6.Text = ds.Tables[0].Rows[0]["Last"].ToString();
            TextBox7.Text = ds.Tables[0].Rows[0]["First"].ToString();
            if (ds.Tables[0].Rows[0]["married_since"].ToString() != "")
            {
                TextBox8.Text = Convert.ToDateTime(ds.Tables[0].Rows[0]["married_since"]).ToString("dd/MM/yyyy");
            }
            TextBox9.Text = ds.Tables[0].Rows[0]["no_child"].ToString();
            TextBox7.Text = ds.Tables[0].Rows[0]["remark"].ToString();
            DropDownList1.Items.FindByValue(DropDownList1.SelectedValue).Selected = false;
            DropDownList1.Items.FindByValue(ds.Tables[0].Rows[0]["idtype"].ToString()).Selected = true;


            DropDownList2.Items.FindByValue(DropDownList2.SelectedValue).Selected = false;
            DropDownList2.Items.FindByValue(ds.Tables[0].Rows[0]["personnelarea"].ToString()).Selected = true;


            DropDownList3.Items.FindByValue(DropDownList3.SelectedValue).Selected = false;
            DropDownList3.Items.FindByValue(ds.Tables[0].Rows[0]["employee_group"].ToString()).Selected = true;

           // DropDownList4.Items.FindByValue(DropDownList4.SelectedValue).Selected = false;
           // DropDownList4.Items.FindByValue(ds.Tables[0].Rows[0]["employee_sub"].ToString()).Selected = true;

            DropDownList5.Items.FindByValue(DropDownList5.SelectedValue).Selected = false;
            DropDownList5.Items.FindByValue(ds.Tables[0].Rows[0]["title"].ToString()).Selected = true;


            DropDownList6.Items.FindByValue(DropDownList6.SelectedValue).Selected = false;
            DropDownList6.Items.FindByValue(ds.Tables[0].Rows[0]["gender"].ToString()).Selected = true;


            //DropDownList7.Items.FindByValue(DropDownList7.SelectedValue).Selected = false;
            //DropDownList7.Items.FindByValue(ds.Tables[0].Rows[0]["matrial_status"].ToString()).Selected = true;

            //DropDownList8.Items.FindByValue(DropDownList8.SelectedValue).Selected = false;
            //DropDownList8.Items.FindByValue(ds.Tables[0].Rows[0]["personnel_subarea"].ToString()).Selected = true;
        }
        else
        {
            TextBox16.Enabled = true;
            TextBox1.Text = "".ToString();
            TextBox2.Text = "".ToString();
            TextBox3.Text = "".ToString();
            TextBox4.Text = "".ToString();
            TextBox5.Text = "".ToString();
            TextBox6.Text = "".ToString();
        }
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        SqlDataAdapter adp = new SqlDataAdapter("select *from joining where PPno='HPSEB-" + TextBox3.Text.ToString() + "'", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables[0].Rows.Count == 0)
        {
            if (TextBox4.Text != "")
            {
                SqlDataSource9.InsertParameters["joindate"].DefaultValue = DateTime.Parse(TextBox4.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
            }
            if (TextBox5.Text != "")
            {
                SqlDataSource9.InsertParameters["birthdate"].DefaultValue = DateTime.Parse(TextBox5.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
            }
            if (TextBox8.Text != "")
            {
                SqlDataSource9.InsertParameters["married_since"].DefaultValue = DateTime.Parse(TextBox8.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
            }
            SqlDataSource9.InsertParameters["PPNO"].DefaultValue = "HPSEB-" + TextBox3.Text;

      SqlDataSource9.InsertParameters["User1"].DefaultValue = user.ToString();

            SqlDataSource9.Insert();
            Response.Redirect("joining.aspx");
            Label1.Text = "Record Saved";
        }
        else
        {
            Label1.Text = TextBox1.Text + " Already Exists";
        }
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        Response.Redirect("joining_view.aspx");
    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        string dt = TextBox15.Text;
        string[] arr = dt.Split('/');
        Int32 yy = Convert.ToInt32(arr[2]);
        Int32 yy1 = Convert.ToInt32(TextBox12.Text);
        yy = yy-yy1;
        TextBox4.Text = "01/01/" + yy.ToString();
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        bind();
    }
    protected void Button4_Click(object sender, EventArgs e)
    {
        //Button1.Visible = true;
        //TextBox1.Text = "".ToString();
        //TextBox2.Text = "".ToString();
        //TextBox3.Text = "".ToString();
        //TextBox4.Text = "".ToString();
        //TextBox5.Text = "".ToString();
        //TextBox6.Text = "".ToString();
        //TextBox7.Text = "".ToString();
        //TextBox8.Text = "".ToString();
        //TextBox9.Text = "".ToString();
        //TextBox10.Text = "".ToString();
        //TextBox14.Text = "".ToString();
        //TextBox12.Text = "".ToString();
        //TextBox13.Text = "".ToString();
        //TextBox15.Text = "".ToString();


    }
    protected void Button3_Click(object sender, EventArgs e)
    {
        if (TextBox4.Text != "")
        {
            SqlDataSource9.UpdateParameters["joindate"].DefaultValue = DateTime.Parse(TextBox4.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
        }
        if (TextBox5.Text != "")
        {
            SqlDataSource9.UpdateParameters["birthdate"].DefaultValue = DateTime.Parse(TextBox5.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
        }
        if (TextBox8.Text != "")
        {
            SqlDataSource9.UpdateParameters["married_since"].DefaultValue = DateTime.Parse(TextBox8.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
        }
      //  SqlDataSource9.InsertParameters["User1"].DefaultValue = user.ToString();

        SqlDataSource9.Update();
        Label1.Text = "Record Update";
    }
}
