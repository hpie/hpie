using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;

public partial class purchaser : System.Web.UI.Page
{
    Int32 no=0;
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        
        Label1.Text = "";
        DataView dt = (DataView)(bid_avg.Select(DataSourceSelectArguments.Empty));
        if (dt.Table.Rows.Count != 0)
        {
            Int32 i;
            for (i = 0; i < dt.Table.Rows.Count; i++)
            {
                
                no += Convert.ToInt32(dt.Table.Rows[i]["as_per_no"]);
            }
        }

        DataView dv = (DataView)(SqlDataSource3.Select(DataSourceSelectArguments.Empty));

        if (dv.Table.Rows.Count == 0)
        {
            Label1.Text = "Lot No allready given";
        }
        else
        {
            //Int32 bid_amt = Convert.ToInt32(TextBox2.Text);
            //Int32 bid2 = bid_amt / no;
            //SqlDataSource1.UpdateParameters["bid_avg"].DefaultValue = bid2.ToString();
            SqlDataSource1.Update();
            Label1.Text = "Successfull....";
        }
    }
    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {
        TextBox1.Text = "";

        ListBox1.DataBind();
        DropDownList2.DataBind();
      DataView dt = (DataView)(SqlDataSource4.Select(DataSourceSelectArguments.Empty));
      if (dt.Table.Rows.Count != 0)
      {
          //TextBox2.Text = dt.Table.Rows[0]["bid_amt"].ToString();
          TextBox1.Text = dt.Table.Rows[0]["name_purchaser"].ToString();
      }
      else
      {
          TextBox1.Text = "";
      }
        
    }
    protected void ListBox1_SelectedIndexChanged(object sender, EventArgs e)
    {
        TextBox1.Text = ListBox1.SelectedItem.Text.ToString();
    }
    protected void DropDownList2_SelectedIndexChanged(object sender, EventArgs e)
    {
        DataView dt = (DataView)(SqlDataSource4.Select(DataSourceSelectArguments.Empty));
        if (dt.Table.Rows.Count != 0)
        {
           // TextBox2.Text = dt.Table.Rows[0]["bid_amt"].ToString();
            TextBox1.Text = dt.Table.Rows[0]["name_purchaser"].ToString();
        }
    }
}