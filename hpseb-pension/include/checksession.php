<?php session_start();
if( !session_is_registered("ulogin"))
{
		header("Location:index.php?invalid=2");
}
if( !session_is_registered("utype"))
{
		header("Location:index.php?invalid=2");
}
?>