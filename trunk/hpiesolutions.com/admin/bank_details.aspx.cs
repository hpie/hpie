﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
public partial class admin_bank_details : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        DataView dv = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));
        if (dv != null)
        {
            if (dv.Table.Rows.Count == 0)
            {
                SqlDataSource1.Insert();
                Label1.Text = "Successfull..";
                GridView1.DataBind();
                TextBox1.Text = "";
            }
            else
            {
                Label1.Text = "Error ! (Bank name allready in your list)";
            }
        }

    }
}