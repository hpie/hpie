<?php
class common
{
	public $division;
    
	 public function __construct($param) {
    	$this->division = $param;
  	}
	
	function makeSelectOptions($arrData,$name,$selectedIndex=0,$javascript="",$size=0,$str="")
	{
		//echo '<pre>'; print_r($arrData); echo '<pre>';
		$strOptions= "";
		if(isset($javascript) && $javascript != ""){
			$callJs = "onchange ='javascript:".$javascript."(this.value)'";
		}else{
			$callJs= "";
		}
		if(!$size){
			$selectSize = "180px";
		}else{
			$selectSize = $size."px";
		}
	    
		if(is_array($arrData) && count($arrData)>=0){
			$strOptions = "<select name ='".$name."' id ='".$name."' ".$callJs." style ='width:".$selectSize."' ".$str."  >";
			
			$strOptions .= "<option value =''>-select-</option>";
			foreach($arrData as $k=>$v){
				$selected= "";
				if($selectedIndex == $k){
					$selected= "selected";
				}
				$strOptions .= "<option value ='".$k."' ".$selected.">".$v."</option>";
			}
			$strOptions .= "</select>";
		}
		return $strOptions;
	}





	function makeSelectOptionsCustomize($arrData,$name,$selectedIndex=0,$javascript="",$size=0,$str="")
	{
		//echo '<pre>'; print_r($arrData); echo '<pre>';
		$strOptions= "";
		if(isset($javascript) && $javascript != ""){
			$callJs = "onchange ='javascript:".$javascript."'";
		}else{
			$callJs= "";
		}
		
		if(!$size){
			$selectSize = "180px";
		}else{
			$selectSize = $size."px";
		}
	    
		if(is_array($arrData) && count($arrData)>=0){
			$strOptions = "<select name ='".$name."' id ='".$name."' ".$callJs." style ='width:".$selectSize."' ".$str."  >";
			
			$strOptions .= "<option value =''>-select-</option>";
			foreach($arrData as $k=>$v){
				$selected= "";
				if($selectedIndex == $k){
					$selected= "selected";
				}
				$strOptions .= "<option value ='".$k."' ".$selected.">".$v."</option>";
			}
			$strOptions .= "</select>";
		}
		return $strOptions;
	}

	
	function generateSelectList($i_mark_id,$economicsId)
	{
		$selectList=$this->getEcnomicsDateSelect($i_mark_id);
		count($selectList);
		$selectdetail="<select name='i_ecnomics_master_id' id='i_ecnomics_master_id' onChange='submitForm(this.form)'>";
		foreach($selectList as $detail)
		{
			if($economicsId ==$detail['id'])
			{
				$selectdetail.="<option selected=selected value='".$detail['id']."'>";
			}
			else
			{ 
				$selectdetail.="<option value='".$detail['id']."'>";
			}
			
			$selectdetail.=$detail['dt_createDate'];
			$selectdetail.="</option>";
		}
		
		$selectdetail.="</select>";
		echo $selectdetail;
		
	}
	
	function getSeasonYearList($season_year, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		//$saesonList = array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
		$selectList='<select id="season_year" name="season_year" '.$callJs.' data-required="true" data-error-message="Season is required">'; 
        $oldestYear = 2010; 
		$currYear = intval(date('Y')+2); 
        
		$selectList.='<option value="">Select</option>';
            for($i = $oldestYear; $i <= $currYear; $i++){ 
                $val=$i."-02-15";
            	if($val==$season_year)
            	{	
                	$selectList.='<option value="'. $val .'" selected="selected">' . $i . '</option>';
            	}else
            	{
            		$selectList.='<option value="'. $val .'">' . $i . '</option>';
            	} 
            } 
    	$selectList.="</select>";
		
		echo $selectList;
	}
	
