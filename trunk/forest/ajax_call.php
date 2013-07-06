<?php 
 include 'include_files.php';
 if(isset($_GET['get'])){ 
 if($_GET['get']=='fs'){
 $depId=$_GET['depid'];
 
 if($depId != '0')
 {  $flist=array();
   $flist=$forestDO->getForestListDFO($depId);
  
   echo makeForestlist($flist,"nameofforest_id",$nameofforest_id,"loadSelectTable",0,"class='required'");
 }
 }
 if($_GET['get']=='vt'){
   $fId=$_GET['fid'];
  if($fId != '0')
    {  
   $arrVolumeTables    =array();
  
   $table			   = 'm_volume_table';
   $arrVolumeTables   = $common->getAllVolumeTables($fId);
  
   echo makeSelectOptions($arrVolumeTables,"i_table_id",$i_table_id,"",0,"class='required'");
  
   }
 }
 
 if($_GET['get']=='selectlots'){
 	$division=$_GET['division'];
 	$lotDetailList =$common->getAllLotDetail($lotNo,$division);
     $toRetrun="<select name='markId'>";
     $toRetrun.="<option value=''>All</option>";
     
 	foreach ($lotDetailList as $key=>$detail)
 	{
 		
 		$toRetrun.="<option value='".$key."'>".$detail['vc_lotno']."</option>";
 	}	
 	
 	$toRetrun.='</select>';
 	
 	echo $toRetrun;
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