<div id ='show_data'>
<form name='managePages' method='POST' action =''>
<table width='100%' align='center' cellpadding='2' cellspacing='2' border='0'>
		<tr>
			<td colspan='8'><? $paging->displayPaging();?></td>
		</tr>
			<tr class='titleBg'>
				<td align='center' colspan='8' class='title'>Volume Management&nbsp;:&nbsp;(<?=$totalRecords;?>)</td>
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
				<td class='title1' align='left'>Volume Table Name</td>
				<td class='title1' align='left'>Forest Name</td>
			    <td class='title1' align='left'>Tree Name</td> 
				<td class='title1'>Action</td>
				<!-- <td class='title1' align='center' width='80'>Is Active</td>
				<td class='title1' align='center'><input style ='width:30px;' type="checkbox" name="Check_ctr" value="yes"	onClick="Check(document.managePages.status,'managePages')"></td> -->
			</tr>
		<?
		if(!empty($arrRecords)){
		$srNo = $page+1;	
		/*echo '<pre>';
		print_r($arrRecords);
		echo '</pre>';*/
		foreach($arrRecords as $records){
			$i_tree_type_id	= $records['i_tree_type_id'];	
			$i_table_id		= $records['i_table_id'];	
			$taname	        = $arrVolumeTables[$i_table_id];
			$fId            = $common->getVolumeTablesForest($i_table_id);
			$fName          = $arrAllForests[$fId];
			$tName          = $arrAllTrees[$i_tree_type_id];
			$volume		    = $records['volume'];
			$taId		    = $records['i_table_id'];
			$cId		    = $records['i_category_id'];
			$i_status	    = $records['i_status'];
			//$taName         = $arrVolumeTables[$taId];
			//$cName          = $arrAllCategories[$cId];
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
				<td align='left' class='gridText'>&nbsp;<?=$taname;?></td>
				<td align='left' class='gridText'>&nbsp;<?=$fName;?></td>
				<td align='left' class='gridText'>&nbsp;<?=$tName;?></td>		
				<td><a  class='edit' title ='edit <?=$volume;?>' 
				href='add_category_volume.php?taid=<?=$i_table_id;?>&trid=<?=$i_tree_type_id;?>'>Edit</a>&nbsp&nbsp;
				<!-- <a  class='delete' title ='delete <?=$volume;?>'onClick = 'deleteRecord("<?=$id;?>","<?=$volume;?>","cat_volume")'></a> --></td>
				<!-- <td align='center'><?=$setStatus;?></td>
				<td align='center'><input style ='width:30px;' type='checkbox' name='status[<?=$id;?>]' value='<?=$label;?>' id ='status'></td> -->
			</tr>
		<?
			$srNo++;
	} 
	?>
	<tr>
		<td align='right' colspan='7'><!-- <input type='submit' class='btnStatus' name='submit' value='Change Status'> --></td>
	</tr>	
	<?
	?>
	</table>
	</form>
	<?
}

	if(isset($_POST['statusSubmitted'])){
		$status = $_POST['status'];
		$db->isActive($table,$status);
		ob_end_clean();
		header("Location: categories_volume.php");
	}
	?>
</div>