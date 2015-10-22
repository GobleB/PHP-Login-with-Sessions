<?php

require_once('initialize.php');

$userLogin = new LoginOptions();
$userCheck = new UsernameValidator();
$passCheck = new PasswordValidator();
$errorMan = new ErrorManager();

session_start();

$user = '';
$pass = '';

if(isset($_SESSION['username'])) {
    $userLogin->isLoggedIn();
}

if(isset($_POST['username'])) {
    $user = $_POST['username'];
}

if(isset($_POST['password'])) {
   $pass = $_POST['password'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($passCheck->isValid($pass)){
        if($userCheck->isValid($user)){
            $_SESSION['username'] = $user;
            $userLogin->isLoggedIn();
        } else{
            $errorMan->addError($user, 'Invalid Username. Username should be 5 alphabetic characters.');
        }
    } elseif ($userCheck->isValid($user)) {
        $errorMan->addError($pass, 'Invalid Password. Password should be at least 5 alpha numeric characters.');
    } else {
        $errorMan->addError($user, 'Invalid Username. Username should be 5 alphabetic characters.');
        $errorMan->addError($pass, 'Invalid Password. Password should be at least 5 alpha numeric characters.');
    }
}

$msg1 = '';
$msg2 = '';
$class1 = '';
$class2 = '';

if(array_key_exists($user, $errorMan->errors)) {
    $msg1 = $errorMan->errors[$user];
    $class1 = "errorBox";
}

if(array_key_exists($pass, $errorMan->errors)) {
    $msg2 = $errorMan->errors[$pass];
    $class2 = "errorBox";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form action="index.php" method="POST">

        <div>
            <label>Username:</label>
            <input type="text" name="username" value="<?= $user ?>" class=<?=$class1?> >
            <span class="error"><?= $msg1 ?></span>
        </div>

        <div>
            <label>Password:</label>
            <input type="password" name="password" value="<?= $pass ?>" class=<?=$class2?> >
            <span class="error"><?= $msg2 ?></span>
        </div>

        <button>Login</button>

    </form>

</body>
</html>