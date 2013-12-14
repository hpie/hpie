<?php
	session_start();
	//include config
	include "config.php";
	
	if(isset($_POST['submitted']))
	{
		if($action=="update")
		{
			$db->query("UPDATE t_blazes_for_tapping SET blazes_received='".$_POST['blazes_received']."', season_year='".$_POST['season_year']."', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Blazes detail Successfully Updated.";
			}else
			{
				$_SESSION['msg']="Problem updating blazes. Please try again.";
			}
			Header("Location: receive-blazes.php");
		}else if($action=="save")
		{
			$db->query("INSERT INTO t_blazes_for_tapping (id, lot_no, forest_code, unit_code, dfo_code, range_code, blazes_received, taken_over_dt,	season_year, division_code, created_by) VALUES (NULL, '".$_POST['lot_no']."', '".$_POST['forest_code']."', '".$_POST['unit_code']."', '".$_POST['dfo_code']."', '".$_POST['range_code']."', '".$_POST['blazes_received']."', '".$_POST['season_year']."', '".$_POST['season_year']."', '".$_SESSION['division']."', '".$_POST['created_by']."')");
			$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Blazes for Lot [".$_POST['lot_no']."] Successfully Created.";
			}else
			{
				$_SESSION['msg']="Problem creating lot. Please try again.";
			}
			Header("Location: receive-blazes.php");
		}else if($action=="status")
		{
			$status="";
			if($_POST['status_cd'] =="A")
			{
				$db->query("UPDATE t_blazes_for_tapping SET status_cd='I', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
				$status="Inactive";
			}else if($_POST['status_cd'] =="I")
			{
				$db->query("UPDATE t_blazes_for_tapping SET status_cd='A', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
				$status="Active";
			}
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Lot [".$_POST['lot_no']."] is now set to ".$status.".";
			}else
			{
				$_SESSION['msg']="Problem updating lot. Please try again.";
			}
			Header("Location: receive-blazes.php");
		}else if($action=="delete")
		{
			$db->query("UPDATE t_blazes_for_tapping SET status_cd='D', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
			$status="deleted";
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Lot [".$_POST['lot_no']."] is now marked as ".$status.".";
			}else
			{
				$_SESSION['msg']="Problem updating lot. Please try again.";
			}
			Header("Location: receive-blazes.php");
		}else if($action=='upsetPriceForLot')
		{
			// this action does nothing here but in the UI below
			$action="upsetPriceForLot";
			
		}else if($action=='setRateForLot')
		{
			// A approved P pending S sent R rejected
				$approval_yield_status="P";
				if($_POST['proposed_yield']!="")
				{
					$approval_yield_status="S";
				}
				if($_POST['approved_yield']!="")
				{
					$approval_yield_status="A";
				}
				
			if($_POST['rowid']=="0")
			{
				$db->query("INSERT INTO t_proposed_yield_form_blazes (id, division_code, unit_code, dfo_code, forest_code, lot_no, blazes_received, proposed_yield, approved_yield, approval_yield_status, season_year, created_by)
          			VALUES (NULL, '".$_SESSION['division']."', '".$_POST['unit_code']."', '".$_POST['dfo_code']."', '".$_POST['forest_code']."', '".$_POST['lot_no']."', '".$_POST['blazes_received']."', '".$_POST['proposed_yield']."','".$_POST['approved_yield']."', '".$approval_yield_status."', '".$_POST['season_year']."', '".$_POST['created_by']."' )");
				
				if($db->rows_affected>0)
				{ 
					$_SESSION['msg']="Proposed yield  Lot [".$_POST['lot_no']."] and Season [".$_POST['season_year']."] Successfully Created.";
				}else
				{
					$_SESSION['msg']="Problem setting yield for Lot. Please try again.";
				}
				Header("Location: receive-blazes.php");
			
          	}else
          	{
          		$db->query("UPDATE t_proposed_yield_form_blazes SET proposed_yield='".$_POST['proposed_yield']."', approved_yield='".$_POST['approved_yield']."', approval_yield_status='".$approval_yield_status."', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
          		
          		if($db->rows_affected>0)
				{ 
					$_SESSION['msg']="Yield for Lot [".$_POST['lot_no']."] for Season [".$_POST['season_year']."]  Successfully Updated.";
				}else
				{
					$_SESSION['msg']="Problem updatin yield for Lot. Please try again.";
				}
				Header("Location: receive-blazes.php");
          	}
			//$action="setYieldForLot";
			//$db->debug();	
		}else if($action=='setExpenditureOnWork')
		{
			if($_POST['rowid']=="0")
			{
				$exp_eow=($_POST['exp_crop_setting']+$_POST['exp_extr_turnout']+$_POST['exp_tpt_tins_to_forest']+$_POST['exp_tpt_tins_to_rsd']+$_POST['exp_tpt_drums_to_forest']+$_POST['exp_tpt_drums_to_rsd']+$_POST['exp_carriage_mule_rsd']+$_POST['exp_carriage_manual_rsd']+$_POST['exp_carriage_tractor_rsd']+$_POST['exp_carriage_other_rsd']+$_POST['exp_soldering_of_resin']+$_POST['exp_mate_commission']);
				$db->query("INSERT INTO t_expenditure_on_work (id, rate_calculation_for_lot_id, division_code, unit_code, lot_no, forest_code, zone_code, eow_code, exp_eow, blazes_received, yield_fixed, cost_crop_setting, exp_crop_setting, cost_extr, turnout, exp_extr_turnout, total_tins, distance_to_rsd, cost_tpt_tins_to_forest, exp_tpt_tins_to_forest, cost_tpt_tins_to_rsd, exp_tpt_tins_to_rsd, cost_tpt_drums_to_forest, exp_tpt_drums_to_forest, cost_tpt_drums_to_rsd, exp_tpt_drums_to_rsd, turnout_carriage_mule_rsd, cost_carriage_mule_rsd, dist_carriage_mule_rsd, exp_carriage_mule_rsd, turnout_carriage_manual_rsd, cost_carriage_manual_rsd, dist_carriage_manual_rsd, exp_carriage_manual_rsd, turnout_carriage_tractor_rsd, cost_carriage_tractor_rsd, dist_carriage_tractor_rsd, exp_carriage_tractor_rsd, turnout_carriage_other_rsd, cost_carriage_other_rsd, dist_carriage_other_rsd, exp_carriage_other_rsd, cost_soldering_of_resin, exp_soldering_of_resin, cost_mate_commission, exp_mate_commission, season_year, created_by)
          			VALUES (NULL, '".$_POST['rate_calculation_for_lot_id']."', '".$_POST['division_code']."', '".$_POST['unit_code']."', '".$_POST['lot_no']."', '".$_POST['forest_code']."', '".$_POST['zone_code']."', '".$_POST['eow_code']."', '".$exp_eow."', '".$_POST['blazes_received']."', '".$_POST['yield_fixed']."', '".$_POST['cost_crop_setting']."', '".$_POST['exp_crop_setting']."', '".$_POST['cost_extr']."', '".$_POST['turnout']."', '".$_POST['exp_extr_turnout']."', '".$_POST['total_tins']."', '".$_POST['distance_to_rsd']."', '".$_POST['cost_tpt_tins_to_forest']."', '".$_POST['exp_tpt_tins_to_forest']."', '".$_POST['cost_tpt_tins_to_rsd']."', '".$_POST['exp_tpt_tins_to_rsd']."', '".$_POST['cost_tpt_drums_to_forest']."', '".$_POST['exp_tpt_drums_to_forest']."', '".$_POST['cost_tpt_drums_to_rsd']."', '".$_POST['exp_tpt_drums_to_rsd']."', '".$_POST['turnout_carriage_mule_rsd']."', '".$_POST['cost_carriage_mule_rsd']."', '".$_POST['dist_carriage_mule_rsd']."', '".$_POST['exp_carriage_mule_rsd']."', '".$_POST['turnout_carriage_manual_rsd']."', '".$_POST['cost_carriage_manual_rsd']."', '".$_POST['dist_carriage_manual_rsd']."', '".$_POST['exp_carriage_manual_rsd']."', '".$_POST['turnout_carriage_tractor_rsd']."', '".$_POST['cost_carriage_tractor_rsd']."', '".$_POST['dist_carriage_tractor_rsd']."', '".$_POST['exp_carriage_tractor_rsd']."', '".$_POST['turnout_carriage_other_rsd']."', '".$_POST['cost_carriage_other_rsd']."', '".$_POST['dist_carriage_other_rsd']."', '".$_POST['exp_carriage_other_rsd']."', '".$_POST['cost_soldering_of_resin']."', '".$_POST['exp_soldering_of_resin']."', '".$_POST['cost_mate_commission']."', '".$_POST['exp_mate_commission']."', '".$_POST['season_year']."', '".$_POST['created_by']."' )");
				
				if($db->rows_affected>0)
				{ 
					$_SESSION['msg']="Expenditure Lot [".$_POST['lot_no']."] and Season [".$_POST['season_year']."] for Forest [".$_POST['forest_code']."] Successfully Saved.";
				}else
				{
					$_SESSION['msg']="Problem setting Expenditure for Lot. Please try again.";
				}				
          	}else
          	{
          		$exp_eow=($_POST['exp_crop_setting']+$_POST['exp_extr_turnout']+$_POST['exp_tpt_tins_to_forest']+$_POST['exp_tpt_tins_to_rsd']+$_POST['exp_tpt_drums_to_forest']+$_POST['exp_tpt_drums_to_rsd']+$_POST['exp_carriage_mule_rsd']+$_POST['exp_carriage_manual_rsd']+$_POST['exp_carriage_tractor_rsd']+$_POST['exp_carriage_other_rsd']+$_POST['exp_soldering_of_resin']+$_POST['exp_mate_commission']);
          		$db->query("UPDATE t_expenditure_on_work SET zone_code='".$_POST['zone_code']."',  exp_eow='".$exp_eow."', blazes_received='".$_POST['blazes_received']."', yield_fixed='".$_POST['yield_fixed']."', cost_crop_setting='".$_POST['cost_crop_setting']."', exp_crop_setting='".$_POST['exp_crop_setting']."', cost_extr='".$_POST['cost_extr']."', turnout='".$_POST['turnout']."', exp_extr_turnout='".$_POST['exp_extr_turnout']."', total_tins='".$_POST['total_tins']."', distance_to_rsd='".$_POST['distance_to_rsd']."', cost_tpt_tins_to_forest='".$_POST['cost_tpt_tins_to_forest']."', exp_tpt_tins_to_forest='".$_POST['exp_tpt_tins_to_forest']."', cost_tpt_tins_to_rsd='".$_POST['cost_tpt_tins_to_rsd']."', exp_tpt_tins_to_rsd='".$_POST['exp_tpt_tins_to_rsd']."', cost_tpt_drums_to_forest='".$_POST['cost_tpt_drums_to_forest']."', exp_tpt_drums_to_forest='".$_POST['exp_tpt_drums_to_forest']."', cost_tpt_drums_to_rsd='".$_POST['cost_tpt_drums_to_rsd']."', exp_tpt_drums_to_rsd='".$_POST['exp_tpt_drums_to_rsd']."', turnout_carriage_mule_rsd='".$_POST['turnout_carriage_mule_rsd']."',  cost_carriage_mule_rsd='".$_POST['cost_carriage_mule_rsd']."', dist_carriage_mule_rsd='".$_POST['dist_carriage_mule_rsd']."', exp_carriage_mule_rsd='".$_POST['exp_carriage_mule_rsd']."', turnout_carriage_manual_rsd='".$_POST['turnout_carriage_manual_rsd']."', cost_carriage_manual_rsd='".$_POST['cost_carriage_manual_rsd']."', dist_carriage_manual_rsd='".$_POST['dist_carriage_manual_rsd']."', exp_carriage_manual_rsd='".$_POST['exp_carriage_manual_rsd']."', turnout_carriage_tractor_rsd='".$_POST['turnout_carriage_tractor_rsd']."', cost_carriage_tractor_rsd='".$_POST['cost_carriage_tractor_rsd']."', dist_carriage_tractor_rsd='".$_POST['dist_carriage_tractor_rsd']."', exp_carriage_tractor_rsd='".$_POST['exp_carriage_tractor_rsd']."', turnout_carriage_other_rsd='".$_POST['turnout_carriage_other_rsd']."', cost_carriage_other_rsd='".$_POST['cost_carriage_other_rsd']."', dist_carriage_other_rsd='".$_POST['dist_carriage_other_rsd']."', exp_carriage_other_rsd='".$_POST['exp_carriage_other_rsd']."', cost_soldering_of_resin='".$_POST['cost_soldering_of_resin']."', exp_soldering_of_resin='".$_POST['exp_soldering_of_resin']."', cost_mate_commission='".$_POST['cost_mate_commission']."', exp_mate_commission='".$_POST['exp_mate_commission']."', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
          		
          		if($db->rows_affected>0)
				{ 
					$_SESSION['msg']="Expenditure for Lot [".$_POST['lot_no']."] for Season [".$_POST['season_year']."]  for Forest [".$_POST['forest_code']."] Successfully Updated.";
				}else
				{
					$_SESSION['msg']="Problem updatin Expenditure for Lot. Please try again.";
				}				
          	}
			
			// this action does nothing here but in the UI below
			$action="upsetPriceForLot";
		}else if($action=='setCostofMaterial')
		{
			if($_POST['rowid']=="0")
			{
				$exp_com=($_POST['exp_blaze_frame']+$_POST['exp_bark_shaver']+$_POST['exp_groove_cutter']+$_POST['exp_freshning_knife']+$_POST['exp__spray_bottle']+$_POST['exp_hammer_nailpuller']+$_POST['exp_pot_scrapper']+$_POST['exp_pots']+$_POST['exp_lips']+$_POST['exp_wire_nails_5cm']+$_POST['exp_wire_nails_2cm']+$_POST['exp_solder']+$_POST['exp_naushader']+$_POST['exp_charcoal']+$_POST['exp_tool_sharpen']+$_POST['exp_blower']+$_POST['exp_solder_iron']+$_POST['exp_paint']+$_POST['exp_cylinder_50ml']+$_POST['exp_cylinder_500ml']+$_POST['exp_beaker_500ml']+$_POST['exp_beaker_1000ml']+$_POST['exp_funnel']+$_POST['exp_other']);
				$db->query("INSERT INTO t_cost_of_material (id, rate_calculation_for_lot_id, division_code, unit_code, lot_no, forest_code, com_code, exp_com, blazes_received, number_of_mazdoor, cost_blaze_frame, exp_blaze_frame, cost_bark_shaver, exp_bark_shaver, cost_groove_cutter, exp_groove_cutter, cost_freshning_knife, exp_freshning_knife, cost_spray_bottle, exp__spray_bottle, cost_hammer_nailpuller, exp_hammer_nailpuller, cost_pot_scrapper, exp_pot_scrapper, cost_pots, exp_pots, cost_lips, exp_lips, cost_wire_nails_5cm, qty_wire_nails_5cm, exp_wire_nails_5cm, cost_wire_nails_2cm, qty_wire_nails_2cm, exp_wire_nails_2cm, cost_solder, qty_solder, exp_solder, cost_naushader, qty_naushader, exp_naushader, cost_charcoal, qty_charcoal, exp_charcoal, cost_tool_sharpen, exp_tool_sharpen, cost_blower, qty_blower, exp_blower, cost_solder_iron, qty_solder_iron, exp_solder_iron, cost_paint, qty_paint, exp_paint, cost_cylinder_50ml, qty_cylinder_50ml, exp_cylinder_50ml, cost_cylinder_500ml, qty_cylinder_500ml, exp_cylinder_500ml, cost_beaker_500ml, qty_beaker_500ml, exp_beaker_500ml, cost_beaker_1000ml, qty_beaker_1000ml, exp_beaker_1000ml, cost_funnel, qty_funnel, exp_funnel, cost_other, qty_other, exp_other, season_year, created_by)
          			VALUES (NULL, '".$_POST['rate_calculation_for_lot_id']."', '".$_POST['division_code']."', '".$_POST['unit_code']."', '".$_POST['lot_no']."', '".$_POST['forest_code']."', '".$_POST['com_code']."', '".$exp_com."', '".$_POST['blazes_received']."', '".$_POST['number_of_mazdoor']."', '".$_POST['cost_blaze_frame']."', '".$_POST['exp_blaze_frame']."', '".$_POST['cost_bark_shaver']."', '".$_POST['exp_bark_shaver']."', '".$_POST['cost_groove_cutter']."', '".$_POST['exp_groove_cutter']."', '".$_POST['cost_freshning_knife']."', '".$_POST['exp_freshning_knife']."', '".$_POST['cost_spray_bottle']."', '".$_POST['exp__spray_bottle']."', '".$_POST['cost_hammer_nailpuller']."', '".$_POST['exp_hammer_nailpuller']."', '".$_POST['cost_pot_scrapper']."', '".$_POST['exp_pot_scrapper']."', '".$_POST['cost_pots']."', '".$_POST['exp_pots']."', '".$_POST['cost_lips']."', '".$_POST['exp_lips']."', '".$_POST['cost_wire_nails_5cm']."', '".$_POST['qty_wire_nails_5cm']."', '".$_POST['exp_wire_nails_5cm']."', '".$_POST['cost_wire_nails_2cm']."', '".$_POST['qty_wire_nails_2cm']."', '".$_POST['exp_wire_nails_2cm']."', '".$_POST['cost_solder']."', '".$_POST['qty_solder']."', '".$_POST['exp_solder']."', '".$_POST['cost_naushader']."', '".$_POST['qty_naushader']."', '".$_POST['exp_naushader']."', '".$_POST['cost_charcoal']."', '".$_POST['qty_charcoal']."', '".$_POST['exp_charcoal']."', '".$_POST['cost_tool_sharpen']."', '".$_POST['exp_tool_sharpen']."','".$_POST['cost_blower']."', '".$_POST['qty_blower']."', '".$_POST['exp_blower']."', '".$_POST['cost_solder_iron']."', '".$_POST['qty_solder_iron']."', '".$_POST['exp_solder_iron']."', '".$_POST['cost_paint']."', '".$_POST['qty_paint']."', '".$_POST['exp_paint']."', '".$_POST['cost_cylinder_50ml']."', '".$_POST['qty_cylinder_50ml']."', '".$_POST['exp_cylinder_50ml']."', '".$_POST['cost_cylinder_500ml']."', '".$_POST['qty_cylinder_500ml']."', '".$_POST['exp_cylinder_500ml']."', '".$_POST['cost_beaker_500ml']."', '".$_POST['qty_beaker_500ml']."', '".$_POST['exp_beaker_500ml']."', '".$_POST['cost_beaker_1000ml']."', '".$_POST['qty_beaker_1000ml']."', '".$_POST['exp_beaker_1000ml']."', '".$_POST['cost_funnel']."', '".$_POST['qty_funnel']."', '".$_POST['exp_funnel']."', '".$_POST['cost_other']."', '".$_POST['qty_other']."', '".$_POST['exp_other']."', '".$_POST['season_year']."', '".$_POST['created_by']."' )");
				//$db->debug();	
				if($db->rows_affected>0)
				{ 
					$_SESSION['msg']="Cost for Lot [".$_POST['lot_no']."] and Season [".$_POST['season_year']."] for Forest [".$_POST['forest_code']."] Successfully Saved.";
				}else
				{
					$_SESSION['msg']="Problem setting Cost for Lot. Please try again.";
				}				
          	}else
          	{
          		$exp_com=($_POST['exp_blaze_frame']+$_POST['exp_bark_shaver']+$_POST['exp_groove_cutter']+$_POST['exp_freshning_knife']+$_POST['exp__spray_bottle']+$_POST['exp_hammer_nailpuller']+$_POST['exp_pot_scrapper']+$_POST['exp_pots']+$_POST['exp_lips']+$_POST['exp_wire_nails_5cm']+$_POST['exp_wire_nails_2cm']+$_POST['exp_solder']+$_POST['exp_naushader']+$_POST['exp_charcoal']+$_POST['exp_tool_sharpen']+$_POST['exp_blower']+$_POST['exp_solder_iron']+$_POST['exp_paint']+$_POST['exp_cylinder_50ml']+$_POST['exp_cylinder_500ml']+$_POST['exp_beaker_500ml']+$_POST['exp_beaker_1000ml']+$_POST['exp_funnel']+$_POST['exp_other']);
          		$db->query("UPDATE t_cost_of_material SET exp_com='".$exp_com."', blazes_received='".$_POST['blazes_received']."', number_of_mazdoor='".$_POST['number_of_mazdoor']."', cost_blaze_frame='".$_POST['cost_blaze_frame']."', exp_blaze_frame='".$_POST['exp_blaze_frame']."', cost_bark_shaver='".$_POST['cost_bark_shaver']."', exp_bark_shaver='".$_POST['exp_bark_shaver']."', cost_groove_cutter='".$_POST['cost_groove_cutter']."', exp_groove_cutter='".$_POST['exp_groove_cutter']."', cost_freshning_knife='".$_POST['cost_freshning_knife']."', exp_freshning_knife='".$_POST['exp_freshning_knife']."', cost_spray_bottle='".$_POST['cost_spray_bottle']."', exp__spray_bottle='".$_POST['exp__spray_bottle']."', cost_hammer_nailpuller='".$_POST['cost_hammer_nailpuller']."', exp_hammer_nailpuller='".$_POST['exp_hammer_nailpuller']."', cost_pot_scrapper='".$_POST['cost_pot_scrapper']."', exp_pot_scrapper='".$_POST['exp_pot_scrapper']."', cost_pots='".$_POST['cost_pots']."', exp_pots='".$_POST['exp_pots']."', cost_lips='".$_POST['cost_lips']."', exp_lips='".$_POST['exp_lips']."', cost_wire_nails_5cm='".$_POST['cost_wire_nails_5cm']."', qty_wire_nails_5cm='".$_POST['qty_wire_nails_5cm']."', exp_wire_nails_5cm='".$_POST['exp_wire_nails_5cm']."', cost_wire_nails_2cm='".$_POST['cost_wire_nails_2cm']."', qty_wire_nails_2cm='".$_POST['qty_wire_nails_2cm']."', exp_wire_nails_2cm='".$_POST['exp_wire_nails_2cm']."', cost_solder='".$_POST['cost_solder']."', qty_solder='".$_POST['qty_solder']."', exp_solder='".$_POST['exp_solder']."', cost_naushader='".$_POST['cost_naushader']."', qty_naushader='".$_POST['qty_naushader']."', exp_naushader='".$_POST['exp_naushader']."', cost_charcoal='".$_POST['cost_charcoal']."', qty_charcoal='".$_POST['qty_charcoal']."', exp_charcoal='".$_POST['exp_charcoal']."', cost_tool_sharpen='".$_POST['cost_tool_sharpen']."', exp_tool_sharpen='".$_POST['exp_tool_sharpen']."', cost_blower='".$_POST['cost_blower']."', qty_blower='".$_POST['qty_blower']."', exp_blower='".$_POST['exp_blower']."', cost_solder_iron='".$_POST['cost_solder_iron']."', qty_solder_iron='".$_POST['qty_solder_iron']."', exp_solder_iron='".$_POST['exp_solder_iron']."', cost_paint='".$_POST['cost_paint']."', qty_paint='".$_POST['qty_paint']."', exp_paint='".$_POST['exp_paint']."', cost_cylinder_50ml='".$_POST['cost_cylinder_50ml']."', qty_cylinder_50ml='".$_POST['qty_cylinder_50ml']."', exp_cylinder_50ml='".$_POST['exp_cylinder_50ml']."', cost_cylinder_500ml='".$_POST['cost_cylinder_500ml']."', qty_cylinder_500ml='".$_POST['qty_cylinder_500ml']."', exp_cylinder_500ml='".$_POST['exp_cylinder_500ml']."', cost_beaker_500ml='".$_POST['cost_beaker_500ml']."', qty_beaker_500ml='".$_POST['qty_beaker_500ml']."', exp_beaker_500ml='".$_POST['exp_beaker_500ml']."', cost_beaker_1000ml='".$_POST['cost_beaker_1000ml']."', qty_beaker_1000ml='".$_POST['qty_beaker_1000ml']."', exp_beaker_1000ml='".$_POST['exp_beaker_1000ml']."', cost_funnel='".$_POST['cost_funnel']."', qty_funnel='".$_POST['qty_funnel']."', exp_funnel='".$_POST['exp_funnel']."', cost_other='".$_POST['cost_other']."', qty_other='".$_POST['qty_other']."', exp_other='".$_POST['exp_other']."', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
          		
          		if($db->rows_affected>0)
				{ 
					$_SESSION['msg']="Cost for Lot [".$_POST['lot_no']."] for Season [".$_POST['season_year']."]  for Forest [".$_POST['forest_code']."] Successfully Updated.";
				}else
				{
					$_SESSION['msg']="Problem updating Cost for Lot. Please try again.";
				}				
          	}
			// update Number of Mazdoors for the group
          	$db->query("UPDATE t_cost_of_material SET number_of_mazdoor='".$_POST['number_of_mazdoor']."' WHERE com_code='".$_POST['com_code']."'");
          	//$db->debug();  
			// this action does nothing here but in the UI below
			$action="upsetPriceForLot";
		}else if($action=='setRateCalculatedForLot')
		{
			if($_POST['rowid']!="0")
			{
				$db->query("UPDATE  t_rate_calculation_for_lot SET total_blazes='".$_POST['total_blazes']."', avg_yield_fixed='".$_POST['avg_yield_fixed']."', total_turnout='".$_POST['total_turnout']."', total_eow='".$_POST['total_eow']."', total_com='".$_POST['total_com']."', total_expenditure='".$_POST['total_expenditure']."', rate_calculated='".$_POST['rate_calculated']."', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
          		
          		if($db->rows_affected>0)
				{ 
					$_SESSION['msg']="Rate  for Lot [".$_POST['lot_no']."] for Season [".$_POST['season_year']."]  for Forest [".$_POST['forest_code']."] Successfully Updated.";
				}else
				{
					$_SESSION['msg']="Problem updating Rate for Lot. Please try again.";
				}				
          	}else
          	{
          						
          	}
			
			// this action does nothing here but in the UI below
			Header("Location: receive-blazes.php");
		}
		
		
		
		
		
	}// if submitted

?>

<!-- html head start -->
<?php include('includes/include.php'); ?>
<!-- html head  end-->


<body>
<!-- wrap starts here -->
<div id="wrap">
	<!-- header start -->
	<?php include('includes/header.php'); ?>
    <!-- header end-->
    
<!-- content-wrap starts here -->
	<div id="content-wrap">
	<!-- content starts here -->		    	
        <div id="content">	
        	<div id="msgdiv"> 
        		<p style="color:#CC0000"><?php echo $msg; ?></p>
        	</div>
        	<?php 
        		if($action!="")
        		{
        	?>	
		<!-- sidebar starts here -->		       
			<div id="sidebar" >
    			<?php include('includes/sidebar.php');	?>        
            </div>
		<!-- sidebar ends here -->
			<?php 
        		}
        	?>
        
        <!-- post starts here -->				            
            <div class="post">
            
            	<h1>
                	<div style="float:left;  padding:0px 0px 0px 5px;"><?php echo($pageTitle);?>  <?php echo($_SESSION['fname']);?>. <font size="1">You are currently working in <?php echo($_SESSION['division']);?> division.</font></div>
					<div style="float:right;">
                    	<?php 
							date_default_timezone_set('Asia/Calcutta');
							print date("jS F Y, g:i A");
						?>
                        
                     </div>
                 </h1>
       
                <br />
                <?php
                	if($action=="create")
                	{
                ?>		
                	<form action="receive-blazes.php" method="post" id="blazesForm" data-validate="parsley">
						<fieldset>
						<legend><font size=5 color=#72A545>Manage Blazes</font></legend><br />
							<p style="color:#CC0000"><?php echo $error; ?></p>
							<div style="margin:10px; 0px; 0px; 0px;">
								<label for="lot_no">Lot No:</label>
								<select id="lot_no" name="lot_no" onchange="loadLotForests(this);" data-required="true" data-error-message="Lot Number is required">
									<option value=''>Select</option>
								 <?php 
								  $lots = $db->get_results("SELECT lot_no, lot_desc FROM m_lot WHERE division_code='".$_SESSION['division']."' AND status_cd='A' GROUP BY lot_no"  ,ARRAY_A);
			 
						            foreach ( $lots as $lot )
						            {
						            	echo ("<option value='".$lot['lot_no']."'>".$lot['lot_no']."(".$lot['lot_desc'].")</option>");
						            	
						            }
								 ?>
								</select>
								
								<label for="forest_code">Forest:</label>
								<div id='forest_code_div'>
								<select id="forest_code" name="forest_code" onchange="loadForestRangeAndDfo(this);" data-required="true" data-error-message="Forest is required">
								<option value="">Select</option>
								</select>
								</div>
								
								<label for="unit_code">Unit:</label>
								<select id="unit_code" name="unit_code" data-required="true" data-error-message="Unit is required">
									<option value=''>Select</option>
								 <?php 
								  $units = $db->get_results("SELECT unit_code, unit_name FROM m_unit WHERE division_code='".$_SESSION['division']."' AND status_cd='A'",ARRAY_A);
			 
						            foreach ( $units as $unit )
						            {
						            	echo ("<option value='".$unit['unit_code']."'>".$unit['unit_name']."</option>");
						            }
								 ?>
								</select>
								
								<div id='forest_range_dfo_div'>---</div>
								
								<label for="blazes_received">No of Blazes:</label>
								<input class="textbox" id="blazes_received" type="text" name="blazes_received" data-required="true" data-error-message="Blazes count is required" data-type="digits" data-type-digits-message="Only number is allowed" />
								
								<label for="season_year">Tapping Season:</label>
								<?php
									$common->getSeasonYearList(""); 
								?>
								
								<input name="created_by" type="hidden" id="created_by" value="<?php echo($_SESSION['userid']); ?>" />
								
								<br /><br />
								<input class="submit" id="addlot" type="submit" name="action" value="Save"/>
								<input name="submitted" type="hidden" id="submitted" value="1" />
								
							</div>
						</fieldset>
				  	</form>
			  	<?php 
			  		}else if($action=="edit")
                	{
                		$blazes = $db->get_row("SELECT * FROM t_proposed_yield_form_blazes WHERE id='".$_POST['rowid']."'",ARRAY_A);
                ?>
              		<form action="receive-blazes.php" method="post" id="blazesForm" data-validate="parsley">
						<fieldset>
						<legend><font size=5 color=#72A545>Update Lot</font></legend><br />
							<p style="color:#CC0000"><?php echo $error; ?></p>
							<div style="margin:10px; 0px; 0px; 0px;">
								<label for="lot_no">Lot No:</label>
								<input class="lblText" readonly="readonly" id="lot_no" type="text" value="<?php echo($blazes['lot_no']);?>"/>
								<label for="forest_code">Forest:</label>
								<input class="lblText" readonly="readonly" id="forest_code" type="text" name="forest_code" value="<?php echo($blazes['forest_code']);?>"/>
								
								<label for="unit_code">Unit:</label>
								<input class="lblText" readonly="readonly" id="unit_code" type="text" name="unit_code" value="<?php echo($blazes['unit_code']);?>"/>
								
								<label for="dfo_code">DFO:</label>
								<input class="lblText" readonly="readonly" id="dfo_code" type="text" name="dfo_code" value="<?php echo($blazes['dfo_code']);?>"/>
							
								<label for="range_code">Range:</label>
								<input class="lblText" readonly="readonly" id="range_code" type="text" name="range_code" value="<?php echo($blazes['range_code']);?>"/>
								
								<label for="blazes_received">No of Blazes:</label>
								<input class="textbox" id="blazes_received" type="text" name="blazes_received" value="<?php echo($blazes['blazes_received']);?>" data-required="true" data-error-message="Blazes count is required" data-type="digits" data-type-digits-message="Only number is allowed" />
								
								<label for="season_year">Tapping Season:</label>
								 <?php 
								 	$common->getSeasonYearList($blazes['season_year']);
								 ?>
								
								
								<input name="rowid" type="hidden" value="<?php echo($blazes['id']);?>"/>
								<input name="updated_by" type="hidden" id="updated_by" value="<?php echo($_SESSION['userid']);?>" />
								
								<br /><br />
								<input class="submit" id="updatelot" type="submit" name="action" value="Update"/>
								<input name="submitted" type="hidden" id="submitted" value="1" />
								
							</div>
						</fieldset>
				  	</form>
				 <?php 
			  		}else if($action=="upsetPriceForLot")
                	{
                		// workflow check
                		$wflow=$db->get_var("SELECT approved_yield FROM t_proposed_yield_form_blazes WHERE lot_no='".$_POST['lot_no']."' AND forest_code='".$_POST['forest_code']."' AND season_year='".$_POST['season_year']."'");
                		//$db->debug();
                		if(!isset($wflow))
                		{
                			$_SESSION['msg']="Proposed Yield is not set. Please try again.";
                			//Header("Location: receive-blazes.php");
                			echo("<script>location.href='receive-blazes.php'</script>");
						}else if($wflow==0)
						{
							$_SESSION['msg']="Yield is not avaliable. Please get approval and try again.";
                			//Header("Location: receive-blazes.php");
                			echo("<script>location.href='receive-blazes.php'</script>");
						}
						
			
                		$isNew=FALSE;
                		$unit_code="";
                		$lot_no="";
                		$total_blazes=0;
                		$yield_fixed=0;
                		$total_turnout=0;
                		$eow_code=$com_code=uniqid();
                		$total_eow=0;
                		$total_com=0;
                		$total_expenditure=0;
                		$rate_calculated=0;
                		$season_year="";
                		$rowid="0";
                		
                		$scheduleRate;
                		
                		$upsetPrice = $db->get_row("SELECT * FROM t_rate_calculation_for_lot WHERE lot_no='".$_POST['lot_no']."' AND season_year='".$_POST['season_year']."' AND division_code='".$_SESSION['division']."'",ARRAY_A);
                		
                		if(isset($upsetPrice))
                		{
                			$unit_code=$upsetPrice['unit_code'];
                			$lot_no=$upsetPrice['lot_no'];
                			//$total_blazes=$upsetPrice['total_blazes'];
	                		//$yield_fixed=$upsetPrice['avg_yield_fixed'];
	                		//$total_turnout=$upsetPrice['total_turnout'];
	                		$eow_code=$upsetPrice['eow_code'];
	                		$com_code=$upsetPrice['com_code'];
	                		$total_eow=$upsetPrice['total_eow'];
	                		$total_com=$upsetPrice['total_com'];
	                		$total_expenditure=$upsetPrice['total_expenditure'];
	                		$rate_calculated=$upsetPrice['rate_calculated'];
                			$season_year=$upsetPrice['season_year'];
                			$rowid=$upsetPrice['id'];
                			$isNew=FALSE;
                		}else
                		{
                			$db->query("INSERT INTO t_rate_calculation_for_lot (id, division_code, unit_code, lot_no, eow_code, com_code, season_year, created_by)
          					VALUES (NULL, '".$_SESSION['division']."', '".$_POST['unit_code']."', '".$_POST['lot_no']."', '".$eow_code."', '".$com_code."', '".$_POST['season_year']."', '".$_SESSION['userid']."' )");

                			$upsetPrice = $db->get_row("SELECT * FROM t_rate_calculation_for_lot WHERE lot_no='".$_POST['lot_no']."' AND season_year='".$_POST['season_year']."'",ARRAY_A);
                			
                			$unit_code=$upsetPrice['unit_code'];
                			$lot_no=$upsetPrice['lot_no'];
                			$total_blazes=$upsetPrice['total_blazes'];
	                		$yield_fixed=$upsetPrice['avg_yield_fixed'];
	                		$total_turnout=$upsetPrice['total_turnout'];
	                		$eow_code=$upsetPrice['eow_code'];
	                		$com_code=$upsetPrice['com_code'];
	                		$total_eow=$upsetPrice['total_eow'];
	                		$total_com=$upsetPrice['total_com'];
	                		$total_expenditure=$upsetPrice['total_expenditure'];
	                		$rate_calculated=$upsetPrice['rate_calculated'];
                			$season_year=$upsetPrice['season_year'];
                			$rowid=$upsetPrice['id'];
                			
//                			$unit_code=$_POST['unit_code'];
//                			$lot_no=$_POST['lot_no'];
//                			$total_blazes=0;
//                			$season_year=$_POST['season_year'];
//                			$rowid="0";

                			$isNew=TRUE;
                		}
                		
                 ?>
                 	<br />
                 	<form action="rate-calculation-lot.php" method="post" id="upsetPriceForm" data-validate="parsley"  onsubmit="return calculateScheduleRate(exp_eow, exp_com, total_turnout, total_eow, total_com, total_expenditure, rate_calculated)" >
              		<fieldset>
						<legend><font size=5 color=#72A545>Upset Price for Lot of Season <?php echo $season_year; ?></font></legend><br />
							<p style="color:#CC0000"><?php echo $error; ?></p>
							<div style="margin:10px; 0px; 0px; 0px;">
							<table style="position:relative" border="1">
								<tr>
									<td colspan="2">Division</td> <td colspan="3"><input class="lblText" readonly="readonly" id="division_code" type="text" name="division_code" value="<?php echo($_SESSION['division']);?>"/></td>
                                </tr>
                                <tr>
									<td colspan="2">Unit</td> <td colspan="3"><?php echo $common->getNameForCode($unit_code, "unit_code", "unit_name", "m_unit");?> <input class="lblText" readonly="readonly" id="unit_code" type="hidden" name="unit_code" value="<?php echo($unit_code);?>"/></td>
                                </tr>
                                <tr>    
									<td>Lot Number </td> <td><input class="lblText" readonly="readonly" id="lot_no" type="text" name="lot_no" value="<?php echo($lot_no);?>"/></td>
									<td>Season </td> <td colspan="2"><input class="lblText" readonly="readonly" id="season_year" type="text" name="season_year" value="<?php echo($season_year);?>"/></td>
                                </tr>
                                
                                <tr>
							    	<td colspan="5">&nbsp;</td>
							    </tr>
							    
							    <?php
                                		$number_of_mazdoors = $db->get_var("SELECT number_of_mazdoor FROM t_cost_of_material WHERE com_code='".$com_code."'");
                                		if(isset($number_of_mazdoors))
                						{
                                ?>		
                                <tr>    
									<td colspan="2">Numbar of Mazdoor(s) for the Lot</td> <td colspan="3"><input class="lblText" readonly="readonly" id="number_of_mazdoors" type="text" name="number_of_mazdoors" value="<?php echo($number_of_mazdoors);?>" onclick="makeTextEditable(this, 'Re-calculate Cost of Material for all Forests')" onchange="makeTextReadonly(this, '')"/> Click to edit</td>
								</tr>
                            	<?php
                						}else
                						{ 
                            	?>
                            	<tr>    
									<td colspan="2">Numbar of Mazdoor(s) for the Lot</td> <td colspan="3"><input class="textbox" id="number_of_mazdoors" type="text" name="number_of_mazdoors" value="<?php echo($number_of_mazdoors);?>" onchange="makeTextReadonly(this, '')" /></td>
								</tr>
                            	<?php
                						} 
                            	?>
                            	
								<tr>    
									<td><b>Forest</b></td> <td><b>RSD</b></td> <td><b>No of Blazes</b></td> <td><b>Proposed Yield</b></td> <td><b>Turn Out</b></td>
                                </tr>
                                	<?php
                                		$index=0; 
										//$tappings = $db->get_results("SELECT t.forest_code, t.blazes_received, t.proposed_yield, t.approved_yield,  f.forest_name FROM t_proposed_yield_form_blazes t , m_forest f WHERE t.forest_code=f.forest_code AND lot_no='".$lot_no."' AND season_year='".$season_year."'",ARRAY_A);
			 	            			$tappings = $db->get_results("SELECT t.forest_code, t.blazes_received, t.proposed_yield, t.approved_yield,  f.forest_name, f.forest_rsd_code, f.forest_rsd_distance FROM t_proposed_yield_form_blazes t , m_forest f WHERE t.forest_code=f.forest_code AND lot_no='".$lot_no."' AND season_year='".$season_year."'",ARRAY_A);
										foreach ( $tappings as $tapping )
				         				{ 
							         	 	echo(" <tr>");
							         	 	echo(" <td>".$tapping['forest_name']."</td>");
								         	//multiple rsd's per forest
							         	 	/*
							         	 	$forestRsds = $db->get_results("SELECT forest_rsd_name, forest_rsd_distance FROM m_forest f, m_forest_rsd r WHERE f.forest_code=r.forest_code AND f.forest_code='".$tapping['forest_code']."'",ARRAY_A); 
								         	echo(" <td>");
								         	$forest_rsd_distance=0;
								         	$rsdCount=0;
								         	foreach ( $forestRsds as $forestRsd )
								         	{
								         		echo($forestRsd['forest_rsd_name']." [".$forestRsd['forest_rsd_distance']."] <br />");
								         		$forest_rsd_distance+=$forestRsd['forest_rsd_distance'];
								         		$rsdCount++;		
								         	}
								         	if($rsdCount==0)
								         	{
								         		$rsdCount=1;
								         	}
								         	$forest_rsd_distance=($forest_rsd_distance/$rsdCount); // average distance
								         	*/
							         	 	
							         	 	// only one RSD per forest
							         	 	$forest_rsd_distance=$tapping['forest_rsd_distance'];
							         	 	echo(" <td>".$common->getNameForCode($tapping['forest_rsd_code'], "forest_rsd_code", "forest_rsd_name", "m_forest_rsd")." [".$tapping['forest_rsd_distance']."]" );
								         	echo(" </td>");
								         	
								         	echo("<td>".$tapping['blazes_received']."</td>");
								         	echo("<td>".$tapping['proposed_yield']."</td>");
								         	echo("<td>".round((($tapping['blazes_received']*$tapping['proposed_yield'])/1000),3)."</td>");
								         	echo(" </tr>");
								         	
								         	// from t_expenditure_on_work where rate_calculation_for_lot_id, forest_code and eow_code
								         	
								         	$eow = $db->get_row("SELECT exp_eow FROM t_expenditure_on_work WHERE rate_calculation_for_lot_id='".$rowid."' AND forest_code='".$tapping['forest_code']."' AND lot_no='".$lot_no."' AND eow_code='". $eow_code."' AND season_year='".$season_year."'",ARRAY_A);
								         	$com = $db->get_row("SELECT exp_com FROM t_cost_of_material WHERE rate_calculation_for_lot_id='".$rowid."' AND forest_code='".$tapping['forest_code']."' AND lot_no='".$lot_no."' AND com_code='". $com_code."' AND season_year='".$season_year."'",ARRAY_A);
								     ?>    	
								         	
								         	<tr>
							         	 		<td colspan="2">Expenditure on Work for <?php echo($tapping['forest_name']);?></td> <td><input class="lblText" readonly="readonly" id="exp_eow" type="text" name="exp_eow" value="<?php echo($eow['exp_eow']);?>"></td> <td colspan="2"><a href="eow.php?rcal_id=<?php echo($rowid);?>&forest_code=<?php echo($tapping['forest_code']);?>&eow_code=<?php echo($eow_code);?>&unit_code=<?php echo($unit_code);?>&lot_no=<?php echo($lot_no);?>&blazes_received=<?php echo($tapping['blazes_received']);?>&yield_fixed=<?php echo($tapping['proposed_yield']);?>&turnout=<?php echo((($tapping['blazes_received']*$tapping['proposed_yield'])/1000));?>&distance_to_rsd=<?php echo($forest_rsd_distance);?>&season_year=<?php echo($season_year);?>&keepThis=true&TB_iframe=true&height=600&width=1000&modal=true" title="Calculate Expenditure on Work" class="thickbox" >Calculate <img src="./images/calculator_green_16.png" /></a></td>
							         	 	</tr>
							         	 	<tr>
							         	 		<td colspan="2">Cost of Material and Tool for <?php echo($tapping['forest_name']);?></td> <td><input class="lblText" readonly="readonly" id="exp_com" type="text" name="exp_com" value="<?php echo($com['exp_com']);?>"></td> <td colspan="2"><a href="com.php?rcal_id=<?php echo($rowid);?>&forest_code=<?php echo($tapping['forest_code']);?>&com_code=<?php echo($com_code);?>&unit_code=<?php echo($unit_code);?>&lot_no=<?php echo($lot_no);?>&blazes_received=<?php echo($tapping['blazes_received']);?>&yield_fixed=<?php echo($tapping['proposed_yield']);?>&turnout=<?php echo((($tapping['blazes_received']*$tapping['proposed_yield'])/1000));?>&season_year=<?php echo($season_year);?>&keepThis=true&TB_iframe=true&height=600&width=1000&modal=true" title="Calcilate Cost of Material" class="thickbox" >Calculate <img src="./images/calculator_green_16.png" onmouseover="validateMazdoor(this)"/></a></td>
							         	 	</tr>
							         	 	<tr>
							         	 		<td colspan="5">&nbsp;</td>
							         	 	</tr>	
							         	 	
							         <?php 	 	
								         	$total_blazes+=$tapping['blazes_received'];
								         	$yield_fixed+=$tapping['proposed_yield'];  //TODO:its t.proposed_yield confirmed by prince
								         	$index++;
				         				}
				         				if($index==0)
				         				{
				         					$index=1;
				         				}
				         				$yield_fixed = ($yield_fixed/$index);  //will be sum now not average
				         				
				         				$total_turnout=round((($total_blazes*$yield_fixed)/1000), 3);
				         				$_SESSION['total_turnout']=$total_turnout; 
									?>
								<tr>    
									<td  colspan="2">Total Blazes</td> <td colspan="3"><input class="lblText" readonly="readonly" id="total_blazes" type="text" name="total_blazes" value="<?php echo($total_blazes);?>"/></td>
                                </tr>
                                <tr>    
									<td  colspan="2">Yield per section (total)</td> <td colspan="3"><input class="lblText" readonly="readonly" id="avg_yield_fixed" type="text" name="avg_yield_fixed" value="<?php echo($yield_fixed);?>"/></td>
                                </tr>
                                <tr>    
									<td  colspan="2">Total Turnout </td> <td colspan="3"><input class="lblText" readonly="readonly" id="total_turnout" type="text" name="total_turnout" value="<?php echo($total_turnout);?>"/></td>
                                </tr>
                                
                                <tr>
							    	<td colspan="5"><input id="number_of_forests" type="hidden" name="number_of_forests" value="<?php echo($index);?>"/></td>
							    </tr>
							    
							         	 	
                                <tr>    
									<td colspan="2"><b>Total Expenditure on Work</b></td> <td colspan="3"><input class="lblText" readonly="readonly" id="total_eow" type="text" name="total_eow" value="<?php echo($total_eow);?>"/></td>
								</tr>
								
								<tr>    
									<td colspan="2"><b>Total Cost of Material</b></td> <td colspan="3"><input class="lblText" readonly="readonly" id="total_com" type="text" name="total_com" value="<?php echo($total_com);?>"/></td>
								</tr>
								
								<tr>    
									<td colspan="2"><b>Total Expenditure</b></td> <td colspan="3"><input class="lblText" readonly="readonly" id="total_expenditure" type="text" name="total_expenditure" value="<?php echo($total_expenditure);?>"/></td>
								</tr>
								<tr>    
									<td colspan="2"><b>Rate Calculated</b></td> <td colspan="3"><input class="lblText" readonly="readonly" id="rate_calculated" type="text" name="rate_calculated" value="<?php echo($rate_calculated);?>"/></td>
								</tr>								
										
								</table>
								
								<input name="rowid" type="hidden" value="<?php echo($rowid);?>"/>
								<input name="season_year" type="hidden" value="<?php echo($season_year);?>"/>
								<?php
									if(!$isNew)
									{
										echo('<input name="updated_by" type="hidden" id="updated_by" value="'.$_SESSION['userid'].'" />');
									}else
									{
										echo('<input name="created_by" type="hidden" id="created_by" value="'.$_SESSION['userid'].'" />');
									}
								?>
								
								<br /><br />
								<?php
									if($_SESSION['role']=="admin" || $_SESSION['role']=="manager" || $_SESSION['role']=="director" || $_SESSION['role']=="sysadmin")
									{
								?>	
									<input class="submit" id="updatelot" type="submit" name="action" value="Set Upset Price" />
									<input name="submitted" type="hidden" id="submitted" value="1" />
								<?php
									}else
									{
								?>	
									<label>Login with privilage to update yield</label>
								<?php
									} // role Director  
								?>		
								
							</div>
						</fieldset>
				  	</form>		  
				<?php 
			  		}else
                	{
                		echo("<br /> <div class='CSSTableGenerator'> <h1>Manage Blazes Received</h1> <table> <tr> <td>Range</td> <td>Unit (DFO)</td> <td>Lot No</td> <td>Forest</td> <td>No of Blazes</td> <td>Season</td> <td>Status</td> <td>Action</td></tr>"); 
                		$tappings = $db->get_results("SELECT * FROM t_blazes_for_tapping WHERE division_code='".$_SESSION['division']."' ORDER BY season_year, created_dt, lot_no, range_code  ",ARRAY_A);

                		
				         foreach ( $tappings as $tapping )
				         { 
			         	 	//$lotForests = $db->get_results("SELECT forest_code FROM t_blazes_for_tapping WHERE lot_no='".$tapping['lot_no']."'",ARRAY_A);
			 	            
			         	 	echo(" <tr>");
			         	 	echo(" <td>".$tapping['range_code']."</td> <td>".$tapping['unit_code']." (".$tapping['dfo_code'].")</td>  <td>".$tapping['lot_no']."</td>");
				         	
				         	echo(" <td>");
				         	//foreach ( $lotForests as $forest )
				         	//{
				         		//echo($forest['forest_code']." <br />");
				         		echo($tapping['forest_code']);
				         	//}
				         	echo(" </td>");
				         	
				         	//echo("<td>".$tapping['blazes_received']."</td> <td>".date('Y', strptime($tapping['season_year'], 'y/m/d'))."</td>");
				         	echo("<td>".$tapping['blazes_received']."</td> <td>".date('Y', strtotime($tapping['season_year']))."</td>");
				         	echo("<td>".$tapping['status_cd']."</td>");
				         	
				         	echo(" <td>");
				         	
			     ?>
			     			<form style="margin:0px; border:0px; background-color:inherit;" action="receive-blazes.php" method="post" id="blazesActionForm">
							<!-- Create row specific actions -->
			     			<?php 
								if($tapping['status_cd']=="D")
			         	 		{
			         	 			echo("<input class='statusDImgBut' id='status' type='submit' name='action' value='Status' title='This record is marked to be deleted. Contact Admin'/> &nbsp;");
								}else if($tapping['status_cd']=="I")
			         	 		{
				         	 		echo("<input class='statusIImgBut' id='status' type='submit' name='action' value='Status' title='This record is Inactive. Click to Activate'/> &nbsp;");
								
			         	 		}else if($tapping['status_cd']=="A")
			         	 		{
			         	 			echo("<input class='statusAImgBut' id='status' type='submit' name='action' value='Status' title='Active record. Click to set as Inactive'/> &nbsp;");
			         	 		
				         	 		//if($db->num_rows==1)
				         	 		//{
				         	 			echo("<input class='editImgBut' id='editlot' type='submit' name='action' value='Edit' title='Edit this record'/> &nbsp;");
									//}
									
									echo("<input class='deleteImgBut' id='deletelot' type='submit' name='action' value='Delete' title='Mark this record as deleted'/>");
							 
			         	 		}// else status
							?>
							<!-- End row specific actions -->	
								<input name="lot_no" type="hidden" value="<?php echo($tapping['lot_no']);?>" />
								<input name="status_cd" type="hidden" value="<?php echo($tapping['status_cd']);?>" />
								<input name="rowid" type="hidden" value="<?php echo($tapping['id']);?>" />
								<input name="submitted" type="hidden" id="submitted" value="1"/>
							</form>
			     <?php 
			         	 	echo(" </td>");
			         	 	
				         	echo(" <tr>");
				         	
				         }// lots loop
				         
				         echo(" </table> </div>");
				?>
              		<div>
              			<br /><br />
              			<form action="receive-blazes.php" method="post" id="blazesForm">
							<input class="submit" id="cancel" type="submit" name="action" value="Cancel"/>
							<input class="submit" id="newlot" type="submit" name="action" value="New"/>
							<input name="submitted" type="hidden" id="submitted" value="1" />
						</form>		
              		</div>
              	
              	<?php 
				         
			  		} // end else list 
			  		//$db->debug();
              	?>	
			</div>
		<!-- post ends here -->		        

		</div>
	<!-- content ends here -->		        
    </div>
<!-- content-wrap ends here -->		
    

<!-- footer starts here -->	
	<div id="footer">
		<?php include('includes/footer.php'); ?>
	</div>
<!-- footer ends here -->


</div>
<!-- wrap ends here -->

</body>
</html>    