<?php
$conn=mysqli_connect("localhost","root","","admin");
if(!$conn)
{
	die('connection problem detected'. mysqli_connect_error());
}
?>