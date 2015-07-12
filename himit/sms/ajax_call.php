<?php 
define('INCLUDE_CHECK',true);
require 'connect.php';
require 'functions.php';

session_name('smsLogin');
// Starting the session
//session_set_cookie_params(2*7*24*60*60);
// Making the cookie live for 2 weeks
session_start();

 if(isset($_GET['get']))
 { 
 	//initilize DB
	//require 'connect.php';
	//require_once "./classes/common.php";
	//$common	= new common($_SESSION['id']);
	$currentAcId=$_SESSION['id'];
	
	 if($_GET['get']=='selectedMessage')
	 {
	 	$messageId=$_GET['messageId'];
		$qry = "SELECT AC_ID, AC_Message_ID, AC_Message_Content, AC_Message_Count FROM my_account_messages WHERE
							 AC_Message_ID='{$messageId}' AND AC_ID='{$currentAcId}'";
		//echo($qry);
		$selectList="";					 
		//$selectList.='<option value="-1">--Select--</option>';
		$result = mysql_query($qry);

		if($result)
		{
			while($row = mysql_fetch_assoc($result))
			{
				$selectList.=$row['AC_Message_Content'];
			}
		}
	  	
	    //foreach ( $lotForests as $forest )
        //{
 	    //   $selectList.='<option value="'.$forest['forest_code'].'">'.$forest['forest_name'].'</option>';
        //}
 		
	   echo $selectList;
	  
	 }
	 
	 
	 if($_GET['get']=='getGroupContactList')
	 {
	 	$selectionType=$_GET['selectionType'];
		
		$selectList="";
		if($selectionType=="group")
		{
			
			$qry = "SELECT AC_ID, AC_Contact_Group_ID, AC_Contact_Group_Name, AC_Contact_Group_Description FROM
					my_account_contact_groups WHERE
					STATUS_CD='A' AND AC_ID='{$_SESSION['id']}'";//echo($qry);
			
			$result = mysql_query($qry);
			if($result)
			{		
				//$selectList="<select id='frmgroup' name='group' class='frmSelect'>";					 
				$selectList.='<option value="-1">--Select--</option>';
				while($row = mysql_fetch_assoc($result))
				{
					$selectList.='<option value="'.$row['AC_Contact_Group_ID'].'" title="'.$row['AC_Contact_Group_Description'].'">'
					.$row['AC_Contact_Group_Name'].'</option>';
				}	
				$selectList.="</select>";
			}
			
		} // if group
		
		if($selectionType=="contact")
		{
			
			$qry = "SELECT AC_ID, AC_Contact_ID, AC_Contact_Name, AC_Contact_Phone_No FROM
					my_account_contacts WHERE
					STATUS_CD='A' AND AC_ID='{$_SESSION['id']}'";//echo($qry);
					
			//$selectList="<select id='frmContact' name='contact' class='frmSelect'>";	
			$result = mysql_query($qry);
			if($result)
			{					 
				$selectList.='<option value="-1">--Select--</option>';
				while($row = mysql_fetch_assoc($result))
				{
					$selectList.='<option value="'.$row['AC_Contact_ID'].'" title="'.$row['AC_Contact_Phone_No'].'">'
					.$row['AC_Contact_Name'].'</option>';
				}	
				$selectList.="</select>";
			}
		} // if contact
	    //foreach ( $lotForests as $forest )
        //{
 	    //   $selectList.='<option value="'.$forest['forest_code'].'">'.$forest['forest_name'].'</option>';
        //}
 		
	   echo $selectList;
	  
	 }
	 
	 if($_GET['get']=='forestRangeAndDfo')
	 {
	 	$forestCode=$_GET['forestCode'];
	 	$dfoRange = $db->get_row("SELECT r.range_code, r.range_name, d.dfo_code, d.dfo_name FROM m_range r, m_dfo d, m_forest f WHERE f.range_code=r.range_code AND r.dfo_code=d.dfo_code AND f.forest_code='".$forestCode."'",ARRAY_A);
	 	$details='<label for="dfo_code">DFO:</label>';
		$details.='<input id="dfo_code" type="hidden" name="dfo_code" value="'.$dfoRange['dfo_code'].'"/>';
		$details.='<input class="lblText" readonly="readonly" id="dfo_name" type="text" name="dfo_name" value="'.$dfoRange['dfo_name'].'"/>';
		$details.='<label for="range_code">Range:</label>';
		$details.='<input id="range_code" type="hidden" name="range_code" value="'.$dfoRange['range_code'].'"/>';
		$details.='<input class="lblText" readonly="readonly" id="range_name" type="text" name="range_name" value="'.$dfoRange['range_name'].'"/>';
	 		 	
	 	echo $details;
	 }
	 
 	if($_GET['get']=='calExpenditureDetails')
	 {
	 	$rowId=$_GET['rowId'];
	 	
	 	$zoneCode=$_GET['zoneCode'];
	 	$totalBlazes=$_GET['totalBlazes'];
	 	$yieldFixed=$_GET['yieldFixed'];
	 	$turnout=$_GET['turnout'];
	 	$totalTurnout=$_GET['totalTurnout'];
	 	$distanceToRsd=$_GET['distanceToRsd'];
	 	$seasonYear=$_GET['seasonYear'];
	 	
	 	$eowCalArray=array();
	 	if($rowId>0)
	 	{
	 		$rcalId=$_GET['rcalId'];
	 		$forestCode=$_GET['forestCode'];
	 		$eowCode=$_GET['eowCode'];
	 		$eowCalArray=$common->getExpenditureOnWork($rcalId, $forestCode, $eowCode);
	 		
	 		if($eowCalArray['zone_code']!=$zoneCode)
	 		{
	 			$eowArray = $common->getCalculatedExpenditureOnWork($totalBlazes, $yieldFixed, $turnout, $totalTurnout, $zoneCode, $distanceToRsd, $seasonYear);
	 			$eowCalArray = array_merge($eowCalArray, $eowArray); 	
	 		}
	 		
	 	}else
	 	{
	 		$eowCalArray = $common->getCalculatedExpenditureOnWork($totalBlazes, $yieldFixed, $turnout, $totalTurnout, $zoneCode, $distanceToRsd, $seasonYear);	
	 	}
	 	
		
		$details='<tr><td>Expenditure Type</td> <td>Details</td> <td>Amount</td> </tr>';
		$details.='<tr>';
		$details.='<td>Crop setting at </td>';
		$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_crop_setting" type="text" name="cost_crop_setting" value="'.$eowCalArray['cost_crop_setting'].'"/> </td>';
		$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_crop_setting" type="text" name="exp_crop_setting" value="'.$eowCalArray['exp_crop_setting'].'"/> </td>';
		$details.='<tr>';
		
		if($eowCalArray['zone_code']=="c")
		{
			$details.='<tr>';
			$details.='<td>Extraction of Rasin </td>';
			$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_extr" type="text" name="cost_extr" value="'.$eowCalArray['cost_extr'].'"/> </td>';
			$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_extr_turnout" type="text" name="exp_extr_turnout" value="'.$eowCalArray['exp_extr_turnout'].'"/> </td>';
			$details.='<tr>';	
		}else if($eowCalArray['zone_code']=="h")
		{
			$details.='<tr>';
			$details.='<td>Extraction of Rasin </td>';
			$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_extr" type="text" name="cost_extr" value="'.$eowCalArray['cost_extr'].'"/> </td>';
			$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_extr_turnout" type="text" name="exp_extr_turnout" value="'.$eowCalArray['exp_extr_turnout'].'"/> </td>';
			$details.='<tr>';
		}else if($eowCalArray['zone_code']=="mh")
		{
			$details.='<tr>';
			$details.='<td>Extraction of Rasin </td>';
			$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_extr" type="text" name="cost_extr" value="'.$eowCalArray['cost_extr'].'"/> </td>';
			$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_extr_turnout" type="text" name="exp_extr_turnout" value="'.$eowCalArray['exp_extr_turnout'].'"/> </td>';
			$details.='<tr>';
		}else if($eowCalArray['zone_code']=="mhs")
		{
			$details.='<tr>';
			$details.='<td>Extraction of Rasin </td>';
			$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_extr" type="text" name="cost_extr" value="'.$eowCalArray['cost_extr'].'"/> </td>';
			$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_extr_turnout" type="text" name="exp_extr_turnout" value="'.$eowCalArray['exp_extr_turnout'].'"/> </td>';
			$details.='<tr>';
		}
		
		$details.='<tr>';
		$details.='<td>Carriage of Empty Tins </td>';
			$details.='<td>';
			$details.='<input class="lblTextSmall" readonly="readonly" id="total_tins" type="text" name="total_tins" value="'.$eowCalArray['total_tins'].'"/>'; 
			$details.=' to a distance of <input class="lblTextSmall" readonly="readonly" id="distance_to_rsd" type="text" name="distance_to_rsd" value="'.$eowCalArray['distance_to_rsd'].'"/>km' ;
			$details.=' at Rs.<input class="lblTextSmall" readonly="readonly" id="cost_tpt_tins_to_forest" type="text" name="cost_tpt_tins_to_forest" value="'.$eowCalArray['cost_tpt_tins_to_forest'].'"/> per km.';
			$details.='</td>';
		$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_tpt_tins_to_forest" type="text" name="exp_tpt_tins_to_forest" value="'.$eowCalArray['exp_tpt_tins_to_forest'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Soldering of Tins </td>';
		$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_soldering_of_resin" type="text" name="cost_soldering_of_resin" value="'.$eowCalArray['cost_soldering_of_resin'].'"/> </td>';
		$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_soldering_of_resin" type="text" name="exp_soldering_of_resin" value="'.$eowCalArray['exp_soldering_of_resin'].'"/> </td>';
		$details.='<tr>';
		
		
		$details.='<tr>';
		$details.='<td>Carriage of Resin (Mules)</td>';
			$details.='<td>';
			$details.='<input class="lblTextSmall" readonly="readonly" id="turnout_carriage_mule_rsd" type="text" name="turnout_carriage_mule_rsd" value="'.$eowCalArray['turnout_carriage_mule_rsd'].'" onclick="makeSmallTextEditable(this,\' \')"/>qtl'; 
			$details.=' to a distance of <input class="lblTextSmall" readonly="readonly" id="dist_carriage_mule_rsd" type="text" name="dist_carriage_mule_rsd" value="'.$eowCalArray['dist_carriage_mule_rsd'].'" onclick="makeSmallTextEditable(this,\' \')" onblur="validateCarriageDistance(this)"/>km';
			$details.=' at Rs.<input class="lblTextSmall" readonly="readonly" id="cost_carriage_mule_rsd" type="text" name="cost_carriage_mule_rsd" value="'.$eowCalArray['cost_carriage_mule_rsd'].'"/>per km.';
			$details.=' | <input id="apply_carriage_mule_rsd" type="checkbox" name="apply_carriage_mule_rsd" value="1" onclick="calculateCarriageExp(this)"/> is applied. ';
			$details.='</td>';
		$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_carriage_mule_rsd" type="text" name="exp_carriage_mule_rsd" value="'.$eowCalArray['exp_carriage_mule_rsd'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Carriage of Resin (Manual)</td>';
			$details.='<td>';
			$details.='<input class="lblTextSmall" readonly="readonly" id="turnout_carriage_manual_rsd" type="text" name="turnout_carriage_manual_rsd" value="'.$eowCalArray['turnout_carriage_manual_rsd'].'" onclick="makeSmallTextEditable(this,\' \')"/>qtl'; 
			$details.=' to a distance of <input class="lblTextSmall" readonly="readonly" id="dist_carriage_manual_rsd" type="text" name="dist_carriage_manual_rsd" value="'.$eowCalArray['dist_carriage_manual_rsd'].'" onclick="makeSmallTextEditable(this,\' \')" onblur="validateCarriageDistance(this)"/>km';
			$details.=' at Rs.<input class="lblTextSmall" readonly="readonly" id="cost_carriage_manual_rsd" type="text" name="cost_carriage_manual_rsd" value="'.$eowCalArray['cost_carriage_manual_rsd'].'"/>per km.';
			$details.=' | <input id="apply_carriage_manual_rsd" type="checkbox" name="apply_carriage_manual_rsd" value="1" onclick="calculateCarriageExp(this)"/> is applied. ';
			$details.='</td>';
		$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_carriage_manual_rsd" type="text" name="exp_carriage_manual_rsd" value="'.$eowCalArray['exp_carriage_manual_rsd'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Carriage of Resin (Tractor)</td>';
			$details.='<td>';
			$details.='<input class="lblTextSmall" readonly="readonly" id="turnout_carriage_tractor_rsd" type="text" name="turnout_carriage_tractor_rsd" value="'.$eowCalArray['turnout_carriage_tractor_rsd'].'" onclick="makeSmallTextEditable(this,\' \')"/>qtl'; 
			$details.=' to a distance of <input class="lblTextSmall" readonly="readonly" id="dist_carriage_tractor_rsd" type="text" name="dist_carriage_tractor_rsd" value="'.$eowCalArray['dist_carriage_tractor_rsd'].'" onclick="makeSmallTextEditable(this,\' \')" onblur="validateCarriageDistance(this)"/>km';
			$details.=' at Rs.<input class="lblTextSmall" readonly="readonly" id="cost_carriage_tractor_rsd" type="text" name="cost_carriage_tractor_rsd" value="'.$eowCalArray['cost_carriage_mule_rsd'].'"/>per km.';
			$details.=' | <input id="apply_carriage_tractor_rsd" type="checkbox" name="apply_carriage_tractor_rsd" value="1" onclick="calculateCarriageExp(this)"/> is applied. ';
			$details.='</td>';
		$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_carriage_tractor_rsd" type="text" name="exp_carriage_tractor_rsd" value="'.$eowCalArray['exp_carriage_tractor_rsd'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Carriage of Resin (Other)</td>';
			$details.='<td>';
			$details.='<input class="lblTextSmall" readonly="readonly" id="turnout_carriage_other_rsd" type="text" name="turnout_carriage_other_rsd" value="'.$eowCalArray['turnout_carriage_other_rsd'].'" onclick="makeSmallTextEditable(this,\' \')"/>qtl'; 
			$details.=' to a distance of <input class="lblTextSmall" readonly="readonly" id="dist_carriage_other_rsd" type="text" name="dist_carriage_other_rsd" value="'.$eowCalArray['dist_carriage_other_rsd'].'" onclick="makeSmallTextEditable(this,\' \')" onblur="validateCarriageDistance(this)"/>km';
			$details.=' at Rs.<input class="lblTextSmall" readonly="readonly" id="cost_carriage_other_rsd" type="text" name="cost_carriage_other_rsd" value="'.$eowCalArray['cost_carriage_manual_rsd'].'"/>per km.';
			$details.=' | <input id="apply_carriage_other_rsd" type="checkbox" name="apply_carriage_other_rsd" value="1" onclick="calculateCarriageExp(this)"/> is applied. ';
			$details.='</td>';
		$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_carriage_other_rsd" type="text" name="exp_carriage_other_rsd" value="'.$eowCalArray['exp_carriage_other_rsd'].'"/> </td>';
		$details.='<tr>';
		
		
		$details.='<tr>';
		$details.='<td>Mate commission </td>';
		$details.='<td>at Rs.<input class="lblText" readonly="readonly" id="cost_mate_commission" type="text" name="cost_mate_commission" value="'.$eowCalArray['cost_mate_commission'].'"/> </td>';
		$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_mate_commission" type="text" name="exp_mate_commission" value="'.$eowCalArray['exp_mate_commission'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td colspan="3">';
		$details.='<input type="hidden" id="cost_tpt_tins_to_rsd" name="cost_tpt_drums_to_forest" value=""/>';
		$details.='<input type="hidden" id="exp_tpt_tins_to_rsd" name="exp_tpt_drums_to_forest" value=""/>';
		$details.='<input type="hidden" id="cost_tpt_tins_to_rsd" name="cost_tpt_tins_to_rsd" value=""/>';
		$details.='<input type="hidden" id="exp_tpt_tins_to_rsd" name="exp_tpt_tins_to_rsd" value=""/>';
		$details.='<input type="hidden" id="cost_tpt_tins_to_rsd" name="cost_tpt_drums_to_rsd" value=""/>';
		$details.='<input type="hidden" id="exp_tpt_tins_to_rsd" name="exp_tpt_drums_to_rsd" value=""/>';
		$details.='</td>';
		$details.='<tr>';
		
	 	echo $details;
	 }
	 
 	if($_GET['get']=='calCostOfMaterialDetails')
	 {
	 	$rowId=$_GET['rowId'];
	 	
	 	$numberOfMazdoor=$_GET['numberOfMazdoor'];
	 	$enteredMazdoors=$_GET['enteredMazdoors'];
	 	$totalBlazes=$_GET['totalBlazes'];
	 	$seasonYear=$_GET['seasonYear'];
	 	
	 	$comCalArray=array();
	 	
	 	$details='<tr><td>Expenditure Type</td> <td>Details</td> <td>Amount</td> </tr>';
	 	if($rowId>0)
	 	{
	 		$rcalId=$_GET['rcalId'];
	 		$forestCode=$_GET['forestCode'];
	 		$comCode=$_GET['comCode'];
	 		$comCalArray=$common->getCostOfMaretial($rcalId, $forestCode, $comCode);
	 		
	 		if($comCalArray['number_of_mazdoor']!=$enteredMazdoors)
	 		{
	 			$details.='<tr><td colspan="3">No of Mazdoor has changed from '.$comCalArray['number_of_mazdoor'].' to '.$enteredMazdoors.'. Re-calculation required.</td></tr>';
	 			$comArray = $common->getCalculatedCostOfMaretial($totalBlazes, $numberOfMazdoor, $seasonYear);
	 			$comCalArray = array_merge($comCalArray, $comArray); 
	 		}
	 		
	 	}else
	 	{
	 		$comCalArray = $common->getCalculatedCostOfMaretial($totalBlazes, $numberOfMazdoor, $seasonYear);	
	 	}
	 	
		
		$details.='<tr>';
		$details.='<td>Blaze frame cost at </td>';
		$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_blaze_frame" type="text" name="cost_blaze_frame" value="'.$comCalArray['cost_blaze_frame'].'"/> </td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_blaze_frame" type="text" name="exp_blaze_frame" value="'.$comCalArray['exp_blaze_frame'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Bark shaver cost at </td>';
		$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_bark_shaver" type="text" name="cost_bark_shaver" value="'.$comCalArray['cost_bark_shaver'].'"/> </td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_bark_shaver" type="text" name="exp_bark_shaver" value="'.$comCalArray['exp_bark_shaver'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Groove cutter cost at </td>';
		$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_groove_cutter" type="text" name="cost_groove_cutter" value="'.$comCalArray['cost_groove_cutter'].'"/> </td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_groove_cutter" type="text" name="exp_groove_cutter" value="'.$comCalArray['exp_groove_cutter'].'"/> </td>';
		$details.='<tr>';
		
		
		$details.='<tr>';
		$details.='<td>Freshning knife cost at </td>';
		$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_freshning_knife" type="text" name="cost_freshning_knife" value="'.$comCalArray['cost_freshning_knife'].'"/> </td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_freshning_knife" type="text" name="exp_freshning_knife" value="'.$comCalArray['exp_freshning_knife'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Spray bottle cost at </td>';
		$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_spray_bottle" type="text" name="cost_spray_bottle" value="'.$comCalArray['cost_spray_bottle'].'"/> </td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp__spray_bottle" type="text" name="exp__spray_bottle" value="'.$comCalArray['exp__spray_bottle'].'"/> </td>';
		$details.='<tr>';
		
		
		$details.='<tr>';
		$details.='<td>Hammer cum nail puller cost at </td>';
		$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_hammer_nailpuller" type="text" name="cost_hammer_nailpuller" value="'.$comCalArray['cost_hammer_nailpuller'].'"/> </td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_hammer_nailpuller" type="text" name="exp_hammer_nailpuller" value="'.$comCalArray['exp_hammer_nailpuller'].'"/> </td>';
		$details.='<tr>';
		
		
		$details.='<tr>';
		$details.='<td>Pot scrapper cost at </td>';
		$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_pot_scrapper" type="text" name="cost_pot_scrapper" value="'.$comCalArray['cost_pot_scrapper'].'"/> </td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_pot_scrapper" type="text" name="exp_pot_scrapper" value="'.$comCalArray['exp_pot_scrapper'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Pots cost at </td>';
		$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_pots" type="text" name="cost_pots" value="'.$comCalArray['cost_pots'].'"/> for '. ceil(($comCalArray['blazes_received']/2)).' pots</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_pots" type="text" name="exp_pots" value="'.$comCalArray['exp_pots'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Lips cost at </td>';
		$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_lips" type="text" name="cost_lips" value="'.$comCalArray['cost_lips'].'"/> per 100 </td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_lips" type="text" name="exp_lips" value="'.$comCalArray['exp_lips'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Wire nails 5cm </td>';
			$details.='<td>';
			$details.='needed <input class="textbox" id="qty_wire_nails_5cm" type="text" name="qty_wire_nails_5cm" value="'.$comCalArray['qty_wire_nails_5cm'].'" data-required="true" data-error-message="Please enter qunatity for nails" data-type="number" data-type-number-message="Only number is allowed" onblur="calculateAmount(this, cost_wire_nails_5cm, exp_wire_nails_5cm)"/>'; 
			$details.=' at Rs<input class="lblText" readonly="readonly" id="cost_wire_nails_5cm" type="text" name="cost_wire_nails_5cm" value="'.$comCalArray['cost_wire_nails_5cm'].'"/>';
			$details.='</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_wire_nails_5cm" type="text" name="exp_wire_nails_5cm" value="'.$comCalArray['exp_wire_nails_5cm'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Wire nails 2cm </td>';
			$details.='<td>';
			$details.='needed <input class="textbox" id="qty_wire_nails_2cm" type="text" name="qty_wire_nails_2cm" value="'.$comCalArray['qty_wire_nails_2cm'].'" data-required="true" data-error-message="Please enter qunatity for nails" data-type="number" data-type-number-message="Only number is allowed" onblur="calculateAmount(this, cost_wire_nails_2cm, exp_wire_nails_2cm)"/>';
			$details.=' at Rs<input class="lblText" readonly="readonly" id="cost_wire_nails_2cm" type="text" name="cost_wire_nails_2cm" value="'.$comCalArray['cost_wire_nails_2cm'].'"/>';
			$details.='</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_wire_nails_2cm" type="text" name="exp_wire_nails_2cm" value="'.$comCalArray['exp_wire_nails_2cm'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Solder </td>';
			$details.='<td>';
			$details.='needed <input class="textbox" id="qty_solder" type="text" name="qty_solder" value="'.$comCalArray['qty_solder'].'" data-required="true" data-error-message="Please enter qunatity for solder" data-type="number" data-type-number-message="Only number is allowed" onblur="calculateAmount(this, cost_solder, exp_solder)"/>'; 
			$details.=' at Rs<input class="lblText" readonly="readonly" id="cost_solder" type="text" name="cost_solder" value="'.$comCalArray['cost_solder'].'"/>';
			$details.='</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_solder" type="text" name="exp_solder" value="'.$comCalArray['exp_solder'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Naushadar </td>';
			$details.='<td>';
			$details.='needed <input class="textbox" id="qty_naushader" type="text" name="qty_naushader" value="'.$comCalArray['qty_naushader'].'" data-required="true" data-error-message="Please enter qunatity for naushadar" data-type="number" data-type-number-message="Only number is allowed" onblur="calculateAmount(this, cost_naushader, exp_naushader)"/>'; 
			$details.=' at Rs<input class="lblText" readonly="readonly" id="cost_naushader" type="text" name="cost_naushader" value="'.$comCalArray['cost_naushader'].'"/>';
			$details.='</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_naushader" type="text" name="exp_naushader" value="'.$comCalArray['exp_naushader'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Charcoal </td>';
			$details.='<td>';
			$details.='needed <input class="textbox" id="qty_charcoal" type="text" name="qty_charcoal" value="'.$comCalArray['qty_charcoal'].'" data-required="true" data-error-message="Please enter qunatity for charcoal" data-type="number" data-type-number-message="Only number is allowed" onblur="calculateAmount(this, cost_charcoal, exp_charcoal)"/>'; 
			$details.=' at Rs<input class="lblText" readonly="readonly" id="cost_charcoal" type="text" name="cost_charcoal" value="'.$comCalArray['cost_charcoal'].'"/>';
			$details.='</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_charcoal" type="text" name="exp_charcoal" value="'.$comCalArray['exp_charcoal'].'"/> </td>';
		$details.='<tr>';
		
		// new addition
		$details.='<tr>';
		$details.='<td>Blower </td>';
			$details.='<td>';
			$details.='needed <input class="textbox" id="qty_blower" type="text" name="qty_blower" value="'.$comCalArray['qty_blower'].'" data-required="true" data-error-message="Please enter qunatity for blower" data-type="number" data-type-number-message="Only number is allowed" onblur="calculateAmount(this, cost_blower, exp_blower)"/>'; 
			$details.=' at Rs<input class="lblText" readonly="readonly" id="cost_blower" type="text" name="cost_blower" value="'.$comCalArray['cost_blower'].'"/>';
			$details.='</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_blower" type="text" name="exp_blower" value="'.$comCalArray['exp_blower'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Solder Iron </td>';
			$details.='<td>';
			$details.='needed <input class="textbox" id="qty_solder_iron" type="text" name="qty_solder_iron" value="'.$comCalArray['qty_solder_iron'].'" data-required="true" data-error-message="Please enter qunatity for solder iron" data-type="number" data-type-number-message="Only number is allowed" onblur="calculateAmount(this, cost_solder_iron, exp_solder_iron)"/>'; 
			$details.=' at Rs<input class="lblText" readonly="readonly" id="cost_solder_iron" type="text" name="cost_solder_iron" value="'.$comCalArray['cost_solder_iron'].'"/>';
			$details.='</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_solder_iron" type="text" name="exp_solder_iron" value="'.$comCalArray['exp_solder_iron'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Paint </td>';
			$details.='<td>';
			$details.='needed <input class="textbox" id="qty_paint" type="text" name="qty_paint" value="'.$comCalArray['qty_paint'].'" data-required="true" data-error-message="Please enter qunatity for paint" data-type="number" data-type-number-message="Only number is allowed" onblur="calculateAmount(this, cost_paint, exp_paint)"/>'; 
			$details.=' at Rs<input class="lblText" readonly="readonly" id="cost_paint" type="text" name="cost_paint" value="'.$comCalArray['cost_paint'].'"/>';
			$details.='</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_paint" type="text" name="exp_paint" value="'.$comCalArray['exp_paint'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Cylinder 50ml </td>';
			$details.='<td>';
			$details.='needed <input class="textbox" id="qty_cylinder_50ml" type="text" name="qty_cylinder_50ml" value="'.$comCalArray['qty_cylinder_50ml'].'" data-required="true" data-error-message="Please enter qunatity for cylinder 50ml" data-type="number" data-type-number-message="Only number is allowed" onblur="calculateAmount(this, cost_cylinder_50ml, exp_cylinder_50ml)"/>'; 
			$details.=' at Rs<input class="lblText" readonly="readonly" id="cost_cylinder_50ml" type="text" name="cost_cylinder_50ml" value="'.$comCalArray['cost_cylinder_50ml'].'"/>';
			$details.='</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_cylinder_50ml" type="text" name="exp_cylinder_50ml" value="'.$comCalArray['exp_cylinder_50ml'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Cylinder 500ml </td>';
			$details.='<td>';
			$details.='needed <input class="textbox" id="qty_cylinder_500ml" type="text" name="qty_cylinder_500ml" value="'.$comCalArray['qty_cylinder_500ml'].'" data-required="true" data-error-message="Please enter qunatity for cylinder 500ml" data-type="number" data-type-number-message="Only number is allowed" onblur="calculateAmount(this, cost_cylinder_500ml, exp_cylinder_500ml)"/>'; 
			$details.=' at Rs<input class="lblText" readonly="readonly" id="cost_cylinder_500ml" type="text" name="cost_cylinder_500ml" value="'.$comCalArray['cost_cylinder_500ml'].'"/>';
			$details.='</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_cylinder_500ml" type="text" name="exp_cylinder_500ml" value="'.$comCalArray['exp_cylinder_500ml'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Beaker 500ml </td>';
			$details.='<td>';
			$details.='needed <input class="textbox" id="qty_beaker_500ml" type="text" name="qty_beaker_500ml" value="'.$comCalArray['qty_beaker_500ml'].'" data-required="true" data-error-message="Please enter qunatity for beaker 500ml" data-type="number" data-type-number-message="Only number is allowed" onblur="calculateAmount(this, cost_beaker_500ml, exp_beaker_500ml)"/>'; 
			$details.=' at Rs<input class="lblText" readonly="readonly" id="cost_beaker_500ml" type="text" name="cost_beaker_500ml" value="'.$comCalArray['cost_beaker_500ml'].'"/>';
			$details.='</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_beaker_500ml" type="text" name="exp_beaker_500ml" value="'.$comCalArray['exp_beaker_500ml'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Beaker 1000ml </td>';
			$details.='<td>';
			$details.='needed <input class="textbox" id="qty_beaker_1000ml" type="text" name="qty_beaker_1000ml" value="'.$comCalArray['qty_beaker_1000ml'].'" data-required="true" data-error-message="Please enter qunatity for beaker 1000ml" data-type="number" data-type-number-message="Only number is allowed" onblur="calculateAmount(this, cost_beaker_1000ml, exp_beaker_1000ml)"/>'; 
			$details.=' at Rs<input class="lblText" readonly="readonly" id="cost_beaker_1000ml" type="text" name="cost_beaker_1000ml" value="'.$comCalArray['cost_beaker_1000ml'].'"/>';
			$details.='</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_beaker_1000ml" type="text" name="exp_beaker_1000ml" value="'.$comCalArray['exp_beaker_1000ml'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Funnel </td>';
			$details.='<td>';
			$details.='needed <input class="textbox" id="qty_funnel" type="text" name="qty_funnel" value="'.$comCalArray['qty_funnel'].'" data-required="true" data-error-message="Please enter qunatity for funnel" data-type="number" data-type-number-message="Only number is allowed" onblur="calculateAmount(this, cost_funnel, exp_funnel)"/>'; 
			$details.=' at Rs<input class="lblText" readonly="readonly" id="cost_funnel" type="text" name="cost_funnel" value="'.$comCalArray['cost_funnel'].'"/>';
			$details.='</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_funnel" type="text" name="exp_funnel" value="'.$comCalArray['exp_funnel'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Other </td>';
			$details.='<td>';
			$details.='needed <input class="textbox" id="qty_other" type="text" name="qty_other" value="'.$comCalArray['qty_other'].'" data-required="true" data-error-message="Please enter qunatity for other" data-type="number" data-type-number-message="Only number is allowed" onblur="calculateAmount(this, cost_other, exp_other)"/>'; 
			$details.=' at Rs<input class="lblText" readonly="readonly" id="cost_other" type="text" name="cost_other" value="'.$comCalArray['cost_other'].'"/>';
			$details.='</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_other" type="text" name="exp_other" value="'.$comCalArray['exp_other'].'"/> </td>';
		$details.='<tr>';
		//
		
		$details.='<tr>';
		$details.='<td>Sharpening Material cost </td>';
		$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_tool_sharpen" type="text" name="cost_tool_sharpen" value="'.$comCalArray['cost_tool_sharpen'].'"/></td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_tool_sharpen" type="text" name="exp_tool_sharpen" value="'.$comCalArray['exp_tool_sharpen'].'"/> </td>';
		$details.='<tr>';
		
	 	echo $details;
	 }
	 
	 
 if($_GET['get']=='calExpenditureAndCostDetails')
	 {
	 	//$rowId=$_GET['rowId'];
	 	$rowId=1;
	 	
	 	$zoneCode=$_GET['zoneCode'];
	 	$totalBlazes=$_GET['totalBlazes'];
	 	$yieldFixed=$_GET['yieldFixed'];
	 	//$turnout=$_GET['turnout'];
	 	$totalTurnout=$_GET['totalTurnout'];
	 	$turnout=$totalTurnout;
	 	$distanceToRsd=$_GET['distanceToRsd'];
	 	//$distTransportation=$_GET['distTransportation'];
	 	$seasonYear=$_GET['seasonYear'];
	 	
	 	$numberOfMazdoor=$_GET['numberOfMazdoor'];
	 	//$enteredMazdoors=$_GET['enteredMazdoors'];
	 	$enteredMazdoors=$numberOfMazdoor;
	 	
	 	$eowCalArray=array();
	 	$comCalArray=array();
	 	
	 	$details='<tr><td>Expenditure Type</td> <td>Details</td> <td>Amount</td> </tr>';
	 	
	 	if($rowId>0)
	 	{
	 		$rcalId=$_GET['rcalId'];
	 		$forestCode="";
	 		$eowCode=$_GET['eowCode'];
	 		$eowCalArray=$common->getExpenditureOnWork($rcalId, $forestCode, $eowCode);
	 		
	 		if($eowCalArray['zone_code']!=$zoneCode)
	 		{
	 			$eowArray = $common->getCalculatedExpenditureOnWork($totalBlazes, $yieldFixed, $turnout, $totalTurnout, $zoneCode, $distanceToRsd, $seasonYear);
	 			$eowCalArray = array_merge($eowCalArray, $eowArray); 	
	 		}
	 		
	 	}else
	 	{
	 		$eowCalArray = $common->getCalculatedExpenditureOnWork($totalBlazes, $yieldFixed, $turnout, $totalTurnout, $zoneCode, $distanceToRsd, $seasonYear);	
	 	}
	 	
	 	if($rowId>0)
	 	{
	 		$rcalId=$_GET['rcalId'];
	 		$forestCode="";
	 		$comCode=$_GET['comCode'];
	 		$comCalArray=$common->getCostOfMaretial($rcalId, $forestCode, $comCode);
	 		
	 		if($comCalArray['number_of_mazdoor']!=$enteredMazdoors)
	 		{
	 			$details.='<tr><td colspan="3">No of Mazdoor has changed from '.$comCalArray['number_of_mazdoor'].' to '.$enteredMazdoors.'. Re-calculation required.</td></tr>';
	 			$comArray = $common->getCalculatedCostOfMaretial($totalBlazes, $numberOfMazdoor, $seasonYear);
	 			$comCalArray = array_merge($comCalArray, $comArray); 
	 		}
	 		
	 	}else
	 	{
	 		$comCalArray = $common->getCalculatedCostOfMaretial($totalBlazes, $numberOfMazdoor, $seasonYear);	
	 	}
	 	
		
		
		$details.='<tr>';
		$details.='<td>Crop setting at </td>';
		$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_crop_setting" type="text" name="cost_crop_setting" value="'.$eowCalArray['cost_crop_setting'].'"/> </td>';
		$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_crop_setting" type="text" name="exp_crop_setting" value="'.$eowCalArray['exp_crop_setting'].'"/> </td>';
		$details.='<tr>';
		
		if($eowCalArray['zone_code']=="c")
		{
			$details.='<tr>';
			$details.='<td>Extraction of Rasin </td>';
			$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_extr" type="text" name="cost_extr" value="'.$eowCalArray['cost_extr'].'"/> </td>';
			$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_extr_turnout" type="text" name="exp_extr_turnout" value="'.$eowCalArray['exp_extr_turnout'].'"/> </td>';
			$details.='<tr>';	
		}else if($eowCalArray['zone_code']=="h")
		{
			$details.='<tr>';
			$details.='<td>Extraction of Rasin </td>';
			$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_extr" type="text" name="cost_extr" value="'.$eowCalArray['cost_extr'].'"/> </td>';
			$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_extr_turnout" type="text" name="exp_extr_turnout" value="'.$eowCalArray['exp_extr_turnout'].'"/> </td>';
			$details.='<tr>';
		}else if($eowCalArray['zone_code']=="mh")
		{
			$details.='<tr>';
			$details.='<td>Extraction of Rasin </td>';
			$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_extr" type="text" name="cost_extr" value="'.$eowCalArray['cost_extr'].'"/> </td>';
			$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_extr_turnout" type="text" name="exp_extr_turnout" value="'.$eowCalArray['exp_extr_turnout'].'"/> </td>';
			$details.='<tr>';
		}else if($eowCalArray['zone_code']=="mhs")
		{
			$details.='<tr>';
			$details.='<td>Extraction of Rasin </td>';
			$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_extr" type="text" name="cost_extr" value="'.$eowCalArray['cost_extr'].'"/> </td>';
			$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_extr_turnout" type="text" name="exp_extr_turnout" value="'.$eowCalArray['exp_extr_turnout'].'"/> </td>';
			$details.='<tr>';
		}
		
		$details.='<tr>';
		$details.='<td>Carriage of Empty Tins </td>';
			$details.='<td>';
			$details.='<input class="lblTextSmall" readonly="readonly" id="total_tins" type="text" name="total_tins" value="'.$eowCalArray['total_tins'].'"/>'; 
			$details.=' to a distance of <input class="lblTextSmall" readonly="readonly" id="distance_to_rsd" type="text" name="distance_to_rsd" value="'.$eowCalArray['distance_to_rsd'].'"/>km' ;
			$details.=' at Rs.<input class="lblTextSmall" readonly="readonly" id="cost_tpt_tins_to_forest" type="text" name="cost_tpt_tins_to_forest" value="'.$eowCalArray['cost_tpt_tins_to_forest'].'"/> per km.';
			$details.='</td>';
		$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_tpt_tins_to_forest" type="text" name="exp_tpt_tins_to_forest" value="'.$eowCalArray['exp_tpt_tins_to_forest'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Soldering of Tins </td>';
		$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_soldering_of_resin" type="text" name="cost_soldering_of_resin" value="'.$eowCalArray['cost_soldering_of_resin'].'"/> </td>';
		$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_soldering_of_resin" type="text" name="exp_soldering_of_resin" value="'.$eowCalArray['exp_soldering_of_resin'].'"/> </td>';
		$details.='<tr>';
		
		
		$details.='<tr>';
		$details.='<td>Carriage of Resin (Mules)</td>';
			$details.='<td>';
			$details.='<input class="lblTextSmall" readonly="readonly" id="turnout_carriage_mule_rsd" type="text" name="turnout_carriage_mule_rsd" value="'.$eowCalArray['turnout_carriage_mule_rsd'].'" onclick="makeSmallTextEditable(this,\' \')"/>qtl'; 
			$details.=' to a distance of <input class="lblTextSmall" readonly="readonly" id="dist_carriage_mule_rsd" type="text" name="dist_carriage_mule_rsd" value="'.$eowCalArray['dist_carriage_mule_rsd'].'" onclick="makeSmallTextEditable(this,\' \')" onblur="validateCarriageDistance(this)"/>km';
			$details.=' at Rs.<input class="lblTextSmall" readonly="readonly" id="cost_carriage_mule_rsd" type="text" name="cost_carriage_mule_rsd" value="'.$eowCalArray['cost_carriage_mule_rsd'].'"/>per km.';
			$details.=' | <input id="apply_carriage_mule_rsd" type="checkbox" name="apply_carriage_mule_rsd" value="1" onclick="calculateCarriageExp(this)"/> is applied. ';
			$details.='</td>';
		$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_carriage_mule_rsd" type="text" name="exp_carriage_mule_rsd" value="'.$eowCalArray['exp_carriage_mule_rsd'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Carriage of Resin (Manual)</td>';
			$details.='<td>';
			$details.='<input class="lblTextSmall" readonly="readonly" id="turnout_carriage_manual_rsd" type="text" name="turnout_carriage_manual_rsd" value="'.$eowCalArray['turnout_carriage_manual_rsd'].'" onclick="makeSmallTextEditable(this,\' \')"/>qtl'; 
			$details.=' to a distance of <input class="lblTextSmall" readonly="readonly" id="dist_carriage_manual_rsd" type="text" name="dist_carriage_manual_rsd" value="'.$eowCalArray['dist_carriage_manual_rsd'].'" onclick="makeSmallTextEditable(this,\' \')" onblur="validateCarriageDistance(this)"/>km';
			$details.=' at Rs.<input class="lblTextSmall" readonly="readonly" id="cost_carriage_manual_rsd" type="text" name="cost_carriage_manual_rsd" value="'.$eowCalArray['cost_carriage_manual_rsd'].'"/>per km.';
			$details.=' | <input id="apply_carriage_manual_rsd" type="checkbox" name="apply_carriage_manual_rsd" value="1" onclick="calculateCarriageExp(this)"/> is applied. ';
			$details.='</td>';
		$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_carriage_manual_rsd" type="text" name="exp_carriage_manual_rsd" value="'.$eowCalArray['exp_carriage_manual_rsd'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Carriage of Resin (Tractor)</td>';
			$details.='<td>';
			$details.='<input class="lblTextSmall" readonly="readonly" id="turnout_carriage_tractor_rsd" type="text" name="turnout_carriage_tractor_rsd" value="'.$eowCalArray['turnout_carriage_tractor_rsd'].'" onclick="makeSmallTextEditable(this,\' \')"/>qtl'; 
			$details.=' to a distance of <input class="lblTextSmall" readonly="readonly" id="dist_carriage_tractor_rsd" type="text" name="dist_carriage_tractor_rsd" value="'.$eowCalArray['dist_carriage_tractor_rsd'].'" onclick="makeSmallTextEditable(this,\' \')" onblur="validateCarriageDistance(this)"/>km';
			$details.=' at Rs.<input class="lblTextSmall" readonly="readonly" id="cost_carriage_tractor_rsd" type="text" name="cost_carriage_tractor_rsd" value="'.$eowCalArray['cost_carriage_mule_rsd'].'"/>per km.';
			$details.=' | <input id="apply_carriage_tractor_rsd" type="checkbox" name="apply_carriage_tractor_rsd" value="1" onclick="calculateCarriageExp(this)"/> is applied. ';
			$details.='</td>';
		$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_carriage_tractor_rsd" type="text" name="exp_carriage_tractor_rsd" value="'.$eowCalArray['exp_carriage_tractor_rsd'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Carriage of Resin (Other)</td>';
			$details.='<td>';
			$details.='<input class="lblTextSmall" readonly="readonly" id="turnout_carriage_other_rsd" type="text" name="turnout_carriage_other_rsd" value="'.$eowCalArray['turnout_carriage_other_rsd'].'" onclick="makeSmallTextEditable(this,\' \')"/>qtl'; 
			$details.=' to a distance of <input class="lblTextSmall" readonly="readonly" id="dist_carriage_other_rsd" type="text" name="dist_carriage_other_rsd" value="'.$eowCalArray['dist_carriage_other_rsd'].'" onclick="makeSmallTextEditable(this,\' \')" onblur="validateCarriageDistance(this)"/>km';
			$details.=' at Rs.<input class="lblTextSmall" readonly="readonly" id="cost_carriage_other_rsd" type="text" name="cost_carriage_other_rsd" value="'.$eowCalArray['cost_carriage_manual_rsd'].'"/>per km.';
			$details.=' | <input id="apply_carriage_other_rsd" type="checkbox" name="apply_carriage_other_rsd" value="1" onclick="calculateCarriageExp(this)"/> is applied. ';
			$details.='</td>';
		$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_carriage_other_rsd" type="text" name="exp_carriage_other_rsd" value="'.$eowCalArray['exp_carriage_other_rsd'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Transportation</td>';
			$details.='<td>';
			$details.='<input class="lblTextSmall" readonly="readonly" id="dist_transportation" type="text" name="dist_transportation" value="'.$eowCalArray['dist_transportation'].'" onclick="makeSmallTextEditable(this,\' \')" onblur="calculateTransportExp(this)"/>KM'; 
			$details.=' at the rate of Rs. <input class="lblTextSmall" readonly="readonly" id="cost_transportation_initial_25" type="text" name="cost_transportation_initial_25" value="'.$eowCalArray['cost_transportation_initial_25'].'"/> for initial 25 KM and ';
			$details.=' at Rs.<input class="lblTextSmall" readonly="readonly" id="cost_transportation_per_km" type="text" name="cost_transportation_per_km" value="'.$eowCalArray['cost_transportation_per_km'].'"/>per km there after.';
			//$details.=' | <input id="apply_transport" type="checkbox" name="apply_transportation" value="1" onclick="calculateTransportExp(this)"/> is applied. ';
			$details.='</td>';
		$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_transportation" type="text" name="exp_transportation" value="'.$eowCalArray['exp_transportation'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Loading Resin (Upto 50 mts)</td>';
			$details.='<td>';
			$details.='<input class="lblTextSmall" readonly="readonly" id="tins_loading_filled_50" type="text" name="tins_loading_filled_50" value="'.$eowCalArray['total_tins'].'" onclick="makeSmallTextEditable(this,\' \')"  onblur="calculateLoadingUnloading(this)" /> tins'; 
			$details.=' at Rs.<input class="lblTextSmall" readonly="readonly" id="cost_loading_filled_50" type="text" name="cost_loading_filled_50" value="'.$eowCalArray['cost_loading_filled_50'].'"/>per 100 tins.';
			$details.='</td>';
		$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_loading_filled_50" type="text" name="exp_loading_filled_50" value="'.$eowCalArray['exp_loading_filled_50'].'"/> </td>';
		$details.='<tr>';
		$details.='<tr>';
		$details.='<td>Loading Resin (Upto 100 mts)</td>';
			$details.='<td>';
			$details.='<input class="lblTextSmall" readonly="readonly" id="tins_loading_filled_100" type="text" name="tins_loading_filled_100" value="'.$eowCalArray['total_tins'].'" onclick="makeSmallTextEditable(this,\' \')" onblur="calculateLoadingUnloading(this)"/> tins'; 
			$details.=' at Rs.<input class="lblTextSmall" readonly="readonly" id="cost_loading_filled_100" type="text" name="cost_loading_filled_100" value="'.$eowCalArray['cost_loading_filled_100'].'"/>per 100 tins.';
			$details.='</td>';
		$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_loading_filled_100" type="text" name="exp_loading_filled_100" value="'.$eowCalArray['exp_loading_filled_100'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Unloading of Resin (Upto 50 mts)</td>';
			$details.='<td>';
			$details.='<input class="lblTextSmall" readonly="readonly" id="tins_unloading_filled_50" type="text" name="tins_unloading_filled_50" value="'.$eowCalArray['total_tins'].'" onclick="makeSmallTextEditable(this,\' \')" onblur="calculateLoadingUnloading(this)"/> tins'; 
			$details.=' at Rs.<input class="lblTextSmall" readonly="readonly" id="cost_unloading_filled_50" type="text" name="cost_unloading_filled_50" value="'.$eowCalArray['cost_unloading_filled_50'].'"/>per 100 tins.';
			$details.='</td>';
		$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_unloading_filled_50" type="text" name="exp_unloading_filled_50" value="'.$eowCalArray['exp_unloading_filled_50'].'"/> </td>';
		$details.='<tr>';
		$details.='<tr>';
		$details.='<td>Unloading of Resin (Upto 100 mts)</td>';
			$details.='<td>';
			$details.='<input class="lblTextSmall" readonly="readonly" id="tins_unloading_filled_100" type="text" name="tins_unloading_filled_100" value="'.$eowCalArray['total_tins'].'" onclick="makeSmallTextEditable(this,\' \')" onblur="calculateLoadingUnloading(this)"/> tins'; 
			$details.=' at Rs.<input class="lblTextSmall" readonly="readonly" id="cost_unloading_filled_100" type="text" name="cost_unloading_filled_100" value="'.$eowCalArray['cost_unloading_filled_100'].'"/>per 100 tins.';
			$details.='</td>';
		$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_unloading_filled_100" type="text" name="exp_unloading_filled_100" value="'.$eowCalArray['exp_unloading_filled_100'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Mate commission </td>';
		$details.='<td>at Rs.<input class="lblText" readonly="readonly" id="cost_mate_commission" type="text" name="cost_mate_commission" value="'.$eowCalArray['cost_mate_commission'].'"/> </td>';
		$details.='<td><input class="lblTextSmall" readonly="readonly" id="exp_mate_commission" type="text" name="exp_mate_commission" value="'.$eowCalArray['exp_mate_commission'].'"/> </td>';
		$details.='<tr>';
		
		
		$details.='<tr>';
		$details.='<td colspan="3">';
		$details.='<input type="hidden" id="cost_tpt_tins_to_rsd" name="cost_tpt_drums_to_forest" value=""/>';
		$details.='<input type="hidden" id="exp_tpt_tins_to_rsd" name="exp_tpt_drums_to_forest" value=""/>';
		$details.='<input type="hidden" id="cost_tpt_tins_to_rsd" name="cost_tpt_tins_to_rsd" value=""/>';
		$details.='<input type="hidden" id="exp_tpt_tins_to_rsd" name="exp_tpt_tins_to_rsd" value=""/>';
		$details.='<input type="hidden" id="cost_tpt_tins_to_rsd" name="cost_tpt_drums_to_rsd" value=""/>';
		$details.='<input type="hidden" id="exp_tpt_tins_to_rsd" name="exp_tpt_drums_to_rsd" value=""/>';
		$details.='</td>';
		$details.='<tr>';
		
		
		// for Cost 
		$details.='<tr><td colspan="5">&nbsp;</td></tr>';
		$details.='<tr><td colspan="4">Cost Details</td></tr>';
		
		$details.='<tr><td>Expenditure Type</td> <td>Details</td> <td>Amount</td> </tr>';
		
		$details.='<tr>';
		$details.='<td>Blaze frame cost at </td>';
		$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_blaze_frame" type="text" name="cost_blaze_frame" value="'.$comCalArray['cost_blaze_frame'].'" /> </td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_blaze_frame" type="text" name="exp_blaze_frame" value="'.$comCalArray['exp_blaze_frame'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Bark shaver cost at </td>';
		$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_bark_shaver" type="text" name="cost_bark_shaver" value="'.$comCalArray['cost_bark_shaver'].'" /> </td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_bark_shaver" type="text" name="exp_bark_shaver" value="'.$comCalArray['exp_bark_shaver'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Groove cutter cost at </td>';
		$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_groove_cutter" type="text" name="cost_groove_cutter" value="'.$comCalArray['cost_groove_cutter'].'" /> </td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_groove_cutter" type="text" name="exp_groove_cutter" value="'.$comCalArray['exp_groove_cutter'].'"/> </td>';
		$details.='<tr>';
		
		
		$details.='<tr>';
		$details.='<td>Freshning knife cost at </td>';
		$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_freshning_knife" type="text" name="cost_freshning_knife" value="'.$comCalArray['cost_freshning_knife'].'" /> </td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_freshning_knife" type="text" name="exp_freshning_knife" value="'.$comCalArray['exp_freshning_knife'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Spray bottle cost at </td>';
		$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_spray_bottle" type="text" name="cost_spray_bottle" value="'.$comCalArray['cost_spray_bottle'].'" /> </td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp__spray_bottle" type="text" name="exp__spray_bottle" value="'.$comCalArray['exp__spray_bottle'].'"/> </td>';
		$details.='<tr>';
		
		
		$details.='<tr>';
		$details.='<td>Hammer cum nail puller cost at </td>';
		$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_hammer_nailpuller" type="text" name="cost_hammer_nailpuller" value="'.$comCalArray['cost_hammer_nailpuller'].'" /> </td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_hammer_nailpuller" type="text" name="exp_hammer_nailpuller" value="'.$comCalArray['exp_hammer_nailpuller'].'"/> </td>';
		$details.='<tr>';
		
		
		$details.='<tr>';
		$details.='<td>Pot scrapper cost at </td>';
		$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_pot_scrapper" type="text" name="cost_pot_scrapper" value="'.$comCalArray['cost_pot_scrapper'].'" /> </td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_pot_scrapper" type="text" name="exp_pot_scrapper" value="'.$comCalArray['exp_pot_scrapper'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Pots cost at </td>';
		$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_pots" type="text" name="cost_pots" value="'.$comCalArray['cost_pots'].'" data-required="true" /> for '. ceil(($comCalArray['blazes_received']/2)).' pots</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_pots" type="text" name="exp_pots" value="'.$comCalArray['exp_pots'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Lips cost at </td>';
		$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_lips" type="text" name="cost_lips" value="'.$comCalArray['cost_lips'].'" /> per 100 </td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_lips" type="text" name="exp_lips" value="'.$comCalArray['exp_lips'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Wire nails 5cm </td>';
			$details.='<td>';
			$details.='needed <input class="textbox" id="qty_wire_nails_5cm" type="text" name="qty_wire_nails_5cm" value="'.$comCalArray['qty_wire_nails_5cm'].'" data-required="true" data-error-message="Please enter qunatity for nails" data-type="number" data-type-number-message="Only number is allowed" onblur="calculateAmount(this, cost_wire_nails_5cm, exp_wire_nails_5cm)"/>'; 
			$details.=' at Rs<input class="lblText" readonly="readonly" id="cost_wire_nails_5cm" type="text" name="cost_wire_nails_5cm" value="'.$comCalArray['cost_wire_nails_5cm'].'"/>';
			$details.='</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_wire_nails_5cm" type="text" name="exp_wire_nails_5cm" value="'.$comCalArray['exp_wire_nails_5cm'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Wire nails 2cm </td>';
			$details.='<td>';
			$details.='needed <input class="textbox" id="qty_wire_nails_2cm" type="text" name="qty_wire_nails_2cm" value="'.$comCalArray['qty_wire_nails_2cm'].'" data-required="true" data-error-message="Please enter qunatity for nails" data-type="number" data-type-number-message="Only number is allowed" onblur="calculateAmount(this, cost_wire_nails_2cm, exp_wire_nails_2cm)"/>';
			$details.=' at Rs<input class="lblText" readonly="readonly" id="cost_wire_nails_2cm" type="text" name="cost_wire_nails_2cm" value="'.$comCalArray['cost_wire_nails_2cm'].'"/>';
			$details.='</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_wire_nails_2cm" type="text" name="exp_wire_nails_2cm" value="'.$comCalArray['exp_wire_nails_2cm'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Solder </td>';
			$details.='<td>';
			$details.='needed <input class="textbox" id="qty_solder" type="text" name="qty_solder" value="'.$comCalArray['qty_solder'].'" data-required="true" data-error-message="Please enter qunatity for solder" data-type="number" data-type-number-message="Only number is allowed" onblur="calculateAmount(this, cost_solder, exp_solder)"/>'; 
			$details.=' at Rs<input class="lblText" readonly="readonly" id="cost_solder" type="text" name="cost_solder" value="'.$comCalArray['cost_solder'].'"/>';
			$details.='</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_solder" type="text" name="exp_solder" value="'.$comCalArray['exp_solder'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Naushadar </td>';
			$details.='<td>';
			$details.='needed <input class="textbox" id="qty_naushader" type="text" name="qty_naushader" value="'.$comCalArray['qty_naushader'].'" data-required="true" data-error-message="Please enter qunatity for naushadar" data-type="number" data-type-number-message="Only number is allowed" onblur="calculateAmount(this, cost_naushader, exp_naushader)"/>'; 
			$details.=' at Rs<input class="lblText" readonly="readonly" id="cost_naushader" type="text" name="cost_naushader" value="'.$comCalArray['cost_naushader'].'"/>';
			$details.='</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_naushader" type="text" name="exp_naushader" value="'.$comCalArray['exp_naushader'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Charcoal </td>';
			$details.='<td>';
			$details.='needed <input class="textbox" id="qty_charcoal" type="text" name="qty_charcoal" value="'.$comCalArray['qty_charcoal'].'" data-required="true" data-error-message="Please enter qunatity for charcoal" data-type="number" data-type-number-message="Only number is allowed" onblur="calculateAmount(this, cost_charcoal, exp_charcoal)"/>'; 
			$details.=' at Rs<input class="lblText" readonly="readonly" id="cost_charcoal" type="text" name="cost_charcoal" value="'.$comCalArray['cost_charcoal'].'"/>';
			$details.='</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_charcoal" type="text" name="exp_charcoal" value="'.$comCalArray['exp_charcoal'].'"/> </td>';
		$details.='<tr>';
		
		// new addition
		$details.='<tr>';
		$details.='<td>Blower </td>';
			$details.='<td>';
			$details.='needed <input class="textbox" id="qty_blower" type="text" name="qty_blower" value="'.$comCalArray['qty_blower'].'" data-required="true" data-error-message="Please enter qunatity for blower" data-type="number" data-type-number-message="Only number is allowed" onblur="calculateAmount(this, cost_blower, exp_blower)"/>'; 
			$details.=' at Rs<input class="lblText" readonly="readonly" id="cost_blower" type="text" name="cost_blower" value="'.$comCalArray['cost_blower'].'"/>';
			$details.='</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_blower" type="text" name="exp_blower" value="'.$comCalArray['exp_blower'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Solder Iron </td>';
			$details.='<td>';
			$details.='needed <input class="textbox" id="qty_solder_iron" type="text" name="qty_solder_iron" value="'.$comCalArray['qty_solder_iron'].'" data-required="true" data-error-message="Please enter qunatity for solder iron" data-type="number" data-type-number-message="Only number is allowed" onblur="calculateAmount(this, cost_solder_iron, exp_solder_iron)"/>'; 
			$details.=' at Rs<input class="lblText" readonly="readonly" id="cost_solder_iron" type="text" name="cost_solder_iron" value="'.$comCalArray['cost_solder_iron'].'"/>';
			$details.='</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_solder_iron" type="text" name="exp_solder_iron" value="'.$comCalArray['exp_solder_iron'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Paint </td>';
			$details.='<td>';
			$details.='needed <input class="textbox" id="qty_paint" type="text" name="qty_paint" value="'.$comCalArray['qty_paint'].'" data-required="true" data-error-message="Please enter qunatity for paint" data-type="number" data-type-number-message="Only number is allowed" onblur="calculateAmount(this, cost_paint, exp_paint)"/>'; 
			$details.=' at Rs<input class="lblText" readonly="readonly" id="cost_paint" type="text" name="cost_paint" value="'.$comCalArray['cost_paint'].'"/>';
			$details.='</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_paint" type="text" name="exp_paint" value="'.$comCalArray['exp_paint'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Cylinder 50ml </td>';
			$details.='<td>';
			$details.='needed <input class="textbox" id="qty_cylinder_50ml" type="text" name="qty_cylinder_50ml" value="'.$comCalArray['qty_cylinder_50ml'].'" data-required="true" data-error-message="Please enter qunatity for cylinder 50ml" data-type="number" data-type-number-message="Only number is allowed" onblur="calculateAmount(this, cost_cylinder_50ml, exp_cylinder_50ml)"/>'; 
			$details.=' at Rs<input class="lblText" readonly="readonly" id="cost_cylinder_50ml" type="text" name="cost_cylinder_50ml" value="'.$comCalArray['cost_cylinder_50ml'].'"/>';
			$details.='</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_cylinder_50ml" type="text" name="exp_cylinder_50ml" value="'.$comCalArray['exp_cylinder_50ml'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Cylinder 500ml </td>';
			$details.='<td>';
			$details.='needed <input class="textbox" id="qty_cylinder_500ml" type="text" name="qty_cylinder_500ml" value="'.$comCalArray['qty_cylinder_500ml'].'" data-required="true" data-error-message="Please enter qunatity for cylinder 500ml" data-type="number" data-type-number-message="Only number is allowed" onblur="calculateAmount(this, cost_cylinder_500ml, exp_cylinder_500ml)"/>'; 
			$details.=' at Rs<input class="lblText" readonly="readonly" id="cost_cylinder_500ml" type="text" name="cost_cylinder_500ml" value="'.$comCalArray['cost_cylinder_500ml'].'"/>';
			$details.='</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_cylinder_500ml" type="text" name="exp_cylinder_500ml" value="'.$comCalArray['exp_cylinder_500ml'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Beaker 500ml </td>';
			$details.='<td>';
			$details.='needed <input class="textbox" id="qty_beaker_500ml" type="text" name="qty_beaker_500ml" value="'.$comCalArray['qty_beaker_500ml'].'" data-required="true" data-error-message="Please enter qunatity for beaker 500ml" data-type="number" data-type-number-message="Only number is allowed" onblur="calculateAmount(this, cost_beaker_500ml, exp_beaker_500ml)"/>'; 
			$details.=' at Rs<input class="lblText" readonly="readonly" id="cost_beaker_500ml" type="text" name="cost_beaker_500ml" value="'.$comCalArray['cost_beaker_500ml'].'"/>';
			$details.='</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_beaker_500ml" type="text" name="exp_beaker_500ml" value="'.$comCalArray['exp_beaker_500ml'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Beaker 1000ml </td>';
			$details.='<td>';
			$details.='needed <input class="textbox" id="qty_beaker_1000ml" type="text" name="qty_beaker_1000ml" value="'.$comCalArray['qty_beaker_1000ml'].'" data-required="true" data-error-message="Please enter qunatity for beaker 1000ml" data-type="number" data-type-number-message="Only number is allowed" onblur="calculateAmount(this, cost_beaker_1000ml, exp_beaker_1000ml)"/>'; 
			$details.=' at Rs<input class="lblText" readonly="readonly" id="cost_beaker_1000ml" type="text" name="cost_beaker_1000ml" value="'.$comCalArray['cost_beaker_1000ml'].'"/>';
			$details.='</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_beaker_1000ml" type="text" name="exp_beaker_1000ml" value="'.$comCalArray['exp_beaker_1000ml'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Funnel </td>';
			$details.='<td>';
			$details.='needed <input class="textbox" id="qty_funnel" type="text" name="qty_funnel" value="'.$comCalArray['qty_funnel'].'" data-required="true" data-error-message="Please enter qunatity for funnel" data-type="number" data-type-number-message="Only number is allowed" onblur="calculateAmount(this, cost_funnel, exp_funnel)"/>'; 
			$details.=' at Rs<input class="lblText" readonly="readonly" id="cost_funnel" type="text" name="cost_funnel" value="'.$comCalArray['cost_funnel'].'"/>';
			$details.='</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_funnel" type="text" name="exp_funnel" value="'.$comCalArray['exp_funnel'].'"/> </td>';
		$details.='<tr>';
		
		$details.='<tr>';
		$details.='<td>Other </td>';
			$details.='<td>';
			$details.='needed <input class="textbox" id="qty_other" type="text" name="qty_other" value="'.$comCalArray['qty_other'].'" data-required="true" data-error-message="Please enter qunatity for other" data-type="number" data-type-number-message="Only number is allowed" onblur="calculateAmount(this, cost_other, exp_other)"/>'; 
			$details.=' at Rs<input class="lblText" readonly="readonly" id="cost_other" type="text" name="cost_other" value="'.$comCalArray['cost_other'].'"/>';
			$details.='</td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_other" type="text" name="exp_other" value="'.$comCalArray['exp_other'].'"/> </td>';
		$details.='<tr>';
		//
		
		$details.='<tr>';
		$details.='<td>Sharpening Material cost </td>';
		$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_tool_sharpen" type="text" name="cost_tool_sharpen" value="'.$comCalArray['cost_tool_sharpen'].'"/></td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_tool_sharpen" type="text" name="exp_tool_sharpen" value="'.$comCalArray['exp_tool_sharpen'].'"/> </td>';
		$details.='<tr>';
		
	 	echo $details;
	 }
	 
	 
	 // for tender
	 if($_GET['get']=='getLotDetailsForTender')
	 {
	 	$lotNo=$_GET['lotNo'];
	 	$seasonYear=$_GET['seasonYear'];
	 	
	 	$rateCalculated = $db->get_row("SELECT id, total_blazes, avg_yield_fixed, total_turnout, total_com, eow_code FROM t_rate_calculation_for_lot WHERE lot_no='".$lotNo."' AND season_year='".$seasonYear."'",ARRAY_A);
	 	$details='<table> <tr>';
	 	$details.='<td>';
	 	$details.='<label for="con_gen">Number of Blazes:</label>';
		$details.='<input class="lblText" readonly="readonly" id="blazes_received" type="text" name="blazes_received" data-required="true" data-error-message="Total Blazes is required" value="'.$rateCalculated['total_blazes'].'"/> ';
		$details.='</td>';
		$details.='<td>';
		$details.='<label for="con_gen">Yield:</label>';
		$details.='<input class="lblText" readonly="readonly" id="yield_fixed" type="text" name="yield_fixed" data-required="true" data-error-message="Yield Fixed is required" value="'.$rateCalculated['avg_yield_fixed'].'"/>';
		$details.='</td>';
		$details.='</tr>';
		$details.='<tr>';
		$details.='<td>';
		$details.='<label for="con_gen">Trunout:</label>';
		$details.='<input class="lblText" readonly="readonly" id="total_turnout" type="text" name="total_turnout" data-required="true" data-error-message="Turnout is required" value="'.$rateCalculated['total_turnout'].'"/>';
		$details.='</td>';
		$details.='<td>';
		$details.='<label for="con_gen">Cost of Material:</label>';
		$details.='<input class="lblText" readonly="readonly" id="total_com" type="text" name="total_com" data-required="true" data-error-message="Cost of Material is required" value="'.$rateCalculated['total_com'].'"/>';
		$details.='</td>';
		$details.='<td>';
		$details.='<label for="con_gen">Tool Charges:</label>';
		$details.='<input class="lblText" readonly="readonly" id="cost_tool" type="text" name="cost_tool" data-required="true" data-error-message="Cost of Material is required" value="'.round($rateCalculated['total_com']/$rateCalculated['total_turnout'],2).'"/>';
		$details.='</td>';
		$details.='</tr> </table>';
		echo $details;
	 }
	 
	 
 	// for tender
	 if($_GET['get']=='getRateDetailsForTender')
	 {
	 	$zoneCode=$_GET['zoneCode'];
	 	$totalTurnout=$_GET['totalTurnout'];
	 	$seasonYear=$_GET['seasonYear'];
	 	
	 	$scheduleRate = $common->getAllScheduleRates($seasonYear);
	 	 	
	 	$costExtr=0;
	 	$tenderSlab="";
		 if($zoneCode=="c")
			{
				if($totalTurnout<21)
				{
					$costExtr=$scheduleRate['yps-c-20'];
					$tenderSlab="upto 20 Qtl";
				}else if($totalTurnout<26)
				{
					$costExtr=$scheduleRate['yps-c-25'];
					$tenderSlab="upto 20.1 to 25 Qtl";
				}else if($totalTurnout<31)
				{
					$costExtr=$scheduleRate['yps-c-30'];
					$tenderSlab="upto 25.1 to 30 Qtl";
				}else if($totalTurnout<36)
				{
					$costExtr=$scheduleRate['yps-c-35'];
					$tenderSlab="upto 30.1 to 35 Qtl";
				}else if($totalTurnout<41)
				{
					$costExtr=$scheduleRate['yps-c-40'];
					$tenderSlab="upto 35.1 to 40 Qtl";
				}else if($totalTurnout<46)
				{
					$costExtr=$scheduleRate['yps-c-45'];
					$tenderSlab="upto 40.1 to 45 Qtl";
				}else if($totalTurnout>45)
				{
					$costExtr=$scheduleRate['yps-c-50'];
					$tenderSlab="45.1 and above Qtl";
				}
				
			}else if($zoneCode=="h")
			{
				if($totalTurnout<21)
				{
					$costExtr=$scheduleRate['yps-h-20'];
					$tenderSlab="upto 20 Qtl";
				}else if($totalTurnout<26)
				{
					$costExtr=$scheduleRate['yps-h-25'];
					$tenderSlab="upto 20.1 to 25 Qtl";
				}else if($totalTurnout<31)
				{
					$costExtr=$scheduleRate['yps-h-30'];
					$tenderSlab="upto 25.1 to 30 Qtl";
				}else if($totalTurnout<36)
				{
					$costExtr=$scheduleRate['yps-h-35'];
					$tenderSlab="upto 30.1 to 35 Qtl";
				}else if($totalTurnout<41)
				{
					$costExtr=$scheduleRate['yps-h-40'];
					$tenderSlab="upto 35.1 to 40 Qtl";
				}else if($totalTurnout<46)
				{
					$costExtr=$scheduleRate['yps-h-45'];
					$tenderSlab="upto 40.1 to 45 Qtl";
				}else if($totalTurnout>45)
				{
					$costExtr=$scheduleRate['yps-h-50'];
					$tenderSlab="45.1 and above Qtl";
				}
			}else if($zoneCode=="mh")
			{
				if($totalTurnout<21)
				{
					$costExtr=$scheduleRate['yps-mh-20'];
					$tenderSlab="upto 20 Qtl";
				}else if($totalTurnout<26)
				{
					$costExtr=$scheduleRate['yps-mh-25'];
					$tenderSlab="upto 20.1 to 25 Qtl";
				}else if($totalTurnout<31)
				{
					$costExtr=$scheduleRate['yps-mh-30'];
					$tenderSlab="upto 25.1 to 30 Qtl";
				}else if($totalTurnout<36)
				{
					$costExtr=$scheduleRate['yps-mh-35'];
					$tenderSlab="upto 30.1 to 35 Qtl";
				}else if($totalTurnout<41)
				{
					$costExtr=$scheduleRate['yps-mh-40'];
					$tenderSlab="upto 35.1 to 40 Qtl";
				}else if($totalTurnout<46)
				{
					$costExtr=$scheduleRate['yps-mh-45'];
					$tenderSlab="upto 40.1 to 45 Qtl";
				}else if($totalTurnout>45)
				{
					$costExtr=$scheduleRate['yps-mh-50'];
					$tenderSlab="45.1 and above Qtl";
				}
			}else if($zoneCode=="mhs")
			{
				if($totalTurnout<21)
				{
					$costExtr=$scheduleRate['yps-mhs-20'];
					$tenderSlab="upto 20 Qtl";
				}else if($totalTurnout<26)
				{
					$costExtr=$scheduleRate['yps-mhs-25'];
					$tenderSlab="upto 20.1 to 25 Qtl";
				}else if($totalTurnout<31)
				{
					$costExtr=$scheduleRate['yps-mhs-30'];
					$tenderSlab="upto 25.1 to 30 Qtl";
				}else if($totalTurnout<36)
				{
					$costExtr=$scheduleRate['yps-mhs-35'];
					$tenderSlab="upto 30.1 to 35 Qtl";
				}else if($totalTurnout<41)
				{
					$costExtr=$scheduleRate['yps-mhs-40'];
					$tenderSlab="upto 35.1 to 40 Qtl";
				}else if($totalTurnout<43)
				{
					$costExtr=$scheduleRate['yps-mhs-42'];
					$tenderSlab="upto 40.1 to 42 Qtl";
				}else if($totalTurnout<46)
				{
					$costExtr=$scheduleRate['yps-mhs-45'];
					$tenderSlab="upto 42.1 to 45 Qtl";
				}else if($totalTurnout>45)
				{
					$costExtr=$scheduleRate['yps-mhs-50'];
					$tenderSlab="45.1 and above Qtl";
				}
			}
			
	 	$costCropSetting=$scheduleRate['csps-1000']; // crop setting
	 	$costManualCarriage=$scheduleRate['rc-rsd-l-1000']; // carriage manual
	 	$costMuleCarriage=$scheduleRate['rc-rsd-m-1000']; // carriage mule
	 	$costtractorCarriage=$scheduleRate['rc-rsd-t-1000']; // carriage tractor
	 	$costOtherCarriage=$scheduleRate['rc-rsd-o-1000']; // carriage other
	 	
		$details='<table> <tr>';
	 	$details.='<td>';
	 	$details.='<label for="con_gen">Slab:</label>';
		$details.='<input class="lblText" readonly="readonly" id="tender_slab" type="text" name="tender_slab" data-required="true" data-error-message="Slab is required" value="'.$tenderSlab.'"/>';
		$details.='</td>';
		$details.='<td>';
		$details.='<label for="con_gen">Cost Extraction:</label>';
		$details.='<input class="lblText" readonly="readonly" id="cost_extr" type="text" name="cost_extr" data-required="true" data-error-message="Cost Extraction is required" value="'.$costExtr.'"/>';
		$details.='</td>';
		$details.='</tr>';
		
		$details.='<tr>';
		$details.='<td colspan="2">';
		$details.='<label for="con_gen">Carriage Charges from Forest to RSD</label>';
		$details.='</td>';
		$details.='</tr>';
		
		$details.='<tr>';
		$details.='<td>';
		$details.='<label for="con_gen">Mule:</label>';
		$details.='<input class="lblText" readonly="readonly" id="cost_carriage_mule_rsd" type="text" name="cost_carriage_mule_rsd" data-required="true" data-error-message="Cost Mule Carriage is required"  value="'.$costMuleCarriage.'"/>';
		$details.='</td>';
		$details.='<td>';
		$details.='<label for="con_gen">Manual:</label>';
		$details.='<input class="lblText" readonly="readonly" id="cost_carriage_manual_rsd" type="text" name="cost_carriage_manual_rsd" data-required="true" data-error-message="Cost Manual Carriage is required"  value="'.$costManualCarriage.'"/>';
		$details.='</td>';
		$details.='</tr>';
		
		$details.='<tr>';
		$details.='<td>';
		$details.='<label for="con_gen">Tractor:</label>';
		$details.='<input class="lblText" readonly="readonly" id="cost_carriage_tractor_rsd" type="text" name="cost_carriage_tractor_rsd" data-required="true" data-error-message="Cost Tractor Carriage is required"  value="'.$costtractorCarriage.'"/>';
		$details.='</td>';
		$details.='<td>';
		$details.='<label for="con_gen">Other:</label>';
		$details.='<input class="lblText" readonly="readonly" id="cost_carriage_other_rsd" type="text" name="cost_carriage_other_rsd" data-required="true" data-error-message="Cost Other Carriage is required"  value="'.$costOtherCarriage.'"/>';
		$details.='</td>';
		$details.='</tr>';
		
		$details.='<tr>';
		$details.='<td>';
		$details.='<label for="con_gen">Crop Setting:</label>';
		$details.='<input class="lblText" readonly="readonly" id="cost_crop_setting" type="text" name="cost_crop_setting" data-required="true" data-error-message="Cost Crop setting required"  value="'.$costCropSetting.'"/>';
		$details.='</td>';
		$details.='</tr> </table>';
		echo $details;
	 }
	 
	 // for tender
	 if($_GET['get']=='getDetailsForContractor')
	 {
	 	$contractorCode=$_GET['contractorCode'];
	 	
	 	$contractor = $db->get_row("SELECT * FROM m_contractor WHERE contractor_code='".$contractorCode."'",ARRAY_A);
	 	$details='<table> <tr>';
	 	$details.='<td>';
	 	$details.='<label for="con_gen">Contractor Class:</label>';
		$details.='<input class="lblText" readonly="readonly" id="contractor_class" type="text" name="contractor_class" data-required="true" data-error-message="Total Blazes is required" value="'.$contractor['contractor_class'].'"/> ';
		$details.='</td>';
		$details.='<td>';
	 	$details.='<label for="con_gen">Contractor Valid Date:</label>';
		$details.='<input class="lblText" readonly="readonly" id="contractor_valid_dt" type="text" name="contractor_valid_dt" data-error-message="Total Blazes is required" value="'.$contractor['contractor_valid_dt'].'"/> ';
		$details.='</td>';
		$details.='</tr> </table>';
		echo $details;
	 }
 
 }
?>