<?php

session_start();
require_once '../classes/UserLogic.php';
require_once '../public/functions.php';
ini_set('display_errors',true);

$result = UserLogic::checkLogin();

if(!$result){
    $_SESSION['login_err'] = 'Please register as a user!';
    header('Location: signup.php');
    return;
}

$login_user = $_SESSION['login_user'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page</title>
</head>
<body>
    <h2>My Page</h2>
    <p>Login User: <?php echo h($login_user['name']); ?></p>
    <p>Email: <?php echo h($login_user['email']); ?></p>
    <p>Password Management: <a href="../index.php">Go to Password Page!</a></p>
    <form action="logout.php" method="POST">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>
</html>