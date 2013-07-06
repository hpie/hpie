using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Data.SqlClient;
using System.Configuration;

public partial class _Default : System.Web.UI.Page
{
    DataRow r;
    public string g1, g2, g3, g4, g5, g6; 

    public Int32 scant_auto;
    public string lot_auto = "";
    string scant_no, lot_no, date_of_chl, date_of_rec, size, size_type, grade, stack, size_vol, as_per_no, as_per_vol, kind;
    protected void Page_Load(object sender, EventArgs e)
    {


       
        if (Page.IsPostBack == false)
        {
            aut();
            bnk2();
            bnk();


            DropDownList size_type = ((DropDownList)(GridView1.FooterRow.FindControl("size_type")));
            DropDownList kind = ((DropDownList)(GridView1.FooterRow.FindControl("kind")));
            g2 = kind.SelectedItem.Text.ToString();
            size_type6.SelectParameters["kind"].DefaultValue = kind.SelectedItem.Text.ToString();
            size_type.DataSource = size_type6;
            size_type.DataBind();
            size_type.Focus();


            DropDownList size_type2 = ((DropDownList)(GridView2.FooterRow.FindControl("size_type3")));
            DropDownList kind2 = ((DropDownList)(GridView2.FooterRow.FindControl("kind0")));
            g5 = kind2.SelectedItem.Text.ToString();
            g2 = kind2.SelectedItem.Text.ToString();
            size_type7.SelectParameters["kind"].DefaultValue = kind2.SelectedItem.Text.ToString();
            size_type2.DataSource = size_type7;
            size_type2.DataBind();
            size_type2.Focus();


            string k1, k2, k3;

            DropDownList spec = ((DropDownList)(GridView1.FooterRow.FindControl("DropDownList4")));

            g1 = spec.SelectedItem.Text.ToString();



            //DropDownList kind = ((DropDownList)(GridView1.FooterRow.FindControl("kind")));
            g2 = kind.SelectedItem.Text.ToString();




            DropDownList tye = ((DropDownList)(GridView1.FooterRow.FindControl("size_type")));
            g3 = tye.SelectedItem.Text.ToString();



            //DropDownList size_type = ((DropDownList)(GridView1.FooterRow.FindControl("size_type")));

            string qry = "select * from size_type where size_type='" + size_type.SelectedItem.Text + "'";

            // string qry = "select * from tally_sheet where challan_no='" + chl + "' and spec='" + spec + "' or challan_no='" + chl + "' and size_type='" + size_type + "' or challan_no='"+chl+"' and spec='"+spec+"'";
            SqlDataAdapter adp = new SqlDataAdapter(qry, ConfigurationManager.ConnectionStrings["forest_depoConnectionString"].ConnectionString);
            DataSet ds = new DataSet();
            adp.Fill(ds);
            if (ds.Tables[0].Rows.Count != 0)
            {
                //  ((TextBox)(GridView1.FooterRow.FindControl("as_per_vol"))).Text = ds.Tables[0].Rows[0][2].ToString();
                ((TextBox)(GridView1.FooterRow.FindControl("size_vol"))).Text = ds.Tables[0].Rows[0][2].ToString();
                ((TextBox)(GridView2.FooterRow.FindControl("as_per_vol0"))).Text = ds.Tables[0].Rows[0][2].ToString();
            }
        



          //  aut2();
        }
        //if (Page.IsPostBack == true)
        //{
        //    try
        //    {

        //        DropDownList spec = ((DropDownList)(GridView1.FooterRow.FindControl("DropDownList4")));
        //        spec.Items.FindByText(spec.SelectedItem.Text).Selected = false;

        //        spec.Items.FindByText(ViewState["spec"].ToString()).Selected = true;
        //    }
        //    catch
        //    {

        //    }
        //}

       
    }

