<?	ob_start();
	session_start();
	include ('../include.php');
	include("../config.php");
	include('../constants.php');
	
	include("check_session.php");
	include("html/header.php");

	foreach($a_templates as $temp){
		$t_templates[$temp['id']]=$temp['name'];
	}	
	if(isset($_GET['users_id']) && $_GET['users_id'] != ""){
		$users_id = $_GET['users_id'];
		$user_name = getUserInfo($users_id);
		
	}else{
		$users_id = 0;
		$user_name = "";
	}
?>
		<!--<div class='my_pages_form'><form name ='fetchTemplate' action ='' method='GET'>
			<b class='table_text'>Please select the template</b>&nbsp;&nbsp;&nbsp;<?php echo $db->makeSelectOptions($t_templates,'templates_id',$templates_id);?>&nbsp;&nbsp;<input type ='submit' name ='submit' value ='Show Created Pages'>
		</form></div><br clear='both'>-->
	<table  width='100%' align='center' cellpadding='2' cellspacing='2' border='0'>
		<tr>
			<td valign ='top' align ='left'>
			<?php
			
			$sql = "";
			$temp_t_id = 0;
			foreach($a_templates as $temp){
				$temp_t_id = $temp['id'];
				if($sql == ""){
					$sql .= "SELECT id,page_name,templates_id,created_on,upload_url FROM sp_squeeze_pages_$temp_t_id WHERE users_id='".$users_id."'";
				}else{
					$sql .= " UNION SELECT id,page_name,templates_id,created_on,upload_url FROM sp_squeeze_pages_$temp_t_id WHERE users_id='".$users_id."'";
				}
				$temp_t_id = 0;
			 }
			 $sql .= "ORDER BY templates_id,id DESC";	

			//$sql = "SELECT id,page_name,templates_id,created_on,upload_url FROM sp_squeeze_pages_1 WHERE users_id='".$users_id."' AND templates_id IN($str_templates) UNION SELECT id,page_name,templates_id,created_on,upload_url FROM sp_squeeze_pages_2 WHERE users_id='".$users_id."' AND templates_id IN($str_templates) UNION SELECT id,page_name,templates_id,created_on,upload_url FROM sp_squeeze_pages_3 WHERE users_id='".$users_id."' AND templates_id IN($str_templates) UNION SELECT id,page_name,templates_id,created_on,upload_url FROM sp_squeeze_pages_4 WHERE users_id='".$users_id."' UNION SELECT id,page_name,templates_id,created_on,upload_url FROM sp_squeeze_pages_5 WHERE users_id='".$users_id."' AND templates_id IN($str_templates) UNION SELECT id,page_name,templates_id,created_on,upload_url FROM sp_squeeze_pages_6 WHERE users_id='".$users_id."' AND templates_id IN($str_templates) ORDER BY templates_id,id DESC";
			
			$pager = new PS_Pagination($conn, $sql, REC_PER_PAGE, SHOW_PAGES,"users_id=$users_id");

			$pager->setDebug(false);
			$rs = $pager->paginate();
			if($rs){
			echo "<table border='0' cellspacing='2' cellpadding='2' width='99%'>";	
					echo "<tr class='titleBg'><td align='center' colspan='7' class='title'>Pages created by (".$user_name.")</td></tr>";
					echo "<tr bgcolor='#78BEE3'  height='25'><td align ='center' valign ='top' class='title1'>No.</td><td class='title1' align ='center' valign='top'>View Page</td><td class='title1' align ='left' valign='top'>Page Name</td><td class='title1' align ='left' valign='top'>Upload Page</td><td class='title1' align ='left' valign ='top'>Created On</td><td class='title1' align ='center' valign ='top'>Edit</td><td class='title1' align ='center' valign ='top'>Delete</span></td></tr>";
					$counter = 0;
					$temp_template = "";
					while($row = mysql_fetch_assoc($rs)) {
						$id				=	$row['id'];
						 $page_name		=	ucfirst(strtolower($row['page_name']));
						 $templates_id	=	$row['templates_id'];
						 $uploadURL		=	$row['upload_url'];
						 if($uploadURL != ""){
							$pageTitle		=  "<a href ='$uploadURL' target ='_blank' title ='click to view the uploaded page'>$page_name</a>";
						 }else{
							$pageTitle		=  "<a href ='#' title ='upload url not set'>$page_name</a>";
						 }
						 $created_on	=	date('d-M-Y H:i:s',strtotime($row['created_on']));						 
						 $pagename = $html->get_page_name($templates_id,$id);
						 $unique_template_page_id = $templates_id."_".$id;
						 $pagename_view = SQUEEZE_PAGE_URL.$users_id."/".$unique_template_page_id."/".$pagename;

						$upload_page = "<a href = 'upload_page.php?sqeeze_page_id=$id&users_id=$users_id&templates_id=$templates_id'>Upload Page</a>";

						if($counter%2==0)
							$cssClass= "even";
						else
							$cssClass = "odd";
						
						$counter++;
						if($temp_template !=   $templates_id){
							echo "<tr bgcolor='#78BEE3'><td colspan ='7' class='title'>Template : ".ucfirst($t_templates[$templates_id])."</td><tr>";
						}
						$temp_template =   $templates_id;
						echo "<tr class='normal' onmouseover=\"this.className='active'\" onmouseout=\"this.className='normal'\"><td align ='center' valign ='top' class='gridText'>$counter</td><td align ='center' valign ='top' class='gridText'><a title ='click to view page' onclick=\"window.open('$pagename_view','','width=840,height=640,scrollbars=1')\"><img width='30' src ='img/preview-icon.png' border ='0'></a></td><td align ='left' valign ='top' class='gridText'>($pageTitle)</td><td align ='left' valign ='top' class='gridText'>$upload_page</td><td align ='left' valign ='top' class='gridText'>$created_on</td><td align ='center' valign ='top' class='gridText'><a href ='create_page.php?id=$id&task=edit&templates_id=$templates_id&users_id=$users_id' title ='click to edit page $page_name'><img width='30' src ='img/edit-icon.png' border ='0'></td><td align ='center' valign ='top' class='gridText'><a onclick =\"deleteRecord('$id','$page_name','sp_$templates_id')\" title ='click to delete page $page_name'><img width='30' src ='img/delete-icon.png' border ='0'></a></td></tr>";
			}
			echo "</table>";
			echo "<br/><br/><div class='linkbox' style ='float:right;'><p class='pages'>".$pager->renderFullNav()."</p></div>";
			}else{
				echo "<center class='error'>You have created no page yet</center><br/>";	
			}
			?>
			</td>
		</tr>
	</table>
<? include("html/footer.php");?>