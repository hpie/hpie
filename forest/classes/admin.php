<?
	class admin{
		/*
		function checkLogin($login_name,$password){
			global $db;
			$password = $db->password($password);
			$sql = "select * from admins WHERE login ='".$login_name."' AND password ='".$password."'";
			return $db->select($sql);
		}
	
		function setAdminSession($arrAdminUser){
			if(is_array($arrAdminUser) && count($arrAdminUser)>0){
				$_SESSION['sessAdminID']		= $arrAdminUser[0]['id'];
				$_SESSION['sessAdminName']		= $arrAdminUser[0]['first_name']." ".$arrAdminUser[0]['last_name'];
				$_SESSION['sessLoginName']		= $arrAdminUser[0]['login_name'];
				$_SESSION['sessIsSuperAdmin']   = $arrAdminUser[0]['is_super_admin'];
				return true;
			}else{
				return false;
			}
		}
		*/

		function changePassword($oldPassword,$newPassword){
			global $db;
			$s_adminID		= $_COOKIE['sessAdminID'];			
			$oldPassword	= $db->password($oldPassword);
			$password		= $db->password($newPassword);
			if($checkPassword = $this->checkPassword($oldPassword)){
				$query = "UPDATE ".TBL_ADMINS." SET password='$password' WHERE id ='$s_adminID'";
				$result = mysql_query($query);
				return true;
			}else{
				return false;
			}
		}


		function isActive($a_data){
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
				$db->update(TBL_ADMINS,$arFieldValues,$arConditions);
			}
		}

		function checkExistingEmail($email,$id){
			global $db;
			$sql = "SELECT * FROM ".TBL_ADMINS." WHERE email ='".$email."' AND id != '".$id."'";
			$row = $db->select($sql);
			if(!empty($row)){
				return true;
			}else{
				return false;
			}
		}

		function checkExistingImage($id){
			global $db;
			$sql = "SELECT subdir,emp_image FROM ".TBL_ADMINS." WHERE id ='".$id."'";
			$row = $db->select($sql);
			if(!empty($row)){
				return $row;
			}else{
				return false;
			}
		}
		function checkValidEmail($email){
			global $db;
			$sql = "SELECT * FROM ".TBL_ADMINS." WHERE email ='".$email."'";
			$row = $db->select($sql);
			if(!empty($row)){
				return true;
			}else{
				return false;
			}
		}

		function validateLogin($login,$password, $division){
			global $db;
			$password = $db->password($password);
			echo $sql = "SELECT * FROM ".TBL_ADMINS." WHERE login ='".$login."' AND password ='".$password."' AND division ='".$division."' AND status ='y'";
			$row = $db->select($sql);
			if(!empty($row)){
				return true;
			}else{
				return false;
			}	
		}
	
		function isActiveCustomer($email){
			global $db;
			$sql = "SELECT * FROM ".TBL_ADMINS." WHERE email ='".$email."' AND status ='y'";
			$row = $db->select($sql);
			if(!empty($row)){
				return true;
			}else{
				return false;
			}
		}
		
		function checkAccountConfirmation($email){
			global $db;
			$sql = "SELECT * FROM ".TBL_ADMINS." WHERE email ='".$email."' AND confirmation ='y'";
			$row = $db->select($sql);
			if(!empty($row)){
				return true;
			}else{
				return false;
			}
		}

		function doLogin($login,$password, $division){
			global $db;
			$password = $db->password($password);
			echo $sql = "SELECT * FROM ".TBL_ADMINS." WHERE login ='".$login."' AND password ='".$password."' AND division ='".$division."'";
			$row = $db->select($sql);
			
			if(!empty($row)){
					$_SESSION['centerKey']=$division;
			        $_SESSION['logedInUser']=$login;
					setcookie('sessAdminID',$row[0]['id'],time()+3600);
					setcookie('sessAdminName',$row[0]['first_name']." ".$row[0]['last_name'],time()+3600);
					setcookie('sessEmail',$row[0]['email'],time()+3600);
					setcookie('sessIsSuperAdmin',$row[0]['is_super_admin'],time()+3600);
					return true;
				}else{
				return false;
			}
		}
		function getUserInfo($id){
			global $db;
			$sql = "SELECT * FROM ".TBL_ADMINS." WHERE id ='".$id."'";
			return $row = $db->select($sql);
		}
		
		function validateRegistrationForm($arFieldValues){
			$arrErrors = array();	
			if(is_array($arFieldValues) && !empty($arFieldValues)){
				foreach($arFieldValues as $k=>$v){
				//	echo $k."<br/>";
					switch($k){
						case 'first_name':
						case 'last_name':
						if(empty($v)){
							$arrErrors[] = ucfirst(eregi_replace("_"," ",$k))." can not be empty";
						}
						break;
						case 'email':
						if(empty($v)){
							$arrErrors[] = "Email address can not be empty";
						}
						elseif(!$this->validateEmail($v)){
							$arrErrors[] = "Not a valid email address";
						}
						break;
						case 'phone':
							if(empty($v)){
								$arrErrors[] = "Phone Number can not be empty";	
							}elseif(!$this->validatePhone($v)){
								$arrErrors[] = "Not a valid phone format";
							}
						break;
						case 'street_address':
						if(empty($v)){
							$arrErrors[] = "Street address can not be empty";
						}
						break;
						case 'password':
						case 'confirm_password':
						
						if($k == 'password'){
							$password = $v; 
						}
						if($k == 'confirm_password'){
							$cPassword = $v; 
						}
						if(empty($v)){
							$arrErrors[] = ucfirst(eregi_replace("_"," ",$k))." can not be empty";
						}
						break;
						case 'city':
						if(empty($v)){
							$arrErrors[] = "City can not be empty";
						}
						break;
						case 'security_code':
						if(empty($v)){
							$arrErrors[] = "Please enter security code";
						}elseif($v != $_SESSION['security_code']){
							$arrErrors[] = "Please enter valid security code";
						}
						break;
					}
				}
				if(!empty($password) && !empty($cPassword)){
					if($password != $cPassword){
						$arrErrors[] = "Confirm password not match with password";	
					}
				}
			}
			if(!empty($arrErrors)){
				return $arrErrors;
			}else{
				return false;
			}
		}

	function validateEmail($email) {
		// First, we check that there's one @ symbol, and that the lengths are right
		if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
		// Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
		return false;
		}
		// Split it into sections to make life easier
		$email_array = explode("@", $email);
		$local_array = explode(".", $email_array[0]);
		for($i = 0; $i < sizeof($local_array); $i++) {
			if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$",		$local_array[$i])) {
				return false;
			}
	   }
	  
	   if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
			$domain_array = explode(".", $email_array[1]);
		   if(sizeof($domain_array) < 2) {
			  return false; // Not enough parts to domain
			}
		  for($i = 0; $i < sizeof($domain_array); $i++) {
			   if(!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])){
				   return false;
				}
		 }
	   }
	   return true;
	}
	function validatePhone($number){
		if(!ereg("^[0-9]{3}-[0-9]{3}-[0-9]{4}$", $number)) {
			return false;
		}
		else {
			return true;
		}
	}
	
	function generatePassword($length=9, $strength=0) {
		$vowels = 'aeuy';
		$consonants = 'bdghjmnpqrstvz';
		if ($strength & 1) {
			$consonants .= 'BDGHJLMNPQRSTVWXZ';
		}
		if ($strength & 2) {
			$vowels .= "AEUY";
		}
		if ($strength & 4) {
			$consonants .= '23456789';
		}
		if ($strength & 8) {
			$consonants .= '@#$%';
		}
	 
		$password = '';
		$alt = time() % 2;
		for ($i = 0; $i < $length; $i++) {
			if ($alt == 1) {
				$password .= $consonants[(rand() % strlen($consonants))];
				$alt = 0;
			} else {
				$password .= $vowels[(rand() % strlen($vowels))];
				$alt = 1;
			}
		}
		return $password;
	 }

	function generate_token(){
		return $token = md5(uniqid(rand(),1));
	}

	function getCustomerInfoByEmail($email){
		global $db;
		$sql = "SELECT * FROM ".TBL_ADMINS." WHERE email ='".$email."'";
		return $row = $db->select($sql);
	}

	function confirmCustomerAccount($token){
		global $db;
		$sql = "SELECT * FROM ".TBL_ADMINS." WHERE token ='".$token."'";
		$row = $db->select($sql);
		if(empty($row)){
			$pc = "<script type=\"text/javascript\">
						Modalbox.show('<span>The link you clicked is not valid.</span>', {title: 'Status', width: 300});
					</script>
					";
			$_SESSION['mbconfirm'] = $pc;
			return false;
		}else{
			$arrUpdateField	= array('confirmation'=>'y');
			$arrCondition   = array('id'=>$row[0]['id']);
			$db->update('admins',$arrUpdateField,$arrCondition);
			$pc = "
					<script type=\"text/javascript\">
						Modalbox.show('<span>Your Account has been confirmed you can login now.</span>', {title: 'Status', width: 300});
					</script>
					";
			$_SESSION['mbconfirm'] = $pc;			
			return true;
		}
	}

	function sendForgotPasswordEmail($email_to,$objCommon){
		global $db;
		$sql				= "SELECT first_name,last_name FROM ".TBL_ADMINS." WHERE email ='".$email_to."'";
		$row				= $db->select($sql);
		$newPassword		= $this->generatePassword(9,4);
		$password			= $this->password($newPassword);
		$arrCondition		= array('email'=>$email_to);
		$arrUpdateFields	= array('password'=>$password);
		$db->update('admins',$arrUpdateFields,$arrCondition);
		
		$from			= POSTMASTERS;
		$to				= $email_to;
		$customerName	= $row[0]['first_name'].' '.$row[0]['last_name'];
		$newbody		= '';					
		$subject	= "Forgot password email from " .SITE_NAME;
		$body = "
			Dear {customer_name}, <br />
			Following is your new password on bluemoonwholesale.com<br />
			<ul>
			<li>Password :{password} </li>
			<li>Thanks</li>
			<li>".SITE_NAME."</li>
			</ul>";				
		$newbody		= str_replace('{customer_name}',$customerName, $body);
		$newbody		= str_replace('{password}', $newPassword, $newbody);
		$objCommon->send_mail($from ,$to, $subject, $newbody);
		$pc = "
			<script type=\"text/javascript\">
				Modalbox.show('<span>Your new password has been sent to you<br/>please check your email.</span>', {title: 'Status', width: 300});						
			</script>
			";
		$_SESSION['mbconfirm'] = $pc;
	}

		function checkPassword($oldPassword){
			$query	= "SELECT id FROM ".TBL_ADMINS." WHERE password='$oldPassword'";
			$result = mysql_query($query);
			if(mysql_num_rows($result)){
				return true;
			}else{
				return false;
			}
		}

		function fetchAlladmins(){
			global $db;
			$sql	= "SELECT id,first_name,last_name FROM ".TBL_ADMINS." WHERE status ='y'";
			$rows	= $db->select($sql);
			if(!empty($rows)){
				$arradmins = array();	
				foreach($rows as $row){
					$arradmins[$row['id']] = $row['first_name'].' '.$row['last_name'];
				}
				return $arradmins;
			}
		}
		function checkExistingEmployee($id,$emp_code){
			global $db;
			$sql	= "SELECT * FROM ".TBL_ADMINS." WHERE emp_code ='".$emp_code."' && id != '".$id."'";
			$row	= $db->select($sql);	
			if(!empty($row)){
				return true;
			}else{
				return false;
			}
		}
	
		function updateLogoutTime(){
			$table = 'daily_login_status';
			$currTime = date('H:i:s');
			$currDate = date('Y-m-d');
			$sql = "UPDATE daily_login_status SET logged_out_time = '".$currTime."',out_status='O' WHERE admins_id = '".$_SESSION['sess_admins_id']."' AND login_date LIKE '".$currDate."%' AND ip_address = '".$_SERVER['REMOTE_ADDR']."'";
			$this->setXByY($sql);
		}

		function getInOutTime($admins_id,$date){
			$sql = "SELECT * FROM daily_login_status WHERE login_date LIKE '".$date."%' AND admins_id = '".$admins_id."'"; 
			$row = $db->select($sql);
			if(!empty($row)){
				return $row;
			}else{
				return false;
			}
		}

	}
?>