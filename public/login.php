<?php


session_start();
require_once '../classes/UserLogic.php';
ini_set('display_errors',true);


//Erroer
$err = [];

//Varidation

if(!$email = filter_input(INPUT_POST,'email')){
    $err['email']='※ Please input email.';
}

if(!$password = filter_input(INPUT_POST,'password')){
    $err['password']='※ Please input password.';
}


if(count($err) > 0){
    //login 
    $_SESSION=$err;
    header('Location: login_form.php');
    return;
}

$result = UserLogic::login($email, $password);

//Login 失敗！
if(!$result){
    header('Location: login_form.php');
    return;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Completed</title>
</head>
<body>
    <h2>Login Completed</h2>
    <p>Login is completed!</p>
    <p><a href="mypage.php">Go to My Page</a></p>
</body>
</html>