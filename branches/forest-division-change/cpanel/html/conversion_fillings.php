<div id ='show_data'>
<form name='managePages' method='POST' action =''>
<table width='100%' align='center' cellpadding='2' cellspacing='2' border='0'>
		<tr>
			<td colspan='8'><? $paging->displayPaging();?></td>
		</tr>
			<tr class='titleBg'>
				<td align='center' colspan='9' class='title'>Filling Conversions Managment&nbsp;:&nbsp;(<?=$totalRecords;?>)</td>
			</tr>
			<?
			if(isset($_SESSION['userMsg']) && $_SESSION['userMsg'] != ""){?>
			<tr bgcolor='#CDCDCD'>
					<td align='center' colspan='8' class='success'>
					<?
						echo $_SESSION['userMsg'];
						unset($_SESSION['userMsg']);
					?>
					</td>
				</tr>
			<?}
			if(isset($_SESSION['recordDeleted']) && $_SESSION['recordDeleted'] != ""){?>
			<tr bgcolor='#CDCDCD'>
				<td align='center' colspan='8' class='error'>
				<?
					echo $_SESSION['recordDeleted'];
					unset($_SESSION['recordDeleted']);
				?>
				</td>
			</tr>
			<?}?>
			<tr class='title1Bg'>
				<td class='title1' align='center' width="60">Sr No.</td>
				<td class='title1' align='left'><a href="<?=BASE_URL.ADMIN_DIR;?>/conversion_fillings.php?ob=forest&o=<?=$forderlink?>" title="Sort by forest Name">Forest Name</a></td>
				<td class='title1' align='left'>Value Type</td>
				<td class='title1'>Action</td></td>
				
			</tr>
		<?
		if(!empty($arrRecords)){
		$srNo = $page+1;	
		/*echo '<pre>';
		print_r($arrRecords);
		echo '</pre>';*/
		foreach($arrRecords as $records){
			$id				= $records['eid'];	
			$i_conversion   = $records['i_conversion'];
			$i_value_id   = $records['i_value_type'];
			$fId		    = $records['i_forest_id'];
			$cId		    = $records['i_category_id'];
			$i_felling_charges = $records['i_felling_charges'];
			$i_status	    = $records['i_status'];
			$fName          = $arrAllForests[$fId];
			$cName          = $arrAllCategories[$cId];
			$arrAllValueType     = array('0'=>"Rs",'1'=>"%age");
            $i_value_type        =$arrAllValueType[$i_value_id];
			if($i_status == '1'){
				$setStatus	= "(<font style='color:green;font-size:12px;font-family:arial'>Y</font>)";
				$label	= "Dactivate";
				echo "<input type='hidden' name='statusSubmitted' value='$i_status'>";
			}
			if($i_status == '0')
			{
				$setStatus	= "(<font style='color:#ff0000;font-size:12px;font-family:arial'>N</font>)";
				$label	= "Activate";
				echo "<input type='hidden' name='statusSubmitted' value='$i_status'>";
			
			}
		?>
			<tr class='normal' onmouseover="this.className='active'" onmouseout="this.className='normal'">
				<td align='center' class='gridText'>&nbsp;<?=$srNo;?></td>
				<td class='gridText'>&nbsp;<?=$fName;?></td>
				<td class='gridText'>&nbsp;<?=$i_value_type;?></td>
				<td><a  class='edit' title ='edit' 
				href='add_conversion_filling.php?id=<?=$id;?>&fid=<?=$fId;?>'>Edit</a></td>
				
			</tr>
		<?
			$srNo++;
	} 
	?>
	
	<?
	?>
	</table>
	<form>
	<?
}

	if(isset($_POST['statusSubmitted'])){
		$table			= 'c_conversion_felling';
		$status = $_POST['status'];
		$db->isActive($table,$status);
		ob_end_clean();
		header("Location: conversion_fillings.php");
	}
	?>
</div>