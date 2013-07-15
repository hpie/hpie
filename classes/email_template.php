<?
	class email_template{
		function getEmailTemplateInfo($id){
			global $db;
			$query = "SELECT * FROM ".TBL_EMAIL_TEMPLATES." WHERE id ='".$id."'";
			return $db->select($query);
		}

		function getEmailTemplates(){
			global $db;
			$query = "SELECT id,email_for FROM ".TBL_EMAIL_TEMPLATES." WHERE status ='y'";
			$rows  = $db->select($query);
			$a_email_templates = array();
			if(!empty($rows)){
				foreach($rows as $row)
				$a_email_templates[$row['id']] = $row['email_for'];
			}
			return $a_email_templates;
		}

		function checkEmailTemplate($email_for,$id){
			global $db;
			$query = "SELECT * FROM ".TBL_EMAIL_TEMPLATES." WHERE email_for ='".$email_for."' AND id != '".$id."'";
			$row	= $db->select($query);
			if(!empty($row)){
				return true;
			}else{
				return false;
			}
		}

		function getDisplayValue($id){
			global $db;
			$sql  = "SELECT * FROM ".TBL_DISPLAY_PAGES." WHERE pages_id ='".$id."'";
			$rows = $db->select($sql);
			$arrDisplay = array();
			if(!empty($rows)){
				foreach($rows as $row){
					$arrDisplay[$row['display_in']]	= $row['display_in'];
				}
			}
			return $arrDisplay;
		}

		function getMenuItems($display_in){
			global $db;
			$sql = "SELECT p.page_title,p.search_name FROM ".TBL_PAGES." p LEFT JOIN ".TBL_DISPLAY_PAGES." dp ON dp.pages_id=p.id WHERE p.status='y' AND dp.display_in='".$display_in."'";
			$rows = $db->select($sql);
			$arrLinks = array();
			if(!empty($rows)){
				$k=0;
				foreach($rows as $row){
					$arrLinks[$k][$row['page_title']] = "page.php?page_name=".$row['search_name'];
					$k++;
				}
			}
			return $arrLinks;
		}

		function getFooterMenuItems(){

		}

	}
?>