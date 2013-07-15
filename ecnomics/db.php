<?php
class db{
	private $hConn;
	public $showQueries;
	public $dbName;
/*database constructor start*/
	public function __construct($arrConfig=null){
		global $conn;
		$this->arrConfig =$arrConfig;
		$cfg['db']['host']			= $this->arrConfig['host'];
		$cfg['db']['user']			= $this->arrConfig['user'];
		$cfg['db']['password']		= $this->arrConfig['password'];
		$cfg['db']['name']			= $this->arrConfig['db_name'];
		$cfg['db']['showQueries']	= $this->arrConfig['show_queries'];
		$this->showQueries			= $this->arrConfig['show_queries'];
		$conn = $this->hConn = mysql_connect($this->arrConfig['host'],$this->arrConfig['user'],$this->arrConfig['password']) or die(mysql_error());

		if(!is_resource($this->hConn)){
			throw new Exception("Unable to connect to database using \"$connString\"",E_USER_ERROR);
		}else{
			//echo "connected";
		}
		$this->selectDb($this->arrConfig['db_name']);
	}

/*database constructor end*/
/*select database start*/

	public function selectDb($dbName){
		$this->dbName = $dbName;
		if(!mysql_select_db($this->dbName)){
			throw new Exception("Unable to select database",E_USER_ERROR);
		}else{
			//echo "database selected";
		}
	}
/*select database end*/

	public function __destruct(){
		if(is_resource($this->hConn)){
			mysql_close($this->hConn);
		}
	}

/*select function  start*/
	public function select($sql){

		if($this->showQueries){
			$this->showQueries($sql);
		}
		$hRes = mysql_query($sql,$this->hConn);
		if(!is_resource($hRes)){
			$err = mysql_error($this->hConn);
				throw new exception($err);
		}
		$arReturn = array();
		while(($row =mysql_fetch_assoc($hRes))){
			$arReturn[] = $row;
		}
		return $arReturn;
	}

/*select function  end*/
/*insert  function  start*/
    public function setXbyY ($query,$id=0) {
		$this->id	   = $id;
		$queryResponse = mysql_query($query) or die(mysql_error()."<br>".$query);
		$generatedID   = mysql_insert_id();
		if($this->id){
			return $this->id;
		}else{
			return $generatedID;
		}
	}

	public function getXbyY ($query,$fetchType='assoc') {
		$rs = mysql_query($query) or die(mysql_error()."<br>".$query);
		if(is_resource($rs)){
			$fetchCommand = "mysql_fetch_$fetchType";
			return $fetchCommand($rs);
		}else{
			return $query;
		}
	}

	public function insert($table,$arFieldValues){
		$arFieldValues['id']=$_SESSION['centerKey'].(rand(100, 100000000) * 100);
		$fields		= array_keys($arFieldValues);
		$values		= array_values($arFieldValues);
		$escVals	= array();
		foreach($values as $val){
			if(!is_numeric($val)){
				$val = '"'.mysql_escape_string($val).'"';
			}
			$escVals[] = $val;
		}
	 $sql = "INSERT INTO $table (";
		$sql .=join(', ', $fields);
		$sql .=') VALUES(';
		$sql .=join(', ', $escVals);
		$sql .=')';
		//echo $sql;
//echo "<br/>";
//exit;
		if($this->showQueries){
			$this->showQueries($sql);
		}
		$hRes = mysql_query($sql,$this->hConn);
		if(!$hRes){
			$err = mysql_error($this->hConn)."\n".$sql;
			throw new exception($err);
		}
		//return mysql_affected_rows();
		$insertId=mysql_insert_id();

		$arFieldValues['id']=$arFieldValues['id'].$insertId;
		$arConditions['id1']=$insertId;
		$this->update($table,$arFieldValues,$arConditions);

		return $arFieldValues['id'];
	}

/*insert  function  end*/
/*update  function  starts*/

