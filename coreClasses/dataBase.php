<?php
class dataBase 
{
    /**
       Function added For Creating database Connection.
       And Selecting  A patricular Database for Performing Database Operations
    */
    var $conn;
    
    function database_connect($hostName,$userName,$passWord,$databaseName){ 
        $conn = mysql_connect($hostName,$userName, $passWord)
	or die("Connecting to MySQL failed");
	$selected = mysql_select_db($databaseName,$conn) 
	or die("Could not connecto  to the database ");
      return  $conn; 
   } 
   
      function database_close($databaseConnector){ 

           mysql_close($databaseConnector)or die("Problem  in Closing A Connection");;

   } 
   
   
   
} 
?>
