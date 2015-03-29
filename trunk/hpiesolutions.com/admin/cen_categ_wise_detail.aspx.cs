using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Collections;
public partial class admin_cen_categ_wise_detail : System.Web.UI.Page
{
    Int32 a1, a2, a3, a4, a5, b1, b2, b3, b4, b5, c1, c2, c3, c4, c5;
   Int32 sr=0;
   Int32 sc_tot5, st_tot5, obc_tot5, min_tot5, tot_tot5;
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void DataList1_ItemDataBound(object sender, DataListItemEventArgs e)
    {
        if (e.Item.ItemType == ListItemType.Item ||
            e.Item.ItemType == ListItemType.AlternatingItem)
        {
           sr++;
           ((Label)(e.Item.FindControl("sr"))).Text = sr.ToString();
            ArrayList itm = new ArrayList();
            itm.Add("7");
            itm.Add("8");
            itm.Add("10");
            itm.Add("11");
            Int32 r;
            for (r = 0; r < 4; r++)
            {
               
 Int32 sc=0, st=0, obc=0, min=0, tot=0;
                
                //DropDownList dr;
                //dr=((DropDownList)(e.Item.FindControl("dr1")));
                string cd = ((Label)(e.Item.FindControl("cd"))).Text;
                //string cn = ((Label)(e.Item.FindControl("cn"))).Text;
                SqlDataSource2.SelectParameters["center_code"].DefaultValue = cd;
                SqlDataSource2.SelectParameters["course"].DefaultValue = itm[r].ToString();

                DataView dv = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));
                if (dv != null)
                {
                    if (dv.Table.Rows.Count != 0)
                    {
                      
                        Int32 i;
                        for (i = 0; i < dv.Table.Rows.Count; i++)
                        {
                            string ckk = dv.Table.Rows[i]["social_status"].ToString();
                           
                            if (dv.Table.Rows[i]["social_status"].ToString() == "SC")
                            {
                                sc++;
                              

                            }
                            if (dv.Table.Rows[i]["social_status"].ToString() == "ST")
                            {
                                st++;
                                
                            }
                            if (dv.Table.Rows[i]["social_status"].ToString() == "OBC")
                            {
                                obc++;
                               
                            }
                            if (dv.Table.Rows[i]["social_status"].ToString() == "Minorities")
                            {
                                min++;
                               
                            }
                        }
                        tot = sc + st + obc + min;
                        
                        sc_tot5 += sc;
                        st_tot5 += st;
                        obc_tot5 += obc;
                        min_tot5 += min;
                        tot_tot5 += tot;

                        if (r == 0)
                        {
                            a1 += sc;
                            a2 += st;
                            a3 += obc;
                            a4 += min;
                            a5 += tot;
                            ((Label)(e.Item.FindControl("pgdm_1"))).Text = sc.ToString();
                            ((Label)(e.Item.FindControl("pgdm_2"))).Text = st.ToString();
                            ((Label)(e.Item.FindControl("pgdm_3"))).Text = obc.ToString();
                            ((Label)(e.Item.FindControl("pgdm_4"))).Text = min.ToString();
                            ((Label)(e.Item.FindControl("pgdm_tot"))).Text = tot.ToString();
                        }
                        if (r == 1)
                        {
                            c1 += sc;
                            c2 += st;
                            c3 += obc;
                            c4 += min;
                            c5 += tot;
                            ((Label)(e.Item.FindControl("dca_1"))).Text = sc.ToString();
                            ((Label)(e.Item.FindControl("dca_2"))).Text = st.ToString();
                            ((Label)(e.Item.FindControl("dca_3"))).Text = obc.ToString();
                            ((Label)(e.Item.FindControl("dca_4"))).Text = min.ToString();
                            ((Label)(e.Item.FindControl("dca_tot"))).Text = tot.ToString();
                        }
                        //if (r == 2)
                        //{
                        //    ((Label)(e.Item.FindControl("dmca_1"))).Text = sc.ToString();
                        //    ((Label)(e.Item.FindControl("dmca_2"))).Text = st.ToString();
                        //    ((Label)(e.Item.FindControl("dmca_3"))).Text = obc.ToString();
                        //    ((Label)(e.Item.FindControl("dmca_4"))).Text = min.ToString();
                        //    ((Label)(e.Item.FindControl("dmca_tot"))).Text = tot.ToString();
                        //}
                         if (r == 3)
                        {
                            b1 += sc;
                            b2 += st;
                            b3 += obc;
                            b4 += min;
                            b5 += tot;
                            ((Label)(e.Item.FindControl("dmo_1"))).Text = sc.ToString();
                            ((Label)(e.Item.FindControl("dmo_2"))).Text = st.ToString();
                            ((Label)(e.Item.FindControl("dmo_3"))).Text = obc.ToString();
                            ((Label)(e.Item.FindControl("dmo_4"))).Text = min.ToString();
                            ((Label)(e.Item.FindControl("dmo_tot"))).Text = tot.ToString();
                        }
                        sc=0;
                        st=0;
                        obc=0;
                        min = 0;
                        tot = 0;
                        }

                       
                    }
                    else
                    {

                    }
                }

