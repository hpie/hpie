<table width='100%' align='center' cellpadding='2' cellspacing='2' border='0'>
		<tr>
			<td colspan='7'><? $paging->displayPaging();?></td>
		</tr>
		<form name='managePages' method='POST' action =''>
			<tr class='titleBg'>
				<td align='center' colspan='7' class='title'>Pages  Management&nbsp;:&nbsp;(<?=$totalRecords;?>)</td>
			</tr>
			<?
			if(isset($_SESSION['pageMsg']) && $_SESSION['pageMsg'] != ""){?>
			<tr bgcolor='#CDCDCD'>
					<td align='center' colspan='7' class='success'>
					<?
						echo $_SESSION['pageMsg'];
						unset($_SESSION['pageMsg']);
					?>
					</td>
				</tr>
			<?}
			if(isset($_SESSION['pageDeleted']) && $_SESSION['pageDeleted'] != ""){?>
			<tr bgcolor='#CDCDCD'>
				<td align='center' colspan='7' class='error'>
				<?
					echo $_SESSION['pageDeleted'];
					unset($_SESSION['pageDeleted']);
				?>
				</td>
			</tr>
			<?}?>
			<tr bgcolor='#78BEE3'>
				<td class='title1' align='center' width="50">Sr No.</td>
				<td class='title1' align='left'>Page Title</td>
				<td class='title1'>Edit</td><td class='title1'>Delete</td><td class='title1' align='center' width='80'>Is Active</td>
				<td class='title1' align='center'><input style ='width:30px;' type="checkbox" name="Check_ctr" value="yes"	onClick="Check(document.managePages.status,'managePages')"></td>

			</tr>
		<? if(isset($_GET['recNo'])){  $page=$_GET['recNo'];}

		if(is_array($arrPages) && count($arrPages)>0){
		 $srNo = $page+1;	
		foreach($arrPages as $pages){
			$id				= $pages['id'];	
			$page_title		= $pages['title'];
			$status			= $pages['is_active'];
			if($status == '1'){
				$setStatus	= "(<font style='color:green;font-size:12px;font-family:arial'>Y</font>)";
				$label	= "Dactivate";
				echo "<input type='hidden' name='statusSubmitted' value='$status'>";
			}
			if($status == '0')
			{
				$setStatus	= "(<font style='color:#ff0000;font-size:12px;font-family:arial'>N</font>)";
				$label	= "Activate";
				echo "<input type='hidden' name='statusSubmitted' value='$status'>";
			
			}
		?>
			<tr class='normal' onmouseover="this.className='active'" onmouseout="this.className='normal'">
				<td align='center' class='gridText'>&nbsp;<?=$srNo;?></td>
				<td align='left' class='gridText'>&nbsp;<?=$page_title;?></td>
				<td><a  class='edit' title ='edit <?=$page_title;?>' 
				href='add_page.php?id=<?=$id;?>'>Edit</a></td>
				<td><a  class='delete' title ='delete <?=$page_title;?>'onClick = 'deleteRecord(<?=$id;?>,"<?=$page_title;?>","page")'>Delete</a></td>
				<td align='center'><?=$setStatus;?></td>
				<td align='center'><input style ='width:30px;' type='checkbox' name='status[<?=$id;?>]' value='<?=$label;?>' id ='status'></td>
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
	<form>
	
	<?
}else{
	echo "<tr><td colspan='6' class='error' align='center'>No data found </td></tr>";		
}?>
</table>
<?	if(isset($_POST['statusSubmitted'])){
		if(isset($_POST['status'])){
			$status = $_POST['status'];
			$db->isActive(TBL_PAGES,$status);
			ob_end_clean();
			header("Location: pages.php");
		}
	}