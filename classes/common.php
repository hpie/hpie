<?
class common{
	function getAllmessages($id){
		global $db,$arr_message;
			
		$sql  = "SELECT * FROM ".TBL_MESSAGES." WHERE id = '".$id."'";
		$row  =$db->select($sql);
		return $row[0]['replied_to_id'];
	}

	function getMessageIds($id){
		$count=0;
		$arr_message=array();
		while($this->getAllmessages($id)!=0){
			$id=$this->getAllmessages($id);
			$arr_message[$count]=$id;
			$count++;
		}
		return  $arr_message;
	}

	function getNewMessages(){
		global $db;
		$sql  = "SELECT count(id) as total FROM ".TBL_MESSAGES." WHERE receaver_id = '".$_SESSION['userId']."' and is_read='0'";
		$row  =$db->select($sql);
		if($row[0]['total']!=0){
			return($row[0]['total']);
		}
	}
	function GetAge($Birthdate)

	{

		// Explode the date into meaningful variables

		list($BirthDay,$BirthMonth,$BirthYear) = explode("-", $Birthdate);

		// Find the differences

		$YearDiff = date("Y") - $BirthYear;

		$MonthDiff = date("m") - $BirthMonth;

		$DayDiff = date("d") - $BirthDay;

		// If the birthday has not occured this year

		if ($DayDiff < 0 || $MonthDiff < 0)

		$YearDiff--;

		return $YearDiff;

	}
	function getInfo($table,$id){
		global $db;
		$sql  = "SELECT * FROM ".$table." WHERE id = '".$id."'";
		return	$db->select($sql);
	}

	function getDetailInfo($table,$columName,$id){
		global $db;
		$sql  = "SELECT * FROM ".$table." WHERE ".$columName." = '".$id."'";

		return	$db->select($sql);
	}
	function selectCondition($table,$arConditions){
		global $db;
		$arWhere = array();

		foreach($arConditions as $field => $val){
			$val = '"'. mysql_escape_string($val) .'"';
			$arWhere[] = "$field = $val";
		}
		$sql = "SELECT * FROM ".$table." WHERE " . join(' AND ', $arWhere);
		//	$sql  = "SELECT * FROM ".$table." WHERE ".$columName." = '".$id."'";

		return	$db->select($sql);
	}
	function getOverHeadInfo($table,$id,$markId){
		global $db;
		$sql  = "SELECT * FROM ".$table." WHERE i_overhead_id = '".$id."' and i_mark_id= '".$markId."' ";
		return	$db->select($sql);
	}

	function getProgressOverHeadInfo($table,$id,$markId,$progressId){
		global $db;
		$sql  = "SELECT * FROM ".$table." WHERE i_overhead_id = '".$id."' and i_mark_id= '".$markId."' and i_progress_id='".$progressId."'";

		return	$db->select($sql);
	}
	function getOptionInfo($table,$id){
		global $db;
		$sql  = "SELECT * FROM ".$table." WHERE id = '".$id."'";
		$row=	$db->select($sql);
		if(!empty($row)){
			return $row[0]['title'];
		}else{
			return " ";
		}

	}

	
	function getAllTimberType($id=0){
		global $db;
		$arrTimberType=array();
		if($id!='0'){
			$where='and i_timber_id=\''.$id.'\'';
		}
		$sql  = "SELECT * FROM m_timber_type where i_status=1 ".$where;
		$rows= $db->select($sql);
		if(!empty($rows)){
			foreach($rows as $row){
				$arrTimberType[$row['id']] = $row['vc_name'];
			}
		}
		return $arrTimberType;
	}

	function getEcnomicsTimberType($id=0,$markdetailId){
		global $db;
		$arrTimberType=array();
		if($id!='0'){
			$where='and i_timber_id=\''.$id.'\'';
		}
		$sql  = "SELECT * FROM m_timber_type where id in (
		  		 select i_timber_type_id 
		  		 from  ecnomics_conversion_detail where i_mark_id ='".$markdetailId."') 
		          and  i_status=1 ".$where;
		$rows= $db->select($sql);
		if(!empty($rows)){
			foreach($rows as $row){
				$arrTimberType[$row['id']] = $row['vc_name'];
			}
		}
		return $arrTimberType;
	}


	function getOverheadEntity($mark_id){
		$arrMarkDetail=$this->getInfo('c_mark_detail',$mark_id);
		$forestId     =$arrMarkDetail[0]['i_forest_id'];
		$arrForestDetail=$this->getInfo('m_forest',$forestId);
		$departmentId   =$arrForestDetail[0]['i_department_id'];
		global $db;
		$sql  = "SELECT * FROM m_overhead_entities WHERE i_status = '1' and
		         i_overhead_type in ( '1','3') and i_department_id='".$departmentId."'" ;

		$rows  = $db->select($sql);
		if(!empty($rows)){
			$arrCategory = array();
			foreach($rows as $row){
				$arrOptions[$row['id']] = $row;

			}
			return $arrOptions;
		}else{
			return false;
		}
	}

	function getOverheadRSD($mark_id){
		$arrMarkDetail=$this->getInfo('c_mark_detail',$mark_id);
		$forestId     =$arrMarkDetail[0]['i_forest_id'];
		$arrForestDetail=$this->getInfo('m_forest',$forestId);
		$departmentId   =$arrForestDetail[0]['i_department_id'];
		global $db;
		$sql  = "SELECT * FROM m_overhead_entities WHERE i_status = '1'
		         and i_overhead_type in ( '4','5') and i_department_id='".$departmentId."'" ;

		$rows  = $db->select($sql);
		if(!empty($rows)){
			$arrCategory = array();
			foreach($rows as $row){
				$arrOptions[$row['id']] = $row;

			}
			return $arrOptions;
		}else{
			return false;
		}
	}
	function getExtraCharges($mark_id){
		$arrMarkDetail=$this->getInfo('c_mark_detail',$mark_id);
		$forestId     =$arrMarkDetail[0]['i_forest_id'];
		$arrForestDetail=$this->getInfo('m_forest',$forestId);
		$departmentId   =$arrForestDetail[0]['i_department_id'];
		global $db;
		$sql  = "SELECT * FROM m_overhead_entities WHERE i_status = '1' and  i_overhead_type  in ( '2') and  i_department_id='".$departmentId ."'";

		$rows  = $db->select($sql);
		if(!empty($rows)){
			$arrCategory = array();
			foreach($rows as $row){
				$arrOptions[$row['id']] = $row;

			}
			return $arrOptions;
		}else{
			return false;
		}
	}

	function getTreeType($mark_id){
		$arrMarkDetail=$this->getInfo('c_mark_detail',$mark_id);
		$forestId     =$arrMarkDetail[0]['i_forest_id'];
		$arrForestDetail=$this->getInfo('m_forest',$forestId);
		$departmentId   =$arrForestDetail[0]['i_department_id'];
		global $db;
		$sql  = "SELECT * FROM m_treetype WHERE i_status = '1' and i_department_id='".$departmentId."'" ;
		$rows  = $db->select($sql);
		if(!empty($rows)){
			$arrCategory = array();
			foreach($rows as $row){
				$arrOptions[$row['id']]['vc_name'] = $row['vc_name'];
			}
			return $arrOptions;
		}else{
			return false;
		}
	}

	function getTreeMarked($markId){
		global $db;
		//$treeMarkingVO = new TreeMarkingVO();
		$markTressDetails=array();
		$sql  = "SELECT * FROM c_marked_volume WHERE i_mark_id ='".$markId."'";
		
		$trees  = $db->select($sql);
		if(!empty($trees)){
			foreach($trees as $tree){
				$sql  = "SELECT DISTINCT(i_tree_type_id) as i_tree_type_id  FROM r_tree_category WHERE i_mark_detail_id ='".$markId."' and i_tree_id='".$tree['i_tree_id']."'";
				$treetypes  = $db->select($sql);
				if(!empty($treetypes)){
					foreach($treetypes as $treetype){
						$sql  = "SELECT * FROM r_tree_category WHERE i_mark_detail_id ='".$markId."' and i_tree_id='".$tree['i_tree_id']."' and i_tree_type_id='".$treetype['i_tree_type_id']."'";
						$compDetail  = $db->select($sql);
						if(!empty($compDetail)){
							foreach($compDetail as $detail){
									
									
								$markTressDetails[$tree['i_tree_id']][$treetype['i_tree_type_id']][$detail['id']] =array('treetype_id'=>$detail['i_tree_id'],'categoryId'=>$detail['i_category_id'],'categoryName'=>$detail['asd'],'categoryValue'=>$detail['i_value'],'treetypeId'=>$detail['i_tree_type_id']) ;
									
							}
				  }
				 }


				}
			}
		}
		return $markTressDetails;
			
	}


	function getMarkedVolume($markId,$treeId){
		global $db;
		$volume='';
		$sql  = "SELECT * FROM c_marked_volume WHERE i_mark_id ='".$markId."' and i_tree_id='".$treeId."'";
		$markedVolume  = $db->select($sql);
		if(!empty($markedVolume)){
			foreach($markedVolume as $mvolume){
				$volume=$mvolume['i_tree_volume'];
			}
		}
		return $volume;
			
	}
	function getAllOption($table){
		global $db;
		$sql  = "SELECT * FROM ".$table." WHERE i_status = '1' ";
		$rows  = $db->select($sql);
		if(!empty($rows)){
			$arrCategory = array();
			foreach($rows as $row){
				$arrOptions[$row['id']] = $row['vc_name'];

			}
			return $arrOptions;
		}else{
			return false;
		}
	}

	function getAllOptionOrder($table ,$orderby){
		global $db;
		$sql  = "SELECT * FROM ".$table." WHERE i_status = '1' order by ".$orderby;
		$rows  = $db->select($sql);
		if(!empty($rows)){
			$arrCategory = array();
			foreach($rows as $row){
				$arrOptions[$row['id']] = $row['vc_name'];

			}
			return $arrOptions;
		}else{
			return false;
		}
	}

	function getAllOptionByName($table ,$orderby){
		global $db;
		$sql  = "SELECT * FROM ".$table." WHERE i_status = '1' order by ".$orderby;
		$rows  = $db->select($sql);
		if(!empty($rows)){
			$arrCategory = array();
			foreach($rows as $row){
				$arrOptions[$row['vc_name']] = $row['vc_name'];

			}
			return $arrOptions;
		}else{
			return false;
		}
	}
	
	function getAllCountries(){
		global $db;
		$sql  = "SELECT * FROM countries WHERE is_active = '1'";
		$rows  = $db->select($sql);
		if(!empty($rows)){
			$arrCategory = array();
			foreach($rows as $row){
				$arrCountries[$row['id']] = $row['name'];
			}
			return $arrCountries;
		}else{
			return false;
		}
	}

	function getAllStates($id){
		global $db;
		$table=TBL_STATES;
		$sql  = "SELECT * FROM $table WHERE countries_id = '$id'";
		$rows  = $db->select($sql);
		if(!empty($rows)){
			$arrCategory = array();
			foreach($rows as $row){
				$arrStates[$row['name']] = $row['name'];
			}
			return $arrStates;
		}else{
			return false;
		}
	}
	function getAllDepartments(){
		global $db;
		$sql  = "SELECT * FROM m_forest_department WHERE i_status = '1'";
		$rows  = $db->select($sql);
		if(!empty($rows)){
			$arrDepartments = array();
			foreach($rows as $row){
				$arrDepartments[$row['id']] = $row['vc_name'];
			}
			return $arrDepartments;
		}else{
			return false;
		}
	}

		
