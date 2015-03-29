using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.SqlClient;
using System.Configuration;
using System.Data;
//using System.Windows.Forms;

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
        exl.exporttoexcel("StudentReport.xls", GridView1);
    }
}