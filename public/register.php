<?php

session_start();
require_once '../classes/UserLogic.php';
ini_set('display_errors',true);

//Error
$err = [];

$token = filter_input(INPUT_POST,'csrf_token');

//token無しOR違う
if(!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']){
    exit('不正なリクエスト');
}

//Variation
if(!$username = filter_input(INPUT_POST,'username')){
    $err[]='※ Please input Username.';
}
if(!$email = filter_input(INPUT_POST,'email')){
    $err[]='※ Please input email.';
}

$password = filter_input(INPUT_POST,'password');
if(!preg_match("/\A[a-z\d]{8,100}+\z/i",$password)){
    $err[]='※ Please use Alphabet or Number (8~100 Charcters).';
}

$password_conf = filter_input(INPUT_POST,'password_conf');
if($password !== $password_conf){
    $err[]='※ Password(Confirm) is different from Password.';
}

if(count($err)===0){
    $hasCreated = UserLogic::createUser($_POST);

    if(!$hasCreated){
        $err[]='※ Registration is not success!';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Complete</title>
</head>
<body>
<?php if(count($err) > 0):?>
<?php foreach($err as $e):?>
<p><?php echo $e ?></p>
<?php endforeach; ?>
<?php else: ?>
    <p>User registration is completed!</p>
<?php endif ?>
    <p><a href="signup.php">Back</a></p>
</body>
</html>
