<?php
session_start();
if(session_destroy())
{
	header("Location: login.php");
}

if(isset($_GET['logout']))
{
	session_destroy();
	unset($_SESSION['user']);
	header("Location: login.php");
}
?>