    private void aut()
    {
        string qry = "select * from tally_sheet order by code";

        // string qry = "select * from tally_sheet where challan_no='" + chl + "' and spec='" + spec + "' or challan_no='" + chl + "' and size_type='" + size_type + "' or challan_no='"+chl+"' and spec='"+spec+"'";
        SqlDataAdapter adp = new SqlDataAdapter(qry, ConfigurationManager.ConnectionStrings["forest_depoConnectionString"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables[0].Rows.Count != 0)
        {
            try
            {
                Int32 i;
                for (i = 0; i < ds.Tables[0].Rows.Count; i++)
                {
                    scant_auto = Convert.ToInt32(ds.Tables[0].Rows[i]["scant_no"]);
                }
                scant_auto++;
                ViewState["scant"] = scant_auto.ToString();
            }
            catch
            {
                scant_auto = 1;
                ViewState["scant"] = scant_auto.ToString();
            }
            //((TextBox)(GridView2.FooterRow.FindControl("scant_no"))).Text = scant_auto.ToString();
            //string lot_auto;
            //lot_auto = ((TextBox)(GridView1.FooterRow.FindControl("lot_no"))).Text;
            //((TextBox)(GridView1.FooterRow.FindControl("lot_no"))).Text = lot_auto.ToString();

            ViewState["scant"] = scant_auto.ToString();
        }
        else
        {
            scant_auto = 1;
            ViewState["scant"] = scant_auto.ToString();
        }


    }
     private void aut2()
    {

        //Int32 i;
        //for (i = 1; i < GridView1.Rows.Count; i++)
        //{
        scant_auto = Convert.ToInt32(ViewState["scant"]);
        //}

      
            scant_auto++;
            ViewState["scant"] = scant_auto.ToString();
            ((TextBox)(GridView2.FooterRow.FindControl("scant_no0"))).Text = scant_auto.ToString();
            //string lot_auto;
            //lot_auto = ((TextBox)(GridView1.FooterRow.FindControl("lot_no"))).Text;
          //  ((TextBox)(GridView1.FooterRow.FindControl("lot_no"))).Text = ViewState["scant"].ToString();

        }
    private void bnk()
    {
        Session.Remove("dts6");

        DataTable tb = new DataTable();
      
        tb.Columns.Add(new DataColumn("lot_no", Type.GetType("System.String")));
      
        tb.Columns.Add(new DataColumn("spec", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("kind", Type.GetType("System.String")));
        
       
        tb.Columns.Add(new DataColumn("size_type", Type.GetType("System.String")));
      
        tb.Columns.Add(new DataColumn("size_vol", Type.GetType("System.String")));
        
     
       




        //DataRow r;
        r = tb.NewRow();

        r[0] = "";
        tb.Rows.Add(r);
        Session["dt6"] = tb;
        GridView1.DataSource = tb;
        GridView1.DataBind();
        GridView1.Rows[0].Visible = false;
    }

    private void bnk2()
    {
        Session.Remove("dts7");

        DataTable tb = new DataTable();

        tb.Columns.Add(new DataColumn("scant_no", Type.GetType("System.String")));

        tb.Columns.Add(new DataColumn("spec_rec", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("kind_rec", Type.GetType("System.String")));


        tb.Columns.Add(new DataColumn("size_type_rec", Type.GetType("System.String")));

        tb.Columns.Add(new DataColumn("as_per_vol", Type.GetType("System.String")));

        tb.Columns.Add(new DataColumn("lot_no", Type.GetType("System.String")));

         tb.Columns.Add(new DataColumn("spec", Type.GetType("System.String")));


        //DataRow r;
        r = tb.NewRow();

        r[0] = "";
        tb.Rows.Add(r);
        Session["dt7"] = tb;
        GridView2.DataSource = tb;
        GridView2.DataBind();
        GridView2.Rows[0].Visible = false;
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {

        Label2.Text = "";

        //DataView dv = (DataView)(chk_chl.Select(DataSourceSelectArguments.Empty));
        //if (dv.Table.Rows.Count == 0)
        //{

            Int32 i;
            for (i = 0; i < GridView1.Rows.Count; i++)
            {
                //if (i != 0)
                //{

                  
                    SqlDataSource2.InsertParameters["lot_no"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("lot_no"))).Text;
                    //SqlDataSource2.InsertParameters["date_of_chl"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("date_of_chl"))).Text;
                    //SqlDataSource2.InsertParameters["date_of_rec"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("date_of_rec"))).Text;

                    SqlDataSource2.InsertParameters["date_of_chl"].DefaultValue = date_of_challan.Text.ToString();
                    SqlDataSource2.InsertParameters["date_of_rec"].DefaultValue = date_of_recept.Text.ToString();


                    SqlDataSource2.InsertParameters["spec"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("spec"))).Text;

                    SqlDataSource2.InsertParameters["kind"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("kind"))).Text;

                  
                    SqlDataSource2.InsertParameters["size_type"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("size_type"))).Text;
                   

                    SqlDataSource2.InsertParameters["size_vol"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("size_vol"))).Text;
                  


                    SqlDataSource2.Insert();
                    Label1.Text = "Sucessfull....";
                //}
            }

