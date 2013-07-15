<?php
include "coreClasses/Constants.php";
include "coreClasses/dataBaseConfig.php";
include "coreClasses/dataBase.php";
include "coreClasses/datbaseConnect.php";
include "coreClasses/GlobalFunctions.php";
include_from(url_appender()."coreClasses/DatabaseObjects/",".php");
include_from(url_appender()."coreClasses/dataBaseOperation/",".php");
//include_from(url_appender()."coreClasses/dataBaseOperation/",".php");
?>
