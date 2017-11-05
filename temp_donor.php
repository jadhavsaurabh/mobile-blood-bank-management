<?php
		require_once "connect_bank.php";
		session_start();
		$mail=$_SESSION["mail"];
		$password=$_SESSION["password"];
		$amount=$_POST["amount"];
		$address=$_POST["address"];
		$mob=$_POST["mobno"];
		$date=date("Y/m/d");	
		$query="call myproc('$mail','$mob','$date','address',$amount)";
		$query_run=mysqli_query($mycon,$query);
		if($query_run)
		{
			require 'PHPMailer-master/PHPMailerAutoload.php';
			$mailto = "jadhavsaurabh1998@gmail.com";	//admin email
			$mailSub = "Confimation MAIL";
			$mailMsg = "http://localhost/prac/confirm.php";
			$mail = new PHPMailer();
			$mail ->IsSmtp();
			$mail ->SMTPDebug = 0;
			$mail ->SMTPAuth = true;
			$mail ->SMTPSecure = 'ssl';
			$mail ->Host = "smtp.gmail.com";
			$mail ->Port = 465; // or 587
			$mail ->IsHTML(true);
			$mail ->Username = "saurabhj1018@gmail.com"; //session mail
			$mail ->Password = "sl1sl3miniproject";				//session password
			$mail ->SetFrom("saurabhj1018@gmail.com");		//session mail
			$mail ->Subject = $mailSub;
			$mail ->Body = $mailMsg;
			$mail ->AddAddress($mailto);
			if(!$mail->Send())
			{
				echo "Mail Not Sent";
				header('Location:receiptdonor.php');
			}
		    else
		    {
			    echo "Request Sent your donation record will be update as soon as you donate";	
				header('Location:receiptdonor.php');
		    }
		}
		else
		{
			echo 'pls try again';
		}			
?>
