<?php
	ob_start();
	session_start();
	require_once("../config.php");
	//require_once($checkSession);
	//include($headerInclude);

	foreach($a_templates as $temp){
		$t_templates[$temp['id']]=$temp['name'];
	}	
	/*
	if(isset($_GET['templates_id']) && $_GET['templates_id'] != "")
		$templates_id = $_GET['templates_id'];
	else{
		$templates_id = 1;
	}
	*/

	if(isset($_GET['users_id']) && $_GET['users_id'] != 0){
		$user_session_id = $_GET['users_id'];
	}else{
		die("Please select user first");
	}



?>
<div id="leftcol"><br/><br/><br/><br/>
		<!--<div class='my_pages_form'><form name ='fetchTemplate' action ='' method='GET'>
			<b class='table_text'>Please select the template</b>&nbsp;&nbsp;&nbsp;<?php echo $db->makeSelectOptions($t_templates,'templates_id',$templates_id);?>&nbsp;&nbsp;<input type ='submit' name ='submit' value ='Show Created Pages'>
		</form></div><br clear='both'>-->
	<table width ='685' align ='center' cellpadding ='2' cellspacing ='2' border ='0'>
		<tr>
		<td align ='center' valign ='top' class='table_text error'>
		<? if(isset($_COOKIE['msg'])){echo $_COOKIE['msg']; setcookie('msg','');}?>
		</td>
		</tr>
		<tr>
			<td valign ='top' align ='left'>
			<?php				
			$sql = "SELECT id,page_name,templates_id,created_on,upload_url FROM sp_squeeze_pages_1 WHERE users_id='".$user_session_id."' UNION SELECT id,page_name,templates_id,created_on,upload_url FROM sp_squeeze_pages_2 WHERE users_id='".$user_session_id."' UNION SELECT id,page_name,templates_id,created_on,upload_url FROM sp_squeeze_pages_3 WHERE users_id='".$user_session_id."' UNION SELECT id,page_name,templates_id,created_on,upload_url FROM sp_squeeze_pages_4 WHERE users_id='".$user_session_id."' ORDER BY templates_id,id DESC";
			
			$pager = new PS_Pagination($conn, $sql, REC_PER_PAGE, SHOW_PAGES,"");

			$pager->setDebug(false);
			$rs = $pager->paginate();
			if($rs){
			echo "<table border='0' cellspacing='0' cellpadding='0' width='99%'>";	
					//echo "<tr><td colspan ='6' align ='left' valign ='top' class='table_text'><b>Template ".$templates_id." Total Record : " . $totalRecords . "</b></td></tr>";
					echo "<tr class='tableHeader'  height='25'><td align ='center' valign ='top' class='largewhite'>No.</td><td class='largewhite' align ='center' valign ='top'>View Page</td><td class='largewhite' align ='left'>Page Name</td><td class='largewhite' align ='left' valign ='top'>Created On</td><td class='largewhite' align ='center' valign ='top'>Edit</td><td class='largewhite' align ='center' valign ='top'>Delete</span></td></tr>";
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
						 $pagename_view = SQUEEZE_PAGE_URL.$user_session_id."/".$unique_template_page_id."/".$pagename;
						if($counter%2==0)
							$cssClass= "even";
						else
							$cssClass = "odd";
						
						$counter++;
						if($temp_template !=   $templates_id){
							echo "<tr class='tableTemplateHeader'><td colspan ='6' class='largewhite'>Template : ".ucfirst($t_templates[$templates_id])."</td><tr>";
						}
						$temp_template =   $templates_id;
						echo "<tr class='$cssClass'><td align ='center' valign ='top' class='table_text'>$counter</td><td align ='center' valign ='top' class='table_text'><a title ='click to view page' onclick=\"window.open('$pagename_view','','width=840,height=640,scrollbars=1')\"><img width='30' src ='img/preview-icon.png' border ='0'></a></td><td align ='left' valign ='top' class='table_text'>($pageTitle)</td><td align ='left' valign ='top' class='table_text'>$created_on</td><td align ='center' valign ='top' class='table_text'><a href ='create_page.php?id=$id&task=edit&templates_id=$templates_id' title ='click to edit page $page_name'><img width='30' src ='img/edit-icon.png' border ='0'></td><td align ='center' valign ='top'><a onclick =\"deleteRecord('$id','$page_name','sp_$templates_id')\" title ='click to delete page $page_name'><img width='30' src ='img/delete-icon.png' border ='0'></a></td></tr>";
			}
			echo "</table>";
			echo "<br/><br/><div class='linkbox'><p class='pages'>".$pager->renderFullNav()."</p></div>";
			}else{
				echo "<center class='error'>You have created no page yet</center><br/>";	
			}
			?>
			</td>
		</tr>
	</table>