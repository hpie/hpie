<%@ Application Language="C#" %>

<script runat="server">
    protected void Application_BeginRequest(Object sender, EventArgs e)
    {
        System.Threading.Thread.CurrentThread.CurrentCulture = new System.Globalization.CultureInfo("en-IN");
        System.Threading.Thread.CurrentThread.CurrentUICulture = System.Threading.Thread.CurrentThread.CurrentCulture;
    }
    void Application_AuthenticateRequest(object sender, EventArgs e)
    {
        if (HttpContext.Current.User != null)
        {
            FormsIdentity fi;
            fi = (FormsIdentity)(User.Identity);
            FormsAuthenticationTicket tkt;
            tkt = fi.Ticket;
            string ud;
            ud = tkt.UserData;
            string[] arr;
            arr = ud.Split(';');
            HttpContext.Current.User = new System.Security.Principal.GenericPrincipal(fi, arr);
        }

    }

    void Application_Start(object sender, EventArgs e) 
    {
        // Code that runs on application startup

    }
    
    void Application_End(object sender, EventArgs e) 
    {
        //  Code that runs on application shutdown

    }
        
    void Application_Error(object sender, EventArgs e) 
    { 
        // Code that runs when an unhandled error occurs

    }

    void Session_Start(object sender, EventArgs e) 
    {
        // Code that runs when a new session is started

    }

    void Session_End(object sender, EventArgs e) 
    {
        // Code that runs when a session ends. 
        // Note: The Session_End event is raised only when the sessionstate mode
        // is set to InProc in the Web.config file. If session mode is set to StateServer 
        // or SQLServer, the event is not raised.

    }
       
</script>
