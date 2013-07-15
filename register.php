<?  $user_name="";
    $first_name="";
	$cEmail="";
	$cPassword="";
	$last_name="";
	$password="";
	$email="";
	
	$arrError = array();
	
	$table =TBL_USERS;
	if(isset($_POST['submit'])){
	 extract($_POST);
      if($form_validation->is_empty($user_name)){
	    $arrError[]="Please Fill User Name";
	  }
	  if($user->checkExistingUser($user_name,0)){
	    $arrError[]="Please enter new username this username already registered.";
	  }
      if($form_validation->is_empty($first_name)){
	    $arrError[]="Please Fill First Name";
	  }
	  if($form_validation->is_empty($password)){
        $arrError[]="Please Fill password";              
	  }
	  
	  if($password!=$cPassword){
        $arrError[]="Password and repassword does not match";              
	  }
	  if(!$form_validation->is_empty($email)){
        if($form_validation->is_email($email)){
        $arrError[]="Not a Valid Email Address";
		  }
		  if($email!=$cEmail){
			$arrError[]="Email and reemail does not match";              
		  }
		   if($user->checkExistingEmail($email,0)){
        $arrError[]="This email is already registered ";  
	     }
	    }
	  
	  if(!isset($terms)){
		$arrError[]="Please check terms and conditions";  
	  }
       if(($form_validation->is_empty( $_POST['security_code']))||($_SESSION['security_code']!= $_POST['security_code'])){
        $arrError[]="Please enter valid security code.";
	   }
	  
       if($user->checkExistingUser($user_name,$id)){
	    $arrError[]="Please enter new username this username already registered.";
	    }
	  if(empty($arrError)){
        foreach($_POST as $k=>$v){
			if($k == 'submit' || $k=='security_code' || $k=='terms' || $k=='month1' ||$k=='day1' ||$k=='year1' ||$k=='cPassword' || $k=='cEmail')
				continue;
			//if($v)){
				$arFieldValues[$k] = $v;
			//}
		}
		
		  $id = $db->insert($table,$arFieldValues);
         /* $subject="Account registered";
		  $content='You succesfuly Registered with:<br>';
		  $content.="User name=$user_name<br>";
          $content.="Password=$password<br>";
          $content.="Please click on This Link to activate your account: ";
          $content.="<a target='_blank' href=".BASE_URL."confirmation.php?id=$id".">";
		  $content.=BASE_URL."confirmation.php";
		  $content.="</a>";
		  $common->send_mail('',$email,$subject,$content);
		*/
		
		 ob_end_clean();
		 header("location:".BASE_URL."index.php?page=login&m=r");
		
	  }
	}

	   include('html/register.php');
   ?>