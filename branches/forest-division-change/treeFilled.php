<?php
$treeDO =  new TreeDO();
$list=$treeDO->getTreeList();

$catDO =  new CategoryDO();
$catList=$catDO->getCategoryList();
$markDetailId=$_REQUEST['markId'];

$treetype_id="2";
$previousCount=0;
$previousVolume=0;
$currentCount=0;
$currentVolume=0;
//print_r($_REQUEST);
if(isset($_POST['update'])){
	extract($_POST);

    $treeFilling =  new TreeFillingVO();
    $treeFilling->currentCount=$currentCount;
    $treeFilling->currentVolume=$currentVolume;
    $treeFilling->previousCount=$previousCount;
    $treeFilling->previousVolume=$previousVolume;
    $treeFilling->treetype_id=$treetype_id;
    $treeFillingArray=(array)unserialize($_SESSION['treeFillingArray']);
    
    if(isset($treeFillingArray))
    {
    	$treeFillingArray[$treetype_id]=$treeFilling;
   		//count($treeFillingArray);
    	$_SESSION['treeFillingArray']=serialize($treeFillingArray);
    	$treeFillingArray=(array)unserialize($_SESSION['treeFillingArray']);
    }
    else 
    {  
    	$treeFillingArray=arary();
		$treeFillingArray[$treetype_id]=$treeFilling;
    	$_SESSION['treeFillingArray']=serialize($treeFillingArray);
    }
	ob_end_clean();
	header("location:index.php?page=addConversion&f=in&markId=".$_REQUEST['markId']);
}
include('header.php');
$labelPrevious='Previous';
$labelValue = 'Value';
$labelVolume = 'Volume';
$labelCurrent ='Current';
?>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Screens</title>

<link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_ltr.min.css" />
<link rel="stylesheet" type="text/css" media="all" href="css/jqstyle.css" />
<style>
 #form input {
   width:100px;
 }
</style>
<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>



<script>

 
//script for validation	
  $(document).ready(function(){
    $("form").validate();
   });
</script>
</head>
<form  method="POST" action="" id="form">
<input type ="hidden" value='<?php echo $markDetailId;?>' name='markId'  id='markId' />
<table align="center" width="90%" border="0" cellspacing="0"
	cellpadding="">
	<tr>
		<td colspan="2" align="center" class="fill"><b>Trees Filled</b> <br></br>
		</td>
	</tr>
	<tr>
		<td class="fill"><?php echo $ctreetype; ?></td>
		<td><?php echo makeTreelist($list,"treetype_id",$treetype_id,"",0,"class='required'");?></td>
	</tr>
	
	<tr>
		<td colspan="2" class="fill"><?php echo $labelPrevious;?></td>
	</tr>
	<tr>
		<td colspan="2">
		<table>
			<tr>
				<td class="fill"><em>*</em><?php echo $labelValue;?></td>
				<td><input type="text" size="12" id="previousCount"
					name="previousCount" value="<?php echo $previousCount;?>" class='required number'/></td>
			    <td></td>
				<td class="fill"><em>*</em><?php echo $labelVolume;?></td>
				<td><input type="text" size="12" id="previousCount"
					name="previousVolume" value="<?php echo $previousVolume;?>" class='required number' /></td>
			</tr>
		</table>
		</td>
	</tr>
<tr>
		<td colspan="2" class="fill"><?php echo $labelCurrent;?></td>
	</tr>
	<tr>
		<td colspan="2">
		<table>
			<tr>
				<td class="fill"><em>*</em><?php echo $labelValue;?></td>
				<td><input type="text" size="12" id="currentCount"
					name="currentCount" value="<?php echo $currentCount;?>" class='required number'/></td>
			    <td></td>
				<td class="fill"><em>*</em><?php echo $labelVolume;?></td>
				<td><input type="text" size="12" id="currentVolume"
					name="currentVolume" value="<?php echo $currentVolume;?>" class='required number'/></td>
			</tr>
		</table>
		</td>
	</tr>
	
	<tr>
		<td colspan="2" align="right"><input type="submit" name="update"
			id="upadte" value="Update" /></td>
	</tr>
	
</table>
</form>
<?php  include('footer.php');?>