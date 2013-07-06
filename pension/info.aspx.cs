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
public partial class info : System.Web.UI.Page
{
    string user = "";
    string ud = "";
    protected void Page_Load(object sender, EventArgs e)
    {

        user = User.Identity.Name.ToString();
        if (user != "")
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
        if (Page.IsPostBack == false)
        {
           // SqlDataSource1.SelectParameters["user"].DefaultValue = User.Identity.Name;
            SqlDataAdapter adp5 = new SqlDataAdapter("select *from joining where user1='" + user + "' order by id desc", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
            DataSet ds5 = new DataSet();
            adp5.Fill(ds5);
            TextBox9.Text = ds5.Tables[0].Rows[ds5.Tables[0].Rows.Count - 1]["ppno"].ToString();
            //bind();
        }
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        Label1.Text = "";
          SqlDataAdapter adp5 = new SqlDataAdapter("select *from joining where ppno='" + TextBox9.Text + "'", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        DataSet ds5 = new DataSet();
        adp5.Fill(ds5);
        if (ds5.Tables[0].Rows.Count != 0)
        {
            string ss = "";
           
            for (Int32 j = 0; j < CheckBoxList1.Items.Count; j++)
            {
                if (CheckBoxList1.Items[j].Selected == true)
                {
                    ss = ss + CheckBoxList1.Items[j].Text + ",";
                }
            }
            ss = ss.Substring(0, ss.Length - 1);
            string[] ss1 = ss.Split(',');
            SqlDataAdapter adp = new SqlDataAdapter("select *from other_action where PPono='" + TextBox9.Text + "'", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
            DataSet ds = new DataSet();
            adp.Fill(ds);
            if (ds.Tables[0].Rows.Count == 0)
            {
                for (Int32 j = 0; j < ss1.Length; j++)
                {
                    if (ss1[j] == "SE" && TextBox1.Text != "")
                    {
                        SqlDataSource6.InsertParameters["ActionType"].DefaultValue = ss1[j].ToString();

                        if (TextBox1.Text != "")
                        {
                            SqlDataSource6.InsertParameters["Start_Date"].DefaultValue = DateTime.Parse(TextBox1.Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
                        }
                        if (TextBox2.Text != "")
                        {
                            SqlDataSource6.InsertParameters["End_Date"].DefaultValue = DateTime.Parse(TextBox2.Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
                        }
                             SqlDataSource6.InsertParameters["User1"].DefaultValue = user.ToString();


                        SqlDataSource6.Insert();
                    }
                    else if (TextBox7.Text != "")
                    {
                        SqlDataSource6.InsertParameters["ActionType"].DefaultValue = ss1[j].ToString();

                        if (TextBox7.Text != "")
                        {
                            SqlDataSource6.InsertParameters["Start_Date"].DefaultValue = DateTime.Parse(TextBox7.Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
                        }
                        if (TextBox8.Text != "")
                        {
                            SqlDataSource6.InsertParameters["End_Date"].DefaultValue = DateTime.Parse(TextBox8.Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
                        }
                             SqlDataSource6.InsertParameters["User1"].DefaultValue = user.ToString();


                        SqlDataSource6.Insert();
                    }

                }
                Label1.Text = TextBox9.Text + " Record saved";
            }
            else
            {
                Label1.Text = TextBox9.Text + " Already Saved";
            }
        }
        else
        {
            Label1.Text = TextBox9.Text + "PPno Is Not Exist in Joining";
        }
    }
    private void bind()
    {
       // DropDownList6.DataBind();
        for (Int32 h = 0; h < CheckBoxList1.Items.Count; h++)
        {
            CheckBoxList1.Items[h].Selected = false;
        }
        SqlDataAdapter adp = new SqlDataAdapter("select *from other_action where PPono='" + TextBox10.Text + "'", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables[0].Rows.Count != 0)
        {
            
            if (ds.Tables[0].Rows.Count != 2)
            {
                string jj = ds.Tables[0].Rows[0]["ActionType"].ToString();
                for (Int32 h = 0; h < CheckBoxList1.Items.Count; h++)
                {
                    if (CheckBoxList1.Items[h].Text == jj)
                    {
                        CheckBoxList1.Items[h].Selected = true;
                    }
                }
                TextBox1.Text = Convert.ToDateTime(ds.Tables[0].Rows[0]["Start_date"]).ToString("dd/MM/yyyy");
                TextBox2.Text = Convert.ToDateTime(ds.Tables[0].Rows[0]["End_date"]).ToString("dd/MM/yyyy");
               // TextBox3.Text = ds.Tables[0].Rows[0]["action_reason"].ToString();
                TextBox4.Text = ds.Tables[0].Rows[0]["position"].ToString();
                TextBox5.Text = ds.Tables[0].Rows[0]["payroll_area"].ToString();
                TextBox6.Text = ds.Tables[0].Rows[0]["remarks"].ToString();
                //TextBox7.Text = ds.Tables[0].Rows[0]["remarks"].ToString();
                //DropDownList2.Items.FindByValue(DropDownList2.SelectedValue).Selected = false;
                //DropDownList2.Items.FindByValue(ds.Tables[0].Rows[0]["payment_method"].ToString()).Selected = true;
            }
            else
            {
                string jj = ds.Tables[0].Rows[0]["ActionType"].ToString();
                string jj1 = ds.Tables[0].Rows[1]["ActionType"].ToString();
               
                for (Int32 h = 0; h < CheckBoxList1.Items.Count; h++)
                {
                    if (CheckBoxList1.Items[h].Text == jj)
                    {
                        CheckBoxList1.Items[h].Selected = true;
                    }
                    if (CheckBoxList1.Items[h].Text == jj1)
                    {
                        CheckBoxList1.Items[h].Selected = true;
                    }
                }
                TextBox1.Text = Convert.ToDateTime(ds.Tables[0].Rows[0]["Start_date"]).ToString("dd/MM/yyyy");
                TextBox2.Text = Convert.ToDateTime(ds.Tables[0].Rows[0]["End_date"]).ToString("dd/MM/yyyy");
                TextBox7.Text = Convert.ToDateTime(ds.Tables[0].Rows[1]["Start_date"]).ToString("dd/MM/yyyy");
                TextBox8.Text = Convert.ToDateTime(ds.Tables[0].Rows[1]["End_date"]).ToString("dd/MM/yyyy");
                //TextBox3.Text = ds.Tables[0].Rows[0]["action_reason"].ToString();
                TextBox4.Text = ds.Tables[0].Rows[0]["position"].ToString();
                TextBox5.Text = ds.Tables[0].Rows[0]["payroll_area"].ToString();
                TextBox6.Text = ds.Tables[0].Rows[0]["remarks"].ToString();
            }
        }
        else
        {
            TextBox1.Text = "".ToString();
            TextBox2.Text = "".ToString();
            //TextBox3.Text = "".ToString();
            TextBox4.Text = "".ToString();
            TextBox5.Text = "".ToString();
            TextBox6.Text = "".ToString();
        }
    }
    
    protected void DropDownList6_SelectedIndexChanged(object sender, EventArgs e)
    {
       // bind();
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        Label1.Text = "";
        string ss = "";
        
        for (Int32 j = 0; j < CheckBoxList1.Items.Count; j++)
        {
            if (CheckBoxList1.Items[j].Selected == true)
            {
                ss = ss + CheckBoxList1.Items[j].Text + ",";
            }
        }
        ss = ss.Substring(0, ss.Length - 1);
        string[] ss1 = ss.Split(',');
        SqlDataAdapter adp = new SqlDataAdapter("select *from other_action where PPono='" + TextBox10.Text + "'", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables[0].Rows.Count != 0)
        {
            for (Int32 j = 0; j < ss1.Length; j++)
            {
                if (ss1[j] == "SE")
                {
                    SqlDataSource6.UpdateParameters["ActionType"].DefaultValue = ss1[j].ToString();


                    SqlDataSource6.UpdateParameters["Start_Date"].DefaultValue = DateTime.Parse(TextBox1.Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
                    SqlDataSource6.UpdateParameters["End_Date"].DefaultValue = DateTime.Parse(TextBox2.Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
                    //SqlDataSource6.UpdateParameters["User1"].DefaultValue = user.ToString();


                    SqlDataSource6.Update();
                }
                else if (TextBox7.Text != "")
                {
                    SqlDataSource6.UpdateParameters["ActionType"].DefaultValue = ss1[j].ToString();


                    SqlDataSource6.UpdateParameters["Start_Date"].DefaultValue = DateTime.Parse(TextBox7.Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
                    SqlDataSource6.UpdateParameters["End_Date"].DefaultValue = DateTime.Parse(TextBox8.Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
                   // SqlDataSource6.InsertParameters["User1"].DefaultValue = user.ToString();


                    SqlDataSource6.Update();
                }

            }
            Label1.Text = TextBox10.Text + " Record Update";
        }
        else
        {
            Label1.Text = TextBox10.Text + " Record Not Found";
        }
    }
    protected void Button3_Click(object sender, EventArgs e)
    {
        bind();
    }
}
