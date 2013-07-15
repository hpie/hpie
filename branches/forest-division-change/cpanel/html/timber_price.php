<div id ='show_data'>
<form name='managePages' method='POST' action =''>
<table width='100%' align='center' cellpadding='2' cellspacing='2' border='0'>
		<tr>
			<td colspan='8'><? $paging->displayPaging();?></td>
		</tr>
			<tr class='titleBg'>
				<td align='center' colspan='8' class='title'>Price Management&nbsp;:&nbsp;(<?=$totalRecords;?>)</td>
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
				<td class='title1' align='left'>Forest Name</td>
				<td class='title1' align='left'>Action</td>
				
				
			</tr>
		<?
		if(!empty($arrRecords)){
		$srNo = $page+1;	
		/*echo '<pre>';
		print_r($arrRecords);
		echo '</pre>';*/
		foreach($arrRecords as $records){
			$id				= $records['eid'];
			$fId            = $records['i_forest_id'];
			$fName          = $arrAllForests[$fId];
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
				<td align='left' class='gridText'>&nbsp;<?=$fName;?></td>
				
				<td><a  class='edit' title ='edit <?=$price;?>' 
				href='add_timber_price.php?id=<?=$id;?>'>Edit</a>&nbsp|&nbsp;
				<a  class='delete' title ='delete <?=$price;?>'onClick = 'deleteRecord("<?=$fId;?>","<?=$price;?>","timber_price")'>Delete</a></td>
				
			</tr>
		<?
			$srNo++;
	} 
	?>
	<tr>
		<td align='right' colspan='7'><input type='submit' class='btnStatus' name='submit' value='Change Status'></td>
	</tr>	
	<?
	?>
	</table>
	<form>
	<?
}

	if(isset($_POST['statusSubmitted'])){
		$status = $_POST['status'];
		$db->isActive($table,$status);
		ob_end_clean();
		header("Location: trees_price.php");
	}
	?>
</div>