	function getLastThreeSeasonYearRow($season_year)
	{
		//$saesonList = array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
		 
		$time = strtotime($season_year);
		// You can now use date() functions with $time, like
		$currYear = intval(date('Y', $time)); 
        $oldestYear = $currYear-3; 
        $tableTow='<tr>';
		
            for($i = $oldestYear; $i < $currYear; $i++)
            { 
            	$tableTow.='<td>' . $i . '</td>';
            } 
    	$tableTow.="</tr>";
		
		echo $tableTow;
	}
	
	function getLastThreeSeasonYearCols($season_year)
	{
		//$saesonList = array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
		 
		$time = strtotime($season_year);
		// You can now use date() functions with $time, like
		$currYear = intval(date('Y', $time)); 
        $oldestYear = $currYear-3; 
        $tableTow='';
		
            for($i = $oldestYear; $i < $currYear; $i++)
            { 
            	$tableTow.='<td>' . $i . '</td>';
            } 
    	//$tableTow.="</tr>";
		
		echo $tableTow;
	}
	
	
	function getPerSectionYieldForLastThreeSeason($season_year, $lot_no)
	{
		//$saesonList = array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
		global $db;
		$time = strtotime($season_year);
		// You can now use date() functions with $time, like
		$currYear = intval(date('Y', $time)); 
        $oldestYear = $currYear-3;
		$tableRow="";
        $avgYield=0;
        
            for($i = $oldestYear; $i < $currYear; $i++)
            { 
            	$val=$i."-02-15";
            	$approvedYield = $db->get_row("SELECT approved_yield  FROM t_proposed_yield_form_blazes WHERE lot_no='".$lot_no."' AND season_year='".$val."'",ARRAY_A);
            	$avgYield+=$approvedYield['approved_yield'];
            	$tableRow.="<tr> <td> Year " . $i . "</td> <td>".$approvedYield['approved_yield']."</td></tr>";
            } 
            $tableRow.="<tr> <td> Average Yield (of last 3 years)</td> <td>".round(($avgYield/3),3)."</td></tr>";
    	
		echo $tableRow;
	}
	
	function getPerSectionYieldForLastThreeSeasonForReport($season_year, $lot_no)
	{
		//$saesonList = array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
		global $db;
		$time = strtotime($season_year);
		// You can now use date() functions with $time, like
		$currYear = intval(date('Y', $time)); 
        $oldestYear = $currYear-3;
		$tableRow="";
        $avgYield=0;
        	//$tableRow.="<tr>";
            for($i = $oldestYear; $i < $currYear; $i++)
            { 
            	$val=$i."-02-15";
            	$approvedYield = $db->get_row("SELECT proposed_yield  FROM t_proposed_yield_form_blazes WHERE lot_no='".$lot_no."' AND season_year='".$val."'",ARRAY_A);
            	$avgYield+=$approvedYield['proposed_yield'];
            	$tableRow.="<td>".$approvedYield['proposed_yield']."</td>";
            } 
            $tableRow.=" <td>".round(($avgYield/3),3)."</td>";
    	
		echo $tableRow;
	}
	
	function getZoneList($zone_code, $javascript="")
	{
		if(isset($javascript) && $javascript != ""){
			$callJs = ' onchange="'.$javascript.'(this);" ';
		}else{
			$callJs= "";
		}
		
		$zoneList = array("c"=>"Cold", "h"=>"Hot", "mh"=>"Moderate Hot", "mhs"=>"Moderate Hot Sundernagar");
		$selectList='<select id="zone_code" name="zone_code" '.$callJs.' data-required="true" data-error-message="Zome is required">'; 
        
		$selectList.='<option value="">Select</option>';
		
		foreach($zoneList as $zone_c=>$zone_v)
		{
			if($zone_c==$zone_code)
	        {	
	     	   $selectList.='<option value="'.$zone_c.'" selected="selected">' . $zone_v . '</option>';
	        }else
	        {
	        	$selectList.='<option value="'. $zone_c .'">' . $zone_v . '</option>';
	        }
		}
    	$selectList.="</select>";
		
		echo $selectList;
	}
	
	
	function getAllScheduleRates($season_year)
	{
		global $db;
		$scheduleRates = $db->get_results("SELECT srate_code, srate FROM m_schedule_rate WHERE division_code='".$this->division."' AND season_year='".$season_year."'",ARRAY_A);
		//$db->debug();
		$scheduleRate=array();
		foreach ( $scheduleRates as $rate )
	    {
    	    $scheduleRate[$rate['srate_code']]=$rate['srate'];
        }
		return $scheduleRate;
	}
	