	public function update($table,$arFieldValues,$arConditions){
		$arUpdates = array();
		foreach($arFieldValues as $field => $val){
			if(! is_numeric($val)){
				$val = '"'. mysql_escape_string($val). '"';
			}
			$arUpdates[] = "$field = $val";
		}

		$arWhere = array();
		foreach($arConditions as $field => $val){
			if(!is_numeric($val)){
				$val = '"'. mysql_escape_string($val) .'"';
			}
			$arWhere[] = "$field = $val";
		}

		$sql = "UPDATE $table SET ";
		$sql .= join(', ', $arUpdates);
		 $sql .= ' WHERE '. join(' AND ', $arWhere);
		
		if($this->showQueries){
			$this->showQueries($sql);
		}
		$hRes = mysql_query($sql);
		if(!$hRes){
			$err = mysql_error($this->hConn).$sql;
			throw new Exception($err);
		}
		//return mysql_affected_rows();
		return mysql_affected_rows();
	}
/*update  function  starts*/
/*delete  function  starts*/

	public function delete($table,$arConditions){
		$arWhere = array();

		foreach($arConditions as $field => $val){
			if(!is_numeric($val)){
				$val = '"'. mysql_escape_string($val) .'"';
			}
			$arWhere[] = "$field = $val";
		}

		$sql = "DELETE FROM $table WHERE ". join(' AND ', $arWhere);

		if($this->showQueries){
			$this->showQueries($sql);
		}

		$hRes = mysql_query($sql);
		if(!$hRes){
			$err = mysql_error($this->hConn).$sql;
			throw new Exception($err);
		}
		return mysql_affected_rows();
	}






	public function password($password){
		return $password;
		//return $password = md5($password);
	}

	public function makeSelectOptions($arrData,$name,$selectedIndex=0,$javascript="",$size=0,$str=""){
/*echo '<pre>'; print_r($arrData); echo '<pre>';*/
		$strOptions= "";
		if(isset($javascript) && $javascript != ""){
			$callJs = "onchange ='javascript:".$javascript."(this.value)'";
		}else{
			$callJs= "";
		}
		if(!$size){
			$selectSize = "180px";
		}else{
			$selectSize = $size."px";
		}

		if(is_array($arrData) && count($arrData)>=0){
			$strOptions = "<select name ='".$name."' id ='".$name."' ".$callJs." style ='width:".$selectSize."' ".$str."  >";
			$strOptions .= "<option value =''>-select-</option>";
			foreach($arrData as $k=>$v){
				$selected= "";
				if($selectedIndex == $k){
					$selected= "selected";
				}
				$strOptions .= "<option value ='".$k."' ".$selected.">".$v."</option>";
			}
			$strOptions .= "</select>";
		}
		return $strOptions;
	}



public function makeAnySelectOptions($arrData,$name,$selectedIndex=0,$javascript="",$size=0,$str=""){
/*echo '<pre>'; print_r($arrData); echo '<pre>';*/
		$strOptions= "";
		if(isset($javascript) && $javascript != ""){
			$callJs = "onchange ='javascript:".$javascript."(this.value)'";
		}else{
			$callJs= "";
		}
		if(!$size){
			$selectSize = "180px";
		}else{
			$selectSize = $size."px";
		}

		if(is_array($arrData) && count($arrData)>=0){
			$strOptions = "<select name ='".$name."' id ='".$name."' ".$callJs." style ='width:".$selectSize."' ".$str."  >";
			$strOptions .= "<option value =''>-Any-</option>";
			foreach($arrData as $k=>$v){
				$selected= "";
				if($selectedIndex == $k){
					$selected= "selected";
				}
				$strOptions .= "<option value ='".$k."' ".$selected.">".$v."</option>";
			}
			$strOptions .= "</select>";
		}
		return $strOptions;
	}
/*delete  function  end*/
/*display  queries function  starts*/

