<?
	class page{
		function getPageCategories(){
			global $db;
			$query = "SELECT id,name FROM categories WHERE status ='y'";
			return $db->select($query);
		}
		function getPageContent($page_title){
			global $db;	
		     $query = "SELECT * FROM ".TBL_PAGES." WHERE title ='".$page_title."'";
			return $db->select($query);
		}
		function getPageInfo($id){
			global $db;
			$query = "SELECT * FROM ".TBL_PAGES." WHERE id ='".$id."'";
			return $db->select($query);
		}

		function getPageBySearchName($search_name){
			global $db;
			$query = "SELECT * FROM ".TBL_PAGES." WHERE search_name ='".$search_name."'";
			return $db->select($query);
		}
			
		function checkPageId($page_title,$id){
			global $db;
			$query = "SELECT * FROM ".TBL_PAGES." WHERE title ='".$page_title."' AND id != '".$id."'";
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
					$arrLinks[$k][$row['page_title']] = BASE_URL.$row['search_name'].".html";
					$k++;
				}
			}
			return $arrLinks;
		}

		function getFooterMenuItems(){

		}

	}
?>