<?
 $user_name="";
 $password="";
 $arrError=array();

 if(isset($_POST['submit'])){
  extract($_POST);
  if($form_validation->is_empty($user_name)){
   $arrError[]="Please fill user name.";
  }
  if($form_validation->is_empty($password)){
   $arrError[]="Please fill password.";
  }

//  if(!$user->validateLogin($user_name,$password)){
//   $arrError[]="Not a valid user name and password.";
//  }

 if(!$user->validateUserLogin($user_name,$password, $_SESSION['centerKey'])){
   $arrError[]="Not a valid user name and password.";
  }
 
    $arFieldValues['id']=$_SESSION['divId'];
	echo($_SESSION['divId']);
	$list=$common->selectCondition('m_division', $arFieldValues);
	$_SESSION['currentDivisionDetail']=$list[0];
  if(empty($arrError)){
      $result1=$user->updateLogin($_SESSION['userId']);
	  ob_end_clean();
	  header("location:".BASE_URL."index.php?page=profile");
	  
  }
 }
  include('html/login.php');
?>