<?	ob_start();
	session_start();
	include ('../include.php');
	require_once("../config.php");
	include('../constants.php');
	include("check_session.php");
	include("html/header.php");
	
	
	$userLabel	= "Add New Contractor";
	$arrError		= array();
	$id				= 0;
	$contractor_name      ="";
	$first_name		= "";
	$last_name		= "";
	$email			= "";
	$password		= "";
	$zip			= "";
	$phone   		= "";
    $mbile          = "";
	$fax            = "";
	$address        = "";
	$city           = "";
	$state          = "";
	$zip            = "";
	$pan            = "";
	$gf             = "";
    $license        = "";
    $licence_exp_date="";
	$contractor_class ="";

	
	$table			= 'contractor_detail';
	
	if(isset($_GET['id']) && $_GET['id'] != ""){
		$id = $_GET['id'];
		$row = $user->getContractorInfo($id);
		
		$userLabel	= "Edit Contractor";
        $contractor_name		= $row[0]['contractor_name'];
		$first_name		= $row[0]['first_name'];
		$last_name		= $row[0]['last_name'];
		$email			= $row[0]['email'];
		//$zip			= $row[0]['zip'];
		$phone   		= $row[0]['phone'];
		$mobile          = $row[0]['mobile'];
		$fax            = $row[0]['fax'];
		$address        = $row[0]['address'];
		$city           = $row[0]['city'];
		$state          = $row[0]['state'];
		$zip            = $row[0]['zip'];
		$pan            = $row[0]['pan'];
		$gf             = $row[0]['gf'];
		
		$licence_exp_date=date('d-m-Y',strtotime($row[0]['licence_exp_date']));
		$contractor_class =$row[0]['contractor_class'];
		$joined_on        =$row[0]['joined_on'];
		
		
		
		
		$bankname=$row[0]['bankname'];
		$accountnumber=$row[0]['accountnumber'];
		$branch=$row[0]['branch'];
		$nfntno=$row[0]['nfntno'];
		$registration=$row[0]['registration'];
		$license=$row[0]['license'];

		
	}
	if(isset($_POST['submit']) && $_POST['submit'] != ""){
		extract($_POST);
		
		foreach($_POST as $k=>$v){
			
			if($k=="licence_exp_date"){
			    $arFieldValues[$k] =date('Y-m-d',strtotime($v));
			}
			if($k != 'submit' && $k!="licence_exp_date"){
				$arFieldValues[$k] = $v;
			}
		}
		/*echo '<pre>';
		print_r($arFieldValues);
		echo '</pre>';
		die();*/
	   if(empty($contractor_name)){
	    $arrError[]="Please Fill Contractor Name";
	   }
	   if(!empty($phone)){
        if( !is_numeric ($phone) || strlen($phone)!=10) {
              $arrError[]= 'Please enter a valid phone number';
          }
		}
		if(!empty($mobile) ){
        if( !is_numeric ($mobile)|| strlen($mobile)!=10 ) {
              $arrError[]= 'Please enter a valid mobile number';
          }
		 }
		if(!empty($fax) ){
        if( !is_numeric ($fax)|| strlen($fax)!=10 ) {
              $arrError[]= 'Please enter a valid fax number';
          }
		}
	  if(!empty($zip) ){
        if( !is_numeric ($zip) || strlen($zip)!=6) {
              $arrError[]= 'Please enter a valid zip code';
          }
		}
       if($user->checkExistingContractor($contractor_name,$id)){
	    $arrError[]="Please enter new contractor this contractor already registered.";
	    }
		if(!empty($email)){
		if(!$user->validateEmail($email)){
			$arrError[] = "Not a valid email format";
		}
		elseif($user->checkExistingEmail($email,$id)){
			$arrError[] = "Clients email already exists";
		}
		}
        if(empty($arrError)){
		if(!$id){
			$id = $db->insert($table,$arFieldValues);
			$_SESSION['empMsg'] = "User Record Added Successfully";
		}else{
			foreach($arFieldValues as $k=>$v){
				if($k=="licence_exp_date"){
			    $arFieldValuesUpdate[$k] =date('Y-m-d',strtotime($v));
				}else if($k !='id'){
					$arFieldValuesUpdate[$k]=$v;
				}
				
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
			header("Location: contractors.php");
			exit;
		}
	}


	
	include("html/add_contractor.php");
	include("html/footer.php");
 ?>