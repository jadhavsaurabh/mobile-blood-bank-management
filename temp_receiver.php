<?php
		require_once "connect_bank.php";
		session_start();
		$mail=$_SESSION["mail"];
		$amount=$_POST["amount"];
		$address=$_POST["address"];
		$mob=$_POST["mobno"];
		$date=date("Y/m/d");
		$query="call myproc2('$mail','$mob','$date','address',$amount)";
		$query_run=mysqli_query($mycon,$query);
		if($query_run)
		{
			require 'PHPMailer-master/PHPMailerAutoload.php';
			$mailto = $mail;
			$mailSub = "Confimation MAIL";
			$mailMsg = "http://localhost/prac/confirm.php" please confirm this when you reciver your requested blood";
			$mail = new PHPMailer();
			$mail ->IsSmtp();
			$mail ->SMTPDebug = 0;
			$mail ->SMTPAuth = true;
			$mail ->SMTPSecure = 'ssl';
			$mail ->Host = "smtp.gmail.com";
			$mail ->Port = 465; // or 587
			$mail ->IsHTML(true);
			$mail ->Username = "saurabhj1018@gmail.com"; 
			$mail ->Password = "sl1sl3miniproject";		
			$mail ->SetFrom("saurabhj1018@gmail.com");		
			$mail ->Subject = $mailSub;
			$mail ->Body = $mailMsg;
			$mail ->AddAddress($mailto);
			if(!$mail->Send())
			{
				echo "Mail Not Sent";
				header('Location:receiptreceiver.php');
			}
		    else
		    {
			    echo "Mail sent on your gmail confirm it when you receive blood";
				header('Location:receiptreceiver.php');
		    }
		}
		else
		{
			echo 'pls try again';
		}			
?>