function getAllDividions(){
		global $db;
		$sql  = "SELECT * FROM m_division WHERE i_status = '1'";
		$rows  = $db->select($sql);
		if(!empty($rows)){
			$arrDepartments = array();
			foreach($rows as $row){
				$arrDepartments[$row['id']] = $row['vc_name'];
			}
			return $arrDepartments;
		}else{
			return false;
		}
	}
	
	
	function getAllForests(){
		global $db;
		$sql  = "SELECT * FROM m_forest WHERE i_status = '1'";
		$rows  = $db->select($sql);
		if(!empty($rows)){
			$arrForests = array();
			foreach($rows as $row){
				$arrForests[$row['id']] = $row['vc_name'];
			}
			return $arrForests;
		}else{
			return false;
		}
	}

	function getAllTrees(){
		global $db;
		$sql  = "SELECT * FROM m_trees WHERE i_status = '1'";
		$rows  = $db->select($sql);
		if(!empty($rows)){
			$arrTrees = array();
			foreach($rows as $row){
				$arrTrees[$row['id']] = $row['vc_name'];
			}
			return $arrTrees;
		}else{
			return false;
		}
	}

	function getAllLotDetail($lotNo='',$division=''){
		global $db;

		
		if($lotNo == '')
		{
			$sql  = "SELECT a . *,b.vc_name as forest,
             			c.vc_name as division
             			
						FROM `c_mark_detail` a
   							 ,m_forest b
    						 ,m_division  c
							 where a.i_forest_id =  b.id
  							".($division =='' ? "" : " and c.id='".$division."'")."
							and a.i_division_id= c.id order by c.vc_name";
		}
		else
		{
			$sql  = "SELECT a . *,b.vc_name as forest,
			c.vc_name as division
			FROM `c_mark_detail` a
			,m_forest b
			,m_division  c
			where a.i_forest_id =  b.id".
			($division =='' ? "" : " and c.id='".$division."'")."
			and a.i_division_id= c.id and a.id='".$lotNo."'";
		}
		
		
		$rows  = $db->select($sql);
		if(!empty($rows)){
			$arrTrees = array();
			foreach($rows as $row){
				$arrTrees[$row['id']] = $row;
			}
			return $arrTrees;
		}else{
			return false;
		}
	}


	function getAllCategories($s='S'){
		global $db;
			
		if($s=='S'){
			$sql  = "SELECT * FROM m_category WHERE i_status = '1'";
		}else if($s=='A'){
			$sql  = "SELECT * FROM m_category";
		}
		$rows  = $db->select($sql);
		if(!empty($rows)){
			$arrCategories = array();
			foreach($rows as $row){
				$arrCategories[$row['id']] = $row['vc_name'];
			}
			return $arrCategories;
		}else{
			return false;
		}
	}



	function getAllContractors(){
		global $db;
		$arrContractors = array();
		$sql  = "SELECT * FROM contractor_detail WHERE i_status = '1'";
		$rows  = $db->select($sql);
		if(!empty($rows)){
			foreach($rows as $row){
				$arrContractors[$row['id']] = $row['contractor_name'];
			}
		}
		return $arrContractors;
	}
	
	
	function getContractorWork($i_lot_no,$type){
		global $db;
		$arrContractors = array();
		$sql  = "SELECT b.* FROM m_contractor_work a ,contractor_detail b  WHERE b.id=a.i_contractor_id and  a.i_mark_id='".$i_lot_no."'  and ";
	
	
		if($type ==1)
		{
			$whereCondition=" i_felling=1";
		}
		else if ($type ==2)
		{
			$whereCondition=" i_conversion=1";
		}
	
		else if ($type ==3)
		{
			$whereCondition=" i_carriage=1";
		}
	
		else if ($type ==4)
		{
			$whereCondition=" i_transportation=1";
		}
	
		$rows  = $db->select($sql.$whereCondition);
		if(!empty($rows)){
			foreach($rows as $row){
				$arrContractors[$row['id']] = $row['contractor_name'];
			}
		}
		return $arrContractors;
	}
	
	function getAllContractorsWork(){
		global $db;
		$arrContractors = array();
		$sql  = "SELECT a.*,b.vc_lotno FROM  contractor_detail c, m_contractor_work a ,  c_mark_detail  b  WHERE c.id=a.i_contractor_id and b.id=a.i_mark_id order by contractor_name";
		$rows  = $db->select($sql);
		if(!empty($rows)){
			foreach($rows as $row){
				$arrContractors[$row['id']] = $row;
			}
		}
		return $arrContractors;
	}
	
	
	
	function getAllLots(){
		global $db;
		$arrContractors = array();
		$sql  = "SELECT * FROM `c_mark_detail`";
		$rows  = $db->select($sql);
		if(!empty($rows)){
			foreach($rows as $row){
				$arrContractors[$row['id']] = $row['vc_lotno'];
			}
		}
		return $arrContractors;
	}

	function getAllVolumeTables($fid=0){
		global $db;
		$where="";
		$arrVolumeTables = array();
		if($fid!=0){
			$where='and (i_forest_id=\''.$fid.'\' or i_division_id=\''.$_SESSION['centerKey'].'\')';
		}
		$sql  = "SELECT * FROM m_forest_volume WHERE i_status = '1' ".$where.' order by vc_name';
		$rows  = $db->select($sql);
		if(!empty($rows)){

			foreach($rows as $row){
				$arrVolumeTables[$row['id']] = $row['vc_name'];
			}
			return $arrVolumeTables;
		}else{
			return $arrVolumeTables;
		}
	}

	function checkExistingCategory($id,$name){
		global $db;
		$sql = "SELECT * FROM categories WHERE name = '".$name."' AND id != '".$id."'";
		$row = $db->select($sql);
		if(!empty($row)){
			return true;
		}else{
			return false;
		}
	}

	function checkExistingOption($table,$id,$title){
		global $db;
		$where="";
		if($id!=0){
			$where='and id!=\''.$id.'\'';
		}
		$sql = "SELECT * FROM ".$table." WHERE vc_name = '".$title."'";
			
		$row = $db->select($sql);

		if(!empty($row)){
			return true;
		}else{
			return false;
		}
	}

	function checkExistingTableOption($table,$id,$fId,$i_division_id,$i_department,$title){
		global $db;
		$where="";
		if($id!=0){
			$where='and id!='.$id;
		}
		$sql = "SELECT * FROM ".$table." WHERE i_forest_id = '".$fId."' and i_division_id= '".$i_division_id."' and i_department_id= '".$i_department."' and vc_name='".$title."'";
		echo $sql;
		$row = $db->select($sql);

		if(!empty($row)){
			return true;
		}else{
			return false;
		}
	}

	function checkExistingPriceOption($table,$id,$fId){
		global $db;
		$where="";
		if($id!=0){
			$where='and id!='.$id;
		}
		$sql = "SELECT * FROM ".$table." WHERE i_forest_id = '".$fId."'";

		$row = $db->select($sql);

		if(!empty($row)){
			return true;
		}else{
			return false;
		}
	}


	function checkExistingOverHeadDetail($id){
		global $db;
		$sql = "SELECT * FROM c_mark_detail WHERE id= '".$id."'";
		$row = $db->select($sql);
			
			

		if($row[0]['i_overhead_status']=='1'){
			return true;
		}else{
			return false;
		}
	}

	function checkExistingConvDetail($id){
		global $db;
		$sql = "SELECT * FROM c_mark_detail WHERE id= '".$id."'";
		$row = $db->select($sql);
			
			

		if($row[0]['i_conversion_status']=='1'){
			return true;
		}else{
			return false;
		}
	}

	function getAllDesignations(){
		global $db;
		$sql  = "SELECT * FROM designations WHERE status = 'y'";
		$rows  = $db->select($sql);
		if(!empty($rows)){
			$arrDesignation = array();
			foreach($rows as $row){
				$arrDesignation[$row['id']] = $row['name'];
			}
			return $arrDesignation;
		}else{
			return false;
		}
	}



	function isActive($table,$a_data){
		global $db;
		foreach($a_data as $key=>$value){
			$id	=	$key;
			$status		=	$value;
			if($status == 'Activate'){
				$isActive = 'y';
			}else{
				$isActive = 'n';
			}
			$arFieldValues = array("status"=>$isActive);
			$arConditions  = array("id"=>$id);
			$db->update($table,$arFieldValues,$arConditions);
		}
	}

	function send_mail($email_from , $email_to, $email_subject, $email_txt){
		$headers = "From: " . $email_from . "\n";
		$headers .= "Bcc: " . POSTMASTERS;
		$semi_rand = md5(time());
		$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
		$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: text/html;\n" . " boundary=\"{$mime_boundary}\"";
		$ok = @mail($email_to, $email_subject, $email_txt, $headers);
		if ($ok) {
			return true;
		} else {
			return false;
		}
	}

	function send_mail_attachment ($email_from , $email_to, $email_subject, $email_txt, $attachment){
		$fileatt = $attachment; // Path to the file
		$fileatt_type = "application/octet-stream"; // File Type
		$start = strrpos($attachment, '/') == -1 ? strrpos($attachment, '//') :
		strrpos($attachment, '/')+1;
		$fileatt_name = substr($attachment, $start, strlen($attachment));
		$headers = "From: ".$email_from;
		$file = fopen($fileatt, 'rb');
		$data = fread($file, filesize($fileatt));
		fclose($file);
		$semi_rand = md5(time());
		$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
		$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
		$email_message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type:text/html; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $email_txt . "\n\n";
		$data = chunk_split(base64_encode($data));
		$email_message .= "--{$mime_boundary}\n" . "Content-Type: {$fileatt_type};\n" . " name=\"{$fileatt_name}\"\n" .
		"Content-Transfer-Encoding: base64\n\n" . $data . "\n\n" . "--{$mime_boundary}--\n";
		$ok = @mail($email_to, $email_subject, $email_message, $headers);
		if ($ok) {
			return true;
		}else {
			die("Sorry but the email could not be sent. Please go back and try again!");
		}
	}

	function getMessages($userId){
		global $db;
		$count=0;
		$sql  = "SELECT * FROM messages WHERE is_active = '1'";
		$rows  = $db->select($sql);
		if(!empty($rows)){
			$arrCategory = array();
			foreach($rows as $row){
				$arrResult[$count] = $row;
				$count++;
			}
			return $arrResult;
		}
	}

	function isgreterDate($start_date,$end_date){

		$s_date  = strtotime($start_date);
		$e_date = strtotime($end_date);
		if ($e_date > $s_date) {
			return true;
		}
		else {
			return false;
		}
			
	}

	function getAllTreeType($s='S'){
		global $db;
		if($s=='S'){
			$sql  = "SELECT * FROM m_treetype WHERE i_status = '1'";
		}else if($s=='A'){
			$sql  = "SELECT * FROM m_treetype";
		}
		$rows  = $db->select($sql);
		if(!empty($rows)){
			$arrCategory = array();
			foreach($rows as $row){
				$arrTreeType[$row['id']] = $row['vc_name'];
			}
			return $arrTreeType;
		}else{
			return false;
		}
	}

	function getVolumeTablesForest($tid){
		global $db;
		$where="";
		$arrVolumeTables = array();
		if($tid!=0){
			$where='WHERE  id=\''.$tid.'\'';;
		}
		$sql  = "SELECT id,i_forest_id FROM m_forest_volume ".$where;
		$row  = $db->select($sql);
		if(!empty($row)){

			return        $i_forest_id = $row[0]['i_forest_id'];


		}
	}
	function getVolumeInfo($table,$taid,$trid){
		global $db;
		$arrVolume = array();
		$sql  = "SELECT * FROM ".$table." WHERE i_table_id = '".$taid."' and i_tree_type_id='".$trid."'";
		$rows=$db->select($sql);
		if(!empty($rows)){

			foreach($rows as $row){
					
				$arrVolume[$row['i_category_id']] = $row['volume'];
					
			}

		}
		return $arrVolume;
	}
	function checkExistingVolumeOption($table,$id,$taId,$trId){
		global $db;
		$where="";
		if($trId!='0'){
			$where='and i_tree_type_id=\''.$trId.'\'';
		}
		$sql = "SELECT * FROM ".$table." WHERE i_table_id = '".$taId."' ".$where;

		
		$row = $db->select($sql);
			
		if(!empty($row)){
			return true;
		}else{
			return false;
		}
	}

	function checkExistingTreeTypeOption($table,$id,$title,$dId){
		global $db;
		$where="";
		if($id!='0'){
			$where='and id!=\''.$id.'\'';
		}
		$sql = "SELECT * FROM ".$table." WHERE vc_name = '".$title."' and i_department_id='".$dId.'\'';

		$row = $db->select($sql);

		if(!empty($row)){
			return true;
		}else{
			return false;
		}
	}


	function checkExistingOverEntityOption($table,$id,$title,$dId,$fId){
		global $db;
		$where="";
		if($id!='0'){
			$where='and id!=\''.$id.'\'';
		}
		echo $sql = "SELECT * FROM ".$table." WHERE vc_name = '".$title."' and i_department_id='".$dId."' and i_forest_id='".$fId."'" ;

		$row = $db->select($sql);

		if(!empty($row)){
			return true;
		}else{
			return false;
		}
	}


	function getTimberNList($s='S'){
		global $db;
		if($s=='S'){
			$sql = "SELECT * FROM m_timber where i_status=1";
		}else if($s=='A'){
			$sql = "SELECT * FROM m_timber";
		}
		$rows= $db->select($sql);
		if(!empty($rows)){
			$TimberNList = array();
			foreach($rows as $row){
				$TimberNList[$row['id']] = $row['vc_name'];

			}
			return $TimberNList;
		}else{
			return false;
		}
	}

	function checkExistingCategoryTimber($i_forest_id,$i_category_id,$i_timber_id ){
		global $db;
		$where="";
		if($id!='0'){
			$where='and id!=\''.$id.'\'';
		}
		$sql = "SELECT * FROM c_category_timber WHERE i_forest_id = '".$i_forest_id."' and i_category_id = '".$i_category_id."' and i_timber_id = '".$i_timber_id."' ";

		$row = $db->select($sql);

		if(!empty($row)){
			return true;
		}else{
			return false;
		}
	}

	function checkExistingConversionFilling($i_forest_id,$i_category_id){
		global $db;
		$where="";
		if($id!='0'){
			$where='and id!=\''.$id.'\'';
		}
		$sql = "SELECT * FROM c_conversion_felling WHERE i_forest_id = '".$i_forest_id."' and i_category_id = '".$i_category_id."' ";

		$row = $db->select($sql);

		if(!empty($row)){
			return true;
		}else{
			return false;
		}
	}

	function getConversionInfo($table,$fid){
		global $db;
		$arrValue = array();
		$sql  = "SELECT * FROM ".$table." WHERE i_forest_id = '".$fid."'";

		$rows=$db->select($sql);
		if(!empty($rows)){

			foreach($rows as $row){
					
				$arrValue[$row['i_category_id']]= $row;
					
			}

		}
		return $arrValue;
	}
	function getProgressChargesInfo($table,$id){
		global $db;
		$arrValue = array();
		$sql  = "SELECT * FROM ".$table." WHERE 	i_progress_id = '".$id."'";

		$rows=$db->select($sql);
		if(!empty($rows)){

			foreach($rows as $row){
					
				$arrValue[$row['i_category_id']]= $row;
					
			}

		}
		return $arrValue;
	}
	function updateEcmonicsDetails( $markId,$ecnomicsId)
	{
		//return;

		$sql  = "update r_tree_category a, ecnomics_category_conversion b  set a.i_ecnomics_pesentage =b.i_value
		         where a.i_category_id =b.i_category_id	 and b.i_mark_id =a.i_mark_detail_id  and 
	   			 a.i_tree_id=b.i_tree_id and b.i_mark_id='".$markId."' and b.i_ecnomics_master_id='".$ecnomicsId."'";
		$hRes = mysql_query($sql);
		if(!$hRes){
			$err = mysql_error($this->hConn).$sql;
			throw new Exception($err);
		}


		$sql  = "update c_marked_volume a, ecnomics_category_conversion b set a.i_economics_conversion =b.i_value ,i_economics_volume=i_tree_volume*(b.i_value/100)
				 
				where a.i_category_id =b.i_category_id	 and b.i_mark_id =a.i_mark_id and
	   			a.i_tree_id=b.i_tree_id and  a.i_mark_id='".$markId."'  and b.i_ecnomics_master_id='".$ecnomicsId."'";
		$hRes = mysql_query($sql);

		$sql  = "update c_marked_volume a,ecnomics_category_felling c set  a.i_felling_charges=c.i_felling_charges ,a.i_conversion_charges=c.i_conversion_charges
		where 
		     a.i_mark_id =c.i_mark_id and c.i_category_id =a.i_category_id and  a.i_mark_id='".$markId."'   and  c.i_ecnomics_master_id='".$ecnomicsId."'";
		$hRes = mysql_query($sql);


		;
		if(!$hRes){
			$err = mysql_error($this->hConn).$sql;
			throw new Exception($err);
		}
		//return mysql_affected_rows();
		return mysql_affected_rows();

	}


	function insertDefaultEcnomicsConversion($forestID,$markDetailId,$ecnomicsId)
	{

		return;
		global $db;

		$result=$this->getDetailInfo('ecnomics_category_conversion','i_ecnomics_master_id',$ecnomicsId);
		if($result != '' && ! count($result) > 0)
		{
			$ctegoryDetail=$this->getDetailInfo('c_conversion_felling','i_forest_id',$forestID);
			foreach($ctegoryDetail as $category){
				$ecnomics_category_felling['i_mark_id']=$markDetailId;
				$ecnomics_category_felling['i_forest_id']=$forestID;
				$ecnomics_category_felling['i_category_id']=$category['i_category_id'];
				$ecnomics_category_felling['i_value']=$category['i_conversion'];
				$ecnomics_category_felling['i_status']= 0;
				$ecnomics_category_felling['i_ecnomics_master_id']= $ecnomicsId;
				$id = $db->insert('ecnomics_category_conversion',$ecnomics_category_felling);
			}
		}
	}

	function insertDefaultEcnomicsProduct($forestID,$markDetailId,$ecnomicsId)
	{

		return;
		global $db;
		$result=$this->getDetailInfo('ecnomics_category_timber','i_ecnomics_master_id',$ecnomicsId);

		if($result != '' && ! count($result) > 0)
		{
			$timberDO =  new TimberDO();
			$unitPriceValue =$timberDO->getTimberPriceDefault($forestID);
			$timberCatDetail=$timberDO->getTimberCategoryDetail($forestID);
			$timberlist=$timberDO->getTimberList();
			$ctegoryDetail=$this->getDetailInfo('c_conversion_felling','i_forest_id',$forestID);
			foreach($ctegoryDetail as $category){
				$catid=$category['i_category_id'];
				foreach($timberlist as $timberDetail){
					$ecnomics_category_timber['i_mark_id']=$markDetailId;
					$ecnomics_category_timber['i_forest_id']=$forestID;
					$ecnomics_category_timber['i_category_id']=$catid;
					$ecnomics_category_timber['i_timber_id']=$timberDetail->id;
					$ecnomics_category_timber['i_value']=$timberCatDetail[$category['i_category_id']][$timberDetail->id]['i_value'];
					$ecnomics_category_timber['i_status']= 0;
					$ecnomics_category_timber['i_ecnomics_master_id']= $ecnomicsId;
					$id = $db->insert('ecnomics_category_timber',$ecnomics_category_timber);
				}
			}
		}

	}
	function insertDefaultEcnomicsCharges($forestID,$markDetailId,$ecnomicsId)
	{

		return;
		global $db;
		$result=$this->getDetailInfo('ecnomics_category_felling','i_ecnomics_master_id',$ecnomicsId);
		if($result != '' && ! count($result) > 0)
		{
			$ctegoryDetail=$this->getDetailInfo('c_conversion_felling','i_forest_id',$forestID);
			foreach($ctegoryDetail as $category){
				$ecnomics_category_felling['i_mark_id']=$markDetailId;
				$ecnomics_category_felling['i_forest_id']=$forestID;
				$ecnomics_category_felling['i_category_id']=$category['i_category_id'];
				$ecnomics_category_felling['i_felling_charges']=$category['i_felling_charges'];
				$ecnomics_category_felling['i_conversion_charges']=$category['i_conversion_charges'];
				$ecnomics_category_felling['i_status']= 0;
				$ecnomics_category_felling['i_ecnomics_master_id']= $ecnomicsId;
				$id = $db->insert('ecnomics_category_felling',$ecnomics_category_felling);
			}
		}
	}
	function insertDefaultEcnomicsOverHeadCharges($forestID,$markDetailId,$ecnomicsId)
	{

		return;
		global $db;
		$result=$this->getDetailInfo('ecnomics_overhead','i_ecnomics_master_id',$ecnomicsId);
		if($result != '' && ! count($result) > 0)
		{
			$sql="insert into  ecnomics_overhead
      		SELECT 0,".$ecnomicsId.",'','',id,vc_value,0,".$markDetailId.",1,1 FROM m_overhead_entities 
			where i_status = '1'  and i_department_id in (select i_department_id from m_forest where id='".$forestID."') ";
				
			$hRes = mysql_query($sql);
			if(!$hRes){
				$err = mysql_error($db->hConn).$sql;
				throw new Exception($err);
			}
			return mysql_affected_rows();
		}
	}


	function getValueInfo($table,$fid,$cid){
		global $db;
		$arrValue = array();
		$sql = "SELECT * FROM ".$table." WHERE i_forest_id = '".$fid."' and i_category_id='".$cid."'";
		$rows=$db->select($sql);
		if(!empty($rows)){

			foreach($rows as $row){
				$arrValue[$row['i_timber_id']]= $row['i_value'];
			}
		}
		return $arrValue;
	}
	function getTreePrice($table,$fid){
		global $db;
		$arrValue = array();
		$sql = "SELECT * FROM ".$table." WHERE i_forest_id = '".$fid."'";
		$rows=$db->select($sql);
		if(!empty($rows)){
			foreach($rows as $row){
				$arrValue[$row['i_tree_id']]= $row['price'];
			}
		}
		return $arrValue;
	}

	function getTimberPrice($table,$fid){
		global $db;
		$arrValue = array();
		$sql = "SELECT * FROM ".$table." WHERE i_forest_id = '".$fid."'";
		$rows=$db->select($sql);
		if(!empty($rows)){
			foreach($rows as $row){
				$arrValue[$row['i_timber_id']]= $row['price'];
			}
		}
		return $arrValue;
	}

	function getAllTimbers(){
		global $db;
		$sql = "SELECT * FROM m_timber WHERE i_status = '1'";
		$rows = $db->select($sql);
		if(!empty($rows)){
			$arrTrees = array();
			foreach($rows as $row){
				$arrTrees[$row['id']] = $row['vc_name'];
			}
			return $arrTrees;
		}else{
			return false;
		}
	}

	function checkExistingEcnomics($i_mark_id){
		global $db;
	 if($_SESSION['economicsincpontext']=='N')
		{
			$sql = "SELECT * FROM economics_master WHERE i_mark_id = '".$i_mark_id."' AND id in (select max(id1) FROM economics_master WHERE i_mark_id = '".$i_mark_id."' )";
		;
		}
		else
		{
			$sql = "SELECT * FROM economics_master WHERE id = '".$_SESSION['economicsincpontext']."'";
				
		}
		$row = $db->select($sql);
		if(!empty($row)){
			return $row[0];
		}else{
			return "";
		}
		
		
	}

	function checkExistingEcnomicsUpdate($i_mark_id){
		global $db;

	
		if($_SESSION['economicsincpontext']=='N')
		{
			$sql = "SELECT * FROM economics_master WHERE i_mark_id = '".$i_mark_id."' AND date(dt_createDate ) = date(now())";
			;
		}
		else
		{
			$sql = "SELECT * FROM economics_master WHERE id = '".$_SESSION['economicsincpontext']."'";
				
		}

		$row = $db->select($sql);

		if(!empty($row)){
			return $row[0];
		}else{
			return "";
		}

	}

	function getEcnomicsMaster($i_mark_id)
	{
		global $db;
		
		if($_SESSION['economicsincpontext']=='N')
		{
			$sql = "SELECT * FROM economics_master WHERE i_mark_id = '".$i_mark_id."'  order by dt_createDate desc limit 1 ";
			
		}
		else
		{
			$sql = "SELECT * FROM economics_master WHERE id = '".$_SESSION['economicsincpontext']."'";
			
		}
			$row = $db->select($sql);
			if(!empty($row)){
				return $row[0];
			}else{
				return "";
			}
		

	}

	function extractTempDataEconimics($fromTable,$toTable,$wherCondition,$ecnomicsId)
	{
		global $db;

		$arrCondition = array('i_ecnomics_master_id'=>$ecnomicsId);
		$db->delete($fromTable,$arrCondition);
		$sql = "insert into  ".$fromTable."  select * from  ".$toTable.' '.$wherCondition;
		$result= mysql_query($sql) or die("Exception in Ecomics during fetching Forest Master Data");
	}


	function getEcnomicsDateSelect($i_mark_id)
	{
		global $db;
		$sql = "SELECT id,date(dt_createDate) as  dt_createDate FROM economics_master WHERE i_mark_id = '".$i_mark_id."'  order by dt_createDate desc ";
		$row = $db->select($sql);

		if(count($row) == 0 )
		{
			return "";
		}
		return $row;

	}
	function generateSelectList($i_mark_id,$economicsId)
	{
		$selectList=$this->getEcnomicsDateSelect($i_mark_id);
		count($selectList);
		$selectdetail="<select name='i_ecnomics_master_id' id='i_ecnomics_master_id' onChange='submitForm(this.form)'>";
		foreach($selectList as $detail){
			if($economicsId ==$detail['id'])
			$selectdetail.="<option selected=selected value='".$detail['id']."'>";
			else
			$selectdetail.="<option value='".$detail['id']."'>";
				
			$selectdetail.=$detail['dt_createDate'];
			$selectdetail.="</option>";

		}
		$selectdetail.="</select>";
		echo $selectdetail;

	}
	function generateSelectListCreation($i_mark_id,$economicsId)
	{
		$selectList=$this->getEcnomicsDateSelect($i_mark_id);
		count($selectList);
		$selectdetail="<select name='i_ecnomics_master_id' id='i_ecnomics_master_id' onChange='submitForm(this.form)'>";
		$selectdetail.="<option selected=selected value='N'>-----Select---- </option>";
		foreach($selectList as $detail){
			if($economicsId ==$detail['id'])
			$selectdetail.="<option  value='".$detail['id']."'>";
			else
			$selectdetail.="<option value='".$detail['id']."'>";

			$selectdetail.=$detail['dt_createDate'];
			$selectdetail.="</option>";
			
		}
		$selectdetail.="<option value='N'>Create New </option>";
		$selectdetail.="</select>";
		echo $selectdetail;

	}
	function generateSelectTreeList($i_mark_id,$i_tree_id)
	{
		$markDetail =  new MarkDetailDO();
		$selectList=$markDetail->getMarkedTreesOnly($i_mark_id);


		//$selectList=$this->getEcnomicsDateSelect($i_mark_id);

		$selectdetail="<select name='i_tree_id' id='i_tree_id' onChange='submitForm(this.form)'>";
		$selectdetail.="<option  value=''> Select Tree</option>";
		foreach($selectList as  $detail=>$name){
				
			if($i_tree_id ==$detail)
			$selectdetail.="<option selected=selected value='".$detail."'>";
			else
			$selectdetail.="<option value='".$detail."'>";

			$selectdetail.=$name;
			$selectdetail.="</option>";

		}
		$selectdetail.="</select>";
		echo $selectdetail;

	}

	function generateForm ($pageKey,$markDetailId,$economicsId)
	{


		?>
<form method="post"
	action="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo $pageKey;?>&markId=<?php echo $markDetailId;?>"><input
	type='hidden' value='<?php echo $markDetailId?>' id='markid'
	name='markid' />
<center>
<table style="width: 250px">
	<tr>
		<td style="vertical-align: text-top;">Economics as Generated on</td>
		<td style="vertical-align: text-top;"><?php 
		$this->generateSelectList($markDetailId,$economicsId);
		?></td>
	</tr>
</table>
</center>
</form>
<script>
				
				function submitForm(form)
				{
					form.submit();
				}
				</script>
		<?php
	}

	function generateFormCreation (	$pageKey,$markDetailId,$economicsId)
	{


		?>
<form method="post"
	action="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo $pageKey;?>&markId=<?php echo $markDetailId;?>"><input
	type='hidden' value='<?php echo $markDetailId?>' id='markid'
	name='markid' />
<center>
<table style="width: 250px">
	<tr>
		<td style="vertical-align: text-top;">Economics as Generated on</td>
		<td style="vertical-align: text-top;"><?php 
		$this->generateSelectListCreation($markDetailId,$economicsId);
		?></td>
	</tr>
</table>
</center>
</form>
<script>
				
				function submitForm(form)
				{
					form.submit();
				}
				</script>
		<?php
	}
	function generateFormTreeForm ($pageKey,$markDetailId,$i_tree_id)
	{
		$i_tree_id=($i_tree_id=='0' ? ' ':$i_tree_id); 

		?>
<form method="post"
	action="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo $pageKey;?>&markId=<?php echo $markDetailId;?>">
<input type='hidden' value='<?php echo $markDetailId?>' id='markid'
	name='markid' /> <input type='hidden'
	value='<?php echo $markDetailId?>' id='onlyTree' name='onlyTree' />
<center>
<table style="width: 250px">
	<tr>
		<td style="vertical-align: text-top;">Select Tree</td>
		<td style="vertical-align: text-top;"><?php
		$this->generateSelectTreeList($markDetailId,$i_tree_id);
		?></td>
	</tr>
</table>
</center>
</form>
<script>
	
	function submitForm(form)
	{
	form.submit();
	}
	</script>
		<?php
	}


	function updateProductDetails( $markId,$ecnomicsId,$timber_id)
	{

     
		$sql  = "update c_marked_volume a, ecnomics_category_timber_temp  b  set a.i_product_persentage =b.i_value
				  where a.i_category_id =b.i_category_id and b.i_mark_id =a.i_mark_id
	   			  and b.i_tree_id=a.i_tree_id and b.i_timber_id='".$timber_id."'  and b.i_ecnomics_master_id='".$ecnomicsId."'";


		$hRes = mysql_query($sql);

		if(!$hRes){
			$err = mysql_error($this->hConn).$sql;
			throw new Exception($err);
		}
		//return mysql_affected_rows();
		return mysql_affected_rows();

	}

	function getAllForestPoints($markdId){
		global $db;
		$arrContractors = array();
		$sql  = "SELECT * FROM m_forest_points WHERE i_status = '1'
		         and (i_forest_id='-1' or  i_forest_id  in  (select i_forest_id  from c_mark_detail where id ='".$markdId."'))
		         order by  vc_name
		         ";
		$rows  = $db->select($sql);
		if(!empty($rows)){
			foreach($rows as $row){
				$arrContractors[$row['id']] = $row['vc_name'];
			}
		}
		return $arrContractors;
	}

	function getAllForestPointsonType($markdId,$type){
		global $db;
		$arrContractors = array();
		$sql  = "SELECT * FROM m_forest_points WHERE i_status = '1'
		and i_type='".$type."'  and  (i_forest_id ='-1' or i_forest_id  in 
		 (select i_forest_id  from c_mark_detail where id ='".$markdId."'))
		order by  vc_name
		";
		$rows  = $db->select($sql);
		if(!empty($rows)){
			foreach($rows as $row){
				$arrContractors[$row['id']] = $row['vc_name'];
			}
		}
		return $arrContractors;
	}

	function getForestExitPoints($markdId,$treeId){
		global $db;
		$arrContractors = array();
		$sql  = "SELECT * FROM m_forest_points WHERE i_status = '1'
		         and i_forest_id  in  (select i_forest_id  from c_mark_detail where id ='".$markdId."')
		         and id  in (select vc_destination from progress_transportation_detail
		            where i_tree_id='".$treeId."' and i_progress_id in ( select id from progress_transportation_master where 
		            i_mark_id  ='".$markdId."'))order by  vc_name
		         ";

		$rows  = $db->select($sql);
		if(!empty($rows)){
			foreach($rows as $row){
				$arrContractors[$row['id']] = $row['vc_name'];
			}
		}
		return $arrContractors;
	}

	function getForestEntryPoints($markdId,$treeId,$vc_month,$vc_year,$i_timber_id,$i_timbertype_id){
		global $db;
		$arrContractors = array();
		$sql  = "SELECT * FROM m_forest_points WHERE i_status = '1'
		         and (i_forest_id=-1 or i_forest_id  in  (select i_forest_id  from c_mark_detail where id ='".$markdId."'))
		         and id  in ( select vc_destination from 
		         (select vc_destination from progress_transportation_detail
		         where   i_exit  != 1 and i_tree_id='".$treeId."' and i_progress_id in ( select id from progress_transportation_master where 
		          i_mark_id  ='".$markdId."' and vc_month<='".$vc_month."' and vc_year='".$vc_year."' )
		          and i_timber_id='".$i_timber_id."' and i_timber_type_id='".$i_timbertype_id."'
		            

		          UNION 
		          
		          select vc_destination from opening_progress_transportation_detail
		         where   i_exit  != 1 and i_tree_id='".$treeId."' and i_progress_id in ( select id from opening_progress_transportation_master where 
		          i_mark_id  ='".$markdId."'  )
		          and i_timber_id='".$i_timber_id."' and i_timber_type_id='".$i_timbertype_id."' )as tbl
		          		          
		          )";
		
		$rows  = $db->select($sql);
		if(!empty($rows)){
			foreach($rows as $row){
				$arrContractors[$row['id']] = $row['vc_name'];
			}
		}
		return $arrContractors;
	}


	function getForestEntryPointsEco($markdId,$treeId,$vc_month,$vc_year,$i_timber_id,$i_timbertype_id,$ecnomicsId){
		global $db;
		$arrContractors = array();
		$sql  = "SELECT * FROM m_forest_points WHERE i_status = '1'
		and (i_forest_id=-1 or i_forest_id  in  (select i_forest_id  from c_mark_detail where id ='".$markdId."'))
		and id  in (
		select vc_destination from ecnomics_transportation_detail
		where   i_exit  != 1 and i_tree_id='".$treeId."' and i_ecnomics_master_id ='".$ecnomicsId."'
		and i_timber_id='".$i_timber_id."' and i_timber_type_id='".$i_timbertype_id."'
		)";
		$rows  = $db->select($sql);
		if(!empty($rows)){
			foreach($rows as $row){
				$arrContractors[$row['id']] = $row['vc_name'];
			}
		}
		return $arrContractors;
	}


	function getForestEntryPointsEcoRSD($markdId,$treeId,$vc_month,$vc_year,$i_timber_id,$i_timbertype_id,$ecnomicsId){
		global $db;
		$arrContractors = array();
		$sql  = "SELECT * FROM m_forest_points WHERE i_status = '1'
		and (i_forest_id=-1 or i_forest_id  in  (select i_forest_id  from c_mark_detail where id ='".$markdId."'))
		and (id  in (
		select vc_destination from ecnomics_transportation_detail
		where   i_exit  = 1 and i_tree_id='".$treeId."' and i_ecnomics_master_id ='".$ecnomicsId."'
		and i_timber_id='".$i_timber_id."' and i_timber_type_id='".$i_timbertype_id."'
		) 
		OR id  in (
		select vc_destination from ecnomics_transportation_detail_RSD
		where   i_exit  != 1 and i_tree_id='".$treeId."' and i_ecnomics_master_id ='".$ecnomicsId."'
		and i_timber_id='".$i_timber_id."' and i_timber_type_id='".$i_timbertype_id."'
		))"
		;
		$rows  = $db->select($sql);
		if(!empty($rows)){
			foreach($rows as $row){
				$arrContractors[$row['id']] = $row['vc_name'];
			}
		}
		return $arrContractors;
	}
	function getForestEntryPointsRSD($markdId,$treeId,$vc_month,$vc_year,$i_timber_id,$i_timbertype_id){
		global $db;
		$arrContractors = array();
		$sql  = "SELECT * FROM m_forest_points WHERE i_status = '1'
		and i_type  in (1,2) and (i_forest_id='-1' or i_forest_id  in  (select i_forest_id  from c_mark_detail where id ='".$markdId."'))
		and id  in (
		select vc_destination from progress_transportation_detail
		where    i_exit  = 1 and i_tree_id='".$treeId."' and i_progress_id in ( select id from progress_transportation_master where
		i_mark_id  ='".$markdId."'
		and i_timber_id='".$i_timber_id."' and i_timber_type_id='".$i_timbertype_id."'
		and vc_month<='".$vc_month."' and vc_year <= '".$vc_year."'))";
		$rows  = $db->select($sql);
		if(!empty($rows)){
			foreach($rows as $row){
				$arrContractors[$row['id']] = $row['vc_name'];
			}
		}
		return $arrContractors;
	}

	function generateSelectListAjax($markdId,$treeId,$month,$year,$i_timber_id,$i_timbertype_id){



		$leftFromForest=$this->getFromForestLeft($markdId,$treeId,$i_timber_id,$i_timbertype_id);


		$markDetail =  new MarkDetailDO();
		$progressConversion =$markDetail->getProgressConversionTreeWiseTimberWise($markdId,$i_timber_id,$i_timbertype_id);



		$treeForestVolume=$progressConversion[$treeId];


		$forestIEntryId=array();
		$entryPointList=$this->getForestEntryPoints($markdId,$treeId,$month,$year,$i_timber_id,$i_timbertype_id);
		if((display_float($treeForestVolume['i_count']) -$leftFromForest ) > 0)
		{
			$entryPointList[-1]='Forest';
		}
		echo  makeSelectOptions($entryPointList,"fromPoint",$i_contractor_id,"fetchVolumeAvailable",100,"");
	}




	function generateSelectListAjaxEco($markdId,$treeId,$month,$year,$i_timber_id,$i_timbertype_id){


	  
		$existing=$this->checkExistingEcnomics($markdId);


		if($existing =='' )
		{
			$economics_master['i_mark_id']=$markdId;
			$ecnomicsId = $db->insert('economics_master',$economics_master);
		}
		else
		{
			$ecnomicsId=$existing['id'];
		}



		$leftFromForest=$this->getFromForestLeftEco($markdId,$treeId,$i_timber_id,$i_timbertype_id,$ecnomicsId);
		$markDetail =  new MarkDetailDO();
		$progressConversion =$markDetail->getProgressConversionTreeWiseTimberWiseEco($markdId,$i_timber_id,$i_timbertype_id,$ecnomicsId);
		$treeForestVolume=$progressConversion[$treeId];
		$forestIEntryId=array();
		$entryPointList=$this->getForestEntryPointsEco($markdId,$treeId,$month,$year,$i_timber_id,$i_timbertype_id,$ecnomicsId);
		if((display_float($treeForestVolume['i_count']) -$leftFromForest ) > 0)
		{
			$entryPointList[-1]='Forest';
		}
		echo  makeSelectOptions($entryPointList,"fromPoint",$i_contractor_id,"fetchVolumeAvailable",100,"");
	}


	function generateSelectListAjaxEcoRSD($markdId,$treeId,$month,$year,$i_timber_id,$i_timbertype_id){


		$existing=$this->checkExistingEcnomics($markdId);
		if($existing =='' )
		{
			$economics_master['i_mark_id']=$markdId;
			$ecnomicsId = $db->insert('economics_master',$economics_master);
		}
		else
		{
			$ecnomicsId=$existing['id'];
		}

		$forestIEntryId=array();
		$entryPointList=$this->getForestEntryPointsEcoRSD($markdId,$treeId,$month,$year,$i_timber_id,$i_timbertype_id,$ecnomicsId);

		echo  makeSelectOptions($entryPointList,"fromPoint",$i_contractor_id,"fetchVolumeAvailable",100,"");
	}


	function generateSelectListAjaxRSD($markdId,$treeId,$month,$year,$i_timber_id,$i_timbertype_id){



		$leftFromForest=0;


		$markDetail =  new MarkDetailDO();



		$forestIEntryId=array();
		$entryPointList=$this->getForestEntryPointsRSD($markdId,$treeId,$month,$year,$i_timber_id,$i_timbertype_id);
		if((display_float($treeForestVolume['i_count']) -$leftFromForest ) > 0)
		{
			$entryPointList[-1]='Forest';
		}
		echo  makeSelectOptions($entryPointList,"fromPoint",$i_contractor_id,"fetchVolumeAvailable",100,"");
	}

	function generateSelectForTimber($markId,$treeId)
	{
		global $db;
		$sql  = " SELECT distinct i_timber_id,timberName	 FROM 
					(SELECT distinct i_timber_id,b.vc_name as timberName	 FROM 	progress_conversion_detail a, m_timber b   WHERE
		             a.i_timber_id=b.id and i_progress_id  in (select id  from progress_conversion_master		where i_mark_id  ='".$markId."') and 	i_tree_id ='".$treeId."'
		            UNION 
		            SELECT distinct i_timber_id,b.vc_name as timberName	 FROM 	opening_progress_conversion_detail a, m_timber b   WHERE
		              a.i_timber_id=b.id and i_progress_id  in (select id  from opening_progress_conversion_master		where i_mark_id  ='".$markId."') and 	i_tree_id ='".$treeId."'           
 					UNION 
		            SELECT distinct i_timber_id,b.vc_name as timberName	 FROM 	opening_progress_transportation_detail a, m_timber b   WHERE
		              a.i_timber_id=b.id and i_progress_id  in (select id  from opening_progress_transportation_master		where i_mark_id  ='".$markId."') and 	i_tree_id ='".$treeId."'           
				    
		              ) as tbl  order by timberName	";
		
		
		$rows  = $db->select($sql);
		$selectStur='<select name="i_timber_id" id="i_timber_id" onChange="populateTimberType(this.value,\''.$markId.'\',\''.$treeId.'\')">';
		$selectStur.="<option value=''>" ;
		$selectStur.='..Select..';
		$selectStur.="</option>";

		if(!empty($rows)){
			foreach($rows as $row){

				$selectStur.="<option value='".$row['i_timber_id']."'>" ;
				$selectStur.=$row['timberName'];
				$selectStur.="</option>";
			}
		}
		$selectStur.="</select>";

		return $selectStur;
	}

	function generateSelectForTimberEco($markId,$treeId)
	{
		global $db;

		$existing=$this->checkExistingEcnomics($markId);


		if($existing =='' )
		{
			$economics_master['i_mark_id']=$markId;
			$ecnomicsId = $db->insert('economics_master',$economics_master);
		}
		else
		{
			$ecnomicsId=$existing['id'];
		}


		$sql  = "SELECT distinct i_timber_id,b.vc_name as timberName	 FROM
				 ecnomics_conversion_detail a,
				 m_timber b
				 WHERE
				a.i_timber_id=b.id and
				i_ecnomics_master_id  ='".$ecnomicsId."'
				and 	i_tree_id ='".$treeId."'
				order by timberName
				";
		$rows  = $db->select($sql);
		$selectStur='<select name="i_timber_id" id="i_timber_id" onChange="populateTimberType(this.value,\''.$markId.'\',\''.$treeId.'\')">';
		$selectStur.="<option value=''>" ;
		$selectStur.='..Select..';
		$selectStur.="</option>";

		if(!empty($rows)){
			foreach($rows as $row){

				$selectStur.="<option value='".$row['i_timber_id']."'>" ;
				$selectStur.=$row['timberName'];
				$selectStur.="</option>";
			}
		}
		$selectStur.="</select>";

		return $selectStur;
	}



	function generateSelectForTimberEcoRSD($markId,$treeId)
	{
		global $db;

		$existing=$this->checkExistingEcnomics($markId);


		if($existing =='' )
		{
			$economics_master['i_mark_id']=$markId;
			$ecnomicsId = $db->insert('economics_master',$economics_master);
		}
		else
		{
			$ecnomicsId=$existing['id'];
		}


		$sql  = "SELECT distinct i_timber_id,b.vc_name as timberName	 FROM
		ecnomics_transportation_detail a,
		m_timber b
		WHERE
		a.i_timber_id=b.id and
		i_ecnomics_master_id  ='".$ecnomicsId."'
		and 	i_tree_id ='".$treeId."'
		and i_exit=1
		order by timberName
		";
		$rows  = $db->select($sql);
		$selectStur='<select name="i_timber_id" id="i_timber_id" onChange="populateTimberType(this.value,\''.$markId.'\',\''.$treeId.'\')">';
		$selectStur.="<option value=''>" ;
		$selectStur.='..Select..';
		$selectStur.="</option>";

		if(!empty($rows)){
			foreach($rows as $row){

				$selectStur.="<option value='".$row['i_timber_id']."'>" ;
				$selectStur.=$row['timberName'];
				$selectStur.="</option>";
			}
		}
		$selectStur.="</select>";

		return $selectStur;
	}
	function generateSelectForTimberOpening($markId,$treeId)
	{
		global $db;
		$sql  = "SELECT distinct id as i_timber_id,b.vc_name as timberName	 FROM
		
		m_timber b
		order by timberName
		";
		$rows  = $db->select($sql);
		$selectStur='<select name="i_timber_id" id="i_timber_id" onChange="populateTimberType(this.value,\''.$markId.'\',\''.$treeId.'\')">';
		$selectStur.="<option value=''>" ;
		$selectStur.='..Select..';
		$selectStur.="</option>";

		if(!empty($rows)){
			foreach($rows as $row){

				$selectStur.="<option value='".$row['i_timber_id']."'>" ;
				$selectStur.=$row['timberName'];
				$selectStur.="</option>";
			}
		}
		$selectStur.="</select>";

		return $selectStur;
	}
	function generateSelectForTimberType($markId,$treeId,$timberId)
	{
		global $db;
		$sql  = "SELECT distinct i_timber_type_id,timberName FROM  (SELECT distinct i_timber_type_id,b.vc_name as timberName	 FROM 	progress_conversion_detail a,m_timber_type b	WHERE
				 a.i_timber_type_id=b.id and a.i_timber_id='".$timberId."' and 	i_progress_id  in	(select id  from progress_conversion_master
				 where i_mark_id  ='".$markId."') and 	i_tree_id ='".$treeId."'
				 UNION 
				 SELECT distinct i_timber_type_id,b.vc_name as timberName	 FROM 	opening_progress_conversion_detail a,m_timber_type b	WHERE
				 a.i_timber_type_id=b.id and a.i_timber_id='".$timberId."' and 	i_progress_id  in	(select id  from opening_progress_conversion_master
				 where i_mark_id  ='".$markId."') and 	i_tree_id ='".$treeId."'
				 UNION 
				 SELECT distinct i_timber_type_id,b.vc_name as timberName	 FROM 	opening_progress_transportation_detail a,m_timber_type b	WHERE
				 a.i_timber_type_id=b.id and a.i_timber_id='".$timberId."' and 	i_progress_id  in	(select id  from opening_progress_transportation_master
				 where i_mark_id  ='".$markId."') and 	i_tree_id ='".$treeId."'
				 ) as tbs order by timberName
		";
		
		$rows  = $db->select($sql);
		$selectStur='<select name="i_timberType_id" id="i_timberType_id"  onChange="loadSelectEntryPoints(this.value,\''.$markId.'\',\''.$treeId.'\',\''.$timberId.'\')">';
		$selectStur.="<option value=''>" ;
		$selectStur.='..Select..';
		$selectStur.="</option>";

		if(!empty($rows)){
			foreach($rows as $row){

				$selectStur.="<option value='".$row['i_timber_type_id']."'>" ;
				$selectStur.=$row['timberName'];
				$selectStur.="</option>";
			}
		}
		$selectStur.="</select>";

		return $selectStur;
	}
	function generateSelectForTimberTypeEco($markId,$treeId,$timberId)
	{
		global $db;


		$existing=$this->checkExistingEcnomics($markId);


		if($existing =='' )
		{
			$economics_master['i_mark_id']=$markId;
			$ecnomicsId = $db->insert('economics_master',$economics_master);
		}
		else
		{
			$ecnomicsId=$existing['id'];
		}

		$sql  = "SELECT distinct i_timber_type_id,b.vc_name as timberName	 FROM
				ecnomics_conversion_detail a,
				m_timber_type b
				WHERE
				a.i_timber_type_id=b.id and a.i_timber_id='".$timberId."' and
				i_ecnomics_master_id  ='".$ecnomicsId."'
				and 	i_tree_id ='".$treeId."'
				order by timberName
		";
		$rows  = $db->select($sql);
		$selectStur='<select name="i_timberType_id" id="i_timberType_id"  onChange="loadSelectEntryPoints(this.value,\''.$markId.'\',\''.$treeId.'\',\''.$timberId.'\')">';
		$selectStur.="<option value=''>" ;
		$selectStur.='..Select..';
		$selectStur.="</option>";

		if(!empty($rows)){
			foreach($rows as $row){

				$selectStur.="<option value='".$row['i_timber_type_id']."'>" ;
				$selectStur.=$row['timberName'];
				$selectStur.="</option>";
			}
		}
		$selectStur.="</select>";

		return $selectStur;
	}

	function generateSelectForTimberTypeEcoRSD($markId,$treeId,$timberId)
	{
		global $db;


		$existing=$this->checkExistingEcnomics($markId);


		if($existing =='' )
		{
			$economics_master['i_mark_id']=$markId;
			$ecnomicsId = $db->insert('economics_master',$economics_master);
		}
		else
		{
			$ecnomicsId=$existing['id'];
		}

		$sql  = "SELECT distinct i_timber_type_id,b.vc_name as timberName	 FROM
		ecnomics_transportation_detail a,
		m_timber_type b
		WHERE
		a.i_timber_type_id=b.id and a.i_timber_id='".$timberId."' and
		i_ecnomics_master_id  ='".$ecnomicsId."'
		and 	i_tree_id ='".$treeId."'
		order by timberName
		";
		$rows  = $db->select($sql);
		$selectStur='<select name="i_timberType_id" id="i_timberType_id"  onChange="loadSelectEntryPoints(this.value,\''.$markId.'\',\''.$treeId.'\',\''.$timberId.'\')">';
		$selectStur.="<option value=''>" ;
		$selectStur.='..Select..';
		$selectStur.="</option>";

		if(!empty($rows)){
			foreach($rows as $row){

				$selectStur.="<option value='".$row['i_timber_type_id']."'>" ;
				$selectStur.=$row['timberName'];
				$selectStur.="</option>";
			}
		}
		$selectStur.="</select>";

		return $selectStur;
	}
	function generateSelectForTimberTypeOpening($markId,$treeId,$timberId)
	{
		global $db;
		$sql  = "SELECT distinct b.id as i_timber_type_id,b.vc_name as timberName	 FROM
		m_timber_type b,
		m_timber c
		WHERE
		b.i_timber_id=c.id and c.id='".$timberId."' 
		order by timberName
		";

		$rows  = $db->select($sql);
		$selectStur='<select name="i_timberType_id" id="i_timberType_id"  >';
		$selectStur.="<option value=''>" ;
		$selectStur.='..Select..';
		$selectStur.="</option>";

		if(!empty($rows)){
			foreach($rows as $row){

				$selectStur.="<option value='".$row['i_timber_type_id']."'>" ;
				$selectStur.=$row['timberName'];
				$selectStur.="</option>";
			}
		}
		$selectStur.="</select>";

		return $selectStur;
	}

	function getVolumeToTransferAjax($markdId,$treeId,$pointId,$i_timber_id,$i_timbertype_id){




		$markDetail =  new MarkDetailDO();
		$progressConversion =$markDetail->getProgressConversionTreeWiseTimberWise($markdId,$i_timber_id,$i_timbertype_id,$ecnomicsId);
		$treeForestVolume=$progressConversion[$treeId];

		if($pointId == '-1')
		{
			$leftFromForest=$this->getFromForestLeft($markdId,$treeId,$i_timber_id,$i_timbertype_id,$ecnomicsId);
			echo (display_float($treeForestVolume['i_count']) -$leftFromForest );
		}
		else
		{
			$leftFromForest=$this->getVolumeLeft($markdId,$treeId,$pointId,$i_timber_id,$i_timbertype_id,$ecnomicsId);

			$volumeMoved=$this->getVolumeMoved($markdId,$treeId,$pointId,$i_timber_id,$i_timbertype_id,$ecnomicsId);
			echo $leftFromForest-$volumeMoved;

		}
		$forestIEntryId=array();
		//echo  makeSelectOptions($entryPointList,"fromPoint",$i_contractor_id,"",100,"");
	}
	function getVolumeToTransferAjaxEco($markdId,$treeId,$pointId,$i_timber_id,$i_timbertype_id){



		$existing=$this->checkExistingEcnomics($markdId);


		if($existing =='' )
		{
			$economics_master['i_mark_id']=$markdId;
			$ecnomicsId = $db->insert('economics_master',$economics_master);
		}
		else
		{
			$ecnomicsId=$existing['id'];
		}
		$markDetail =  new MarkDetailDO();
		$progressConversion =$markDetail->getProgressConversionTreeWiseTimberWiseEco($markdId,$i_timber_id,$i_timbertype_id,$ecnomicsId);
		$treeForestVolume=$progressConversion[$treeId];

		if($pointId == -1)
		{
			$leftFromForest=$this->getFromForestLeftEco($markdId,$treeId,$i_timber_id,$i_timbertype_id,$ecnomicsId);
			echo (display_float($treeForestVolume['i_count']) -$leftFromForest );
		}
		else
		{
			$leftFromForest=$this->getVolumeLeftEco($markdId,$treeId,$pointId,$i_timber_id,$i_timbertype_id,$ecnomicsId);
				
			$volumeMoved=$this->getVolumeMovedEco($markdId,$treeId,$pointId,$i_timber_id,$i_timbertype_id,$ecnomicsId);
			echo $leftFromForest-$volumeMoved;

		}
		$forestIEntryId=array();
		//echo  makeSelectOptions($entryPointList,"fromPoint",$i_contractor_id,"",100,"");
	}
	function getVolumeToTransferAjaxEcoRSD($markdId,$treeId,$pointId,$i_timber_id,$i_timbertype_id){



		$existing=$this->checkExistingEcnomics($markdId);


		if($existing =='' )
		{
			$economics_master['i_mark_id']=$markdId;
			$ecnomicsId = $db->insert('economics_master',$economics_master);
		}
		else
		{
			$ecnomicsId=$existing['id'];
		}
		$markDetail =  new MarkDetailDO();


		if($pointId == -1)
		{
			$leftFromForest=$this->getFromForestLeftEco($markdId,$treeId,$i_timber_id,$i_timbertype_id,$ecnomicsId);
			echo (display_float($treeForestVolume['i_count']) -$leftFromForest );
		}
		else
		{
				
			$ConversionOut=$this->getVolumeLeftEcoForTransport($markdId,$treeId,$pointId,$i_timber_id,$i_timbertype_id,$ecnomicsId);
				
				
			$leftFromForest=$this->getVolumeLeftEcoRSD($markdId,$treeId,$pointId,$i_timber_id,$i_timbertype_id,$ecnomicsId);
			$volumeMoved=$this->getVolumeMovedEcoRSD($markdId,$treeId,$pointId,$i_timber_id,$i_timbertype_id,$ecnomicsId);

			if($ConversionOut > 0)
			{
				echo $ConversionOut-$leftFromForest-$volumeMoved;

			}
			else
			{
				echo $leftFromForest-$volumeMoved;
			}
		}
		$forestIEntryId=array();
		//echo  makeSelectOptions($entryPointList,"fromPoint",$i_contractor_id,"",100,"");
	}
	function getVolumeToTransferAjaxRSD($markdId,$treeId,$pointId,$i_timber_id,$i_timbertype_id){

		$markDetail =  new MarkDetailDO();
		$progressConversion =$markDetail->getProgressConversionTreeWiseTimberWise($markdId,$i_timber_id,$i_timbertype_id);
		$treeForestVolume=$progressConversion[$treeId];

		if($pointId == -1)
		{
			$leftFromForest=$this->getFromForestLeft($markdId,$treeId,$i_timber_id,$i_timbertype_id);
			echo (display_float($treeForestVolume['i_count']) -$leftFromForest );
		}
		else
		{
			$leftFromForest=$this->getVolumeLeft($markdId,$treeId,$pointId,$i_timber_id,$i_timbertype_id);

			$volumeMoved=$this->getVolumeMoved($markdId,$treeId,$pointId,$i_timber_id,$i_timbertype_id);
			echo $leftFromForest-$volumeMoved;

		}
		$forestIEntryId=array();
		//echo  makeSelectOptions($entryPointList,"fromPoint",$i_contractor_id,"",100,"");
	}

	function getFromForestLeft($markdId,$treeId,$i_timber_id,$i_timbertype_id){
		global $db;
		$arrContractors = array();
		$sql  = "SELECT sum(i_count) as transferred FROM progress_transportation_detail WHERE
				i_progress_id  in  
					(select id  from progress_transportation_master 
					where i_mark_id  ='".$markdId."')
		        and 	i_tree_id ='".$treeId."'
		        and i_timber_id='".$i_timber_id."' and i_timber_type_id='".$i_timbertype_id."'
		         and vc_from='-1' 
				group by vc_from order by  vc_from
		         ";

		$rows  = $db->select($sql);
		if(!empty($rows)){
			foreach($rows as $row){
			  
				return $row['transferred'];
			}
		}
		return '0';
	}


	function getFromForestLeftEco($markdId,$treeId,$i_timber_id,$i_timbertype_id,$ecnomicsId){
		global $db;
		$arrContractors = array();
		$sql  = "SELECT sum(i_count) as transferred FROM ecnomics_transportation_detail WHERE
					i_ecnomics_master_id  ='".$ecnomicsId."'
					
					and	i_tree_id ='".$treeId."'
					and i_timber_id='".$i_timber_id."' and i_timber_type_id='".$i_timbertype_id."'
					and vc_from='-1'
					group by vc_from order by  vc_from
		";

		$rows  = $db->select($sql);
		if(!empty($rows)){
			foreach($rows as $row){

				return $row['transferred'];
			}
		}
		return '0';
	}
	function getVolumeLeft($markdId,$treeId,$pointId,$i_timber_id,$i_timbertype_id){
		global $db;
		$arrContractors = array();
		$sql  = "SELECT sum(transferred) as transferred FROM 
					(SELECT sum(i_count) as transferred FROM progress_transportation_detail WHERE
					i_progress_id  in  
					(select id  from progress_transportation_master 
						where i_mark_id  ='".$markdId."')
		        		and i_tree_id ='".$treeId."'
		        		and vc_destination='".$pointId."' 
		        		and i_timber_id='".$i_timber_id."' and i_timber_type_id='".$i_timbertype_id."'
						group by vc_destination
                 UNION
                 	SELECT sum(i_count) as transferred FROM opening_progress_transportation_detail WHERE
						i_progress_id  in  
						(select id  from opening_progress_transportation_master 
						where i_mark_id  ='".$markdId."')
		        		and i_tree_id ='".$treeId."'
		        		and vc_destination='".$pointId."' 
		        		and i_timber_id='".$i_timber_id."' and i_timber_type_id='".$i_timbertype_id."'
						group by vc_destination
						) as tbl 
				
		         ";
 
		$rows  = $db->select($sql);
		if(!empty($rows)){
			foreach($rows as $row){
				return $row['transferred'];
			}
		}
		return '0';
	}
	function getVolumeLeftEco($markdId,$treeId,$pointId,$i_timber_id,$i_timbertype_id,$ecnomicsId){
		global $db;
		$arrContractors = array();
		$sql  = "SELECT sum(i_count) as transferred FROM ecnomics_transportation_detail WHERE
		i_ecnomics_master_id  ='".$ecnomicsId."'
		and i_tree_id ='".$treeId."'
		and vc_destination='".$pointId."'
		and i_timber_id='".$i_timber_id."' and i_timber_type_id='".$i_timbertype_id."'
		group by vc_destination order by  vc_destination
		";

		$rows  = $db->select($sql);
		if(!empty($rows)){
			foreach($rows as $row){
				return $row['transferred'];
			}
		}
		return '0';
	}
	function getVolumeLeftEcoForTransport($markdId,$treeId,$pointId,$i_timber_id,$i_timbertype_id,$ecnomicsId){
		global $db;
		$arrContractors = array();
		$sql  = "SELECT sum(i_count) as transferred FROM ecnomics_transportation_detail WHERE
		i_ecnomics_master_id  ='".$ecnomicsId."'
		and i_exit=1
		and i_tree_id ='".$treeId."'
		and vc_destination='".$pointId."'
		and i_timber_id='".$i_timber_id."' and i_timber_type_id='".$i_timbertype_id."'
		group by vc_destination order by  vc_destination
		";

		$rows  = $db->select($sql);
		if(!empty($rows)){
			foreach($rows as $row){
				return $row['transferred'];
			}
		}
		return '0';
	}

	function getVolumeLeftEcoRSD($markdId,$treeId,$pointId,$i_timber_id,$i_timbertype_id,$ecnomicsId){
		global $db;
		$arrContractors = array();
		$sql  = "SELECT sum(i_count) as transferred FROM ecnomics_transportation_detail_RSD WHERE
		i_ecnomics_master_id  ='".$ecnomicsId."'
		and i_tree_id ='".$treeId."'
		and vc_destination='".$pointId."'
		and i_timber_id='".$i_timber_id."' and i_timber_type_id='".$i_timbertype_id."'
		group by vc_destination order by  vc_destination
		";

		$rows  = $db->select($sql);
		if(!empty($rows)){
			foreach($rows as $row){
				return $row['transferred'];
			}
		}
		return '0';
	}
	function getVolumeMoved($markdId,$treeId,$pointId,$i_timber_id,$i_timbertype_id){
		global $db;
		$arrContractors = array();
		$sql  = "SELECT sum(i_count) as transferred FROM progress_transportation_detail WHERE
				i_progress_id  in  
					(select id  from progress_transportation_master 
					where i_mark_id  ='".$markdId."')
		        and i_tree_id ='".$treeId."'
		        and vc_from='".$pointId."' 
		        and i_timber_id='".$i_timber_id."' and i_timber_type_id='".$i_timbertype_id."' 
				group by vc_from order by  vc_from
		         ";

		$rows  = $db->select($sql);
		if(!empty($rows)){
			foreach($rows as $row){
				return $row['transferred'];
			}
		}
		return '0';
	}
	function getVolumeMovedEco($markdId,$treeId,$pointId,$i_timber_id,$i_timbertype_id,$ecnomicsId){
		global $db;
		$arrContractors = array();
		$sql  = "SELECT sum(i_count) as transferred FROM ecnomics_transportation_detail WHERE
		i_ecnomics_master_id  ='".$ecnomicsId."'
		and i_tree_id ='".$treeId."'
		and vc_from='".$pointId."'
		and i_timber_id='".$i_timber_id."' and i_timber_type_id='".$i_timbertype_id."'
		group by vc_from order by  vc_from
		";

		$rows  = $db->select($sql);
		if(!empty($rows)){
			foreach($rows as $row){
				return $row['transferred'];
			}
		}
		return '0';
	}

	function getVolumeMovedEcoRSD($markdId,$treeId,$pointId,$i_timber_id,$i_timbertype_id,$ecnomicsId){
		global $db;
		$arrContractors = array();
		$sql  = "SELECT sum(i_count) as transferred FROM ecnomics_transportation_detail_RSD WHERE
					i_ecnomics_master_id  ='".$ecnomicsId."'
					and i_tree_id ='".$treeId."'
					and vc_from='".$pointId."'
					and i_timber_id='".$i_timber_id."' and i_timber_type_id='".$i_timbertype_id."'
		group by vc_from order by  vc_from
		";

		$rows  = $db->select($sql);
		if(!empty($rows)){
			foreach($rows as $row){
				return $row['transferred'];
			}
		}
		return '0';
	}
	function getTransportaionProgressDetail($markdId){
		global $db;
		$arrContractors = array();
		$sql  = "SELECT * FROM progress_transportation_detail WHERE  i_progress_id 	  in  (select id  from progress_transportation_master where i_mark_id  ='".$markdId."')
		         order by  vc_from
		         ";
		$previous='0';
		$rows  = $db->select($sql);
		$list =  array();
		$transportDetail =  array();
		if(!empty($rows)){
			foreach($rows as $row){
				$arrContractors[$row['id']] = $row['vc_name'];

				if($previous !='0' && $previous !=$row['vc_from'] )
				{
					//Tree Changed
					$transportDetail[$previous]=$list;
					$previous=$row['vc_from'];
					$list =  array();
				}
				$previous=$row['vc_from'];
				$list[$row['id']]=$row;
			}
		}
		$transportDetail[$previous]=$list;
		return $transportDetail;
	}


	function getTransportaionInventoryDetail($markdId){
		global $db;
		$arrContractors = array();
		$sql  = "SELECT * FROM inventory_detail WHERE  i_inventory_id 	  in  (select id  from inventory_master where i_mark_id  ='".$markdId."')
		         order by  	i_location_id
		         ";
		$previous='0';
		$rows  = $db->select($sql);
		$list =  array();
		$transportDetail =  array();
		if(!empty($rows)){
			foreach($rows as $row){
				$arrContractors[$row['id']] = $row['vc_name'];

				if($previous !='0' && $previous !=$row['i_location_id'] )
				{
					//Tree Changed
					$transportDetail[$previous]=$list;
					$previous=$row['i_location_id'];
					$list =  array();
				}
				$previous=$row['i_location_id'];
				$list[$row['id']]=$row;
			}
		}
		$transportDetail[$previous]=$list;
		return $transportDetail;
	}


	function getContractorDetail($id){
		global $db;
		$arrContractors = array();
		$sql  = "SELECT * FROM contractor_detail where id='".$id."'";

		$rows  = $db->select($sql);
		if(!empty($rows)){
			foreach($rows as $row){
				?>
<table>
	<tr class='odd'>
		<td>Name</td>
		<td><?php echo $row['contractor_name'] ?></td>
	</tr>
	<tr class='even'>
		<td>Phone</td>
		<td><?php echo $row['phone'] ?></td>
	</tr>
	<tr class='odd'>
		<td>Licence-No</td>
		<td><?php echo $row['license'] ?></td>
	</tr>
	<tr class='even'>
		<td>Class</td>
		<td><?php echo $row['contractor_class'] ?></td>
	</tr>
</table>
				<?php
			}
		}
		return '';
	}
function getDevisonDFOs($table ,$orderby,$i_dividion_id){
		global $db;
		$sql  = "SELECT * FROM ".$table." WHERE i_status = '1'  and i_division_id='".$i_dividion_id."' order by ".$orderby;
		$rows  = $db->select($sql);
		if(!empty($rows)){
			$arrCategory = array();
			foreach($rows as $row){
				$arrOptions[$row['id']] = $row['vc_name'];

			}
			return $arrOptions;
		}else{
			return false;
		}
	}
}
?>