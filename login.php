<?php
session_start();
include_once('config.php');
if(isset($_SESSION['user'])!="")
{
	header("Location: welcome.php");
}

if(isset($_REQUEST['signin']))
{
	$email = $_REQUEST['email'];				
	$upass = $_REQUEST['password'];

	$sql="SELECT email,password FROM users WHERE email='$email'";
	$result=mysqli_query($conn,$sql);
	$row	= mysqli_fetch_array($result);
	
	if($row['password']==$upass)
	{
		$_SESSION['user'] = $row['email'];
		header("Location: welcome.php");
	}
	else
	{
		?>
        <script>alert('Invalid E-mail id or Password');</script>
        <?php
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
		<table align="center" width="30%" border="0" >
			<tr>
				<td style="background-color:#0097ff; color:black; padding:15px; align:center;"><b>Login</b></td>
			</tr>
			<tr>
				<td><input type="text" name="email" placeholder="Email_Id" required /></td>
			</tr>
			<tr>
				<td><input type="password" name="password" placeholder="Password" required /></td>
			</tr>
			<tr>
				<td><button type="submit" name="signin">Sign In</button></td>
			</tr>
			<tr>
				<td><a href="register.php">Sign Up</a></td>
			</tr>
		</table>
	</form>
</div>
</center>
</body>
</html>

