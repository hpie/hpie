<%@ Page Title="" Language="C#" MasterPageFile="~/Site.master" AutoEventWireup="true" CodeFile="progress.aspx.cs" Inherits="user_progress" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <asp:ScriptManager ID="ScriptManager1" runat="server">
    </asp:ScriptManager>

            <asp:UpdateProgress ID="UpdateProgress1" runat="server" 
                AssociatedUpdatePanelID="MyUpdatePanel">
                <ProgressTemplate>
                    <div align="center">
                        <div style="background-color:#eee;padding:6px;border:solid 1px black;width:50%;text-align:center;">
                            <span class="style1"><i><b>LOADING!</b></i></span>
                            &nbsp;&nbsp;&nbsp;
                            <asp:Image ID="Image1" runat="server" ImageUrl="~/Images/ajax-loader.gif" />
                        </div>
                    </div>
                </ProgressTemplate>
            </asp:UpdateProgress>
            <asp:UpdatePanel ID="MyUpdatePanel" runat="server" UpdateMode="Conditional" >
               <Triggers>
               <asp:PostBackTrigger ControlID="Button2" />
               </Triggers>
                <ContentTemplate>
                    <br /><br />
                    <asp:Button ID="Button1" runat="server" Text="Button 1" 
                        onclick="Button1_Click" />
                    &nbsp;&nbsp;&nbsp;
                    <asp:Button ID="Button2" runat="server" Text="Button 2" 
                        onclick="Button2_Click" />
                    <asp:FileUpload ID="FileUpload1" runat="server" />
                    <br /><br />
                </ContentTemplate>
            </asp:UpdatePanel>
    
        <div id="logOutput" />

        <script type="text/javascript">
            // Create the event handlers for PageRequestManager
            var prm = Sys.WebForms.PageRequestManager.getInstance();

            prm.add_initializeRequest(PageRequestManager_initializeRequest);
            prm.add_beginRequest(PageRequestManager_beginRequest);
            prm.add_endRequest(PageRequestManager_endRequest);

            function PageRequestManager_initializeRequest(sender, args) {
                logEvent("initializeRequest");

                if (sender.get_isInAsyncPostBack()) {
                    args.set_cancel(true);

                    alert('The page is currently serving a request. Please wait until this request completes, then try again.');
                }
            }

            var uiId = '';

            function PageRequestManager_beginRequest(sender, args) {
                logEvent("beginRequest");

                var postbackElem = args.get_postBackElement();
                uiId = postbackElem.id;

                postbackElem.disabled = true;
            }

            function PageRequestManager_endRequest(sender, args) {
                logEvent("endRequest");
            }

            var count = 1;
            function logEvent(msg) {
                var logOutput = document.getElementById('logOutput');
                var rightNow = new Date();
                logOutput.innerHTML += '(' + count + ') ' + msg + ' (' + rightNow.toTimeString() + ')<br />';
                count++;
            }
        </script>
</asp:Content>