            //Int32 i2;
            //for (i2 = 0; i2 < GridView2.Rows.Count; i2++)
            //{
            //    //if (i != 0)
            //    //{


            //    SqlDataSource4.InsertParameters["scant_no"].DefaultValue = ((Label)(GridView2.Rows[i2].FindControl("scant_no1"))).Text;
            //    //SqlDataSource2.InsertParameters["date_of_chl"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("date_of_chl"))).Text;
            //    //SqlDataSource2.InsertParameters["date_of_rec"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("date_of_rec"))).Text;

            //    SqlDataSource4.InsertParameters["date_of_chl"].DefaultValue = date_of_challan.Text.ToString();
            //    SqlDataSource4.InsertParameters["date_of_rec"].DefaultValue = date_of_recept.Text.ToString();


            //    SqlDataSource4.InsertParameters["spec"].DefaultValue = ((Label)(GridView2.Rows[i2].FindControl("spec0"))).Text;

            //    SqlDataSource4.InsertParameters["kind"].DefaultValue = ((Label)(GridView2.Rows[i2].FindControl("kind1"))).Text;


            //    SqlDataSource4.InsertParameters["size_type"].DefaultValue = ((Label)(GridView2.Rows[i2].FindControl("size_type5"))).Text;


            //    SqlDataSource4.InsertParameters["as_per_vol"].DefaultValue = ((Label)(GridView2.Rows[i2].FindControl("as_per_vol1"))).Text;

            //    SqlDataSource4.InsertParameters["lot_no"].DefaultValue = ((Label)(GridView2.Rows[i2].FindControl("lot_no"))).Text;

            //    SqlDataSource4.Insert();
            //    Label1.Text = "Sucessfull....";
            //    //}
            //}


            // SqlDataSource2.Insert();