            ((Label)(e.Item.FindControl("sc_tot"))).Text = sc_tot5.ToString();
            ((Label)(e.Item.FindControl("st_tot"))).Text = st_tot5.ToString(); 
            ((Label)(e.Item.FindControl("obc_tot"))).Text = obc_tot5.ToString();
            ((Label)(e.Item.FindControl("min_tot"))).Text = min_tot5.ToString(); 
            ((Label)(e.Item.FindControl("tot_tot"))).Text = tot_tot5.ToString();

            sc_tot5 = 0;
            st_tot5 = 0;
            obc_tot5 = 0;
            min_tot5 = 0;
            tot_tot5 = 0;

            }
        if (e.Item.ItemType == ListItemType.Footer)
        {



            ((Label)(e.Item.FindControl("a1"))).Text = a1.ToString();
            ((Label)(e.Item.FindControl("a2"))).Text = a2.ToString();
            ((Label)(e.Item.FindControl("a3"))).Text = a3.ToString();
            ((Label)(e.Item.FindControl("a4"))).Text = a4.ToString();
            ((Label)(e.Item.FindControl("a5"))).Text = a5.ToString();

            ((Label)(e.Item.FindControl("b1"))).Text = b1.ToString();
            ((Label)(e.Item.FindControl("b2"))).Text = b2.ToString();
            ((Label)(e.Item.FindControl("b3"))).Text = b3.ToString();
            ((Label)(e.Item.FindControl("b4"))).Text = b4.ToString();
            ((Label)(e.Item.FindControl("b5"))).Text = b5.ToString();

            ((Label)(e.Item.FindControl("c1"))).Text = c1.ToString();
            ((Label)(e.Item.FindControl("c2"))).Text = c2.ToString();
            ((Label)(e.Item.FindControl("c3"))).Text = c3.ToString();
            ((Label)(e.Item.FindControl("c4"))).Text = c4.ToString();
            ((Label)(e.Item.FindControl("c5"))).Text = c5.ToString();
          
            ((Label)(e.Item.FindControl("d1"))).Text = (a1+b1+c1).ToString();
            ((Label)(e.Item.FindControl("d2"))).Text = (a2 + b2 + c2).ToString();
            ((Label)(e.Item.FindControl("d3"))).Text = (a3 + b3 + c3).ToString();
            ((Label)(e.Item.FindControl("d4"))).Text = (a4 + b4 + c4).ToString();
            ((Label)(e.Item.FindControl("d5"))).Text = (a5 + b5 + c5).ToString();
        }
        }


    protected void LinkButton2_Click(object sender, EventArgs e)
    {

        try
        {
            Response.Clear();
            Response.Buffer = true;
            Response.AddHeader("content-disposition", string.Format("attachment; filename={0}", "CenterWiseDetail.xls"));
            Response.ContentType = "application/ms-excel";
            Response.Charset = "";
            this.EnableViewState = false;
            System.IO.StringWriter writer = new System.IO.StringWriter();
            System.Web.UI.HtmlTextWriter html = new System.Web.UI.HtmlTextWriter(writer);
            DataList1.DataBind();
            DataList1.RenderControl(html);
            Response.Write(writer.ToString());
            Response.Flush();
            Response.End();
        }
        catch (Exception ex)
        {
        }
        
    }
}