using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Threading;

public partial class user_progress : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        Thread.Sleep(50000);
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        //Thread.Sleep(50000);
        string ss = FileUpload1.PostedFile.ContentLength.ToString();
    }
   
}