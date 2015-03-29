using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.SqlClient;
using System.Configuration;
using System.Data;



public partial class user_marks_detail_view : System.Web.UI.Page
{
    DataControlField nameColumn;
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
           
        }
    }
   
    private void grid()
    {

       
        Int32 i;
        for (i = 0; i < DropDownList3.Items.Count+2; i++)
        {
            if (i == 0)
            {
                BoundField bf = new BoundField();
                bf.DataField = "s_id";
                bf.HeaderText = "Student ID";
                GridView1.Columns.Add(bf);
            }
            if (i == 1)
            {
                BoundField bf = new BoundField();
                bf.DataField = "s_name";
                bf.HeaderText = "Student Name";
                GridView1.Columns.Add(bf);
            }
           if(i>1)
            {
                BoundField bf = new BoundField();
                //bf.DataField = "NameField";
                bf.HeaderText = DropDownList3.Items[i-2].ToString();
                GridView1.Columns.Add(bf);

            }
        }
    }
   
    protected void LinkButton1_Click(object sender, EventArgs e)
    {

        //Int32 i;
        //for (i = 0; i < GridView1.Columns.Count; i++)
        //{
        //    GridView1.Columns.RemoveAt(i);
        //}
        GridView1.Columns.Clear();
        grid();

        //CommandField bf = new CommandField();
        //bf.ButtonType = ButtonType.Button;
        //bf.ShowEditButton = true;
        //bf.ShowCancelButton = true;
       
        ////bf.DataField = "NameField";
        //bf.HeaderText = "update";
        //GridView1.Columns.Add(bf);

        SqlDataSource3.DataBind();
        GridView1.DataSource = SqlDataSource3;
        GridView1.DataBind();
        
       
    }
    protected void DropDownList2_SelectedIndexChanged(object sender, EventArgs e)
    {
        DropDownList3.DataBind();
    }

    private void AddColumnsProgrammatically()
    {
     
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            string id = e.Row.Cells[0].Text;
            SqlDataSource5.SelectParameters["id"].DefaultValue = id;
            DataView dv = (DataView)(SqlDataSource5.Select(DataSourceSelectArguments.Empty));
            if (dv != null)
            {
                if (dv.Table.Rows.Count != 0)
                {
                    Int32 r;

                    for (r = 0; r < dv.Table.Rows.Count; r++)
                    {
                        Int32 i;
                        for (i = 0; i < DropDownList3.Items.Count; i++)
                        {
                            Int32 dr = Convert.ToInt32(DropDownList3.Items[i].Value);
                            Int32 dr2 = Convert.ToInt32(dv.Table.Rows[r]["sub"]);

                            if (dr == dr2)
                            {
                                e.Row.Cells[i + 2].Text = dv.Table.Rows[r]["t_ob"].ToString();
                            }
                            else
                            {

                               
                                    
                              
                            }
                        }
                    }
                }
                else
                {
                    e.Row.Visible = false;
                }
            }
        }
    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        export_to_excel exl = new export_to_excel();
        exl.exporttoexcel("Marks_details.xls", GridView1);
    }
    public override void VerifyRenderingInServerForm(System.Web.UI.Control control)
    {

    }
    protected void GridView1_RowCreated(object sender, GridViewRowEventArgs e)
    {
        try
        {
            if (e.Row.RowType == DataControlRowType.Header)
            {

                GridView gv3 = sender as GridView;
                GridViewRow row3 = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);

                Table t3 = (Table)gv3.Controls[0];

                TableCell FileDateb1 = new TableHeaderCell();
                FileDateb1.Text = "<b>Center Name:</b> " + DropDownList4.SelectedItem.Text + " | <b>Course:</b> " + DropDownList2.SelectedItem.Text + " |  <b> Period:</b> " + Convert.ToDateTime(TextBox1.Text).ToString("dd MMM, yyyy") + " to " + Convert.ToDateTime(TextBox2.Text).ToString("dd MMM, yyyy");
                FileDateb1.ColumnSpan = GridView1.Columns.Count;
                FileDateb1.Height = 50;
                FileDateb1.Font.Size = 15;
                FileDateb1.Font.Bold = true;
                row3.Cells.Add(FileDateb1);
                t3.Rows.AddAt(0, row3);
            }
        }
        catch
        {
        }
    }
}