	public function showQueries($sql){
		echo "<font style ='color:#ff0000'>".$sql."<br/></font>";
	}

/*display  queries function  end*/
public function display_paging($total, $limit, $pagenumber, $baseurl,$showpages){
	/*
	Usage examples:
	echo display_paging( $total, $limit, $page, $baseurl );

	Show 3rd page with 10 records from a set of hundred
	echo display_paging( 100, 10, 3, $baseurl );

	Using with normal variable passing links
	echo display_paging( $total, $limit, $page, "?view=prod&cat=cat&page=" );

	Using this with mod_rewrite (setup your rules in htaccess)
	echo display_paging( $total, $limit, $page, "/prod/cat/page/" );
	*/
		$html			= "";
		$icon_first		='<div title="first" class="next_prev_link">Start</div>';
		$icon_last		='<div class="next_prev_link" title="last" >End</div>';
		$icon_previous	='<div class="next_prev_link"  title="previous">&laquo;&nbsp;Prev</div>';
		$icon_next		='<div class="next_prev_link" title="next">Next&nbsp;&raquo;</div>';

		// do calculations
		$pages = ceil($total / $limit);
		$offset = ($pagenumber * $limit) - $limit;
		$end = $offset + $limit;

		// prepare paging links
		$html = '<div id="pageLinks">';
		// if first link is needed
		if($pagenumber > 1) { $previous = $pagenumber -1;
			$html .= '<a href="'.$baseurl.'1">'.$icon_first.'</a> ';
		}
		// if previous link is needed
		if($pagenumber > 2) {    $previous = $pagenumber -1;
			$html .= '<a href="'.$baseurl.''.$previous.'">'.$icon_previous.'</a> ';
		}
		// print page numbers
		if ($pages>=2) { $p=1;
			$html .= "| Page: ";
			$pages_before = $pagenumber - 1;
			$pages_after = $pages - $pagenumber;
			$show_before = floor($showpages / 2);
			$show_after = floor($showpages / 2);
			if ($pages_before < $show_before){
				$dif = $show_before - $pages_before;
				$show_after = $show_after + $dif;
			}
			if ($pages_after < $show_after){
				$dif = $show_after - $pages_after;
				$show_before = $show_before + $dif;
			}
			$minpage = $pagenumber - ($show_before+1);
			$maxpage = $pagenumber + ($show_after+1);

			if ($pagenumber > ($show_before+1) && $showpages > 0) {
				$html .= " ... ";
			}
			while ($p <= $pages) {
				if ($p > $minpage && $p < $maxpage) {
					if ($pagenumber == $p) {
							$html .= " <b class='active'>".$p."</b>";
					} else {
						$html .= ' <a href="'.$baseurl.$p.'">'.$p.'</a>';
					}
				}
				$p++;
			}
			if ($maxpage-1 < $pages && $showpages > 0) {
				$html .= " ... ";
			}
		}
		// if next link is needed
		if($end < $total) { $next = $pagenumber +1;
			if ($next != ($p-1)) {
				$html .= ' | <a href="'.$baseurl.$next.'">'.$icon_next.'</a>';
			} else {$html .= ' | ';}
		}
		// if last link is needed
		if($end < $total) { $last = $p -1;
			$html .= ' <a href="'.$baseurl.$last.'">'.$icon_last.'</a>';
		}
		$html .= '</div>';
		// return paging links
		return $html;
}
		function makeCheckBoxes($arrData,$name,$selectedBoxes=array(),$column){


			$strTable = "<table class='adminlist1'  width ='80%' align ='left' cellpadding='0' cellspacing='0' style ='border:1px solid #bebebe;'>";
			 $totalRecords = count($arrData);
			$width = floor(100/$column);
			$strTable .= "<tr class='row0'><td align ='left' valign ='top' width='".$width."%'>";
			$strTable .=  "<input style='width:20px;height:18px;' name='toggle' onclick='check_all_links($totalRecords);' type='checkbox'>".CHECK_ALL_TEXT;
			$strTable .= "</td>";
			for($j=0;$j<$column-1;$j++){
				$strTable .="<td width='".$width."%'>&nbsp;</td>";
			}
			$strTable .="</tr>";

			if(!empty($arrData)){
				$counter = 0;
				$i		 = 1;
				$loopCounter = 0;
				foreach($arrData as $k=>$v){
					if($counter == 0){
						$strTable .= "<tr class='row0'>";
					}
					$checked= "";
					if(in_array($k,$selectedBoxes)){
						$checked= "checked";
					}
					switch($v){
					case "Home":
					$checklabel=	HOME_LABEL_TEXT;
					break;
					case "Schools":
					$checklabel=	SCHOOL_LABEL_TEXT;
					break;
					case "Levels":
					$checklabel=	LEVELS_LABEL_TEXT;
					break;
					case "Categories":
					$checklabel=	CATEGORIES_LABEL_TEXT;
					break;
					case "Templates":
					$checklabel=	TEMPLATES_LABEL_TEXT;
					break;
					case "Live Reports":
					$checklabel=	LIVE_REPORT_LABEL_TEXT;
					break;
					case "Tests":
					$checklabel=	TEST_LABEL_TEXT;
					break;
					case "Students":
					$checklabel=	STUDENT_LABEL_TEXT;
					break;
					case "Groups":
					$checklabel=	GROUP_LABEL_TEXT;
					break;
					case "Countries":
					$checklabel=	COUNTRY_LABEL_TEXT;
					break;
					case "States":
					$checklabel=	STATE_LABEL_TEXT;
					break;
					case "Subscriptions":
					$checklabel=	SUBSCRIPTION_LABEL_TEXT;
					break;
					case "Admin Users":
					$checklabel=	ADMIN_USER_LABEL_TEXT;
					break;
					case "Others":
					$checklabel=	OTHERS_LABEL_TEXT;
					break;
					case "Weeks":
					$checklabel=	WEEK_LABEL_TEXT;
					break;
					case "Add New School":
					$checklabel=	ADD_SCHOOL_LABEL_TEXT;
					break;
					case "Add Level":
					$checklabel=	ADD_LEVEL_LABEL_TEXT;
					break;
					case "Add Category":
					$checklabel=	ADD_CATEGORY_LABEL_TEXT;
					break;
					case "Add Template":
					$checklabel=	ADD_TEMPLATE_LABEL_TEXT;
					break;
					case "Templates":
					$checklabel=	TEMPLATES_LABEL_TEXT;
					break;
					case "Add Page":
					$checklabel=	"Add Page";
					break;
					case "Add Test":
					$checklabel=	ADD_TEST_LABEL_TEXT;
					break;
					case "Add student":
					$checklabel=	ADD_STUDENT_LABEL_TEXT;
					break;
					case "Add Group":
					$checklabel=	ADD_GROUP_LABEL_TEXT;
					break;
					case "Add Country":
					$checklabel=	ADD_COUNTRY_LABEL_TEXT;
					break;
					case "Add State":
					$checklabel=	ADD_STATE_LABEL_TEXT;
					break;
					case "Add Subscription":
					$checklabel=	ADD_SUBSCRIPTION_LABEL_TEXT;
					break;
					case "Add Admin User":
					$checklabel=	ADD_ADMIN_USER_LABEL_TEXT;
					break;
					case "Admin Links":
					$checklabel=	ADMIN_LINKS_LABEL_TEXT;
					break;
					case "Roles":
					$checklabel=	ROLES_LABEL_TEXT;
					break;
					case "Site Pages":
					$checklabel=	SITE_PAGES_LABEL_TEXT;
					break;
					case "Word Frequency":
					$checklabel=	WORD_FREQUENCY_LABEL_TEXT;
					break;
					case "Add Word Frequency":
					$checklabel=	ADD_WORD_FREQUENCY_LABEL_TEXT;
					break;
					case "Easy":
					$checklabel=	EASY_LABEL_TEXT;
					break;
					case "Normal":
					$checklabel=	NORMAL_LABEL_TEXT;
					break;
					case "Difficult":
					$checklabel=	DIFFICULT_LABEL_TEXT;
					break;
					case "Global Configuration":
					$checklabel=	GLOBAL_CONFIG_LABEL_TEXT;
					break;
					case "Faqs":
					$checklabel=	FAQ_LABEL_TEXT;
					break;
					case "Add Faq":
					$checklabel=	ADD_FAQ_LABEL_TEXT;
					break;
					case "Add Flash Image":
					$checklabel=	"Add Flash Image";
					break;
					case "Flash Images":
					$checklabel=	"Flash Images";
					break;
					case "Add Live Help":
					$checklabel=	"Add Live Help";
					break;

					case "Live Help":
					$checklabel=	"Live Help";
					break;
				}

				 $strTable .= "<td align ='left' valign ='top' width='".$width."%'><input style='width:20px;height:18px;' type='checkbox' name ='".$name."[".$i."]' value ='".$k."' ".$checked."> ".$checklabel."</td>";
					$counter++;
					$loopCounter++;
					if($counter == $column){
						$strTable .="</tr>";
						$counter =0;
					}elseif($loopCounter == $totalRecords){
						for($k=$counter;$k<$column;$k++){
							$strTable .="<td width='".$width."%'></td>";
						}
						$strTable .="</tr>";
					}
					$i++;
				}
			}
			$strTable .= "</table>";
			return $strTable;
		}

