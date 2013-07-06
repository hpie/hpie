using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;

public partial class Add_Species : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            DataView tb = (DataView)(SqlDataSource3.Select(DataSourceSelectArguments.Empty));
            if (tb.Table.Rows.Count != 0)
            {

                deodar_811.Text = tb.Table.Rows[0][1].ToString();
                deodar_812.Text = tb.Table.Rows[0][2].ToString();
                deodar_821.Text = tb.Table.Rows[0][3].ToString();
                deodar_822.Text = tb.Table.Rows[0][4].ToString();
                deodar_831.Text = tb.Table.Rows[0][5].ToString();
                deodar_832.Text = tb.Table.Rows[0][6].ToString();
                kail_911.Text = tb.Table.Rows[0][7].ToString();
                kail_912.Text = tb.Table.Rows[0][8].ToString();
                kail_921.Text = tb.Table.Rows[0][9].ToString();
                kail_922.Text = tb.Table.Rows[0][10].ToString();
                kail_931.Text = tb.Table.Rows[0][11].ToString();
                kail_932.Text = tb.Table.Rows[0][12].ToString();
                fir_1011.Text = tb.Table.Rows[0][13].ToString();
                fir1012.Text = tb.Table.Rows[0][14].ToString();
                fir1021.Text = tb.Table.Rows[0][15].ToString();
                fir1022.Text = tb.Table.Rows[0][38].ToString();
                fir1031.Text = tb.Table.Rows[0][16].ToString();
                fir1032.Text = tb.Table.Rows[0][17].ToString();
                chil_1111.Text = tb.Table.Rows[0][18].ToString();
                chil_1112.Text = tb.Table.Rows[0][19].ToString();
                chil_1121.Text = tb.Table.Rows[0][20].ToString();
                chil_1122.Text = tb.Table.Rows[0][21].ToString();
                chil_1131.Text = tb.Table.Rows[0][22].ToString();
                chil_1132.Text = tb.Table.Rows[0][23].ToString();
                other_1211.Text = tb.Table.Rows[0][24].ToString();
                other_1212.Text = tb.Table.Rows[0][25].ToString();
                other_1221.Text = tb.Table.Rows[0][26].ToString();
                other_1222.Text = tb.Table.Rows[0][27].ToString();
                other_1231.Text = tb.Table.Rows[0][28].ToString();
                other_1232.Text = tb.Table.Rows[0][29].ToString();
                total_1311.Text = tb.Table.Rows[0][30].ToString();
                total_1312.Text = tb.Table.Rows[0][31].ToString();
                total_1321.Text = tb.Table.Rows[0][32].ToString();
                total_1322.Text = tb.Table.Rows[0][33].ToString();
                total_1331.Text = tb.Table.Rows[0][34].ToString();
                total_1332.Text = tb.Table.Rows[0][35].ToString();
                remarks.Text = tb.Table.Rows[0][36].ToString();
             




































            }
        }
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        Int32 deo_1, deo_2, deo_3, deo_4;
        deo_1 = Convert.ToInt32(deodar_811.Text);
        deo_2 = Convert.ToInt32(deodar_811.Text);
        deo_3= Convert.ToInt32(deodar_821.Text);
        deo_4= Convert.ToInt32(deodar_822.Text);
        deodar_831.Text = Convert.ToInt32(deo_1 - deo_2).ToString();
        deodar_832.Text = Convert.ToInt32(deo_2 - deo_4).ToString();

        Int32 kail_1, kail_2, kail_3, kail_4;
        kail_1 = Convert.ToInt32(kail_911.Text);
        kail_2 = Convert.ToInt32(kail_912.Text);
        kail_3 = Convert.ToInt32(kail_921.Text);
        kail_4 = Convert.ToInt32(kail_922.Text);
        kail_931.Text = Convert.ToInt32(kail_1 - kail_2).ToString();
        kail_932.Text = Convert.ToInt32(kail_3 - kail_4).ToString();

        Int32 fir_1, fir_2, fir_3, fir_4;
        fir_1 = Convert.ToInt32(fir_1011.Text);
        fir_2 = Convert.ToInt32(fir1012.Text);
        fir_3 = Convert.ToInt32(fir1021.Text);
        fir_4 = Convert.ToInt32(fir1022.Text);
        fir1031.Text = Convert.ToInt32(fir_1 - fir_2).ToString();
        fir1032.Text = Convert.ToInt32(fir_3 - kail_4).ToString();

        Int32 chil_1, chil_2, chil_3, chil_4;
        chil_1 = Convert.ToInt32(chil_1111.Text);
        chil_2 = Convert.ToInt32(chil_1112.Text);
        chil_3 = Convert.ToInt32(chil_1121.Text);
        chil_4 = Convert.ToInt32(chil_1122.Text);
        chil_1131.Text = Convert.ToInt32(chil_1 - chil_2).ToString();
        chil_1132.Text = Convert.ToInt32(chil_3 - chil_4).ToString();


        Int32 other_1, other_2, other_3, other_4;
        other_1 = Convert.ToInt32(other_1212.Text);
        other_2 = Convert.ToInt32(other_1212.Text);
        other_3 = Convert.ToInt32(other_1221.Text);
        other_4 = Convert.ToInt32(other_1222.Text);
        other_1231.Text = Convert.ToInt32(other_1 - other_2).ToString();
        other_1232.Text = Convert.ToInt32(other_3 - other_4).ToString();

        Int32 total_1, total_2, total_3, total_4;
        total_1 = Convert.ToInt32(total_1312.Text);
        total_2 = Convert.ToInt32(total_1312.Text);
        total_3 = Convert.ToInt32(total_1321.Text);
        total_4 = Convert.ToInt32(total_1322.Text);
        total_1331.Text = Convert.ToInt32(total_1 - total_2).ToString();
        total_1332.Text = Convert.ToInt32(total_3 - total_4).ToString();
        LinkButton2.Visible = true;
        LinkButton3.Visible = true;
        LinkButton1.Visible = false;
    }
    protected void LinkButton3_Click(object sender, EventArgs e)
    {
        LinkButton2.Visible =false;
        LinkButton1.Visible = true;
    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        LinkButton3.Visible = false;
        LinkButton2.Visible = false;
        LinkButton1.Visible = true;
        SqlDataSource2.Delete();
        SqlDataSource2.Insert();
    }
}