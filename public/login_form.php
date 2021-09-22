<?php

session_start();

require_once '../classes/UserLogic.php';

$result = UserLogic::checkLogin();
if($result){
    header('Location: mypage.php');
    return;
}


$err = $_SESSION;
$_SESSION = array();
session_destroy();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
</head>
<body>
    <h2>Login Form</h2>
    <?php if(isset($err['msg'])): ?>
            <p><?php echo $err['msg']; ?></p>
        <?php endif; ?>
    <form action="login.php" method="POST">
    <p>
        <label for="email">Email: </label>
        <input type="email" name="email">
        <?php if(isset($err['email'])): ?>
            <p><?php echo $err['email']; ?></p>
        <?php endif; ?>
    </p>
    <p>
        <label for="password">Password: </label>
        <input type="password" name="password">
        <?php if(isset($err['password'])): ?>
            <p><?php echo $err['password']; ?></p>
        <?php endif; ?>
    </p>
    <p>
        <input type="submit" value="Login">
    </p>
    <a href="signup.php">New Registration is here.</a>
    </form>    

</body>
</html>