	function set_status($table,$data){
		$motive = $data['motive'];
		$action = "";
		switch($motive){
			case 'Activate':
			$is_active = 1;
			$action	 = "update";
			break;

			case 'Deactivate':
			$is_active = 0;
			$action	 = "update";
			break;

			case 'Remove':
			$action	= "delete";
			break;
		}

		if(isset($data['chk'])){
			if($action == 'update'){
				foreach($data['chk'] as $k=>$v){
					$arrUpdate	= array('is_active'=>$is_active);
					$arrWhere	= array('id'=>$v);
					if($this->update($table,$arrUpdate,$arrWhere)){
						$_SESSION['msg']= "Record Updated Successfully";
					}
				}
			}elseif($action == 'delete'){
				foreach($data['chk'] as $k=>$v){
					$arrWhere	= array('id'=>$v);
					$this->delete($table,$arrWhere);
					$_SESSION['msg']= "Record Deleted Successfully";
				}
			}
		}
	}

	public function fetchAllRoles($accessTo){
		$arrRoles = array();
		$query = "SELECT * FROM user_roles where name NOT IN('Admin','Student') AND access_to ='".$accessTo."' AND is_active ='1'";
		$rows   = 	$this->select($query);
		if(!empty($rows)){
			foreach($rows as $row){
				$arrRoles[$row['id']] = $row['name'];
			}
		}
		return $arrRoles;
	}

