<?php
	// remove all session variables
session_start();
session_unset(); 
// destroy the session 
session_destroy(); 	
$_SESSION["mail"]=NULL;
$_SESSION["password"]=NULL; 
echo $_SESSION["password"];
echo $_SESSION["mail"];
header('Location:index.html');
?>