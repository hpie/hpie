<?	ob_start();
	session_start();
	include ('../include.php');
	require_once("../config.php");
	include('../constants.php');
	include("check_session.php");
	include("html/header.php");
	
	
	$userLabel	= "Add New User";
	$arrError		= array();
	$id				= 0;
	$user_name      ="";
	$first_name		= "";
	$last_name		= "";
	$email			= "";
	$password		= "";
	$phone_no       ="";
	$mobile_no      = "";
	$address        = "";
	$city           ="";
	$state          ="";
	$zip			= "";
	$profile		= "";
    
	
	
	$table			= TBL_USERS;
	
	if(isset($_GET['id']) && $_GET['id'] != ""){
		$id = $_GET['id'];
		$row = $user->getUserInfo($id);
		
		$userLabel	= "Edit User";
        $user_name		= $row[0]['user_name'];
		$first_name		= $row[0]['first_name'];
		$last_name		= $row[0]['last_name'];
		$email			= $row[0]['email'];
		//$state          =$row[0]['state'];
	    $phone_no       =$row[0]['phone_no'];
		$mobile_no      = $row[0]['mobile_no'];
		$address        = $row[0]['address'];
		$city           =$row[0]['city'];
		$state          =$row[0]['state'];
		$zip	        =$row[0]['zip'];
		
	}
	if(isset($_POST['submit']) && $_POST['submit'] != ""){
		extract($_POST);		
		foreach($_POST as $k=>$v){
			if($k == 'submit' || $k =='password')
				continue;
			//if($v)){
				$arFieldValues[$k] = $v;
			//}
		}
	   if($form_validation->is_empty($user_name)){
	    $arrError[]="Please Fill User Name";
	   }
	  if($user->checkExistingUser($user_name,$id)){
	    $arrError[]="Please enter new username this username already registered.";
	    }
		if(!empty($email)){
		if(!$user->validateEmail($email)){
			$arrError[] = "Not a valid email format";
		}
		elseif($user->checkExistingEmail($email,$id)){
			$arrError[] = "Clients email already exists";
		}
		if(!empty($phone_no)){
        if( !is_numeric ($phone_no) || strlen($phone_no)!=10) {
              $arrError[]= 'Please enter a valid phone number';
          }
		}
		if(!empty($mobile_no) ){
        if( !is_numeric ($mobile_no)|| strlen($mobile_no)!=10 ) {
              $arrError[]= 'Please enter a valid mobile number';
          }
		}
	  if(!empty($zip) ){
        if( !is_numeric ($zip) || strlen($zip)!=6) {
              $arrError[]= 'Please enter a valid zip code';
          }
		}
		}
        if(empty($arrError)){
		if(!$id){
			$id = $db->insert($table,$arFieldValues);
			$_SESSION['empMsg'] = "User Record Added Successfully";
		}else{
			foreach($arFieldValues as $k=>$v){
				if($k =='id')
				continue;
				$arFieldValuesUpdate[$k]=$v;
			}
			$arConditions = array("id"=>$id);
			$db->update($table,$arFieldValuesUpdate,$arConditions);
			$_SESSION['empMsg'] = "User Record Updated Successfully";
		}
		if(isset($password) && $password != ""){
			$arConditions = array("id"=>$id);
			$arFieldPass  = array("password"=>$db->password($password));
			$db->update($table,$arFieldPass,$arConditions);
		}
		
			ob_end_clean();
			header("Location: users.php");
			exit;
		}
	}


	
	include("html/add_user.php");
	include("html/footer.php");
 ?>