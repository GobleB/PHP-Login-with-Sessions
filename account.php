<?php  

require_once('initialize.php');

$userLogin = new LoginOptions();

session_start();

$user = '';

if(isset($_SESSION['username'])){
	$user = $_SESSION['username'];
}

if (strlen($user) < 5 ) {
	$userLogin->isNotLoggedIn();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div>Hello <?= $user ?>.</div> 
	<br>
	<div><a href="logout.php">Logout here.</a></div>
</body>
</html>