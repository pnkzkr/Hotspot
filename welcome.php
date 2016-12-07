<?php
session_start();
include_once 'config.php';
if(!isset($_SESSION['user']))
{
	header("Location:login.php");
}
$res = "SELECT * FROM users WHERE email='".$_SESSION['user']."'";
$result = mysqli_query($conn,$res);
if($row = mysqli_fetch_array($result))
{	
	$username=$row['username'];
	$mail=$row['email'];
	$mob=$row['mobile'];
	$gender=$row['gender'];
	$dob=$row['date_of_birth'];
}
?>







<html>
<head>

<title><?php echo "$mail" ?></title>
</head>
<body>
	<div>
		<label>Welcome...</label><?php echo "$username"; ?>
		<div align="right"><a href="logout.php?" >Sign Out</a></div>
	</div>
	<br>


<table align='center' border='1'>
	<tr>
		<td>Name</td>
		<td>E_Mail</td>
		<td>Mobile_No</td>
		<td>Gender</td>
		<td>Date_of_Birth</td>
	</tr>
	<tr>
		<td><?php echo "$username"; ?></td>
		<td><?php echo "$mail"; ?></td>
		<td><?php echo "$mob"; ?></td>
		<td><?php echo "$gender"; ?></td>
		<td><?php echo "$dob"; ?></td>
	</tr>
	
	
</table>


</body>
</html>