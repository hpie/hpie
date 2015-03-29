using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;

public partial class _Default : System.Web.UI.Page
{
    Int32 ct = 0;
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            Session.Remove("trai");
            tb();
        }
    }
    private void tb()
    {
        if (Session["trai"] == null)
        {
            Session["trai"] = "1".ToString();
            DataTable tb = new DataTable();

            tb.Columns.Add(new DataColumn("name", Type.GetType("System.String")));
            tb.Columns.Add(new DataColumn("job_title", Type.GetType("System.String")));
            tb.Columns.Add(new DataColumn("email", Type.GetType("System.String")));
            tb.Columns.Add(new DataColumn("mobile", Type.GetType("System.String")));

            DataRow r;
            r = tb.NewRow();



            r[0] = "";
            r[1] = "";
            r[2] = "";
            r[3] = "";

            tb.Rows.Add(r);

            GridView1.DataSource = tb;
            GridView1.DataBind();
            GridView1.Rows[0].Visible = false;
            Session["trai"] = tb;
        }
    }
    private void cen_code()
    {
        DataView dv = (DataView)(SqlDataSource5.Select(DataSourceSelectArguments.Empty));
        if (dv != null)
        {
            if (dv.Table.Rows.Count != 0)
            {
                Int32 i;
                i = Convert.ToInt32(dv.Table.Rows[0]["center_code"]);
                i++;
                Label7.Text = i.ToString();
                Label6.Text = DropDownList4.SelectedItem.Text + "/" + i.ToString();
            }
            else
            {
                Label7.Text = "101".ToString();
                Label6.Text = DropDownList4.SelectedItem.Text + "/101".ToString();
            }
        }
    }
    protected void Wizard1_FinishButtonClick(object sender, WizardNavigationEventArgs e)
    {

         DataView dv = (DataView)(SqlDataSource6.Select(DataSourceSelectArguments.Empty));
         if (dv != null)
         {
             if (dv.Table.Rows.Count == 0)
             {

                 cen_code();
                 SqlDataSource4.InsertParameters["center_code_main"].DefaultValue = Label6.Text;
                 SqlDataSource4.InsertParameters["center_code"].DefaultValue = Label7.Text;


                 if (GridView1.Rows.Count != 1)
                 {
                     Int32 i;
                     for (i = 1; i < GridView1.Rows.Count; i++)
                     {
                         SqlDataSource1.InsertParameters["center_code"].DefaultValue = Label6.Text;
                         SqlDataSource1.InsertParameters["name"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("Label1"))).Text;
                         SqlDataSource1.InsertParameters["job_title"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("Label2"))).Text;
                         SqlDataSource1.InsertParameters["email"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("Label3"))).Text;
                         SqlDataSource1.InsertParameters["mobile"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("Label4"))).Text;
                         SqlDataSource1.Insert();
                     }
                 }

                 if (GridView1.Rows.Count == 1)
                 {
                     SqlDataSource1.InsertParameters["center_code"].DefaultValue = Label6.Text;
                     SqlDataSource1.InsertParameters["name"].DefaultValue = "";
                     SqlDataSource1.InsertParameters["job_title"].DefaultValue = "";
                     SqlDataSource1.InsertParameters["email"].DefaultValue = "";
                     SqlDataSource1.InsertParameters["mobile"].DefaultValue = "";
                     SqlDataSource1.Insert();
                 }
                 SqlDataSource5.InsertParameters["center_code"].DefaultValue = Label6.Text;

                 SqlDataSource4.Insert();
                 SqlDataSource5.Insert();

                 SqlDataSource2.InsertParameters["center_code_main"].DefaultValue = Label6.Text;
                 SqlDataSource2.InsertParameters["date"].DefaultValue = DateTime.Now.ToString();
                 SqlDataSource2.Insert();
                 bank_sql.InsertParameters["center_code"].DefaultValue = Label6.Text;
                 bank_sql.Insert();

                 email.Text = "";
                 pass.Text = "";
                 name.Text = "";
                 website.Text = "";
                 addr.Text = "";
                 phone_std.Text = "";
                 phone.Text = "";
                 p_code.Text = "";
                 tb();
                 capacity.Text = "";
                 tot_wor_space.Text = "";
                 no_pc.Text = "";
                 no_pc_lan.Text = "";
                 no_class_room.Text = "";
                 no_labs.Text = "";
                 power_backup.Text = "";
                 ac_no.Text = "";
                 branch_name.Text = "";
                 ifc_code.Text = "";
                 branch_name.Text = "";
                 ClearInputs(Wizard1.WizardSteps[e.CurrentStepIndex].Controls);
                 Label5.Text = "Record Saved Successfully...";
                 LinkButton2.Visible = true;

             }
             else
             {
                 Label5.Text = "Error ! (City not available...)";
                 Label5.Focus();
             }
         }
    }
    private void ClearInputs(ControlCollection ctrls)
    {
        foreach (Control ctrl in ctrls)
        {
            if (ctrl is TextBox)
                ((TextBox)ctrl).Text = string.Empty;
            else if (ctrl is DropDownList)
                ((DropDownList)ctrl).ClearSelection();
            else if (ctrl is CheckBox)
                ((CheckBox)ctrl).Checked = false;

            ClearInputs(ctrl.Controls);
        }
    }

    protected void GridView1_SelectedIndexChanging(object sender, GridViewSelectEventArgs e)
    {
        if (Session["trai"] != null)
        {
           
            DataTable tb = new DataTable();
            tb = (DataTable)(Session["trai"]);         

            DataRow r;
            r = tb.NewRow();
            string ss = ((TextBox)(GridView1.FooterRow.FindControl("TextBox4"))).Text;
            r[0] = ((TextBox)(GridView1.FooterRow.FindControl("TextBox4"))).Text;
            r[1] = ((TextBox)(GridView1.FooterRow.FindControl("TextBox5"))).Text;
            r[2] = ((TextBox)(GridView1.FooterRow.FindControl("TextBox6"))).Text;
            r[3] = ((TextBox)(GridView1.FooterRow.FindControl("TextBox7"))).Text;

            tb.Rows.Add(r);

            GridView1.DataSource = tb;
            GridView1.DataBind();
            GridView1.Rows[0].Visible = false;
            Session["trai"] = tb;
        }
    }
    protected void GridView1_RowDeleting(object sender, GridViewDeleteEventArgs e)
    {
        DataTable tb = new DataTable();
        tb = (DataTable)(Session["trai"]);
        tb.Rows.RemoveAt(e.RowIndex);
        bind();
        GridView1.Rows[0].Visible = false;
    }
    private void bind()
    {
        DataTable tb = new DataTable();
        tb = (DataTable)(Session["trai"]);
        GridView1.DataSource = tb;
        GridView1.DataBind();
    }
    protected void GridView1_RowDeleting1(object sender, GridViewDeleteEventArgs e)
    {
        DataTable tb = new DataTable();
        tb = (DataTable)(Session["trai"]);
        tb.Rows.RemoveAt(e.RowIndex);
        bind();
        GridView1.Rows[0].Visible = false;
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            ct++;
            if(ct==2)
            {
                ((ImageButton)(e.Row.FindControl("img1"))).Visible = false;
            }
           else
            {
                ((ImageButton)(e.Row.FindControl("img1"))).Visible = true;
            }
        }
    }
    protected void DropDownList3_SelectedIndexChanged(object sender, EventArgs e)
    {
        p_code.Focus();
    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        Response.Redirect("default.aspx");
    }
}