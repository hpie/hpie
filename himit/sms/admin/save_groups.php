<?php
	define('INCLUDE_CHECK',true);
	require '../connect.php';
	session_name('smsLogin');
	// Starting the session
	session_start();
	
	$firstname = htmlspecialchars($_REQUEST['firstname']);
	$lastname = htmlspecialchars($_REQUEST['lastname']);
	$phone = htmlspecialchars($_REQUEST['phone']);
	$email = htmlspecialchars($_REQUEST['email']);


$sql = "insert into users(firstname,lastname,phone,email) values('$firstname','$lastname','$phone','$email')";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array(
		'id' => mysql_insert_id(),
		'firstname' => $firstname,
		'lastname' => $lastname,
		'phone' => $phone,
		'email' => $email
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>