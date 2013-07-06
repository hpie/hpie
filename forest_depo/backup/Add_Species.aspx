<%@ Page Title="" Language="C#" MasterPageFile="~/Site.master" AutoEventWireup="true" CodeFile="Add_Species.aspx.cs" Inherits="Add_Species" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">

        .style1
        {
            width: 100%;
        }
        </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <h2>
        Timber receipt tally sheet !
    </h2>
    <br />
                <table class="style1" __designer:mapid="426" border="1px" 
        bordercolor="black" style="text-align: center">
                    <tr __designer:mapid="427">
                        <td __designer:mapid="428" colspan="6">
                            Deodar</td>
                        <td __designer:mapid="429" colspan="6">
                            Kail</td>
                        <td __designer:mapid="42a" colspan="6">
                            Fir</td>
                    </tr>
                       
                       
                             <tr __designer:mapid="42b">  
                        <td __designer:mapid="42c" colspan="2">
                     
                     
                            As Per Challan</td>
                        <td __designer:mapid="42d" colspan="2">
                            As Per Reseipt</td>
                                 <td colspan="2" __designer:mapid="42e">
                                     Variation</td>
                                 <td colspan="2" __designer:mapid="42f">
                                     As Per Challan</td>
                                 <td colspan="2" __designer:mapid="430">
                                     As Per Reseipt</td>
                                 <td colspan="2" __designer:mapid="431">
                                     Variation</td>
                                 <td colspan="2" __designer:mapid="432">
                                     As Per Challan</td>
                                 <td colspan="2" __designer:mapid="433">
                                     As Per Reseipt</td>
                                 <td colspan="2" __designer:mapid="434">
                                     Variation</td>
                    </tr>  
                    <tr __designer:mapid="435">
                        <td __designer:mapid="436" style="font-size: 8px">
                            No.</td>
                        <td __designer:mapid="437" style="font-size: 8px">
                            Vol.</td>
                        <td style="font-size: 8px" __designer:mapid="438">
                            No.</td>
                        <td style="font-size: 8px" __designer:mapid="439">
                            Vol.</td>
                        <td style="font-size: 8px" __designer:mapid="43a">
                            No.</td>
                        <td style="font-size: 8px" __designer:mapid="43b">
                            Vol.</td>
                                <td __designer:mapid="436" style="font-size: 8px">
                            No.</td>
                        <td __designer:mapid="437" style="font-size: 8px">
                            Vol.</td>
                        <td style="font-size: 8px" __designer:mapid="438">
                            No.</td>
                        <td style="font-size: 8px" __designer:mapid="439">
                            Vol.</td>
                        <td style="font-size: 8px" __designer:mapid="43a">
                            No.</td>
                        <td style="font-size: 8px" __designer:mapid="43b">
                            Vol.</td>
                               <td __designer:mapid="436" style="font-size: 8px">
                            No.</td>
                        <td __designer:mapid="437" style="font-size: 8px">
                            Vol.</td>
                        <td style="font-size: 8px" __designer:mapid="438">
                            No.</td>
                        <td style="font-size: 8px" __designer:mapid="439">
                            Vol.</td>
                        <td style="font-size: 8px" __designer:mapid="43a">
                            No.</td>
                        <td style="font-size: 8px" __designer:mapid="43b">
                            Vol.</td>
                    </tr>
                    <tr __designer:mapid="435">
                        <td __designer:mapid="436" style="font-size: 8px">
                            8.1.1</td>
                        <td __designer:mapid="437" style="font-size: 8px">
                            8.1.2</td>
                        <td style="font-size: 8px" __designer:mapid="438">
                            8.2.1</td>
                        <td style="font-size: 8px" __designer:mapid="439">
                            8.2.2</td>
                        <td style="font-size: 8px" __designer:mapid="43a">
                            8.3.1</td>
                        <td style="font-size: 8px" __designer:mapid="43b">
                            8.3.2</td>
                        <td style="font-size: 8px" __designer:mapid="43c">
                            9.1.1</td>
                        <td style="font-size: 8px" __designer:mapid="43d">
                            9.1.2</td>
                        <td style="font-size: 8px" __designer:mapid="43e">
                            9.2.1</td>
                        <td style="font-size: 8px" __designer:mapid="43f">
                            9.2.2</td>
                        <td style="font-size: 8px" __designer:mapid="440">
                            9.3.1</td>
                        <td style="font-size: 8px" __designer:mapid="441">
                            9.3.2</td>
                        <td style="font-size: 8px" __designer:mapid="442">
                            10.1.1</td>
                        <td style="font-size: 8px" __designer:mapid="443">
                            10.1.2</td>
                        <td style="font-size: 8px" __designer:mapid="444">
                            10.2.1</td>
                        <td style="font-size: 8px" __designer:mapid="445">
                            10.2.2</td>
                        <td style="font-size: 8px" __designer:mapid="446">
                            10.3.1</td>
                        <td style="font-size: 8px" __designer:mapid="447">
                            10.3.2</td>
                    </tr>
                    <tr __designer:mapid="448">
                        <td __designer:mapid="449">
                            <asp:TextBox runat="server" ID="deodar_811" Width="30px"></asp:TextBox>

                        </td>
                        <td __designer:mapid="44b">
                            <asp:TextBox runat="server" ID="deodar_812" Width="30px"></asp:TextBox>

                        </td>
                        <td __designer:mapid="44d">
                            <asp:TextBox runat="server" Width="30px" ID="deodar_821"></asp:TextBox>
                        </td>
                        <td __designer:mapid="44f">
                            <asp:TextBox runat="server" Width="30px" ID="deodar_822"></asp:TextBox>
                        </td>
                        <td __designer:mapid="451">
                            <asp:TextBox runat="server" Width="30px" ID="deodar_831" ReadOnly="True"></asp:TextBox>
                        </td>
                        <td __designer:mapid="453">
                            <asp:TextBox runat="server" Width="30px" ID="deodar_832" ReadOnly="True"></asp:TextBox>
                        </td>
                        <td __designer:mapid="455">
                            <asp:TextBox runat="server" Width="30px" ID="kail_911"></asp:TextBox>
                        </td>
                        <td __designer:mapid="457">
                            <asp:TextBox runat="server" Width="30px" ID="kail_912"></asp:TextBox>
                        </td>
                        <td __designer:mapid="459">
                            <asp:TextBox runat="server" Width="30px" ID="kail_921"></asp:TextBox>
                        </td>
                        <td __designer:mapid="45b">
                            <asp:TextBox runat="server" Width="30px" ID="kail_922"></asp:TextBox>
                        </td>
                        <td __designer:mapid="45d">
                            <asp:TextBox runat="server" Width="30px" ID="kail_931" ReadOnly="True"></asp:TextBox>
                        </td>
                        <td __designer:mapid="45f">
                            <asp:TextBox runat="server" Width="30px" ID="kail_932" ReadOnly="True"></asp:TextBox>
                        </td>
                        <td __designer:mapid="461">
                            <asp:TextBox runat="server" Width="30px" ID="fir_1011"></asp:TextBox>
                        </td>
                        <td __designer:mapid="463">
                            <asp:TextBox runat="server" Width="30px" ID="fir1012"></asp:TextBox>
                        </td>
                        <td __designer:mapid="465">
                            <asp:TextBox runat="server" Width="30px" ID="fir1021"></asp:TextBox>
                        </td>
                        <td __designer:mapid="467">
                            <asp:TextBox runat="server" Width="30px" ID="fir1022"></asp:TextBox>
                        </td>
                        <td __designer:mapid="469">
                            <asp:TextBox runat="server" Width="30px" ID="fir1031" ReadOnly="True"></asp:TextBox>
                        </td>
                        <td __designer:mapid="46b">
                            <asp:TextBox runat="server" Width="30px" ID="fir1032" ReadOnly="True"></asp:TextBox>
                        </td>
                    </tr>
                </table>
                <asp:SqlDataSource runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        InsertCommand="INSERT INTO spec_type(deodar_811, deodar_812, deodar_821, deodar_822, deodar_831, deodar_832, kail_911, kail_912, kail_921, kail_922, kail_931, kail_932, fir_1011, fir_1012, fir_1021, fir_1031, fir_1032, chil_1111, chil_1112, chil_1121, chil_1122, chil_1131, chil_1132, other_1211, other_1212, other_1221, other_1222, other_1231, other_1232, total_1311, total_1312, total_1321, total_1322, total_1331, total_1332, fir_1022) VALUES (@deodar_811, @deodar_812, @deodar_821, @deodar_822, @deodar_831, @deodar_832, @kail_911, @kail_912, @kail_921, @kail_922, @kail_931, @kail_932, @fir_1011, @fir_1012, @fir_1021, @fir_1031, @fir_1032, @chil_1111, @chil_1112, @chil_1121, @chil_1122, @chil_1131, @chil_1132, @other_1211, @other_1212, @other_1221, @other_1222, @other_1231, @other_1232, @total_1311, @total_1312, @total_1321, @total_1322, @total_1331, @total_1332, @fir_1022)" 
        
        SelectCommand="SELECT code, deodar_811, deodar_812, deodar_821, deodar_822, deodar_831, deodar_832, kail_911, kail_912, kail_921, kail_922, kail_931, kail_932, fir_1011, fir_1012, fir_1021, fir_1031, fir_1032, chil_1111, chil_1112, chil_1121, chil_1122, chil_1131, chil_1132, other_1211, other_1212, other_1221, other_1222, other_1231, other_1232, total_1311, total_1312, total_1321, total_1322, total_1331, total_1332, remarks, challan_no, fir_1022 FROM spec_type" 
        ID="SqlDataSource2" DeleteCommand="DELETE FROM spec_type">
                    <InsertParameters>
                        <asp:ControlParameter ControlID="deodar_811" PropertyName="Text" 
                            Name="deodar_811"></asp:ControlParameter>
                        <asp:ControlParameter ControlID="deodar_812" PropertyName="Text" 
                            Name="deodar_812"></asp:ControlParameter>
                        <asp:ControlParameter ControlID="deodar_821" PropertyName="Text" 
                            Name="deodar_821"></asp:ControlParameter>
                        <asp:ControlParameter ControlID="deodar_822" PropertyName="Text" 
                            Name="deodar_822"></asp:ControlParameter>
                        <asp:ControlParameter ControlID="deodar_831" PropertyName="Text" 
                            Name="deodar_831"></asp:ControlParameter>
                        <asp:ControlParameter ControlID="deodar_832" PropertyName="Text" 
                            Name="deodar_832"></asp:ControlParameter>
                        <asp:ControlParameter ControlID="kail_911" PropertyName="Text" Name="kail_911">
                        </asp:ControlParameter>
                        <asp:ControlParameter ControlID="kail_912" PropertyName="Text" Name="kail_912">
                        </asp:ControlParameter>
                        <asp:ControlParameter ControlID="kail_921" PropertyName="Text" Name="kail_921">
                        </asp:ControlParameter>
                        <asp:ControlParameter ControlID="kail_922" PropertyName="Text" Name="kail_922">
                        </asp:ControlParameter>
                        <asp:ControlParameter ControlID="kail_931" PropertyName="Text" Name="kail_931">
                        </asp:ControlParameter>
                        <asp:ControlParameter ControlID="kail_932" PropertyName="Text" Name="kail_932">
                        </asp:ControlParameter>
                        <asp:ControlParameter ControlID="fir_1011" PropertyName="Text" Name="fir_1011">
                        </asp:ControlParameter>
                        <asp:ControlParameter ControlID="fir1012" PropertyName="Text" Name="fir_1012">
                        </asp:ControlParameter>
                        <asp:ControlParameter ControlID="fir1021" PropertyName="Text" Name="fir_1021">
                        </asp:ControlParameter>
                        <asp:ControlParameter ControlID="fir1031" PropertyName="Text" Name="fir_1031">
                        </asp:ControlParameter>
                        <asp:ControlParameter ControlID="fir1032" PropertyName="Text" Name="fir_1032">
                        </asp:ControlParameter>
                        <asp:ControlParameter ControlID="chil_1111" PropertyName="Text" 
                            Name="chil_1111"></asp:ControlParameter>
                        <asp:ControlParameter ControlID="chil_1112" PropertyName="Text" 
                            Name="chil_1112"></asp:ControlParameter>
                        <asp:ControlParameter ControlID="chil_1121" PropertyName="Text" 
                            Name="chil_1121"></asp:ControlParameter>
                        <asp:ControlParameter ControlID="chil_1122" PropertyName="Text" 
                            Name="chil_1122"></asp:ControlParameter>
                        <asp:ControlParameter ControlID="chil_1131" PropertyName="Text" 
                            Name="chil_1131"></asp:ControlParameter>
                        <asp:ControlParameter ControlID="chil_1132" PropertyName="Text" 
                            Name="chil_1132"></asp:ControlParameter>
                        <asp:ControlParameter ControlID="other_1211" PropertyName="Text" 
                            Name="other_1211"></asp:ControlParameter>
                        <asp:ControlParameter ControlID="other_1212" PropertyName="Text" 
                            Name="other_1212"></asp:ControlParameter>
                        <asp:ControlParameter ControlID="other_1221" PropertyName="Text" 
                            Name="other_1221"></asp:ControlParameter>
                        <asp:ControlParameter ControlID="other_1222" PropertyName="Text" 
                            Name="other_1222"></asp:ControlParameter>
                        <asp:ControlParameter ControlID="other_1231" PropertyName="Text" 
                            Name="other_1231"></asp:ControlParameter>
                        <asp:ControlParameter ControlID="other_1232" PropertyName="Text" 
                            Name="other_1232"></asp:ControlParameter>
                        <asp:ControlParameter ControlID="total_1311" PropertyName="Text" 
                            Name="total_1311"></asp:ControlParameter>
                        <asp:ControlParameter ControlID="total_1312" PropertyName="Text" 
                            Name="total_1312"></asp:ControlParameter>
                        <asp:ControlParameter ControlID="total_1321" PropertyName="Text" 
                            Name="total_1321"></asp:ControlParameter>
                        <asp:ControlParameter ControlID="total_1322" PropertyName="Text" 
                            Name="total_1322"></asp:ControlParameter>
                        <asp:ControlParameter ControlID="total_1331" PropertyName="Text" 
                            Name="total_1331"></asp:ControlParameter>
                        <asp:ControlParameter ControlID="total_1332" PropertyName="Text" 
                            Name="total_1332"></asp:ControlParameter>
                        <asp:ControlParameter ControlID="fir1022" PropertyName="Text" Name="fir_1022">
                        </asp:ControlParameter>
                    </InsertParameters>
    </asp:SqlDataSource>
                <br />
    <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        SelectCommand="SELECT * FROM [spec_type]"></asp:SqlDataSource>
                <table class="style1" __designer:mapid="496" border="1px" 
        bordercolor="black" style="text-align: center">
                    <tr __designer:mapid="497">
                        <td __designer:mapid="498" colspan="6">
                            Chil</td>
                        <td __designer:mapid="499" colspan="6">
                            Other</td>
                        <td __designer:mapid="49a" colspan="6">
                            Total</td>
                        <td __designer:mapid="49b" rowspan="2">
                            Remarks</td>
                    </tr>
                    <tr __designer:mapid="49c">
                        <td __designer:mapid="49d" colspan="2">
                            As Per Challan</td>
                        <td __designer:mapid="49e" colspan="2">
                            As Per Reseipt</td>
                        <td __designer:mapid="49f" colspan="2">
                            Variation</td>
                        <td __designer:mapid="4a0" colspan="2">
                            As Per Challan</td>
                        <td __designer:mapid="4a1" colspan="2">
                            As Per Reseipt</td>
                        <td __designer:mapid="4a2" colspan="2">
                            Variation</td>
                        <td __designer:mapid="4a3" colspan="2">
                            As Per Challan</td>
                        <td __designer:mapid="4a4" colspan="2">
                            As Per Reseipt</td>
                        <td colspan="2" __designer:mapid="4a5">
                            Variation</td>
                    </tr>
                    <tr __designer:mapid="4a6">
                               <td __designer:mapid="436" style="font-size: 8px">
                            No.</td>
                        <td __designer:mapid="437" style="font-size: 8px">
                            Vol.</td>
                        <td style="font-size: 8px" __designer:mapid="438">
                            No.</td>
                        <td style="font-size: 8px" __designer:mapid="439">
                            Vol.</td>
                        <td style="font-size: 8px" __designer:mapid="43a">
                            No.</td>
                        <td style="font-size: 8px" __designer:mapid="43b">
                            Vol.</td>
                                    <td __designer:mapid="436" style="font-size: 8px">
                            No.</td>
                        <td __designer:mapid="437" style="font-size: 8px">
                            Vol.</td>
                        <td style="font-size: 8px" __designer:mapid="438">
                            No.</td>
                        <td style="font-size: 8px" __designer:mapid="439">
                            Vol.</td>
                        <td style="font-size: 8px" __designer:mapid="43a">
                            No.</td>
                        <td style="font-size: 8px" __designer:mapid="43b">
                            Vol.</td>
                                    <td __designer:mapid="436" style="font-size: 8px">
                            No.</td>
                        <td __designer:mapid="437" style="font-size: 8px">
                            Vol.</td>
                        <td style="font-size: 8px" __designer:mapid="438">
                            No.</td>
                        <td style="font-size: 8px" __designer:mapid="439">
                            Vol.</td>
                        <td style="font-size: 8px" __designer:mapid="43a">
                            No.</td>
                        <td style="font-size: 8px" __designer:mapid="43b">
                            Vol.</td>

                    </tr>
                    <tr __designer:mapid="4a6">
                        <td __designer:mapid="4a7" style="font-size: 8px">
                            11.1.1</td>
                        <td __designer:mapid="4a8" style="font-size: 8px">
                            11.1.2</td>
                        <td __designer:mapid="4a9" style="font-size: 8px">
                            11.2.1</td>
                        <td __designer:mapid="4aa" style="font-size: 8px">
                            11.2.2</td>
                        <td __designer:mapid="4ab" style="font-size: 8px">
                            11.3.1</td>
                        <td __designer:mapid="4ac" style="font-size: 8px">
                            11.3.2</td>
                        <td __designer:mapid="4ad" style="font-size: 8px">
                            12.1.1</td>
                        <td __designer:mapid="4ae" style="font-size: 8px">
                            12.1.2</td>
                        <td style="font-size: 8px" __designer:mapid="4af">
                            12.2.1</td>
                        <td style="font-size: 8px" __designer:mapid="4b0">
                            12.2.2</td>
                        <td style="font-size: 8px" __designer:mapid="4b1">
                            12.3.1</td>
                        <td style="font-size: 8px" __designer:mapid="4b2">
                            12.3.2</td>
                        <td style="font-size: 8px" __designer:mapid="4b3">
                            13.1.1</td>
                        <td style="font-size: 8px" __designer:mapid="4b4">
                            13.1.2</td>
                        <td style="font-size: 8px" __designer:mapid="4b5">
                            13.2.1</td>
                        <td style="font-size: 8px" __designer:mapid="4b6">
                            13.2.2</td>
                        <td style="font-size: 8px" __designer:mapid="4b7">
                            13.3.1</td>
                        <td style="font-size: 8px" __designer:mapid="4b8">
                            13.3.2</td>
                        <td style="font-size: 8px" __designer:mapid="4b9">
                            14</td>
                    </tr>
                    <tr __designer:mapid="4ba">
                        <td __designer:mapid="4bb">
                            <asp:TextBox runat="server" Width="30px" ID="chil_1111"></asp:TextBox>
                        </td>
                        <td __designer:mapid="4bd">
                            <asp:TextBox runat="server" Width="30px" ID="chil_1112"></asp:TextBox>
                        </td>
                        <td __designer:mapid="4bf">
                            <asp:TextBox runat="server" Width="30px" ID="chil_1121"></asp:TextBox>
                        </td>
                        <td __designer:mapid="4c1">
                            <asp:TextBox runat="server" Width="30px" ID="chil_1122"></asp:TextBox>
                        </td>
                        <td __designer:mapid="4c3">
                            <asp:TextBox runat="server" Width="30px" ID="chil_1131" ReadOnly="True"></asp:TextBox>
                        </td>
                        <td __designer:mapid="4c5">
                            <asp:TextBox runat="server" Width="30px" ID="chil_1132" ReadOnly="True"></asp:TextBox>
                        </td>
                        <td __designer:mapid="4c7">
                            <asp:TextBox runat="server" Width="30px" ID="other_1211"></asp:TextBox>
                        </td>
                        <td __designer:mapid="4c9">
                            <asp:TextBox runat="server" Width="30px" ID="other_1212"></asp:TextBox>
                        </td>
                        <td __designer:mapid="4cb">
                            <asp:TextBox runat="server" Width="30px" ID="other_1221"></asp:TextBox>
                        </td>
                        <td __designer:mapid="4cd">
                            <asp:TextBox runat="server" Width="30px" ID="other_1222"></asp:TextBox>
                        </td>
                        <td __designer:mapid="4cf">
                            <asp:TextBox runat="server" Width="30px" ID="other_1231" ReadOnly="True"></asp:TextBox>
                        </td>
                        <td __designer:mapid="4d1">
                            <asp:TextBox runat="server" Width="30px" ID="other_1232" ReadOnly="True"></asp:TextBox>
                        </td>
                        <td __designer:mapid="4d3">
                            <asp:TextBox runat="server" Width="30px" ID="total_1311"></asp:TextBox>
                        </td>
                        <td __designer:mapid="4d5">
                            <asp:TextBox runat="server" Width="30px" ID="total_1312"></asp:TextBox>
                        </td>
                        <td __designer:mapid="4d7">
                            <asp:TextBox runat="server" Width="30px" ID="total_1321"></asp:TextBox>
                        </td>
                        <td __designer:mapid="4d9">
                            <asp:TextBox runat="server" Width="30px" ID="total_1322"></asp:TextBox>
                        </td>
                        <td __designer:mapid="4db">
                            <asp:TextBox runat="server" Width="30px" ID="total_1331" ReadOnly="True"></asp:TextBox>
                        </td>
                        <td __designer:mapid="4dd">
                            <asp:TextBox runat="server" Width="30px" ID="total_1332" ReadOnly="True"></asp:TextBox>
                        </td>
                        <td __designer:mapid="4df">
                            <asp:TextBox runat="server" Width="100px" ID="remarks"></asp:TextBox>
                        </td>
                    </tr>
                    </table>
            <br />
    <br />
    <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Submit</asp:LinkButton>
&nbsp; <asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click" 
        Visible="False">Confirm</asp:LinkButton>
&nbsp;<asp:LinkButton ID="LinkButton3" runat="server" onclick="LinkButton3_Click" 
        Visible="False">Cancel</asp:LinkButton>
</asp:Content>

