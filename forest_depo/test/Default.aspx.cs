using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Configuration;

public partial class _Default : System.Web.UI.Page 
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void gridViewMaster_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            string customerID = Convert.ToString(DataBinder.Eval(e.Row.DataItem, "CustomerID"));
            GridView gridViewNested = (GridView)e.Row.FindControl("nestedGridView");
            SqlDataSource sqlDataSourceNestedGrid = new SqlDataSource();
            sqlDataSourceNestedGrid.ConnectionString = ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString;
            sqlDataSourceNestedGrid.SelectCommand = "SELECT [OrderID], [OrderDate],[Freight] FROM [Orders] WHERE [CustomerID] = '" + customerID + "'";
            gridViewNested.DataSource = sqlDataSourceNestedGrid;
            gridViewNested.DataBind();
        }
    }
}