            Label1.Text = "Sucessfull...";
            //Response.Redirect("Default_print.aspx?chl=" + challan_no.Text);
        //}
        //else
        //{
        //    Label2.Text = "Challan No. not Available ! Please Write Different Challan No.";
        //}
    }
    protected void scant_no_TextChanged(object sender, EventArgs e)
    {

    }
    protected void GridView1_RowCommand(object sender, GridViewCommandEventArgs e)
    {

        //ViewState["scant"] = ((TextBox)(GridView1.FooterRow.FindControl("scant_no"))).Text.ToString();
        ViewState["lot"] = ((TextBox)(GridView1.FooterRow.FindControl("lot_no"))).Text.ToString();
        ((TextBox)(GridView1.FooterRow.FindControl("lot_no"))).Text = ViewState["lot"].ToString();
        DropDownList spec = ((DropDownList)(GridView1.FooterRow.FindControl("DropDownList4")));
        lot_no = ((TextBox)(GridView1.FooterRow.FindControl("lot_no"))).Text;
        DropDownList kind2 = ((DropDownList)(GridView1.FooterRow.FindControl("kind")));
        DropDownList size_type2 = ((DropDownList)(GridView1.FooterRow.FindControl("size_type")));
        size_vol = ((TextBox)(GridView1.FooterRow.FindControl("size_vol"))).Text;




        if (e.CommandName == "insert")
        {

Label2.Text = "";

        //DataView dv = (DataView)(chk_chl.Select(DataSourceSelectArguments.Empty));
        //if (dv.Table.Rows.Count == 0)
        //{
            //       DropDownList challan_no;


          

            if (Session["dts6"] == null)
            {

                DataTable tb = new DataTable();
    
                tb.Columns.Add(new DataColumn("lot_no", Type.GetType("System.String")));               
                tb.Columns.Add(new DataColumn("spec", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("kind", Type.GetType("System.String")));                
                tb.Columns.Add(new DataColumn("size_type", Type.GetType("System.String")));
                tb.Columns.Add(new DataColumn("size_vol", Type.GetType("System.String")));
                Session["dts6"] = tb;

                DataTable tb2 = new DataTable();
                tb2 = (DataTable)(Session["dts6"]);  
                //DataRow r;
                Int32 i5;
                Int32 rws = Convert.ToInt32(((TextBox)(GridView1.FooterRow.FindControl("rws"))).Text);
                for (i5 = 0; i5 < rws; i5++)
                {

                 
                    r = tb2.NewRow();

                    r[0] = lot_no;
                    r[1] = spec.SelectedItem.Text;
                    r[2] = kind2.SelectedItem.Text;
                    r[3] = size_type2.SelectedItem.Text;
                    r[4] = size_vol;
                    tb2.Rows.Add(r);
                }

                ViewState["lot"] = lot_no;
                ViewState["spec"] = spec.SelectedItem.Text.ToString();
                ViewState["kind"] = kind2.SelectedItem.Text.ToString();
                ViewState["size_type"] = size_type2.SelectedItem.Text.ToString();
                ViewState["vol"] = size_vol.ToString();

                g1 = ViewState["spec"].ToString();
                g2 = ViewState["kind"].ToString();
                g3 = ViewState["size_type"].ToString();




                
                GridView1.DataSource = tb2;
                GridView1.DataBind();
                ((TextBox)(GridView1.FooterRow.FindControl("lot_no"))).Text = ViewState["lot"].ToString();
                spec.Items.FindByText(spec.SelectedItem.Text).Selected = false;
                spec.Items.FindByText(g1).Selected = true;
                kind2.Items.FindByText(kind2.SelectedItem.Text).Selected = false;
                kind2.Items.FindByText(ViewState["kind"].ToString()).Selected = true;
                size_type2.Items.FindByText(size_type2.SelectedItem.Text).Selected = false;
                size_type2.Items.FindByText(ViewState["size_type"].ToString()).Selected = true;
                ((TextBox)(GridView1.FooterRow.FindControl("size_vol"))).Text = ViewState["vol"].ToString();
            }
            else
            {


                DataTable tb = new DataTable();
                tb = (DataTable)(Session["dts6"]);
                //DataRow r;
                Int32 i5;
                Int32 rws = Convert.ToInt32(((TextBox)(GridView1.FooterRow.FindControl("rws"))).Text);
                for (i5 = 0; i5 < rws; i5++)
                {


                    r = tb.NewRow();

                    r[0] = lot_no;
                    r[1] = spec.SelectedItem.Text;
                    r[2] = kind2.SelectedItem.Text;
                    r[3] = size_type2.SelectedItem.Text;
                    r[4] = size_vol;
                    tb.Rows.Add(r);
                }


                ViewState["lot"] = lot_no;
                ViewState["spec"] = spec.SelectedItem.Text.ToString();
                ViewState["kind"] = kind2.SelectedItem.Text.ToString();
                ViewState["size_type"] = size_type2.SelectedItem.Text.ToString();
                ViewState["vol"] = size_vol.ToString();

                g1 = ViewState["spec"].ToString();
                g2 = ViewState["kind"].ToString();
                g3 = ViewState["size_type"].ToString();


                
                //tb.Rows.Add(r);
                GridView1.DataSource = tb;
                GridView1.DataBind();
                ((TextBox)(GridView1.FooterRow.FindControl("lot_no"))).Text = ViewState["lot"].ToString();
                spec.Items.FindByText(spec.SelectedItem.Text).Selected = false;
                spec.Items.FindByText(ViewState["spec"].ToString()).Selected = true;
                kind2.Items.FindByText(kind2.SelectedItem.Text).Selected = false;
                kind2.Items.FindByText(ViewState["kind"].ToString()).Selected = true;
                size_type2.Items.FindByText(size_type2.SelectedItem.Text).Selected = false;
                size_type2.Items.FindByText(ViewState["size_type"].ToString()).Selected = true;
                ((TextBox)(GridView1.FooterRow.FindControl("size_vol"))).Text = ViewState["vol"].ToString();
            }
        //}

        //else
        //{
        //    Label2.Text = "Challan No. not Available ! Please Write Different Challan No.";
        //}

        }

        
       
    }
    protected void GridView1_RowDeleting(object sender, GridViewDeleteEventArgs e)
    {
        DataTable tb = new DataTable();
        tb = (DataTable)(Session["dts6"]);
        tb.Rows.RemoveAt(e.RowIndex);
        GridView1.DataSource = tb;
        GridView1.DataBind();
    }
    protected void size_type_SelectedIndexChanged(object sender, EventArgs e)
    {

        DropDownList size_type = ((DropDownList)(GridView1.FooterRow.FindControl("size_type")));

        string qry = "select * from size_type where size_type='" + size_type.SelectedItem.Text + "'";

        // string qry = "select * from tally_sheet where challan_no='" + chl + "' and spec='" + spec + "' or challan_no='" + chl + "' and size_type='" + size_type + "' or challan_no='"+chl+"' and spec='"+spec+"'";
        SqlDataAdapter adp = new SqlDataAdapter(qry, ConfigurationManager.ConnectionStrings["forest_depoConnectionString"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables[0].Rows.Count != 0)
        {
          //  ((TextBox)(GridView1.FooterRow.FindControl("as_per_vol"))).Text = ds.Tables[0].Rows[0][2].ToString();
            ((TextBox)(GridView1.FooterRow.FindControl("size_vol"))).Text = ds.Tables[0].Rows[0][2].ToString();

        }
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        //if (e.Row.RowType == DataControlRowType.Footer)
        //{
            
        //}
        
    }
    protected void GridView2_RowCommand(object sender, GridViewCommandEventArgs e)
    {

       
        DropDownList spec = ((DropDownList)(GridView2.FooterRow.FindControl("DropDownList5")));
        scant_no = ((TextBox)(GridView2.FooterRow.FindControl("scant_no0"))).Text;
        DropDownList kind2 = ((DropDownList)(GridView2.FooterRow.FindControl("kind0")));
        DropDownList size_type2 = ((DropDownList)(GridView2.FooterRow.FindControl("size_type3")));
        as_per_vol = ((TextBox)(GridView2.FooterRow.FindControl("as_per_vol0"))).Text;

        string lot_no5 = ((TextBox)(GridView2.FooterRow.FindControl("lot_no"))).Text;


        if (e.CommandName == "insert")
        {

            Label2.Text = "";

            //DataView dv = (DataView)(chk_chl.Select(DataSourceSelectArguments.Empty));
            //if (dv.Table.Rows.Count == 0)
            //{
                //       DropDownList challan_no;




                if (Session["dts7"] == null)
                {

                    DataTable tb = new DataTable();

                    tb.Columns.Add(new DataColumn("scant_no", Type.GetType("System.String")));

                    tb.Columns.Add(new DataColumn("spec_rec", Type.GetType("System.String")));
                    tb.Columns.Add(new DataColumn("kind_rec", Type.GetType("System.String")));


                    tb.Columns.Add(new DataColumn("size_type_rec", Type.GetType("System.String")));

                    tb.Columns.Add(new DataColumn("as_per_vol", Type.GetType("System.String")));
                    tb.Columns.Add(new DataColumn("lot_no", Type.GetType("System.String")));
                    tb.Columns.Add(new DataColumn("spec", Type.GetType("System.String")));

                    Session["dts7"] = tb;


                   




                    DataTable tb2 = new DataTable();
                    tb2 = (DataTable)(Session["dts7"]);
                  
                    Int32 i5;
                    Int32 rws = Convert.ToInt32(((TextBox)(GridView2.FooterRow.FindControl("rws"))).Text);
                    for (i5 = 0; i5 < rws; i5++)
                    {
                        
                        
                        r = tb2.NewRow();
                        Int32 sc5 = Convert.ToInt32(scant_no);
                        sc5= sc5 + i5;

                        r[0] = sc5.ToString();
                        r[1] = spec.SelectedItem.Text;
                        r[2] = kind2.SelectedItem.Text;
                        r[3] = size_type2.SelectedItem.Text;
                        r[4] = as_per_vol;
                        r[5] = lot_no5;
                        tb2.Rows.Add(r);

                        ViewState["scant"] = sc5.ToString();
                    }
                    ViewState["lot2"] = lot_no5;
                    ViewState["spec2"] = spec.SelectedItem.Text.ToString();
                    ViewState["kind2"] = kind2.SelectedItem.Text.ToString();
                    ViewState["size_type2"] = size_type2.SelectedItem.Text.ToString();
                    ViewState["vol2"] = as_per_vol.ToString();

                    g4 = ViewState["spec2"].ToString();
                    g5 = ViewState["kind2"].ToString();
                    g6 = ViewState["size_type2"].ToString();


                    aut2();
                    
                    GridView2.DataSource = tb2;
                    GridView2.DataBind();


                }
                else
                {


                    DataTable tb = new DataTable();
                    tb = (DataTable)(Session["dts7"]);
                    //DataRow r;
                    Int32 i5;
                    Int32 rws = Convert.ToInt32(((TextBox)(GridView2.FooterRow.FindControl("rws"))).Text);
                    for (i5 = 0; i5 < rws; i5++)
                    {


                        r = tb.NewRow();

                        Int32 sc5 = Convert.ToInt32(scant_no);
                        sc5 = sc5 + i5;

                        r[0] = sc5.ToString();
                        r[1] = spec.SelectedItem.Text;
                        r[2] = kind2.SelectedItem.Text;
                        r[3] = size_type2.SelectedItem.Text;
                        r[4] = as_per_vol;
                        r[5] = lot_no5;
                        tb.Rows.Add(r);

                        ViewState["scant"] = sc5.ToString();

                    }


                    ViewState["lot2"] = lot_no5;
                    ViewState["spec2"] = spec.SelectedItem.Text.ToString();
                    ViewState["kind2"] = kind2.SelectedItem.Text.ToString();
                    ViewState["size_type2"] = size_type2.SelectedItem.Text.ToString();
                    ViewState["vol2"] = as_per_vol.ToString();

                    g4 = ViewState["spec2"].ToString();
                    g5 = ViewState["kind2"].ToString();
                    g6 = ViewState["size_type2"].ToString();

                    aut2();
                    //tb.Rows.Add(r);
                    GridView2.DataSource = tb;
                    GridView2.DataBind();

                    spec.Items.FindByText(spec.SelectedItem.Text).Selected = false;
                    spec.Items.FindByText(ViewState["spec2"].ToString()).Selected = true;
                    kind2.Items.FindByText(kind2.SelectedItem.Text).Selected = false;
                    kind2.Items.FindByText(ViewState["kind2"].ToString()).Selected = true;
                    size_type2.Items.FindByText(size_type2.SelectedItem.Text).Selected = false;
                    size_type2.Items.FindByText(ViewState["size_type2"].ToString()).Selected = true;
                    ((TextBox)(GridView2.FooterRow.FindControl("as_per_vol0"))).Text = ViewState["vol2"].ToString();

                    ((TextBox)(GridView2.FooterRow.FindControl("lot_no"))).Text = ViewState["lot2"].ToString();


                    


                }
            //}

            //else
            //{
            //    Label2.Text = "Challan No. not Available ! Please Write Different Challan No.";
            //}

        }
        
        ViewState["spec2"] = spec.SelectedItem.Text.ToString();
        ViewState["kind2"] = kind2.SelectedItem.Text.ToString();
        ViewState["size_type2"] = size_type2.SelectedItem.Text.ToString();
        ViewState["vol2"] = as_per_vol.ToString();
        ViewState["lot2"] = lot_no5.ToString();

        ((TextBox)(GridView2.FooterRow.FindControl("as_per_vol0"))).Text = ViewState["vol2"].ToString();

        ((TextBox)(GridView2.FooterRow.FindControl("lot_no"))).Text = ViewState["lot2"].ToString();
        ((TextBox)(GridView2.FooterRow.FindControl("scant_no0"))).Focus();

    }
    protected void GridView2_RowDeleting(object sender, GridViewDeleteEventArgs e)
    {
        DataTable tb = new DataTable();
        tb = (DataTable)(Session["dts7"]);
        tb.Rows.RemoveAt(e.RowIndex);
        GridView2.DataSource = tb;
        GridView2.DataBind();
        scant_auto = Convert.ToInt32(ViewState["scant"]);
        scant_auto=scant_auto-2;

        ViewState["scant"] = scant_auto.ToString();
        aut2();


    }
    protected void size_type3_SelectedIndexChanged(object sender, EventArgs e)
    {
        DropDownList spec = ((DropDownList)(GridView2.FooterRow.FindControl("DropDownList5")));
        g4 = spec.SelectedItem.Text.ToString();

        DropDownList kind = ((DropDownList)(GridView2.FooterRow.FindControl("kind0")));
        g5 = kind.SelectedItem.Text.ToString();

        DropDownList tye = ((DropDownList)(GridView2.FooterRow.FindControl("size_type3")));
        g6 = tye.SelectedItem.Text.ToString();


        DropDownList size_type = ((DropDownList)(GridView2.FooterRow.FindControl("size_type3")));

        string qry = "select * from size_type where size_type='" + size_type.SelectedItem.Text + "'";

        // string qry = "select * from tally_sheet where challan_no='" + chl + "' and spec='" + spec + "' or challan_no='" + chl + "' and size_type='" + size_type + "' or challan_no='"+chl+"' and spec='"+spec+"'";
        SqlDataAdapter adp = new SqlDataAdapter(qry, ConfigurationManager.ConnectionStrings["forest_depoConnectionString"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables[0].Rows.Count != 0)
        {
            //  ((TextBox)(GridView1.FooterRow.FindControl("as_per_vol"))).Text = ds.Tables[0].Rows[0][2].ToString();
            ((TextBox)(GridView2.FooterRow.FindControl("as_per_vol0"))).Text = ds.Tables[0].Rows[0][2].ToString();

        }

        kind.Items.FindByText(kind.SelectedItem.Text).Selected = false;
        spec.Items.FindByText(spec.SelectedItem.Text).Selected = false;
        tye.Items.FindByText(tye.SelectedItem.Text).Selected = false;

        tye.Items.FindByText(g6).Selected = true;
        spec.Items.FindByText(g4).Selected = true;
        kind.Items.FindByText(g5).Selected = true;





       




    }
    protected void GridView2_RowCreated(object sender, GridViewRowEventArgs e)
    {
        
    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        Response.Redirect("Default_print.aspx");
    }
    protected void GridView1_RowCreated(object sender, GridViewRowEventArgs e)
    {
      

       
    }
    protected void GridView1_SelectedIndexChanged(object sender, EventArgs e)
    {
        
    }


    protected void GridView1_RowUpdating(object sender, GridViewUpdateEventArgs e)
    {
        
    }
   
    protected void DropDownList4_PreRender(object sender, EventArgs e)
    {
        try
        {

            DropDownList spec = ((DropDownList)(GridView1.FooterRow.FindControl("DropDownList4")));
            spec.Items.FindByText(spec.SelectedItem.Text).Selected = false;
            spec.Items.FindByText(g1).Selected = true;
        }
        catch
        {

        }
    }
    protected void kind_PreRender(object sender, EventArgs e)
    {
        try
        {

            DropDownList kind = ((DropDownList)(GridView1.FooterRow.FindControl("kind")));
            kind.Items.FindByText(kind.SelectedItem.Text).Selected = false;
            kind.Items.FindByText(g2).Selected = true;
        }
        catch
        {

        }
    }
   
    protected void size_type_PreRender(object sender, EventArgs e)
    {
        try
        {

            DropDownList tye = ((DropDownList)(GridView1.FooterRow.FindControl("size_type")));
            tye.Items.FindByText(tye.SelectedItem.Text).Selected = false;
            tye.Items.FindByText(g3).Selected = true;
        }
        catch
        {

        }
    }

    protected void size_type_SelectedIndexChanged1(object sender, EventArgs e)
    {
        string k1, k2, k3;

        DropDownList spec = ((DropDownList)(GridView1.FooterRow.FindControl("DropDownList4")));

        g1 = spec.SelectedItem.Text.ToString();
       
        

        DropDownList kind = ((DropDownList)(GridView1.FooterRow.FindControl("kind")));
        g2 = kind.SelectedItem.Text.ToString();
      
       
        

        DropDownList tye = ((DropDownList)(GridView1.FooterRow.FindControl("size_type")));
        g3 = tye.SelectedItem.Text.ToString();
       
        

        DropDownList size_type = ((DropDownList)(GridView1.FooterRow.FindControl("size_type")));

        string qry = "select * from size_type where size_type='" + size_type.SelectedItem.Text + "'";

        // string qry = "select * from tally_sheet where challan_no='" + chl + "' and spec='" + spec + "' or challan_no='" + chl + "' and size_type='" + size_type + "' or challan_no='"+chl+"' and spec='"+spec+"'";
        SqlDataAdapter adp = new SqlDataAdapter(qry, ConfigurationManager.ConnectionStrings["forest_depoConnectionString"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables[0].Rows.Count != 0)
        {
            //  ((TextBox)(GridView1.FooterRow.FindControl("as_per_vol"))).Text = ds.Tables[0].Rows[0][2].ToString();
            ((TextBox)(GridView1.FooterRow.FindControl("size_vol"))).Text = ds.Tables[0].Rows[0][2].ToString();

        }
        kind.Items.FindByText(kind.SelectedItem.Text).Selected = false;
        spec.Items.FindByText(spec.SelectedItem.Text).Selected = false;
        tye.Items.FindByText(tye.SelectedItem.Text).Selected = false;

        tye.Items.FindByText(g3).Selected = true;
        spec.Items.FindByText(g1).Selected = true;
        kind.Items.FindByText(g2).Selected = true;
    }

    protected void DropDownList5_PreRender(object sender, EventArgs e)
    {
          try
        {
        DropDownList spec = ((DropDownList)(GridView1.FooterRow.FindControl("DropDownList5")));
        spec.Items.FindByText(spec.SelectedItem.Text).Selected = false;
        spec.Items.FindByText(g4).Selected = true;
                }
        catch
        {

        }
    }
    protected void kind0_PreRender(object sender, EventArgs e)
    {
          try
        {
        DropDownList kind = ((DropDownList)(GridView1.FooterRow.FindControl("kind0")));
        kind.Items.FindByText(kind.SelectedItem.Text).Selected = false;
        kind.Items.FindByText(g5).Selected = true;
                }
        catch
        {

        }
    }
    protected void size_type3_PreRender(object sender, EventArgs e)
    {
          try
        {
        DropDownList size = ((DropDownList)(GridView2.FooterRow.FindControl("size_type3")));
        size.Items.FindByText(size.SelectedItem.Text).Selected = false;
        size.Items.FindByText(g6).Selected = true;
        }
          catch
          {

          }
    }
    protected void LinkButton3_Click(object sender, EventArgs e)
    {
        Label2.Text = "";

   //DataView dv = (DataView)(chk_chl0.Select(DataSourceSelectArguments.Empty));
   //     if (dv.Table.Rows.Count == 0)
   //     {

        Int32 i2;
        for (i2 = 0; i2 < GridView2.Rows.Count; i2++)
        {
            //if (i != 0)
            //{


            SqlDataSource4.InsertParameters["scant_no"].DefaultValue = ((Label)(GridView2.Rows[i2].FindControl("scant_no1"))).Text;
            //SqlDataSource2.InsertParameters["date_of_chl"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("date_of_chl"))).Text;
            //SqlDataSource2.InsertParameters["date_of_rec"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("date_of_rec"))).Text;

            SqlDataSource4.InsertParameters["date_of_chl"].DefaultValue = date_of_challan.Text.ToString();
            SqlDataSource4.InsertParameters["date_of_rec"].DefaultValue = date_of_recept.Text.ToString();


            SqlDataSource4.InsertParameters["spec"].DefaultValue = ((Label)(GridView2.Rows[i2].FindControl("spec0"))).Text;

            SqlDataSource4.InsertParameters["kind"].DefaultValue = ((Label)(GridView2.Rows[i2].FindControl("kind1"))).Text;


            SqlDataSource4.InsertParameters["size_type"].DefaultValue = ((Label)(GridView2.Rows[i2].FindControl("size_type5"))).Text;


            SqlDataSource4.InsertParameters["as_per_vol"].DefaultValue = ((Label)(GridView2.Rows[i2].FindControl("as_per_vol1"))).Text;

            SqlDataSource4.InsertParameters["lot_no"].DefaultValue = ((Label)(GridView2.Rows[i2].FindControl("lot_no"))).Text;

            SqlDataSource4.Insert();
            Label1.Text = "Sucessfull....";
            //}
        }


        // SqlDataSource2.Insert();

        Label1.Text = "Sucessfull...";
        Response.Redirect("Default_print.aspx?chl=" + challan_no.Text);
        //}
        //else
        //{
        //    Label2.Text = "Challan No. not Available ! Please Write Different Challan No.";
        //}
    }
    protected void DropDownList4_SelectedIndexChanged(object sender, EventArgs e)
    {
       
    }
    protected void kind_SelectedIndexChanged(object sender, EventArgs e)
    {
        DropDownList size_type = ((DropDownList)(GridView1.FooterRow.FindControl("size_type")));
        DropDownList kind = ((DropDownList)(GridView1.FooterRow.FindControl("kind")));
        g2 = kind.SelectedItem.Text.ToString();
        size_type6.SelectParameters["kind"].DefaultValue = kind.SelectedItem.Text.ToString();
        size_type.DataSource = size_type6;
        size_type.DataBind();
        size_type.Focus();



    }
    protected void kind0_SelectedIndexChanged(object sender, EventArgs e)
    {
        DropDownList size_type = ((DropDownList)(GridView2.FooterRow.FindControl("size_type3")));
        DropDownList kind = ((DropDownList)(GridView2.FooterRow.FindControl("kind0")));
        g5 = kind.SelectedItem.Text.ToString();
        g2 = kind.SelectedItem.Text.ToString();
        size_type7.SelectParameters["kind"].DefaultValue = kind.SelectedItem.Text.ToString();
        size_type.DataSource = size_type7;
        size_type.DataBind();
        size_type.Focus();
    }
}
