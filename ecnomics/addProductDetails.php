<?php
$markDetailId=$_REQUEST['markId'];
$pageKey="addProduct";
$i_tree_id=$_REQUEST['i_tree_id'];
$arrMarkDetail=$common->getInfo('c_mark_detail',$markDetailId);
//$arrMarkDetail=12;

$forestID=$arrMarkDetail[0]['i_forest_id'];
$ctegoryDetail=$common->getDetailInfo('c_conversion_felling','i_forest_id',$forestID);
$ecnomics=$_SESSION['ecnomics'.$markDetailId];
if(isset($_POST['update'])){
	
	extract($_POST);
	//print_r($product);
	 
	
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
	
	
	$arrCondition = array('i_mark_id'=>$markDetailId,'i_ecnomics_master_id'=>$ecnomicsId,'i_tree_id'=>$i_tree_id);
	$db->delete('ecnomics_category_timber',$arrCondition);
	$db->delete('ecnomics_timber_price_detail',$arrCondition);
	
	foreach($product as 	$catid=>$productDetail){
		
			foreach($productDetail as $timberDetail=>$productValue){
				
			$ecnomics_category_timber['i_mark_id']=$markDetailId;
			$ecnomics_category_timber['i_forest_id']=$forestID;
			$ecnomics_category_timber['i_category_id']=$catid;
			$ecnomics_category_timber['i_timber_id']=$timberDetail;
			$ecnomics_category_timber['i_value']=$productValue;
			$ecnomics_category_timber['i_status']= 0;
			$ecnomics_category_timber['i_ecnomics_master_id']= $ecnomicsId;
			$ecnomics_category_timber['i_tree_id']= $i_tree_id;
			$id = $db->insert('ecnomics_category_timber',$ecnomics_category_timber);
			}
	}
	
	foreach($unitPrice as $timberIDDetail=>$priceValue)
		{
			$ecnomics_timber_price_detail['i_mark_id']=$markDetailId;
			$ecnomics_timber_price_detail['i_timber_id']=$timberIDDetail;
			$ecnomics_timber_price_detail['i_value']=$priceValue;
			$ecnomics_timber_price_detail['i_status']= 1;
			$ecnomics_timber_price_detail['i_ecnomics_master_id']= $ecnomicsId;
			$ecnomics_timber_price_detail['i_tree_id']= $i_tree_id;
			$id = $db->insert('ecnomics_timber_price_detail',$ecnomics_timber_price_detail);
				
		}
	

	//$common->insertDefaultEcnomicsConversion($forestID, $markDetailId, $ecnomicsId);
	//$common->insertDefaultEcnomicsProduct($forestID, $markDetailId, $ecnomicsId);
	//$common->insertDefaultEcnomicsOverHeadCharges($forestID, $markDetailId, $ecnomicsId);
	//$common->insertDefaultEcnomicsCharges($forestID, $markDetailId, $ecnomicsId);
	
	$common->updateEcmonicsDetails($markDetailId, $ecnomicsId);
	//header("Location:".BASE_URL."indexThickBox.php?page=addfelling&markId=".$markDetailId);
}
$conversionDetail=$ecnomics['conversionDetail'];
$timberDO =  new TimberDO();
$timberlist=$timberDO->getTimberList();
$timberCatDetail=$timberDO->getTimberCategoryDetail($forestID);


$ecmomicsMaster = $common->getEcnomicsMaster($markDetailId);


$ecnomicsId=$ecmomicsMaster['id'];




$timberRelationDetail=$timberDO->getTimberCategoryRelationDetail($markDetailId,$ecnomicsId,$i_tree_id);
if($timberRelationDetail != '')
{
	$timberCatDetail=$timberRelationDetail;
}

$unitPriceValue=$timberDO->getEcnomicsPriceRelation($markDetailId,$ecnomicsId);

if($unitPriceValue =='')
   $unitPriceValue =$timberDO->getTimberPriceDefault($forestID);;

 ?>
<link
	rel="stylesheet" href="css/themes/base/jquery.ui.all.css">
<script src="js/jquery-1.6.2.js"></script>
<script src="js/ui/jquery.ui.core.js"></script>
<script src="js/ui/jquery.ui.widget.js"></script>
<script src="js/ui/jquery.ui.tabs.js"></script>
<link rel="stylesheet" href="css/demos.css">
<style>
.treetotal
{
	background-color:#999999;
	color:white;
}

.classtotal
{
	background-color:#666666;
	color:white;
}

.overalltotal
{
	background-color:#333333;
	color:red; 
}

.headrow
{
	background-color:#aaaaaa;
}
.evenrow
{
	background-color:#cccccc;
}

.oddrow
{
	background-color:#eeeeee;
}
</style>	
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
<form id="form" method="post" action="">
<input type='hidden'
	value='<?php echo $markDetailId?>' id='markid' name='markid' />
<input type='hidden'
	value='<?php echo $i_tree_id?>' id='i_tree_id' name='i_tree_id' />
<table style="align:center;">
	<tr>
		<td>
			 <h4>Produced to be obtained in each category.</h4>
		</td>
	</tr>
</table>

<table style="width: 700px">
	<tr class="headrow">
		<td><b>Category</b></td>
		<?php
		foreach($timberlist as $timberDetail){
			?>
		<td><b><?php echo $timberDetail->vc_name;	?></b></td>
		<?php

		}

		?>

	</tr>

<!--Begin Commented Sunil 27Dec 
	<tr class="headrow">
		<td >Unit Price</td>
		<?php
		foreach($timberlist as $timberDetail){
			?>
		<td align="center">
		  <input type='text'  style='width: 40px'
		  name='unitPrice[<?php echo $timberDetail->id?>]'
		  onblur="outFocus(this)"
		  onfocus="getFocus(this);"
		  value='<?php echo $unitPriceValue[$timberDetail->id]['i_value']?>'  />
		</td>
		<?php

		}

		?>

	</tr>
End Commented Sunil 27Dec -->
 <tr><td>&nbsp;</td></tr>

	<?php
     $count=0;
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
		<?php
		foreach($timberlist as $timberDetail){
			$value=0;
			
			if($timberCatDetail[$category['i_category_id']][$timberDetail->id]['i_value']!='')
			{
             $value=$timberCatDetail[$category['i_category_id']][$timberDetail->id]['i_value'];
			}
			
			
			?>
		<td align="center"><input style='width: 40px' type='text'
			value='<?php echo  $value;?>'
			name='product[<?php echo $category['i_category_id']?>][<?php echo $timberDetail->id?>]'
			id='product[<?php $category['i_category_id']?>][<?php echo $timberDetail->id?>]' title="Number of Units"/></td>
			<?php

		}

		?>
	</tr>
	<?php
	}
	?>
	
	
	
	<tr>
		<td colspan="<?php echo  count($timberlist)+1;?>">
		<table>
			<tr>
				<td colspan='2' align="right">
				<table border=0 style="width: 20%" cellspacing="0" cellpadding="0">
					<tr>
						<td><input type="submit" name="update" id="upadte" value="Save" /></td>
						<td><input type="button" name="update" 
								onclick="javascript:window.location='indexThickBox.php?page=addfelling&markId=<?php echo $markDetailId;?>'"
								id="upadte" value="Next" />
					</tr>
				</table>
				</td>
			</tr>
		</table>
		</td>
	</tr>
</table>
</form>
<?php }?>
</div>
<script>

function outFocus(control)
{
	

	if(control.value=='')
	{
		control.value=0;
		}
	
	
}
function getFocus(control)
{
	if(control.value=='0')
	{
		control.value='';
		
	}
}
</script>


