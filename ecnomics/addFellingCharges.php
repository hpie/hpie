<?php 
$markDetailId=$_GET['markId'];
$arrMarkDetail=$common->getInfo('c_mark_detail',$markDetailId);
//$arrMarkDetail=12;
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
	
	
	
	
	$arrCondition = array('i_mark_id'=>$markDetailId,'i_ecnomics_master_id'=>$ecnomicsId);
	print_r($arrCondition);
	$db->delete('ecnomics_category_felling',$arrCondition);
	echo 'reachec at jeader';
	foreach($felling as 	$catid=>$productValue){
			$ecnomics_category_felling['i_mark_id']=$markDetailId;
			$ecnomics_category_felling['i_forest_id']=$forestID;
			$ecnomics_category_felling['i_category_id']=$catid;
			$ecnomics_category_felling['i_felling_charges']=$productValue;
			$ecnomics_category_felling['i_conversion_charges']=$conversionCharges[$catid];
			$ecnomics_category_felling['i_status']= 0;
			$ecnomics_category_felling['i_ecnomics_master_id']= $ecnomicsId;
			
            $id = $db->insert('ecnomics_category_felling',$ecnomics_category_felling);
	echo 'reachec at jeader';
	}
	
	/*
	$common->insertDefaultEcnomicsConversion($forestID, $markDetailId, $ecnomicsId);
	$common->insertDefaultEcnomicsProduct($forestID, $markDetailId, $ecnomicsId);
	$common->insertDefaultEcnomicsOverHeadCharges($forestID, $markDetailId, $ecnomicsId);
	$common->insertDefaultEcnomicsCharges($forestID, $markDetailId, $ecnomicsId);
	*/
	$common->updateEcmonicsDetails($markDetailId);
	header("Location:".BASE_URL."indexThickBox.php?page=addProductDetial&markId=".$markDetailId);
	
}

$timberDO =  new TimberDO();

$ecmomicsMaster = $common->getEcnomicsMaster($markDetailId);
$ecnomicsId=$ecmomicsMaster['id'];
$conversionDetail=$timberDO->getCategoryFillingRelation($markDetailId,$ecnomicsId);
$ecnomics=$_SESSION['felling'.$markDetailId];
?>



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

<form id="form" method="post" action=""><input type='hidden'
	value='<?php echo $markDetailId?>' id='markid' name='markid' /> 
<table style="width: 50%; align:center;">
	<tr>
		<td> <h4>Felling charges to be applicable on each category.</h4> </td>
	</tr>
</table>
<table style="width: 50%; ">
<tr>
<td>Charges</td>
<td><input type='text' value='' id='charges' name='charges'/></td>

</tr>
<tr>
<td>Comission</td>
<td><input type='text' value='' id='comission' name='comission'/></td>

</tr>
<tr>

<td><input type='button' value='Copy To All' onclick="populate()"/></td>

</tr>	
</table>	
<table style="width:75%">
 <tr>
 <td><b>Category</b></td>
 <td><b>Default Felling Charges</b></td>
 <td><b>Applicable Felling Charges</b></td>
 
 <!--Begin Commented Sunil 27Dec 
 <td>Conversion Charges</td>
 <td>Current Rs/m&sup3;</td>
 End Commented Sunil 27Dec -->
 </tr>
 
 <tr>
 <td colspan="3">&nbsp;</td>
 </tr>

<?php 

$Ids="";
foreach($ctegoryDetail as $category){
	
	if($conversionDetail[$category['i_category_id']] != '' &&  $conversionDetail[$category['i_category_id']]>  0 )
	{
		$value=$conversionDetail[$category['i_category_id']]['i_felling_charges'];
		$conversionValue=$conversionDetail[$category['i_category_id']]['i_conversion_charges'];
		
	}
	else 
	{
		$value=$category['i_felling_charges'];
		$conversionValue=$category['i_conversion_charges'];
	}
?>
<tr>
 <td><?php echo $catList[$category['i_category_id']]->vc_name ?></td>
 <td align='center'><?php echo $category['i_felling_charges'] ?>  Rs/m&sup3;</td>
 <td><input style='width:40px; display:inline;' type='text' value='<?php echo $value ?>' name='felling[<?php echo $category['i_category_id']?>]' id='felling[<?php echo $category['i_category_id']?>]'/>   Rs/m&sup3;</td>
 
 <!-- Begin Commented Sunil 27Dec 
 <td align='center'><?php echo $category['i_conversion_charges'] ?></td>
 <td ><input style='width:40px' type='text' value='<?php echo $conversionValue ?>' name='conversionCharges[<?php echo $category['i_category_id']?>]' id='conversionCharges[<?php echo $category['i_category_id']?>]'/></td>
 End Commented Sunil 27Dec -->
 </tr>
<?php
$Ids.='felling['.$category['i_category_id'].'];';
}
?>
<tr>
<td colspan="3">
<input type='hidden'  value='<?php echo $Ids?>' id='listofids'/>
<table>
		<tr>
			<td colspan='2' align="right">
			<table border=0 style="width: 20%" cellspacing="0" cellpadding="0">
				<tr>
					<td>	</td>

					<td><input type="submit" name="update" id="upadte" value="Save & Next" /></td>
				</tr>
			</table>
			</td>
		</tr>
	</table>
</td>
</tr>	
</table>
<?php ?>
</form>
</div>
<script>
  function populate()
  {
    
	   var ids=document.getElementById("listofids").value
	   var list=ids.split(";");
	   
	   for(i=0;i<list.length;i++)
	   {
       
		   document.getElementById(list[i]).value=document.getElementById('charges').value;
	   }
	   
  }

</script>

