using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.SqlClient;
using System.Configuration;
using System.Data;
public partial class user_marks_detail : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            //dd();
        }
    }
    //private void dd()
    //{
    //    DateTime live = DateTime.Now;
    //    Int32 y = live.Year;
    //    Int32 i;

    //    for (i = y - 2; i <= y + 2; i++)
    //    {
    //        yers.Items.Add(i.ToString());
    //        if (i == y)
    //        {
    //            yers.Items.FindByText(i.ToString()).Selected = true;
    //        }
    //    }

    //}
   
    private void grid()
    {
        try
        {
            string ss = "select a.code, a.center_code, a.project_code, a.sub, a.course, a.date, a.s_id, a.s_name, a.t_marks, a.t_ob, a.per, b.sub AS sub1 from marks_detail a, subject b where a.sub=b.code and a.center_code='" + center_code.SelectedValue.ToString() + "' and a.course='" + DropDownList2.SelectedValue.ToString() + "' and a.project_code='" + DropDownList1.SelectedValue + "' and a.s_id='"+DropDownList4.SelectedItem.Text+"' order by a.s_id";
            SqlDataAdapter adp = new SqlDataAdapter(ss, ConfigurationManager.ConnectionStrings["hpieConnectionString"].ConnectionString);
            DataSet ds = new DataSet();
            adp.Fill(ds);
            GridView1.DataSource = ds;
            GridView1.DataBind();
        }
        catch(Exception r)
        {
            Label3.Text = r.Message.ToString();
        }
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            //SqlDataSource3.SelectParameters["s_id"].DefaultValue = ((Label)(e.Row.FindControl("Label1"))).Text;
            //DataView dv = (DataView)(SqlDataSource3.Select(DataSourceSelectArguments.Empty));
            //if (dv != null)
            //{
            //    if (dv.Table.Rows.Count != 0)
            //    {
            //        TextBox t1, t2;
            //        Label t3, t4;
            //        t1 = ((TextBox)(e.Row.FindControl("tot_marks")));
            //        t2 = ((TextBox)(e.Row.FindControl("ob_marks")));
            //        t4 = ((Label)(e.Row.FindControl("stat")));
            //        t3 = ((Label)(e.Row.FindControl("per")));
            //        t1.Text = dv.Table.Rows[0]["t_marks"].ToString();
            //        t2.Text = dv.Table.Rows[0]["t_ob"].ToString();
            //        t3.Text = dv.Table.Rows[0]["per"].ToString();
            //        t1.ReadOnly = true;
            //        t2.ReadOnly = true;
            //        t4.Text = "Filled";
            //        CheckBox chk = ((CheckBox)(e.Row.FindControl("chk1")));
            //        chk.Checked = true;
            //        chk.Enabled = false;
            //    }
            //    else
            //    {
            //        try
            //        {
            //            Int32 d1, d2, per;
            //            d1 = Convert.ToInt32(((TextBox)(e.Row.FindControl("tot_marks"))).Text);
            //            d2 = Convert.ToInt32(((TextBox)(e.Row.FindControl("ob_marks"))).Text);
            //            per = d2 / d1 * 100;
            //            ((TextBox)(e.Row.FindControl("per"))).Text = per.ToString();
            //            Label t4 = ((Label)(e.Row.FindControl("stat")));
            //            t4.Text = "Active";
            //            CheckBox chk = ((CheckBox)(e.Row.FindControl("chk1")));
            //            chk.Checked = false;
            //            chk.Enabled = true;
            //            e.Row.Visible = false;
            //        }
            //        catch
            //        {
            //            Label t4 = ((Label)(e.Row.FindControl("stat")));
            //            t4.Text = "Active";
            //            CheckBox chk = ((CheckBox)(e.Row.FindControl("chk1")));
            //            chk.Checked = false;
            //            chk.Enabled = true;
            //        }
            //    }
            //}
        }
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        Label3.Text = "";
        grid();
        LinkButton2.Visible = true;
        LinkButton3.Visible = false;
    }
    protected void DropDownList2_SelectedIndexChanged(object sender, EventArgs e)
    {
        DropDownList3.DataBind();
        DropDownList4.DataBind();
    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        try
        {
            Label3.Text = "";
            Int32 i;
            for (i = 0; i < GridView1.Rows.Count; i++)
            {
                try
                {
                    decimal d2;
                    decimal d1 = Convert.ToDecimal(((Label)(GridView1.Rows[i].FindControl("tot_marks"))).Text);

                    d2 = Convert.ToDecimal(((TextBox)(GridView1.Rows[i].FindControl("ob_marks"))).Text);

                    decimal d3 = d2 / d1 * 100;
                    ((Label)(GridView1.Rows[i].FindControl("per"))).Text = Math.Round(d3, 0).ToString();
                    LinkButton3.Visible = true;
                    //CheckBox chk = ((CheckBox)(GridView1.Rows[i].FindControl("chk1")));
                    //chk.Checked = true;
                }
                catch
                {

                }
            }
        }
        catch (Exception r)
        {
            Label3.Text = "Error !(" + r.Message + ")";
            LinkButton2.Visible = true;
            LinkButton3.Visible = false;
        }
    }
    protected void LinkButton3_Click(object sender, EventArgs e)
    {
        try
        {
            Int32 count = 0;
            //DateTime dd = Convert.ToDateTime(TextBox1.Text);
            Int32 i;
            for (i = 0; i < GridView1.Rows.Count; i++)
            {
                //if (((Label)(GridView1.Rows[i].FindControl("stat"))).Text.ToString() == "Active")
                //{
                    //CheckBox chk = ((CheckBox)(GridView1.Rows[i].FindControl("chk1")));
                    //if (chk.Checked == true)
                    //{
                        count++;
                        SqlDataSource3.UpdateParameters["s_id"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("Label1"))).Text;


                        SqlDataSource3.UpdateParameters["sub"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("sub_m12"))).Text;

                        SqlDataSource3.UpdateParameters["t_marks"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("tot_marks"))).Text;
                        SqlDataSource3.UpdateParameters["t_ob"].DefaultValue = ((TextBox)(GridView1.Rows[i].FindControl("ob_marks"))).Text;

                        SqlDataSource3.UpdateParameters["per"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("per"))).Text;
                        

                        SqlDataSource3.Update();
                    //}

                //}
                //else
                //{

                //}

            }
            Label3.Text = count.ToString() + " Record submitted successfully..";

        }
        catch (Exception r)
        {
            Label3.Text = "Error !(" + r.Message + ")";

        }

        LinkButton2.Visible = false;
        LinkButton3.Visible = false;
    }
    protected void GridView1_RowEditing(object sender, GridViewEditEventArgs e)
    {
     
    }
    protected void GridView1_RowDeleting(object sender, GridViewDeleteEventArgs e)
    {
        SqlDataSource3.DeleteParameters["code"].DefaultValue = GridView1.DataKeys[e.RowIndex].Value.ToString();

        SqlDataSource3.Delete();
        Label3.Text = "";
        grid();
        LinkButton2.Visible = true;
        LinkButton3.Visible = false;
    }
    protected void center_code_SelectedIndexChanged(object sender, EventArgs e)
    {
        DropDownList4.DataBind();
    }
    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {
        DropDownList4.DataBind();
    }
}