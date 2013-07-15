<?    include('check_session.php'); 
	if(isset($_REQUEST['id']) && $_REQUEST['id'] != "" && isset($_REQUEST['action']) && $_REQUEST['action'] != ""){
		$id = (int)$_REQUEST['id'];		
		$stage	= $_REQUEST['action'];
		switch($stage){
			case 'pics':
			$tableName	  = TBL_USERS_PICS;		
			$arrCondition = array('id'=>$id);
			$row=$user->getPicDetails($id);
			$db->delete($tableName,$arrCondition);
			$_SESSION['pageDeleted'] = "Picture Deleted Successfully";
			header("Location: index.php?page=upload&id=".$row[0]['user_id']);
			break;
			case 'message':
			$tableName	  = TBL_MESSAGES;		
			$arrCondition = array('id'=>$id);
			$db->delete($tableName,$arrCondition);
			$_SESSION['messageDeleted'] = "Message Deleted Successfully";
			header("Location: index.php?page=inbox");
			break;

		}
}
?>