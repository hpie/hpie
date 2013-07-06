<%@ Page Title="" Language="C#" MasterPageFile="Site.master" AutoEventWireup="true" CodeFile="drop_items.aspx.cs" Inherits="drop_items" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 100%;
        }
        .style2
        {
            height: 42px;
        }
    .style3
    {
        height: 41px;
    }
        .style4
        {
            height: 30px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <table class="style1">
        <tr>
            <td>
                <h1>
                    Species Type</h1>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                Select Species</td>
            <td>
                <asp:DropDownList ID="spec_d" runat="server" AutoPostBack="True" 
                    DataSourceID="SqlDataSource1" DataTextField="spec" DataValueField="code" 
                    onselectedindexchanged="spec_d_SelectedIndexChanged">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    DeleteCommand="DELETE FROM dbo.spec where code=@code" 
                    InsertCommand="INSERT INTO dbo.spec(spec) VALUES (@spec)" 
                    SelectCommand="SELECT * FROM [spec] order by spec" 
                    UpdateCommand="UPDATE dbo.spec SET spec =@spec where code=@code">
                    <DeleteParameters>
                        <asp:ControlParameter ControlID="spec_d" Name="code" 
                            PropertyName="SelectedValue" />
                    </DeleteParameters>
                    <InsertParameters>
                        <asp:ControlParameter ControlID="spec_t" Name="spec" PropertyName="Text" />
                    </InsertParameters>
                    <UpdateParameters>
                        <asp:ControlParameter ControlID="spec_t" Name="spec" PropertyName="Text" />
                        <asp:ControlParameter ControlID="spec_d" Name="code" 
                            PropertyName="SelectedValue" />
                    </UpdateParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style2">
            </td>
            <td class="style2">
                <asp:TextBox ID="spec_t" runat="server" Width="210px"></asp:TextBox>
                *
                <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                    ControlToValidate="spec_t" ErrorMessage="Enter Species Type !" 
                    ForeColor="#CC3300" ValidationGroup="g1" SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click" 
                    ValidationGroup="g1">Insert</asp:LinkButton>
&nbsp;
                <asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click" 
                    ValidationGroup="g1">Update</asp:LinkButton>
&nbsp;
                <asp:LinkButton ID="LinkButton3" runat="server" onclick="LinkButton3_Click" 
                    ValidationGroup="g1">Delete</asp:LinkButton>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr />&nbsp;</td>
        </tr>
        <tr>
            <td>
                <h1>
                    Size Type</h1>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                Select Size Type</td>
            <td>
                <asp:DropDownList ID="size_type_d" runat="server" 
                    DataSourceID="SqlDataSource2" DataTextField="size_type" 
                    DataValueField="code" AutoPostBack="True" 
                    onselectedindexchanged="size_type_d_SelectedIndexChanged">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                     DeleteCommand="DELETE FROM dbo.size_type where code=@code" 
                    InsertCommand="INSERT INTO dbo.size_type(size_type, vol) VALUES (@size_type, @vol)" 
                    SelectCommand="SELECT * FROM [size_type] order by size_type" 
                    
                    
                    UpdateCommand="UPDATE dbo.size_type SET size_type =@size_type, vol=@vol where code=@code">
                    <DeleteParameters>
                        <asp:ControlParameter ControlID="size_type_d" Name="code" 
                            PropertyName="SelectedValue" />
                    </DeleteParameters>
                    <InsertParameters>
                        <asp:ControlParameter ControlID="size_type_t" Name="size_type" PropertyName="Text" />
                        <asp:ControlParameter ControlID="vol" Name="vol" PropertyName="Text" />
                    </InsertParameters>
                    <UpdateParameters>
                        <asp:ControlParameter ControlID="size_type_t" Name="size_type" PropertyName="Text" />
                        <asp:ControlParameter ControlID="size_type_d" Name="code" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="vol" Name="vol" PropertyName="Text" />
                    </UpdateParameters>

                    
                    
                    </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style3">
                Enter Size Type</td>
            <td class="style3" style="margin-left: 40px">
                <asp:TextBox ID="size_type_t" runat="server" Width="210px"></asp:TextBox>
                *
                <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                    ControlToValidate="size_type_t" ErrorMessage="Enter Size Type !" ForeColor="#CC3300" 
                    ValidationGroup="g2" SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td class="style3">
                Enter Vol.</td>
            <td class="style3" style="margin-left: 40px">
                <asp:TextBox ID="vol" runat="server" Width="210px"></asp:TextBox>
                *
                <asp:RequiredFieldValidator ID="RequiredFieldValidator4" runat="server" 
                    ControlToValidate="vol" ErrorMessage="Enter Vol. !" ForeColor="#CC3300" 
                    ValidationGroup="g2" SetFocusOnError="True"></asp:RequiredFieldValidator>
                <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    SelectCommand="SELECT * FROM [size_type] WHERE ([code] = @size_type)">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="size_type_d" Name="size_type" 
                            PropertyName="SelectedValue" Type="String" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td style="margin-left: 40px">
                <asp:LinkButton ID="LinkButton4" runat="server" onclick="LinkButton4_Click" 
                    ValidationGroup="g2">Insert</asp:LinkButton>
&nbsp;
                <asp:LinkButton ID="LinkButton5" runat="server" onclick="LinkButton5_Click" 
                    ValidationGroup="g2">Update</asp:LinkButton>
&nbsp;
                <asp:LinkButton ID="LinkButton6" runat="server" onclick="LinkButton6_Click" 
                    ValidationGroup="g2">Delete</asp:LinkButton>
            </td>
        </tr>

         <tr>
            <td colspan="2">
                <hr />&nbsp;</td>
        </tr>

         <tr>
            <td>
                <h1>
                    Grade Items</h1>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                Select grade Items</td>
            <td>
                <asp:DropDownList ID="grade_d" runat="server" 
                    DataSourceID="SqlDataSource3" DataTextField="grade" 
                    DataValueField="code" AutoPostBack="True" 
                    onselectedindexchanged="grade_d_SelectedIndexChanged">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                     DeleteCommand="DELETE FROM grade where code=@code" 
                    InsertCommand="INSERT INTO grade(grade) VALUES (@grade)" 
                    SelectCommand="SELECT * FROM [grade] order by grade" 
                    UpdateCommand="UPDATE grade SET grade =@grade where code=@code">
                    <DeleteParameters>
                        <asp:ControlParameter ControlID="grade_d" Name="code" 
                            PropertyName="SelectedValue" />
                    </DeleteParameters>
                    <InsertParameters>
                        <asp:ControlParameter ControlID="grade_t" Name="grade" PropertyName="Text" />
                    </InsertParameters>
                    <UpdateParameters>
                        <asp:ControlParameter ControlID="grade_t" Name="grade" PropertyName="Text" />
                        <asp:ControlParameter ControlID="grade_d" Name="code" 
                            PropertyName="SelectedValue" />
                    </UpdateParameters>

                    
                    
                    </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style3">
                </td>
            <td class="style3" style="margin-left: 40px">
                <asp:TextBox ID="grade_t" runat="server" Width="210px"></asp:TextBox>
                *
                <asp:RequiredFieldValidator ID="RequiredFieldValidator3" runat="server" 
                    ControlToValidate="grade_t" ErrorMessage="Enter Grade Items !" ForeColor="#CC3300" 
                    ValidationGroup="g3" SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td style="margin-left: 40px">
                <asp:LinkButton ID="LinkButton7" runat="server" onclick="LinkButton7_Click" 
                    ValidationGroup="g3">Insert</asp:LinkButton>
&nbsp;
                <asp:LinkButton ID="LinkButton8" runat="server" onclick="LinkButton8_Click" 
                    ValidationGroup="g3">Update</asp:LinkButton>
&nbsp;
                <asp:LinkButton ID="LinkButton9" runat="server" onclick="LinkButton9_Click" 
                    ValidationGroup="g3">Delete</asp:LinkButton>
            </td>
        </tr>

        <tr>
            <td colspan="2">
               <hr /></td>
        </tr>

        <tr>
            <td>
                <h1>
                    Divisions</h1>
            </td>
            <td style="margin-left: 40px">
                &nbsp;</td>
        </tr>

        <tr>
            <td class="style2">
                Select Division</td>
            <td style="margin-left: 40px" class="style2">
                <asp:DropDownList ID="division_d" runat="server" 
                    DataSourceID="SqlDataSource_div" DataTextField="div" 
                    DataValueField="div" AutoPostBack="True" 
                    onselectedindexchanged="division_d_SelectedIndexChanged">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource_div" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    InsertCommand="INSERT INTO dbo.division(div) VALUES (@div)" 
                    SelectCommand="SELECT [div] FROM [division]">
                    <InsertParameters>
                        <asp:ControlParameter ControlID="division_t" Name="div" PropertyName="Text" />
                    </InsertParameters>
                </asp:SqlDataSource>
            </td>
        </tr>

        <tr>
            <td>
                &nbsp;</td>
            <td style="margin-left: 40px">
                <asp:TextBox ID="division_t" runat="server" Width="210px"></asp:TextBox>
                &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator5" runat="server" 
                    ControlToValidate="division_t" ErrorMessage="Enter Division Name !" ForeColor="#CC3300" 
                    ValidationGroup="g4" SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
        </tr>

        <tr>
            <td>
                &nbsp;</td>
            <td style="margin-left: 40px">
                <asp:LinkButton ID="LinkButton10" runat="server" onclick="LinkButton10_Click" 
                    ValidationGroup="g4">Insert</asp:LinkButton>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <hr /></td>
        </tr>

        <tr>
            <td>
                <h1>
                    Kind</h1>
            </td>
            <td style="margin-left: 40px">
                &nbsp;</td>
        </tr>

        <tr>
            <td class="style4">
                Select Kind</td>
            <td style="margin-left: 80px" class="style4">
                <asp:DropDownList ID="kind_d" runat="server" 
                    DataSourceID="SqlDataSource_kind" DataTextField="kind" 
                    DataValueField="kind" AutoPostBack="True" 
                    onselectedindexchanged="kind_d_SelectedIndexChanged">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource_kind" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    InsertCommand="INSERT INTO kind(kind) VALUES (@kind)" 
                    SelectCommand="SELECT [kind] FROM [kind]">
                    <InsertParameters>
                        <asp:ControlParameter ControlID="kind_t" Name="kind" PropertyName="Text" />
                    </InsertParameters>
                </asp:SqlDataSource>
            </td>
        </tr>

        <tr>
            <td class="style2">
                </td>
            <td style="margin-left: 40px" class="style2">
                <asp:TextBox ID="kind_t" runat="server" Width="210px"></asp:TextBox>
                &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator6" runat="server" 
                    ControlToValidate="kind_t" ErrorMessage="Enter Kind Name !" ForeColor="#CC3300" 
                    ValidationGroup="g5" SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
        </tr>

        <tr>
            <td>
                &nbsp;</td>
            <td style="margin-left: 40px">
                <asp:LinkButton ID="LinkButton11" runat="server" onclick="LinkButton11_Click" 
                    ValidationGroup="g5">Insert</asp:LinkButton>
            </td>
        </tr>

        <tr>
            <td>
                &nbsp;</td>
            <td style="margin-left: 40px">
                &nbsp;</td>
        </tr>

    </table>
</asp:Content>

