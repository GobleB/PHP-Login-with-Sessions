<?php  

require_once('initialize.php');

$user = new LoginOptions;

session_start();

$username = '';

if(isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
	echo $username . ", you are being logged."; 
	$user->logout();
	header("Refresh: 3; url=index.php");
	exit();
} else {
	header("Location: index.php");
	exit();
}

?>