	function checkUserLinkAccess(){
		//$requestURI = explode("/",$_SERVER['REQUEST_URI']);
		$requestURI = explode("/",$_SERVER['SCRIPT_NAME']);
		$url1		= explode("&",end($requestURI));
		$url = $url1[0];
		$group_id	= $_SESSION['sessGroupID'];
		$sql		= "SELECT s.*,us.* FROM admin_links_access us LEFT JOIN admin_links s ON s.id = us.admin_links_id WHERE us.groups_id ='".$group_id."' AND s.url LIKE '%".$url."%'";
		$row = $this->select($sql);
		if(!empty($row)){
			return true;
		}else{
			return false;
		}
	}

	function getOnlineUsers(){
		$whos_online = "whos_online";
		$sqlAllUsers = 'SELECT login_type,count(*) as online FROM '.$whos_online.' WHERE schools_id ="'.$_SESSION['sessSchoolsID'].'" GROUP BY login_type ORDER BY login_type ASC';
		$rows = $this->select($sqlAllUsers);
		$arrOnLineUsers = array();
		if(!empty($rows)){
			foreach($rows as $row){
				$arrOnLineUsers[$row['login_type']] = $row['online'];
			}
		}
		return $arrOnLineUsers;
	}
	function updateUserStatus(){
		$whos_online = "whos_online";
		if(isset($_COOKIE['phpSessionID'])){
			$phpSessionID		= $_COOKIE['phpSessionID'];
			$ipAddress			= $_SERVER['REMOTE_ADDR'];
			$lastPageURL		= $_SERVER['REQUEST_URI'];
			//$lastPageURL		= $_SERVER['HTTP_REFERER'];
			$currentTime		= time();

			$this->cleanUpJunkUsers();

			$arrConditionUpdateOnlineUser = array('session_id'=>$phpSessionID,'ip_address'=>$ipAddress,'schools_id'=>$_SESSION['sessSchoolsID']);
			$arrUpdateOnLineUser = array('last_page_url'=>$lastPageURL,'time_last_click'=>$currentTime);

			$sql = 'SELECT * FROM '.$whos_online.' WHERE session_id = "'.$phpSessionID.'" AND schools_id="'.$_SESSION['sessSchoolsID'].'"';

			$row = $this->select($sql);

			if(empty($row)){
				$arrInsertOnlineUser = array('session_id'=>$phpSessionID,'ip_address'=>$ipAddress,'time_entry'=>$currentTime,'last_page_url'=>$lastPageURL,'time_last_click'=>$currentTime,'schools_id'=>$_SESSION['sessSchoolsID']);
				$this->insert($whos_online,$arrInsertOnlineUser);
			}else{
				$this->update($whos_online,$arrUpdateOnLineUser,$arrConditionUpdateOnlineUser);
			}
		}
	}

