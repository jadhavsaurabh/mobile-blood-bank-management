<?php
	require_once "connect_bank.php";
	if(isset($_POST["mail"]) && isset($_POST["password"]))
	{
		session_start();
		$mail=$_POST["mail"];
		$password=$_POST["password"];
		$_SESSION["mail"]=$mail;
		$_SESSION["password"]=$password;
		$query="select Email,Password from admin where Email='$mail' and Password='$password'";
		$query_run=mysqli_query($mycon,$query);
		if($query_run->num_rows >0)
		{
			header('Location:confirm.php');
		}
		else
		{
			echo 'Username and Password combinarions are not correct<a href="index.html">click here to retry</a>';
		}			
	}	
?>