	function getExpenditureOnWork($rcal_id, $forest_code, $eow_code)
	{
		global $db;
		$eow = $db->get_row("SELECT * FROM t_expenditure_on_work where rate_calculation_for_lot_id='".$rcal_id."' AND forest_code='".$forest_code."' AND eow_code='".$eow_code."'",ARRAY_A);
		$eowArray=array();
		if(isset($eow))
        {
			$eowArray=$eow;
		}else
		{
			$eowArray['id']="0";
			$eowArray['rate_calculation_for_lot_id']=$rcal_id;
			$eowArray['division_code']="";
			$eowArray['unit_code']="";
			$eowArray['lot_no']="";
			$eowArray['forest_code']=$forest_code;
			$eowArray['zone_code']="";
			$eowArray['eow_code']=$eow_code;
			$eowArray['blazes_received']="";
			$eowArray['yield_fixed']="";
			$eowArray['cost_crop_setting']="";
			$eowArray['exp_crop_setting']="";
			$eowArray['cost_extr']="";
			$eowArray['turnout']="";
			$eowArray['exp_extr_turnout']="";
			$eowArray['total_tins']="";
			$eowArray['distance_to_rsd']="";
			$eowArray['cost_tpt_tins_to_forest']="";
			$eowArray['exp_tpt_tins_to_forest']="";
			$eowArray['cost_tpt_tins_to_rsd']="";
			$eowArray['exp_tpt_tins_to_rsd']="";
			$eowArray['cost_tpt_drums_to_forest']="";
			$eowArray['exp_tpt_drums_to_forest']="";
			$eowArray['cost_tpt_drums_to_rsd']="";
			$eowArray['exp_tpt_drums_to_rsd']="";
			$eowArray['turnout_carriage_mule_rsd']="";
			$eowArray['cost_carriage_mule_rsd']="";
			$eowArray['dist_carriage_mule_rsd']="";
			$eowArray['exp_carriage_mule_rsd']="";
			$eowArray['turnout_carriage_manual_rsd']="";
			$eowArray['cost_carriage_manual_rsd']="";
			$eowArray['dist_carriage_manual_rsd']="";
			$eowArray['exp_carriage_manual_rsd']="";
			$eowArray['turnout_carriage_tractor_rsd']="";
			$eowArray['cost_carriage_tractor_rsd']="";
			$eowArray['dist_carriage_tractor_rsd']="";
			$eowArray['exp_carriage_tractor_rsd']="";
			$eowArray['turnout_carriage_other_rsd']="";
			$eowArray['cost_carriage_other_rsd']="";
			$eowArray['dist_carriage_other_rsd']="";
			$eowArray['exp_carriage_other_rsd']="";
			$eowArray['cost_soldering_of_resin']="";
			$eowArray['exp_soldering_of_resin']="";
			$eowArray['cost_mate_commission']="";
			$eowArray['exp_mate_commission']="";
			$eowArray['season_year']="";
			$eowArray['status_cd']="A";
			//$eowArray['created_dt']="";
			//$eowArray['created_by']="";
			//$eowArray['updated_dt']="";
			//$eowArray['updated_by']="";
		}
		return $eowArray;
	}
	
	
	