	function cleanUpJunkUsers(){
		$whos_online = "whos_online";
		$sql		 = "SELECT * FROM ".$whos_online;
		$currTime	 = time();
		$rows	= $this->select($sql);
		if(!empty($rows)){
			foreach($rows as $row){
				$session_id = $row['session_id'];
				$login_id	= $row['login_id'];
				$timeDiff = ceil(($currTime - $row['time_last_click'])/60);
				if($timeDiff >36){
					if(isset($_SESSION['sessStudentID']) && $_SESSION['sessStudentID'] === $login_id){
						unset($_SESSION['sessStudentID']);
						unset($_SESSION['sessStudentName']);
						unset($_SESSION['sessSchoolsID']);
						setcookie("phpSessionID",'', time()-900);
					}
					$arrDeleteOnlineUserCondition = array('session_id'=>$session_id);
					$this->delete($whos_online,$arrDeleteOnlineUserCondition);
				}
			}
		}
	}

	function isActive($table,$a_data){
			foreach($a_data as $key=>$value){
				$id	=	$key;
				$status		=	$value;
				if($status == 'Activate'){
					$isActive = '1';
				}else{
					$isActive = '0';
				}
				$arFieldValues = array("i_status"=>$isActive);
				$arConditions  = array("id"=>$id);
				$this->update($table,$arFieldValues,$arConditions);
		}
	}

	public function deleteConversion($id,$markId,$month,$year,$c_id){


		  $sql = "Delete FROM c_filling_detail  WHERE  month ='".$month."' and year='".$year."' and i_tree_id=".$id." and i_contractor_id=".$c_id."  AND i_mark_id =".$markId ;
         $err = mysql_error($this->hConn).$sql;
		 //die();
		if($this->showQueries){
			$this->showQueries($sql);
		}

		$hRes = mysql_query($sql);
		if(!$hRes){
			$err = mysql_error($this->hConn).$sql;
			throw new Exception($err);
		}
		return mysql_affected_rows();
	}


public function deleteProgressDetail($progressConversionId){


		  $sql = "Delete FROM progress_conversion_detail  WHERE   	i_progress_id ='".$progressConversionId."'" ;

		  $err = mysql_error($this->hConn).$sql;
		 //die();
		if($this->showQueries){
			$this->showQueries($sql);
		}

		$hRes = mysql_query($sql);
		if(!$hRes){
			$err = mysql_error($this->hConn).$sql;
			throw new Exception($err);
		}
		return mysql_affected_rows();
	}



	public function deleteTransportationSingle($conversionId){


		$sql = "Delete FROM progress_transportation_detail  WHERE   id ='".$conversionId ."'" ;

		echo $sql;
		$err = mysql_error($this->hConn).$sql;
		//die();
		if($this->showQueries){
			$this->showQueries($sql);
		}

		$hRes = mysql_query($sql);
		if(!$hRes){
			$err = mysql_error($this->hConn).$sql;
			throw new Exception($err);
		}
		return mysql_affected_rows();
	}

	public function deleteTransportation($progressConversionId){


		$sql = "Delete FROM progress_transportation_detail  WHERE   	i_progress_id ='".$progressConversionId ."'" ;

		$err = mysql_error($this->hConn).$sql;
		//die();
		if($this->showQueries){
			$this->showQueries($sql);
		}

		$hRes = mysql_query($sql);
		if(!$hRes){
			$err = mysql_error($this->hConn).$sql;
			throw new Exception($err);
		}
		return mysql_affected_rows();
	}

	public function deleteTransportationOpening($progressConversionId){


		$sql = "Delete FROM opening_progress_transportation_detail  WHERE   	i_progress_id ='".$progressConversionId."'" ;

		$err = mysql_error($this->hConn).$sql;
		//die();
		if($this->showQueries){
			$this->showQueries($sql);
		}

		$hRes = mysql_query($sql);
		if(!$hRes){
			$err = mysql_error($this->hConn).$sql;
			throw new Exception($err);
		}
		return mysql_affected_rows();
	}
	public function deleteTransportationDetail($progressConversionId){


		$sql = "Delete FROM progress_transportation_master  WHERE   	id ='".$progressConversionId."'" ;

		$err = mysql_error($this->hConn).$sql;
		//die();
		if($this->showQueries){
			$this->showQueries($sql);
		}

		$hRes = mysql_query($sql);
		if(!$hRes){
			$err = mysql_error($this->hConn).$sql;
			throw new Exception($err);
		}
		return mysql_affected_rows();
	}
	public function deleteTransportationDetailOpening($progressConversionId){


		$sql = "Delete FROM opening_progress_transportation_master  WHERE   	id ='".$progressConversionId."'" ;

		$err = mysql_error($this->hConn).$sql;
		//die();
		if($this->showQueries){
			$this->showQueries($sql);
		}

		$hRes = mysql_query($sql);
		if(!$hRes){
			$err = mysql_error($this->hConn).$sql;
			throw new Exception($err);
		}
		return mysql_affected_rows();
	}
public function deleteProgressTransportDetail($progressConversionId){


		  $sql = "Delete FROM progress_transportation_detail  WHERE   	i_progress_id ='".$progressConversionId ."'" ;

		  $err = mysql_error($this->hConn).$sql;
		 //die();
		if($this->showQueries){
			$this->showQueries($sql);
		}

		$hRes = mysql_query($sql);
		if(!$hRes){
			$err = mysql_error($this->hConn).$sql;
			throw new Exception($err);
		}
		return mysql_affected_rows();
	}

public function deleteProgressFellingDetail($progressConversionId){


		  $sql = "Delete FROM progress_felling_detail  WHERE   	i_progress_id ='".$progressConversionId."'" ;

		  $err = mysql_error($this->hConn).$sql;
		 //die();
		if($this->showQueries){
			$this->showQueries($sql);
		}

		$hRes = mysql_query($sql);
		if(!$hRes){
			$err = mysql_error($this->hConn).$sql;
			throw new Exception($err);
		}
		return mysql_affected_rows();
	}

