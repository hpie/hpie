<?php 
 if(isset($_GET['get']))
 { 
 	//initilize DB
	include "./db/db.php";
	require_once "./classes/common.php";
	$common	= new common();
	
	 if($_GET['get']=='lotForests')
	 {
	 	$lotNo=$_GET['lotNo'];
	  	$lotForests = $db->get_results("SELECT fr.forest_code, fr.forest_name FROM m_lot lt, m_forest fr WHERE lt.forest_code=fr.forest_code AND lt.lot_no='".$lotNo."'",ARRAY_A);
	  	$selectList.='<option value="">Select</option>';
	    foreach ( $lotForests as $forest )
        {
 	       $selectList.='<option value="'.$forest['forest_code'].'">'.$forest['forest_name'].'</option>';
        }
 		
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
	 	$numberOfMazdoor=$_GET['numberOfMazdoor'];
	 	$totalBlazes=$_GET['totalBlazes'];
	 	$seasonYear=$_GET['seasonYear'];
	 	
		$comCalArray = $common->getCalculatedCostOfMaretial($totalBlazes, $numberOfMazdoor, $seasonYear);
		$details='<tr><td>Expenditure Type</td> <td>Details</td> <td>Amount</td> </tr>';
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
		$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_pots" type="text" name="cost_pots" value="'.$comCalArray['cost_pots'].'"/> for '.($comCalArray['blazes_received']/2).' pots</td>';
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
		
		$details.='<tr>';
		$details.='<td>Sharpening Material cost </td>';
		$details.='<td>Rs.<input class="lblText" readonly="readonly" id="cost_tool_sharpen" type="text" name="cost_tool_sharpen" value="'.$comCalArray['cost_tool_sharpen'].'"/></td>';
		$details.='<td><input class="lblText" readonly="readonly" id="exp_tool_sharpen" type="text" name="exp_tool_sharpen" value="'.$comCalArray['exp_tool_sharpen'].'"/> </td>';
		$details.='<tr>';
		
	 	echo $details;
	 }
 
 }
?>