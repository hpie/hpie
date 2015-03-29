<%@ Page Title="Log In" Language="C#" MasterPageFile="~/Site.master" AutoEventWireup="true"
    CodeFile="Login.aspx.cs" Inherits="Account_Login" %>

<asp:Content ID="HeaderContent" runat="server" ContentPlaceHolderID="HeadContent">
         
    <style type="text/css">
        .style1
        {
            color: #1E97C2;
        }
    </style>
         
</asp:Content>
<asp:Content ID="BodyContent" runat="server" ContentPlaceHolderID="MainContent">
   <div class="lg">  <h2>
        <span class="style1">Log In</span>
        <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
            ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
            InsertCommand="INSERT INTO [log] (login_id, date, location, system_type, result, city, state, country) VALUES (@login_id, @date, @location, @system_type, @result, @city, @state, @country)" 
            SelectCommand="SELECT * FROM [atten_sheet]">
            <InsertParameters>
                <asp:Parameter Name="login_id" />
                <asp:Parameter Name="date" />
                <asp:Parameter Name="location" />
                <asp:Parameter Name="system_type" />
                <asp:Parameter Name="result" />
                <asp:Parameter Name="city" />
                <asp:Parameter Name="state" />
                <asp:Parameter Name="country" />
            </InsertParameters>
        </asp:SqlDataSource>
    </h2> 
   
    <p>
        Please enter your username and password.</p>
    <p>
        <asp:Label ID="Label1" runat="server" style="font-weight: 700; color: #CC3300"></asp:Label>
    </p>
   
    <asp:Login ID="LoginUser"  runat="server" EnableViewState="false" 
        RenderOuterTable="false"  
        style="text-align: left" onauthenticate="LoginUser_Authenticate" 
           TitleText="" >
        <TextBoxStyle CssClass="ttxt" />
    </asp:Login>
</div>
   
    
</asp:Content>