	public function deleteProgressFellingDetailVolume($progressConversionId){


		$sql = "Delete FROM progress_conversion_actual_detail  WHERE   	i_progress_id ='".$progressConversionId."'" ;

		$err = mysql_error($this->hConn).$sql;
		//die();
		if($this->showQueries){
			$this->showQueries($sql);
		}

		$hRes = mysql_query($sql);
		if(!$hRes){
			$err = mysql_error($this->hConn).$sql;
			throw new Exception($err);
		}
		return mysql_affected_rows();
	}



public function deleteProgressFellingCharges($progressConversionId){


		  $sql = "Delete FROM progress_felling_charges  WHERE   	i_progress_id ='".$progressConversionId ."'" ;

		  $err = mysql_error($this->hConn).$sql;
		 //die();
		if($this->showQueries){
			$this->showQueries($sql);
		}

		$hRes = mysql_query($sql);
		if(!$hRes){
			$err = mysql_error($this->hConn).$sql;
			throw new Exception($err);
		}
		return mysql_affected_rows();
	}


	public function deleteProgressFellingChargesVolume($progressConversionId){


		$sql = "Delete FROM progress_felling_charges  WHERE   	i_progress_id ='".$progressConversionId."'" ;

		$err = mysql_error($this->hConn).$sql;
		//die();
		if($this->showQueries){
			$this->showQueries($sql);
		}

		$hRes = mysql_query($sql);
		if(!$hRes){
			$err = mysql_error($this->hConn).$sql;
			throw new Exception($err);
		}
		return mysql_affected_rows();
	}

public function deleteProgressConversionCharges($progressConversionId){


		  $sql = "Delete FROM progress_conversion_charges  WHERE   	i_progress_id ='".$progressConversionId."'" ;

		  $err = mysql_error($this->hConn).$sql;
		 //die();
		if($this->showQueries){
			$this->showQueries($sql);
		}

		$hRes = mysql_query($sql);
		if(!$hRes){
			$err = mysql_error($this->hConn).$sql;
			throw new Exception($err);
		}
		return mysql_affected_rows();
	}

public function deleteProgressOverHeadDetail($progressConversionId){


		  $sql = "Delete FROM progress_overhead_detail  WHERE   	i_progress_id ='".$progressConversionId ."'";

		  $err = mysql_error($this->hConn).$sql;
		 //die();
		if($this->showQueries){
			$this->showQueries($sql);
		}

		$hRes = mysql_query($sql);
		if(!$hRes){
			$err = mysql_error($this->hConn).$sql;
			throw new Exception($err);
		}
		return mysql_affected_rows();
	}

public function deleteInventoryDetail($progressConversionId){


		  $sql = "Delete FROM inventory_detail  WHERE   		i_inventory_id ='".$progressConversionId."'" ;

		  $err = mysql_error($this->hConn).$sql;
		 //die();
		if($this->showQueries){
			$this->showQueries($sql);
		}

		$hRes = mysql_query($sql);
		if(!$hRes){
			$err = mysql_error($this->hConn).$sql;
			throw new Exception($err);
		}
		return mysql_affected_rows();
	}
}
?>