	function getCostOfMaretial($rcal_id, $forest_code, $com_code)
	{
		global $db;
		$com = $db->get_row("SELECT * FROM t_cost_of_material where rate_calculation_for_lot_id='".$rcal_id."' AND forest_code='".$forest_code."' AND com_code='".$com_code."'",ARRAY_A);
		$comArray=array();
		if(isset($com))
        {
			$comArray=$com;
		}else
		{
			$comArray['id']="0";
			$comArray['rate_calculation_for_lot_id']=$rcal_id;
			$comArray['division_code']="";
			$comArray['unit_code']="";
			$comArray['lot_no']="";
			$comArray['forest_code']=$forest_code;
			$comArray['com_code']=$com_code;
			$comArray['blazes_received']="";
			$comArray['number_of_mazdoor']="";
			$comArray['cost_blaze_frame']="";
			$comArray['exp_blaze_frame']="";
			$comArray['cost_bark_shaver']="";
			$comArray['exp_bark_shaver']="";
			$comArray['cost_groove_cutter']="";
			$comArray['exp_groove_cutter']="";
			$comArray['cost_freshning_knife']="";
			$comArray['exp_freshning_knife']="";
			$comArray['cost_spray_bottle']="";
			$comArray['exp__spray_bottle']="";
			$comArray['cost_hammer_nailpuller']="";
			$comArray['exp_hammer_nailpuller']="";
			$comArray['cost_pot_scrapper']="";
			$comArray['exp_pot_scrapper']="";
			$comArray['cost_pots']="";
			$comArray['exp_pots']="";
			$comArray['cost_lips']="";
			$comArray['exp_lips']="";
			$comArray['cost_wire_nails_5cm']="";
			$comArray['qty_wire_nails_5cm']="";
			$comArray['exp_wire_nails_5cm']="";
			$comArray['cost_wire_nails_2cm']="";
			$comArray['qty_wire_nails_2cm']="";
			$comArray['exp_wire_nails_2cm']="";
			$comArray['cost_solder']="";
			$comArray['qty_solder']="";
			$comArray['exp_solder']="";
			$comArray['cost_naushader']="";
			$comArray['qty_naushader']="";
			$comArray['exp_naushader']="";
			$comArray['cost_charcoal']="";
			$comArray['qty_charcoal']="";
			$comArray['exp_charcoal']="";
			$comArray['cost_tool_sharpen']="";
			$comArray['exp_tool_sharpen']="";
			$comArray['cost_blower']="";
			$comArray['qty_blower']="";
			$comArray['exp_blower']="";
			$comArray['cost_solder_iron']="";
			$comArray['qty_solder_iron']="";
			$comArray['exp_solder_iron']="";
			$comArray['cost_paint']="";
			$comArray['qty_paint']="";
			$comArray['exp_paint']="";
			$comArray['cost_cylinder_50ml']="";
			$comArray['qty_cylinder_50ml']="";
			$comArray['exp_cylinder_50ml']="";
			$comArray['cost_cylinder_500ml']="";
			$comArray['qty_cylinder_500ml']="";
			$comArray['exp_cylinder_500ml']="";
			$comArray['cost_beaker_500ml']="";
			$comArray['qty_beaker_500ml']="";
			$comArray['exp_beaker_500ml']="";
			$comArray['cost_beaker_1000ml']="";
			$comArray['qty_beaker_1000ml']="";
			$comArray['exp_beaker_1000ml']="";
			$comArray['cost_funnel']="";
			$comArray['qty_funnel']="";
			$comArray['exp_funnel']="";
			$comArray['cost_other']="";
			$comArray['qty_other']="";
			$comArray['exp_other']="";
			$comArray['season_year']="";
			$comArray['status_cd']="A";
			//$comArray['created_dt']="";
			//$comArray['created_by']="";
			//$comArray['updated_dt']="";
			//$comArray['updated_by']="";
		}
		return $comArray;
	}

	
	function getCalculatedExpenditureOnWork($total_blazes, $yield_fixed, $turnout, $total_turnout, $zone_code, $distance_to_rsd, $season_year)
	{
		//$rcal_id, $forest_code, $eow_code
	    //get schedule rates
	    
		$scheduleRate=$this->getAllScheduleRates($season_year);
		$eowCalArray=array();
		
		$eowCalArray['zone_code']="$zone_code";
		$eowCalArray['blazes_received']=$total_blazes;
		$eowCalArray['yield_fixed']=$yield_fixed;
		$eowCalArray['turnout']=$turnout;
		
		$eowCalArray['cost_crop_setting']=$scheduleRate['csps-1000'];
		$eowCalArray['exp_crop_setting']=round((($total_blazes*$scheduleRate['csps-1000'])/1000),2);
		
				
		if($eowCalArray['zone_code']=="c")
		{
			if($total_turnout<21)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-c-20'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-c-20']);
			}else if($total_turnout<26)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-c-25'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-c-25']);
			}else if($total_turnout<31)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-c-30'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-c-30']);
			}else if($total_turnout<36)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-c-35'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-c-35']);
			}else if($total_turnout<41)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-c-40'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-c-40']);
			}else if($total_turnout<46)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-c-45'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-c-45']);
			}else if($total_turnout>45)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-c-50'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-c-50']);
			}
			
		}else if($eowCalArray['zone_code']=="h")
		{
			if($total_turnout<21)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-h-20'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-h-20']);
			}else if($total_turnout<26)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-h-25'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-h-25']);
			}else if($total_turnout<31)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-h-30'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-h-30']);
			}else if($total_turnout<36)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-h-35'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-h-35']);
			}else if($total_turnout<41)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-h-40'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-h-40']);
			}else if($total_turnout<46)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-h-45'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-h-45']);
			}else if($total_turnout>45)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-h-50'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-h-50']);
			}
		}else if($eowCalArray['zone_code']=="mh")
		{
			if($total_turnout<21)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-mh-20'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-mh-20']);
			}else if($total_turnout<26)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-mh-25'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-mh-25']);
			}else if($total_turnout<31)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-mh-30'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-mh-30']);
			}else if($total_turnout<36)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-mh-35'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-mh-35']);
			}else if($total_turnout<41)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-mh-40'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-mh-40']);
			}else if($total_turnout<46)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-mh-45'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-mh-45']);
			}else if($total_turnout>45)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-mh-50'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-mh-50']);
			}
		}else if($eowCalArray['zone_code']=="mhs")
		{
			if($total_turnout<21)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-mhs-20'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-mhs-20']);
			}else if($total_turnout<26)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-mhs-25'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-mhs-25']);
			}else if($total_turnout<31)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-mhs-30'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-mhs-30']);
			}else if($total_turnout<36)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-mhs-35'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-mhs-35']);
			}else if($total_turnout<41)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-mhs-40'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-mhs-40']);
			}else if($total_turnout<43)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-mhs-42'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-mhs-42']);
			}else if($total_turnout<46)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-mhs-45'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-mhs-45']);
			}else if($total_turnout>45)
			{
				$eowCalArray['cost_extr']=$scheduleRate['yps-mhs-50'];
				$eowCalArray['exp_extr_turnout']=($turnout*$scheduleRate['yps-mhs-50']);
			}
		}
		
		$eowCalArray['exp_extr_turnout']=round($eowCalArray['exp_extr_turnout'],2);  // round to two desimal places
		
		$eowCalArray['total_tins']=round((($turnout/17)*100),0);
		$eowCalArray['distance_to_rsd']=$distance_to_rsd;
		$eowCalArray['cost_tpt_tins_to_forest']=$scheduleRate['tc-e-m-100'];
		$eowCalArray['exp_tpt_tins_to_forest']=round(((($eowCalArray['total_tins']/100)*$eowCalArray['distance_to_rsd'])*$eowCalArray['cost_tpt_tins_to_forest']),2);
		$eowCalArray['cost_tpt_tins_to_rsd']="";
		$eowCalArray['exp_tpt_tins_to_rsd']="";
		$eowCalArray['cost_tpt_drums_to_forest']="";
		$eowCalArray['exp_tpt_drums_to_forest']="";
		$eowCalArray['cost_tpt_drums_to_rsd']="";
		$eowCalArray['exp_tpt_drums_to_rsd']="";
		$eowCalArray['turnout_carriage_mule_rsd']="0";
		$eowCalArray['cost_carriage_mule_rsd']=$scheduleRate['rc-rsd-m-1000'];
		$eowCalArray['dist_carriage_mule_rsd']="0";
		$eowCalArray['exp_carriage_mule_rsd']=round(($turnout*$eowCalArray['dist_carriage_mule_rsd']*$eowCalArray['cost_carriage_mule_rsd']),2);
		$eowCalArray['turnout_carriage_manual_rsd']="0";
		$eowCalArray['cost_carriage_manual_rsd']=$scheduleRate['rc-rsd-l-1000'];
		$eowCalArray['dist_carriage_manual_rsd']="0";
		$eowCalArray['exp_carriage_manual_rsd']=round(($turnout*$eowCalArray['dist_carriage_manual_rsd']*$eowCalArray['cost_carriage_manual_rsd']),2);
		$eowCalArray['turnout_carriage_tractor_rsd']="0";
		$eowCalArray['cost_carriage_tractor_rsd']=$scheduleRate['rc-rsd-t-1000'];
		$eowCalArray['dist_carriage_tractor_rsd']="0";
		$eowCalArray['exp_carriage_tractor_rsd']=round(($turnout*$eowCalArray['dist_carriage_tractor_rsd']*$eowCalArray['cost_carriage_tractor_rsd']),2);
		$eowCalArray['turnout_carriage_other_rsd']="0";
		$eowCalArray['cost_carriage_other_rsd']=$scheduleRate['rc-rsd-o-1000'];
		$eowCalArray['dist_carriage_other_rsd']="0";
		$eowCalArray['exp_carriage_other_rsd']=round(($turnout*$eowCalArray['dist_carriage_other_rsd']*$eowCalArray['cost_carriage_other_rsd']),2);
		$eowCalArray['cost_tpt_tins_to_rsd']="";
		$eowCalArray['exp_tpt_tins_to_rsd']="";
		$eowCalArray['cost_soldering_of_resin']=$scheduleRate['sft-1'];
		$eowCalArray['exp_soldering_of_resin']=round(($eowCalArray['total_tins']*$eowCalArray['cost_soldering_of_resin']),2);
		$eowCalArray['cost_mate_commission']=$scheduleRate['mc-1000'];
		if($total_turnout>20) // overall turnout for the lot 
		{
			$eowCalArray['exp_mate_commission']=round(($turnout*$eowCalArray['cost_mate_commission']),2);	
		}else
		{
			$eowCalArray['exp_mate_commission']=0;
		}
		
		$eowCalArray['season_year']=$season_year;
		return $eowCalArray;
	}
	
	
	function getCalculatedCostOfMaretial($total_blazes, $number_of_mazdoor, $season_year)
	{
		$scheduleRate=$this->getAllScheduleRates($season_year);
		$comCalArray=array();
		
		$comCalArray['blazes_received']=$total_blazes;
		$comCalArray['number_of_mazdoor']=$number_of_mazdoor;
		
		$comCalArray['cost_blaze_frame']=$scheduleRate['cblfrm-1'];
		$comCalArray['exp_blaze_frame']=round(($comCalArray['number_of_mazdoor']*$comCalArray['cost_blaze_frame']),2);
		$comCalArray['cost_bark_shaver']=$scheduleRate['cbrsvr-1'];
		$comCalArray['exp_bark_shaver']=round(($comCalArray['number_of_mazdoor']*$comCalArray['cost_bark_shaver']),2);
		$comCalArray['cost_groove_cutter']=$scheduleRate['cgrcut-1'];
		$comCalArray['exp_groove_cutter']=round(($comCalArray['number_of_mazdoor']*$comCalArray['cost_groove_cutter']),2);
		$comCalArray['cost_freshning_knife']=$scheduleRate['cfrknv-1'];
		$comCalArray['exp_freshning_knife']=round(($comCalArray['number_of_mazdoor']*$comCalArray['cost_freshning_knife']),2);
		$comCalArray['cost_spray_bottle']=$scheduleRate['cspbtl-1'];
		$comCalArray['exp__spray_bottle']=round(($comCalArray['number_of_mazdoor']*$comCalArray['cost_spray_bottle']),2);
		$comCalArray['cost_hammer_nailpuller']=$scheduleRate['chmplr-1'];
		$comCalArray['exp_hammer_nailpuller']=round(($comCalArray['number_of_mazdoor']*$comCalArray['cost_hammer_nailpuller']),2);
		$comCalArray['cost_pot_scrapper']=$scheduleRate['cptscr-1'];
		$comCalArray['exp_pot_scrapper']=round(($comCalArray['number_of_mazdoor']*$comCalArray['cost_pot_scrapper']),2);
		$comCalArray['cost_pots']=$scheduleRate['cop-1'];
		$comCalArray['exp_pots']=round((ceil($comCalArray['blazes_received']/2)*$comCalArray['cost_pots']),2);  // 50% reusability
		$comCalArray['cost_lips']=$scheduleRate['col-100'];  // per 100
		$comCalArray['exp_lips']=round((($comCalArray['blazes_received']*$comCalArray['cost_lips'])),2);
		$comCalArray['cost_wire_nails_5cm']=$scheduleRate['cwrnls-5-1'];
		$comCalArray['qty_wire_nails_5cm']="0";
		$comCalArray['exp_wire_nails_5cm']="";
		$comCalArray['cost_wire_nails_2cm']=$scheduleRate['cwrnls-2-1'];
		$comCalArray['qty_wire_nails_2cm']="0";
		$comCalArray['exp_wire_nails_2cm']="";
		$comCalArray['cost_solder']=$scheduleRate['csldr-1'];
		$comCalArray['qty_solder']="0";
		$comCalArray['exp_solder']="";
		$comCalArray['cost_naushader']=$scheduleRate['cnudr-1'];
		$comCalArray['qty_naushader']="0";
		$comCalArray['exp_naushader']="";
		$comCalArray['cost_charcoal']=$scheduleRate['cchcl-1'];
		$comCalArray['qty_charcoal']="0";
		$comCalArray['exp_charcoal']="";
		$comCalArray['cost_tool_sharpen']=$scheduleRate['cshpn-1'];
		$comCalArray['cost_blower']=$scheduleRate['cblowr-1'];
		$comCalArray['qty_blower']="0";
		$comCalArray['exp_blower']="";
		$comCalArray['cost_solder_iron']=$scheduleRate['csldriron-1'];
		$comCalArray['qty_solder_iron']="0";
		$comCalArray['exp_solder_iron']="";
		$comCalArray['cost_paint']=$scheduleRate['cpaint-1'];
		$comCalArray['qty_paint']="0";
		$comCalArray['exp_paint']="";
		$comCalArray['cost_cylinder_50ml']=$scheduleRate['cmcyl-50'];
		$comCalArray['qty_cylinder_50ml']="0";
		$comCalArray['exp_cylinder_50ml']="";
		$comCalArray['cost_cylinder_500ml']=$scheduleRate['cmcyl-500'];
		$comCalArray['qty_cylinder_500ml']="0";
		$comCalArray['exp_cylinder_500ml']="";
		$comCalArray['cost_beaker_500ml']=$scheduleRate['cbeaker-500'];
		$comCalArray['qty_beaker_500ml']="0";
		$comCalArray['exp_beaker_500ml']="";
		$comCalArray['cost_beaker_1000ml']=$scheduleRate['cbeaker-1000'];
		$comCalArray['qty_beaker_1000ml']="0";
		$comCalArray['exp_beaker_1000ml']="";
		$comCalArray['cost_funnel']=$scheduleRate['cfunnel-1'];
		$comCalArray['qty_funnel']="0";
		$comCalArray['exp_funnel']="";
		$comCalArray['cost_other']=$scheduleRate['cother-1'];
		$comCalArray['qty_other']="0";
		$comCalArray['exp_other']="";
		$comCalArray['exp_tool_sharpen']=round(($comCalArray['number_of_mazdoor']*$comCalArray['cost_tool_sharpen']),2);
		
		return $comCalArray;
	}	
		
	
}
?>