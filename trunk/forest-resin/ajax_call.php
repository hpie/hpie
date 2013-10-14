<?php 
 if(isset($_GET['get']))
 { 
 	//initilize DB
	include "/db/db.php";
	
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
	 
	 

	 
	 if($_GET['get']=='entryPointsRSD'){
	 	$markId=$_GET['markId'];
	 	$treeId=$_GET['treeId'];
	 	$i_timber_id=$_GET['i_timber_id'];
	 	$i_timbertype_id=$_GET['i_timbertype_id'];
	 	$currentDate=$_GET['dateValue'];
	 	$currentYear=$_GET['yearValue'];
	 
	 	$common->generateSelectListAjaxRSD($markId, $treeId,$currentDate,$currentYear,$i_timber_id,$i_timbertype_id)	;
	 }
	 if($_GET['get']=='entryPoints'){
	   $markId=$_GET['markId'];
	   $treeId=$_GET['treeId'];
	   $i_timber_id=$_GET['i_timber_id'];
	   $i_timbertype_id=$_GET['i_timbertype_id'];
	   $currentDate=$_GET['dateValue'];
	   $currentYear=$_GET['yearValue'];
	   
	   $common->generateSelectListAjax($markId, $treeId,$currentDate,$currentYear,$i_timber_id,$i_timbertype_id)	;
	 }
	 
	 if($_GET['get']=='entryPointsEco'){
	 	$markId=$_GET['markId'];
	 	$treeId=$_GET['treeId'];
	 	$i_timber_id=$_GET['i_timber_id'];
	 	$i_timbertype_id=$_GET['i_timbertype_id'];
	 	$currentDate=$_GET['dateValue'];
	 	$currentYear=$_GET['yearValue'];
	 
	 	$common->generateSelectListAjaxEco($markId, $treeId,$currentDate,$currentYear,$i_timber_id,$i_timbertype_id)	;
	 }
	 
	 if($_GET['get']=='entryPointsEcoRSD'){
	 	$markId=$_GET['markId'];
	 	$treeId=$_GET['treeId'];
	 	$i_timber_id=$_GET['i_timber_id'];
	 	$i_timbertype_id=$_GET['i_timbertype_id'];
	 	$currentDate=$_GET['dateValue'];
	 	$currentYear=$_GET['yearValue'];
	 
	 	$common->generateSelectListAjaxEcoRSD($markId, $treeId,$currentDate,$currentYear,$i_timber_id,$i_timbertype_id)	;
	 }
	 
	 
	 if($_GET['get']=='timberListEconomics'){
	 
	 	$markId=$_GET['markId'];
	 	$treeId=$_GET['treeId'];
	 	echo $common->generateSelectForTimberEco($markId, $treeId)	;
	 } 
	 
	 if($_GET['get']=='timberListEconomicsRSD'){
	 
	 	$markId=$_GET['markId'];
	 	$treeId=$_GET['treeId'];
	 	echo $common->generateSelectForTimberEcoRSD($markId, $treeId)	;
	 }
	 if($_GET['get']=='timberList'){
	 	
	 	$markId=$_GET['markId'];
	 	$treeId=$_GET['treeId'];
	 	echo $common->generateSelectForTimber($markId, $treeId)	;
	 }
	 
	 if($_GET['get']=='timberListOpening'){
	 
	 	$markId=$_GET['markId'];
	 	$treeId=$_GET['treeId'];
	 	echo $common->generateSelectForTimberOpening($markId, $treeId)	;
	 }
	 
	 
	 if($_GET['get']=='timberTypeListOpening'){
	 
	 	$markId=$_GET['markId'];
	 	$treeId=$_GET['treeId'];
	 	$i_timber_id=$_GET['i_timber_id'];
	 	echo $common->generateSelectForTimberTypeOpening($markId, $treeId,$i_timber_id)	;
	 }
	 
	 if($_GET['get']=='timberTypeList'){
	 
	 	$markId=$_GET['markId'];
	 	$treeId=$_GET['treeId'];
	 	$i_timber_id=$_GET['i_timber_id'];
	 	echo $common->generateSelectForTimberType($markId, $treeId,$i_timber_id)	;
	 }
	 
	 if($_GET['get']=='timberTypeListEco'){
	 
	 	$markId=$_GET['markId'];
	 	$treeId=$_GET['treeId'];
	 	$i_timber_id=$_GET['i_timber_id'];
	 	echo $common->generateSelectForTimberTypeEco($markId, $treeId,$i_timber_id)	;
	 }
	 
	 if($_GET['get']=='timberTypeListEcoRSD'){
	 
	 	$markId=$_GET['markId'];
	 	$treeId=$_GET['treeId'];
	 	$i_timber_id=$_GET['i_timber_id'];
	 	echo $common->generateSelectForTimberTypeEcoRSD($markId, $treeId,$i_timber_id)	;
	 }
	 if($_GET['get']=='getContractor'){
	 	$id=$_GET['id'];
	 	$common->getContractorDetail($id)	;
	 }
	 
	  if($_GET['get']=='volumefortransfer'){
	   $markId=$_GET['markId'];
	   $treeId=$_GET['treeId'];
	   $pointId=$_GET['pointId'];
	   $i_timber_id=$_GET['i_timber_id'];
	   $i_timbertype_id=$_GET['i_timbertype_id'];
	   $common->getVolumeToTransferAjax($markId, $treeId,$pointId,$i_timber_id,$i_timbertype_id)	;
	 }
	 
	 if($_GET['get']=='volumefortransferEco'){
	 	$markId=$_GET['markId'];
	 	$treeId=$_GET['treeId'];
	 	$pointId=$_GET['pointId'];
	 	$i_timber_id=$_GET['i_timber_id'];
	 	$i_timbertype_id=$_GET['i_timbertype_id'];
	 	$common->getVolumeToTransferAjaxEco($markId, $treeId,$pointId,$i_timber_id,$i_timbertype_id)	;
	 }
	 
	 
	 if($_GET['get']=='volumefortransferEcoRSD'){
	 	$markId=$_GET['markId'];
	 	$treeId=$_GET['treeId'];
	 	$pointId=$_GET['pointId'];
	 	$i_timber_id=$_GET['i_timber_id'];
	 	$i_timbertype_id=$_GET['i_timbertype_id'];
	 	$common->getVolumeToTransferAjaxEcoRSD($markId, $treeId,$pointId,$i_timber_id,$i_timbertype_id)	;
	 }
	 
	 
	 if($_GET['get']=='volumefortransferRSD'){
	 	$markId=$_GET['markId'];
	 	$treeId=$_GET['treeId'];
	 	$pointId=$_GET['pointId'];
	 	$i_timber_id=$_GET['i_timber_id'];
	 	$i_timbertype_id=$_GET['i_timbertype_id'];
	 	$common->getVolumeToTransferAjaxRSD($markId, $treeId,$pointId,$i_timber_id,$i_timbertype_id)	;
	 }
 
 }
?>