<?php 
$markDetailId=$_REQUEST['markId'];
$i_tree_id=$_REQUEST['i_tree_id'];
$arrMarkDetail=$common->getInfo('c_mark_detail',$markDetailId);
//$arrMarkDetail=12;
//
$forestID=$arrMarkDetail[0]['i_forest_id'];
$ctegoryDetail=$common->getDetailInfo('c_conversion_felling','i_forest_id',$forestID);

if(isset($_POST['update'])){
	
	extract($_POST);
	
	$existing=$common->checkExistingEcnomicsUpdate($markDetailId);
	
	if($existing =='' )
	{
	$economics_master['i_mark_id']=$markDetailId;
	$ecnomicsId = $db->insert('economics_master',$economics_master);
	}
	else 
	{
	$ecnomicsId=$existing['id'];	
	}
		
    $arrCondition = array('i_mark_id'=>$markDetailId,'i_ecnomics_master_id'=>$ecnomicsId,'i_tree_id'=>$ecnomicsId);
    
	$db->delete('ecnomics_category_conversion',$arrCondition);
	foreach($conversion as 	$catid=>$productValue){
			$ecnomics_category_felling['i_mark_id']=$markDetailId;
			$ecnomics_category_felling['i_forest_id']=$forestID;
			$ecnomics_category_felling['i_category_id']=$catid;
			$ecnomics_category_felling['i_value']=$productValue;
			$ecnomics_category_felling['i_status']= 0;
			$ecnomics_category_felling['i_ecnomics_master_id']= $ecnomicsId;
			$ecnomics_category_felling['i_tree_id']= $i_tree_id;
			
			$id = $db->insert('ecnomics_category_conversion',$ecnomics_category_felling);
	}
	
	
	
	
	//$common->insertDefaultEcnomicsConversion($forestID, $markDetailId, $ecnomicsId);
	//$common->insertDefaultEcnomicsProduct($forestID, $markDetailId, $ecnomicsId);
	//$common->insertDefaultEcnomicsOverHeadCharges($forestID, $markDetailId, $ecnomicsId);
	//$common->insertDefaultEcnomicsCharges($forestID, $markDetailId, $ecnomicsId);
	
	$common->updateEcmonicsDetails($markDetailId,$ecnomicsId);
	//header("Location:".BASE_URL."indexThickBox.php?page=addProduct&markId=".$markDetailId);
}


$ecmomicsMaster = $common->getEcnomicsMaster($markDetailId);
$ecnomicsId=$ecmomicsMaster['id'];
$timberDO =  new TimberDO();
$conversionDetail=$timberDO->getCategoryConversionRelationTreeWise($markDetailId,$ecnomicsId,$i_tree_id);
$markDetail =  new MarkDetailDO();
$markedTreeList=$markDetail->getMarkedTreesOnly($markDetailId);

$pageKey="ecnomics";





?>
<link
	rel="stylesheet" href="css/themes/base/jquery.ui.all.css">
<script src="js/jquery-1.6.2.js"></script>
<script
	src="js/ui/jquery.ui.core.js"></script>
<script
	src="js/ui/jquery.ui.widget.js"></script>
<script
	src="js/ui/jquery.ui.tabs.js"></script>
<link rel="stylesheet"
	href="css/demos.css">
<style></style>


<?php 
include('ecnomics/ecnomicsHeader.php');
if($ecmomicsMaster != '')
{
?>
<div>

 Last Generated On  <?php echo $ecmomicsMaster['dt_createDate']; ?> 
</div>
<?php 
}
?>


<div id="tabs-1">

<?php 
if($i_tree_id == '')
	
{
	?>
	<h2>Please Select Tree</h2>
	<?php 
	if($i_tree_id == '')
	{
		$common->generateFormTreeForm($_SERVER, $pageKey, $markDetailId,0) ;
	}
	else
	{
		$common->generateFormTreeForm ($_SERVER,$pageKey,$markDetailId,$i_tree_id);
	}
}
else
{
?>
	
<?php 
	if($i_tree_id == '')
{
	$common->generateFormTreeForm($_SERVER, $pageKey, $markDetailId,0) ;
}
else
{
	$common->generateFormTreeForm ($_SERVER,$pageKey,$markDetailId,$i_tree_id);
}
?>
<form id="form" method="post" action=""><input type='hidden'
	value='<?php echo $markDetailId?>' id='markid' name='markid' />
	<input type='hidden'
	value='<?php echo $i_tree_id?>' id='i_tree_id' name='i_tree_id' />
<table style="align:center;">
	<tr>
		<td> <h4>Percentage of Conversion applicable on Standing Volume for each Category.</h4> </td>
	</tr>
</table>	
 
<table style="width:70%">
 <tr>
 <td><b>Category</b></td>
 <td><b>Default Conversion(%)</b></td>
 <td><b>Applicable Conversion(%)</b></td>
 
 </tr>
  <tr>
  <td colspan="3">&nbsp;</td>
 </tr>
	
<?php 

foreach($ctegoryDetail as $category){
	
	if($conversionDetail[$category['i_category_id']] != '' &&  $conversionDetail[$category['i_category_id']]>  0 )
	{
		$value=$conversionDetail[$category['i_category_id']];
	}
	else 
	{
		$value=$category['i_conversion'];
	}
	
	
?>
<tr>
 <td><?php echo $catList[$category['i_category_id']]->vc_name ?></td>
 <td align="center"><b><?php echo $category['i_conversion'] ?></b>  % of Standing Volume</td>
 <td><input maxlength="3" style='width:40px; display:inline;' type='text' value='<?php echo $value ?>' name='conversion[<?php echo $category['i_category_id']?>]' id='conversion[<?php echo $category['i_category_id']?>]'/>  % of Standing Volume</td>
 </tr>
<?php
}
?>
<tr>
<td colspan="3">
<table>
		<tr>
			<td colspan='2' align="right">
			<table border=0 style="width: 20%" cellspacing="0" cellpadding="0">
				<tr>
								<td><input type="submit" name="update" id="upadte" value="Save" /></td>
								<td><input type="button" name="update" 
								onclick="javascript:window.location='indexThickBox.php?page=addProduct&markId=<?php echo $markDetailId;?>'"
								id="upadte" value="Next" /></td>
			
				</tr>
			</table>
			</td>
		</tr>
	</table>
</td>
</tr>	
</table>
</form>
<?php } ?>

</div>


