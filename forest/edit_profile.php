 <? include('check_session.php'); 
    $arrError =array();
    $arrError1 =array();
	$arrError2 =array();
	$old_password="";
	$new_password="";
	$new_password_again="";
	
	$table			= TBL_USERS;
	
	if(isset($_SESSION['userId']) && $_SESSION['userId'] != ""){
		$id = (int)$_SESSION['userId'];
		$row = $user->getUserInfo($id);
		
		$userLabel	= "Edit Profile";
        $user_name		= $row[0]['user_name'];
		$first_name		= $row[0]['first_name'];
		$last_name		= $row[0]['last_name'];
		$email			= $row[0]['email'];
		
		
		if(!empty($dob)){
		$arrDOB=explode("-",$dob);
    	$month1=$arrDOB[0];
		$day1=$arrDOB[1];
		$year1=$arrDOB[2];
		}else{
        $month1="";
		$day1="";
        $year1="";
		}
	}
	if(isset($_POST['submit']) ){
				
	 if($_POST['submit'] == "Update"){	
		extract($_POST);
		foreach($_POST as $k=>$v){
			if($k == 'submit')
			    continue;
			//if($v)){
				$arFieldValues[$k] = $v;
			//}
		}
	   	 foreach($arFieldValues as $k=>$v){
				if($k =='id')
				continue;
				$arFieldValuesUpdate[$k]=$v;
		 }
		 if(empty($arrError)){
			$arConditions = array("id"=>$id);
			$db->update($table,$arFieldValuesUpdate,$arConditions);
			//$_SESSION['empMsg'] = "User Record Updated Successfully";
			 ob_end_clean();
	    	 header("location:".BASE_URL.'index.php?page=profile');
		 }
	}		
	if($_POST['submit'] == "Update Registration"){
        extract($_POST);
		
		foreach($_POST as $k=>$v){
			if($k == 'submit'  || $k=='month1' ||$k=='day1' ||$k=='year1')
			    continue;
			//if($v)){
				$arFieldValues[$k] = $v;
			//}
		     }
	  
		  
		 if($form_validation->is_empty($user_name)){
			$arrError1[]="Please Fill User Name";
		  }
		  if($user->checkExistingUser($user_name,$id)){
			$arrError1[]="Please enter new username this username already registered.";
		  }
		  /*if($form_validation->is_empty($first_name)){
			$arrError1[]="Please Fill First Name";
		  }*/
           if(!$form_validation->is_empty($email)){
				if($form_validation->is_email($email)){
				$arrError1[]="Not a Valid Email Address";
			  }
			  if($user->checkExistingEmail($email,$id)){
			  $arrError1[]="This email is already registered ";  
			 }
		  }
		 
        foreach($arFieldValues as $k=>$v){
				if($k =='id')
				continue;
				$arFieldValuesUpdate[$k]=$v;
		 }

		 if(empty($arrError1)){
			$arConditions = array("id"=>$id);
			$db->update($table,$arFieldValuesUpdate,$arConditions);
			//$_SESSION['empMsg'] = "User Record Updated Successfully";
			
		    ob_end_clean();
	    	header("location:".BASE_URL.'index.php?page=profile');
		 }
	}
  	if($_POST['submit'] == "Change Password"){
        extract($_POST);
		
		$old_password=$_POST['old_passowrd'];
	      if($old_password==''){
			$arrError2[]="Please Fill Old Password";
		  }
		  
		  if($form_validation->is_empty($new_password)){
			$arrError2[]="Please Fill New Password";
		  }
           if($form_validation->is_empty($new_password_again)){
			$arrError2[]="Plaese Fill New Password Again";
		  }
		  if($new_password!=$new_password_again){
			$arrError2[]="New Password and New password Again field value does not match.";
		  }
		 if($user->changeUserPassword($old_password,$new_password)){
				$msgStatus	= true;
				$_SESSION['empMsg']	= "Password changes successfully";
				 ob_end_clean();
	        	header("location:".BASE_URL.'index.php?page=profile');
 			}else{

            $arrError2[]="Old Password is not correct";
			}
       
		
	}

	

	}

	   include('html/edit_profile.php');
		?>
