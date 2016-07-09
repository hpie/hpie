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
using System.IO;
using System.Text;
public partial class _Default : System.Web.UI.Page 
{
    public Int32 r2;
    public Int32 r3 = 1;

    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            session();
        }
    }
   
    private void session()
    {
        for (Int32 y = 2008; y < DateTime.Now.Year + 1; y++)
        {
            DateTime dt = Convert.ToDateTime("04/01/" + y);
            DropDownList1.Items.Add(new ListItem(y.ToString() + "-" + Convert.ToInt32(y + 1), dt.ToString()));
        }
    }

    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            r3 = r3 + 1;
            //for (Int32 k = 3; k <= 23; k++)
            //{
            // e.Row.Cells[k].Text = "0".ToString();
            //}

            if (e.Row.Cells[1].Text.Equals("Total"))
            {
                e.Row.BackColor = System.Drawing.Color.LightBlue;
                e.Row.ForeColor = System.Drawing.Color.Blue;

                e.Row.Cells[1].Text = "<b>" + e.Row.Cells[1].Text + "</b>";
                e.Row.Cells[2].Text = " ";
                e.Row.Cells[3].Text = "<b>" + e.Row.Cells[3].Text + "</b>";
                e.Row.Cells[4].Text = "<b>" + e.Row.Cells[4].Text + "</b>";
                e.Row.Cells[5].Text = "<b>" + e.Row.Cells[5].Text + "</b>";
                e.Row.Cells[5].Text = "<b>" + e.Row.Cells[5].Text + "</b>";
                e.Row.Cells[6].Text = "<b>" + e.Row.Cells[6].Text + "</b>";
                e.Row.Cells[7].Text = "<b>" + e.Row.Cells[7].Text + "</b>";
                e.Row.Cells[8].Text = "<b>" + e.Row.Cells[8].Text + "</b>";
                e.Row.Cells[9].Text = "<b>" + e.Row.Cells[9].Text + "</b>";
                e.Row.Cells[10].Text = "<b>" + e.Row.Cells[10].Text + "</b>";
                e.Row.Cells[11].Text = "<b>" + e.Row.Cells[11].Text + "</b>";

            }
        }
    }
    protected void GridView1_RowCreated(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.Header)
        {

            GridView gv = sender as GridView;
            //((Label)gv.HeaderRow.FindControl("label8")).Text = "dd".ToString();
            if (gv.HasControls())
            {


                GridViewRow row = new GridViewRow(0, 2, DataControlRowType.Header, DataControlRowState.Normal);
                Table t = (Table)GridView1.Controls[0];

                // Adding Cells
                TableCell FileDate = new TableHeaderCell();
                FileDate.Text = "Particulars";
                FileDate.ColumnSpan = 3;
                row.Cells.Add(FileDate);

                TableCell cell = new TableHeaderCell();
                cell.ColumnSpan = 7; // ********
                cell.Text = "CPF Subscription";
                row.Cells.Add(cell);
                //t.Rows.AddAt(0, row);

                //TableCell FileDate1 = new TableHeaderCell();
                //FileDate1.ColumnSpan = 0;
                //row.Cells.Add(FileDate1);

                //TableCell cell1 = new TableHeaderCell();
                //cell1.ColumnSpan = 4; // ********
                //cell1.Text = "Employer's Share";
                //row.Cells.Add(cell1);

                TableCell cell2 = new TableHeaderCell();
                cell2.ColumnSpan = 4; // ********
                cell2.Text = "Interest on Subscription";
                row.Cells.Add(cell2);
                t.Rows.AddAt(0, row);
                //TableCell cell3 = new TableHeaderCell();
                //cell3.ColumnSpan = 4; // ********
                //cell3.Text = "Interest on Employer Share";
                //row.Cells.Add(cell3);
                //TableCell cell4 = new TableHeaderCell();
                //cell4.ColumnSpan = 2; // ********
                //cell4.Text = "Progressive total issue";
                //row.Cells.Add(cell4);
                //TableCell cell5 = new TableHeaderCell();
                //cell5.ColumnSpan = 2; // ********
                //cell5.Text = "Balance";
                //row.Cells.Add(cell5);
                //TableCell cell6 = new TableHeaderCell();

                //cell6.Text = "";
                //row.Cells.Add(cell6);
                //t.Rows.AddAt(0, row);


                //next row
                //if (e.Row.RowType == DataControlRowType.Header)
                //{

                GridViewRow tr = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);
                //for (short i = 1; i <= 13; ++i)
                //{
                TableCell td = new TableCell();
                td.Text = "1".ToString();
                tr.Cells.Add(td);
                //}

                TableCell td1 = new TableCell();
                td1.Text = "2".ToString();
                tr.Cells.Add(td1);

                TableCell td2 = new TableCell();
                td2.Text = "3".ToString();
                tr.Cells.Add(td2);
                TableCell td26 = new TableCell();
                td26.Text = "4".ToString();
                tr.Cells.Add(td26);


                TableCell td27 = new TableCell();
                td27.Text = "5".ToString();
                tr.Cells.Add(td27);
                TableCell td3 = new TableCell();
                td3.Text = "6".ToString();
                tr.Cells.Add(td3);

                TableCell td4 = new TableCell();
                td4.Text = "7".ToString();
                tr.Cells.Add(td4);

                TableCell td5 = new TableCell();
                td5.Text = "8".ToString();
                tr.Cells.Add(td5);


                TableCell td6 = new TableCell();
                td6.Text = "9".ToString();
                tr.Cells.Add(td6);

                TableCell td7 = new TableCell();
                td7.Text = "10".ToString();
                tr.Cells.Add(td7);

                //TableCell td8 = new TableCell();
                //td8.Text = "11".ToString();
                //tr.Cells.Add(td8);

                //TableCell td9 = new TableCell();
                //td9.Text = "12".ToString();
                //tr.Cells.Add(td9);


                //TableCell td10 = new TableCell();
                //td10.Text = "13".ToString();
                //tr.Cells.Add(td10);

                //TableCell td11 = new TableCell();
                //td11.Text = "14".ToString();
                //tr.Cells.Add(td11);

                TableCell td12 = new TableCell();
                td12.Text = "11".ToString();
                tr.Cells.Add(td12);

                TableCell td13 = new TableCell();
                td13.Text = "12".ToString();
                tr.Cells.Add(td13);

                //TableCell td14 = new TableCell();
                //td14.Text = "13".ToString();
                //tr.Cells.Add(td14);


                //TableCell td141 = new TableCell();
                //td141.Text = "14".ToString();
                //tr.Cells.Add(td141);


                ////TableCell td142 = new TableCell();
                ////td142.Text = "19".ToString();
                ////tr.Cells.Add(td142);

                ////TableCell td143 = new TableCell();
                ////td143.Text = "20".ToString();
                ////tr.Cells.Add(td143);
                ////TableCell td144 = new TableCell();
                ////td144.Text = "21".ToString();
                ////tr.Cells.Add(td144);

                ////TableCell td145 = new TableCell();
                ////td145.Text = "22".ToString();
                ////tr.Cells.Add(td145);


                //TableCell td146 = new TableCell();
                //td146.Text = "15".ToString();
                //tr.Cells.Add(td146);

                //TableCell td147 = new TableCell();
                //td147.Text = "16".ToString();
                //tr.Cells.Add(td147);
                ((Table)gv.Controls[0]).Rows.Add(tr);
                //}

            }
        }
    }
    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {
       // string session = DropDownList1.SelectedItem.Text;
     
       // DateTime sdate =Convert.ToDateTime( "04/01/" + session.Substring(0, 4));
       //DateTime edate = Convert.ToDateTime("03/31/" + session.Substring(5, 4));
       //SqlDataSource1.SelectParameters["sdate"].DefaultValue = sdate.ToString();
       //SqlDataSource1.SelectParameters["edate"].DefaultValue = edate.ToString();
       DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
       GridView1.DataSource = dv;
       GridView1.DataBind(); 
    }
    public void exportGridToExcel(Control ctl)
    {
        string attachment = "attachment; filename=etrack_excel_export.xls";
        HttpContext.Current.Response.ClearContent();
        HttpContext.Current.Response.AddHeader("content-disposition", attachment);
        HttpContext.Current.Response.ContentType = "application/ms-excel";
        StringWriter stw = new StringWriter();
        HtmlTextWriter htextw = new HtmlTextWriter(stw);

        ctl.RenderControl(htextw);
        HttpContext.Current.Response.Write(stw.ToString());
        HttpContext.Current.Response.End();
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        string attachment = "attachment; filename=Contacts.xls";

        Response.ClearContent();

        Response.AddHeader("content-disposition", attachment);

        Response.ContentType = "application/ms-excel";

        StringWriter sw = new StringWriter();

        HtmlTextWriter htw = new HtmlTextWriter(sw);








        HtmlForm frm = new HtmlForm();

        GridView1.Parent.Controls.Add(frm);

        frm.Attributes["runat"] = "server";

        frm.Controls.Add(GridView1);



        frm.RenderControl(htw);



        Response.Write(sw.ToString());

        Response.End();
       
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        r3 = 1;
        String session = DropDownList1.SelectedItem.Text;
        DateTime sdate = Convert.ToDateTime("04/01/" + session.Substring(0, 4));
        DateTime edate = Convert.ToDateTime("03/31/" + session.Substring(5, 4));
        ReportDateParam.Value = edate.ToString();

        DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
        GridView1.DataSource = dv;
        GridView1.DataBind(); 
    }
}
