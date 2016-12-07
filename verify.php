<?php

session_start();
include('config.php');

if(!isset($_SESSION['user']) &&!isset($_SESSION['email']))
{
	header("Location:login.php");
}

if(isset($_REQUEST['vrfy']))
{
	$code=$_REQUEST['activation_code'];
	$email=$_SESSION['email'];
	$c=mysqli_query($conn,"SELECT id FROM users WHERE email='$email'");
	if(mysqli_num_rows($c) > 0)
	{
		$count=mysqli_query($conn,"SELECT id FROM users WHERE activation='$code' and status='Pending'");
	
		if(mysqli_num_rows($count) == 1)
		{	

			mysqli_query($conn,"UPDATE users SET status='active' WHERE activation='$code'");
			
			echo "Your account is activated"; 
		}
		else
		{
			echo "Your account is already active, no need to activate again";
		}
	}
	else
	{
		echo "Please try again";
	}
}

?>


<html>
<head>
<title>Welcome to verification page</title>
</head>
<body>
<br></br><br></br>
Enter the activation code
<form action="" method="post">
<input type="text" name = "activation_code">
<button type="submit" name="vrfy">Verify</button>
<div align="right"><a href="login.php?" >Exit</a></div>
</form>
</body>
</html>
