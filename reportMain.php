<? include('check_session.php'); 
if(isset($_GET['id'])){
$user_id=$_GET['id'];
}
if(empty($user_id)){
$user_id=$_SESSION['userId'];
}

$row=$user->getUserInfo($user_id);
$income="";
$height="";
$meeting="";
$body="";
$drugs="";
$looking="";
$marital="";
$occupation="";
$orientation="";
$races="";
$religion="";
$smoking="";
$drinking="";
$education="";
$hair="";
$childeren="";
$age="";


include('html/reportHeader.php');
include('reportList.php');
echo '</div>';

?>