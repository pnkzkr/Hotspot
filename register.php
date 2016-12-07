<?php
include_once('config.php');
session_start();
if(isset($_SESSION['user'])!="")
{
	header("Location: verify.php");
}

if(isset($_REQUEST['signup']))
{
	$uname = $_REQUEST['username'];
	$email = $_REQUEST['email'];
	$upass = $_REQUEST['password'];
	$mob = $_REQUEST['mob'];
	$sex = $_REQUEST['gender'];
	$bday = $_REQUEST['dob'];
	$activation=time();


	$query="INSERT INTO users (username,email,password,mobile,gender,date_of_birth,activation) 
				VALUES('$uname','$email','$upass','$mob','$sex','$bday',$activation)";
	if($result=mysqli_query($conn,$query))
	{
		

		// sending email

		$to=$email;
		$subject="Email verification";
		$body='Hi,Please verify your email and get started using your account'.$activation;
		if(mail($to,$subject,$body))
		{
			
			$_SESSION['user'] = $uname;
			$_SESSION['email']=$email;
			header("Location: verify.php");	
		}
		else
		{
			echo 'Error While Sending E-mail';
		}
	}
	else 
	{
	    echo "Error While Inserting Data";
	}
	
}


?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login & Registration</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>
<div id="login-form">
	<form method="post">
		<table align="center" width="35%" border="0">
			<tr>
				<td><input type="text" name="username" placeholder="Full Name" required /></td>
			</tr>
			<tr>
				<td><input type="email" name="email" placeholder="Email" required /></td>
			</tr>
			<tr>
				<td><input type="password" name="password" placeholder="Password" required /></td>
			</tr>
				<tr>
				<td><input type="text" name="mob" placeholder="Mobile" required /></td>
			</tr>
			<tr>
				<td><input type="text" name="gender" placeholder="Gender" required /></td>
				
			</tr>
			<tr>
				<td><input type="date" name="dob" placeholder="Birth_Date" required /></td>
			</tr>
			
			<tr>
				<td><button type="submit" name="signup">SignUp</button></td>
			</tr>
			
			<tr>
				<td><a href="login.php">Sign In</a></td>
			</tr>
		</table>
	</form>
</div>
</center>
</body>
</html>
