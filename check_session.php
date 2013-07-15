<? 
 if(isset($_SESSION['userId']) && $_SESSION['userId']!=Null ){
	 
	
	// $result1=$user->updateLogin($_SESSION['userId']);
     //$state=$user->checkLoginTime();
  
    /* foreach($state as $stateK=>$stateV){
		if (strtotime($stateV['now'])-strtotime($stateV['before1']) >=300)
		 {
		$query = "UPDATE ".TBL_USERS." SET online_status=0  WHERE id='$stateV[id]'";
	    $result =$db->setXbyY($query);
		 }
		
			
	  }*/

}else{
   ob_end_clean();
  header("location:index.php");
}


?>