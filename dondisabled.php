<!DOCTYPE html>
<html lang="en">
<head>
<style>
.welcome{
margin-left:140px;
padding:15px;
width:80%;
text-align:center;
margin-top:150px;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>Quasar - MultiPurpose Template, Landing Page, Single Page Template, One Page Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<!-- Le styles -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/animate.css" rel="stylesheet">
<link href="assets/css/skin-blue.css" rel="stylesheet">
<!-- Le fav -->
<link rel="shortcut icon" href="assets/ico/favicon.png">
<!--[if lt IE 9]>
<style>
nav,.container,header#top-section,.carousel,.demobutton {display:none;}
</style>
<div id='browserWarning'>
You are using an outdated version of Internet Explorer. Please, switch to
<a style="color:red;" href='http://getfirefox.com'>Firefox</a>,
<a style="color:red;" href='http://www.google.de/chrome'>Google Chrome</a>
,
<a style="color:red;" href='http://www.apple.com/safari/'>Safari</a>
or the latest version of
<a style="color:red;" href='http://windows.microsoft.com/en-US/internet-explorer/downloads/ie'>Internet Explorer</a>
for a
<span class='bold'>better</span>
and
<span class='bold'>safer</span>
experience.
</div>
<![endif]-->
</head>
<?php
require_once "connect_bank.php";
session_start();
$mail=$_SESSION["mail"];
$query="select Date from final_donor where Email='$mail' order by Date desc limit 1";
$query1="select Date_OF_Birth from users where Email='$mail'";
$query_run1=mysqli_query($mycon,$query1);
$dob=mysqli_fetch_assoc($query_run1);
		$db=$dob["Date_OF_Birth"];
		$db=strtotime($db);
$error="";
$query_run=mysqli_query($mycon,$query);

if (isset($_POST["proceed"])) 
{
	if ($query_run) 
	{
		/*$error1=strtotime("07 October 2017");
		$error2=strtotime("08 October 2017");
		$error=$error2-$error1;*/
		
		$row=mysqli_fetch_assoc($query_run);
		$Date=$row["Date"];
		$today=date("y-m-d");
		$error2=strtotime($today);
		$error1=strtotime($Date);
		$error=$error2-$error1;
		$agecheck=$error2-$db;
		if($error<7890000 || $agecheck<567648000)
		{
			$error="<b><i>*Sorry, You are not eligible</i></b>";
		}
		else{
			header("location:donbook.html");
		}

	}
	else
	{
		$error="Failed";
	}
	
}

else if(isset($_POST["eligibility"]))
{
	if ($query_run) 
	{
		/*$error1=strtotime("07 October 2017");
		$error2=strtotime("08 October 2017");
		$error=$error2-$error1;*/
		$row=mysqli_fetch_assoc($query_run);
		$Date=$row["Date"];
		$today=date("y-m-d");
		$error2=strtotime($today);
		$error1=strtotime($Date);
		$error=$error2-$error1;
		$agecheck=$error2-$db;
		if($error<7890000||$agecheck<567648000)
		{
			$error="<b><i>*Sorry, You are not eligible</i></b>";
		}
		else{
			$error="You are Eligible For Dnation Go Ahead";
			//header("location:dondisabled.php");

		}

	}
	else
	{
		$error="Failed";
	}
}


?>
<!-- /head-->
<body data-spy="scroll" data-target=".navbar">
<nav id="topnav" class="navbar navbar-fixed-top navbar-default" role="navigation">
<div class="container">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#top-section">Blood Donation</a>
	</div>
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav navbar-right">
			<li><a href="frontpage.php">Home</a></li>
			<li><a href="profile.php">Profile</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<!-- /.navbar-collapse -->
</div>
</nav>
<div class="container">
	<div class="welcome" >
  <h1>Welcome Donor</h1>
</div>
  <div class="row">
    <div class="col-sm-6" >
    	<form action="dondisabled.php" method="POST">
	<p style="color:red;"><?php echo $error ?>;</p>
    <input style="height:100px; width: 500PX;" name="proceed" type="submit" class="btn btn-info btn-lg" value="Proceed"><br>    
	<div style="margin-top:35px;" >
	<input style="height:100px; width: 500PX;" name="eligibility" type="submit" class="btn btn-info btn-lg" value="Check Eligibility">
	<br><br>
	</div>
</form>
	
	
<div class="container">

  <!-- Trigger the modal with a button -->


<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="margin-top:200px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         <form action="eligibility.php" method="POST">
		<label style="padding-right:50px;">I am looking For-</label>
		<select name="Blood_Group">
			<option value="A+">A+</option>
			<option value="A-">A-</option>
			<option value="B+">B+</option>
			<option value="B-">B-</option>    
			<option value="AB+">AB+</option>
			<option value="AB-">AB-</option>
			<option value="O+">O+</option>
			<option value="O-">O-</option>
		</select>
		<br>
		<br>
		<label style="padding-right:104px;">Amount-</label>
		<select name=" xx-ml">
			<option value="250">350</option>
			<option value="300">700</option>
			<option value="450">1050</option>
			<option value="500">1400</option>    
		</select>
	    <br>
		<br>
		<label style="padding-right:-0px;padding-left:20px;">Location-</label>
		<input type="text" value="Pin Code">
		<br>
		<br>
		<input type="submit" value="Check.." name="check">
	</form>
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>


    </div>
		<div class="col-sm-6">
			<img src="http://platelets.blood.co.uk/images/donation-process.jpg" height=290px width=555px>
		</div>
  </div>
</div>
<br>
<br>
<br>
<br>
<br>
<footer id="foot-sec">
<div class="footerdivide">
</div>
<div class="container ">
<div class="row">
	<div class="text-center color-white col-sm-12 col-lg-12">
		<p style="font-size: 20px;">
			 &copy Group-5,L9-Batch,TE-9,PICT.<br>
			 Guidance: Mr. Kamble Sir,Mr.Murumkar Sir.
		</p>
	</div>
</div>
</div>
</footer>
<!-- Le javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/jquery.parallax-1.1.3.js" type="text/javascript"></script>
<script src="assets/js/jquery.localscroll-1.2.7-min.js" type="text/javascript"></script>
<script src="assets/js/jquery.scrollTo-1.4.6-min.js" type="text/javascript"></script>
<script src="assets/js/jquery.bxslider.min.js"></script>
<script src="assets/js/jquery.placeholder.js"></script>
<script src="assets/js/modernizr.custom.js"></script>
<script src="assets/js/toucheffects.js"></script>
<script src="assets/js/animations.js"></script>
<script src="assets/js/init.js"></script>
</body>
</html>

