<div id ='show_data'>
<form name='managePages' method='POST' action =''>
<table width='100%' align='center' cellpadding='2' cellspacing='2' border='0'>
		<tr>
			<td colspan='8'><? $paging->displayPaging();?></td>
		</tr>
			<tr class='titleBg'>
				<td align='center' colspan='8' class='title'>User Management&nbsp;:&nbsp;(<?=$totalRecords;?>)</td>
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
			if(isset($_SESSION['userDeleted']) && $_SESSION['userDeleted'] != ""){?>
			<tr bgcolor='#CDCDCD'>
				<td align='center' colspan='8' class='error'>
				<?
					echo $_SESSION['userDeleted'];
					unset($_SESSION['userDeleted']);
				?>
				</td>
			</tr>
			<?}?>
			<tr class='title1Bg'>
				<td class='title1' align='center' width="60">Sr No.</td>
				<td class='title1' align='left'>user Name</td>
				<td class='title1' align='left'>Email</td>
				<td class='title1' align='left' width='150'>Registered On</td>
				<td class='title1'>Action</td></td>
				<td class='title1' align='center' width='80'>Is Active</td>
				<td class='title1' align='center'><input style ='width:30px;' type="checkbox" name="Check_ctr" value="yes"	onClick="Check(document.managePages.status,'managePages')"></td>
			</tr>
		<?
		if(!empty($arrUsers)){
		$srNo = $page+1;	
		foreach($arrUsers as $users){
			$id				= $users['id'];	
			$first_name		= $users['first_name'];
			$last_name		= $users['last_name'];
			$email			= $users['email'];
			$registered_on	= date('d/M/Y',strtotime($users['joined_on']));
			$user_name		= $first_name.' '.$last_name;
			$status			= $users['i_status'];
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
				<td align='left' class='gridText'>&nbsp;<?=$user_name;?></td>
				<td align='left' class='gridText'>&nbsp;<?=$email;?></td>
				<td align='left' class='gridText'>&nbsp;<?=$registered_on;?></td>
				<td><a  class='edit' title ='edit <?=$user_name;?>' 
				href='add_user.php?id=<?=$id;?>'>Edit</a>&nbsp|&nbsp;<a  class='delete' title ='delete <?=$user_name;?>'onClick = 'deleteRecord("<?=$id;?>","<?=$user_name;?>","users")'>Delete</a></td>
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
	</table>
	<form>
	<?
}

	if(isset($_POST['statusSubmitted'])){
		$status = $_POST['status'];
		$db->isActive(TBL_USERS,$status);
		ob_end_clean();
		header("Location: users.php");
	}
	?>
</div>