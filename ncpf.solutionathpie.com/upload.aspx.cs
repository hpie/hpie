﻿using System;
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
using System.Data.OleDb;
public partial class upload : System.Web.UI.Page
{
    Int32 count = 1;
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        string target = Server.MapPath("~/Upload");
        if (FileUpload1.HasFile)
        {
            FileUpload1.SaveAs(System.IO.Path.Combine(target, FileUpload1.FileName));

            string connectionString = String.Format(@"Provider=Microsoft.Jet.OLEDB.4.0;Data Source={0};Extended Properties=""Excel 8.0;HDR=YES;IMEX=1;""", target + "\\" + FileUpload1.FileName);
            string query = String.Format("select * from [{0}$]", "Payroll Statement");
            OleDbDataAdapter dataAdapter = new OleDbDataAdapter(query, connectionString);
            DataSet dataSet = new DataSet();
            dataAdapter.Fill(dataSet);
            GridView2.DataSource = dataSet.Tables[0];
            GridView2.DataBind();

            string headerRowText = GridView2.HeaderRow.Cells[1].Text;

            string dt = headerRowText.Substring(0, 10);
            DateTime dt1 = Convert.ToDateTime(DateTime.Parse(dt.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
            SqlDataSource1.SelectParameters["date"].DefaultValue = dt1.ToString();
            DataView dv1 = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
            if (dv1.Table.Rows.Count == 0)
            {

                GridView1.DataSource = dataSet.Tables[0];
                GridView1.DataBind();
            }

            else
            {
                Label1.Text = "Record Already Exist";

            }
        }       
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            string headerRowText = GridView1.HeaderRow.Cells[1].Text;
           // string div = GridView1.HeaderRow.Cells[0].Text;
            Int32 div = Convert.ToInt32(DropDownList1.SelectedValue);
            string dt = headerRowText.Substring(0, 10);
            DateTime dt1 = Convert.ToDateTime(DateTime.Parse(dt.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());

            if (GridView1.Rows.Count >= 1)
            {
                count = count + 1;
                string name = e.Row.Cells[0].Text;
                if (name != "Grand Total")
                {

                    string ac = e.Row.Cells[1].Text.ToString();
                    if (e.Row.Cells[2].Text == "&nbsp;")
                    {
                        e.Row.Cells[2].Text = "0";
                    }
                    if (e.Row.Cells[3].Text == "&nbsp;")
                    {
                        e.Row.Cells[3].Text = "0";
                    }
                    decimal cpf = Convert.ToDecimal(e.Row.Cells[2].Text);
                    decimal cps = Convert.ToDecimal(e.Row.Cells[3].Text);
                    decimal arear = Convert.ToDecimal(e.Row.Cells[4].Text);
                    decimal shared = Convert.ToDecimal(e.Row.Cells[5].Text);
                    
                    SqlDataSource1.InsertParameters["file_name"].DefaultValue =FileUpload1.FileName .ToString();
                    
                    SqlDataSource1.InsertParameters["name_des"].DefaultValue = name.ToString();
                    SqlDataSource1.InsertParameters["ac"].DefaultValue = ac.ToString();
                    SqlDataSource1.InsertParameters["during_year"].DefaultValue = cps.ToString();
                    SqlDataSource1.InsertParameters["recovery_o_adv"].DefaultValue = cpf.ToString();
                    
                     SqlDataSource1.InsertParameters["Arear"].DefaultValue = arear.ToString();
                     SqlDataSource1.InsertParameters["Shared"].DefaultValue = shared.ToString();
                   
                    SqlDataSource1.InsertParameters["date"].DefaultValue = dt1.ToString();
                    SqlDataSource1.InsertParameters["div"].DefaultValue = div.ToString();
                    SqlDataSource1.Insert();
                }
            }


        }
    }
}
