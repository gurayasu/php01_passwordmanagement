<?php

require_once ('dbc.php');
$input = $_POST;

if(empty($input['name'])){
    exit('Please input your name.');
}

if(mb_strlen($input['name']) > 190){
    exit ('Please input name under 190 chracters.');
}

if(empty($input['content'])){
    exit('Please input content.');
}

if(empty($input['pw'])){
    exit('Please input your password.');
}

if(mb_strlen($input['pw']) > 190){
    exit ('Please input pw under 190 chracters.');
}

$sql = 'INSERT INTO
            gs_pw_table(id,name,content,pw,comment,indate)
        VALUES
            (NULL,:name,:content,:pw,:comment,sysdate())';

$dbh = dbconnect();
$dbh->beginTransaction();

try{
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name',$input['name'],PDO::PARAM_STR);
    $stmt->bindValue(':content',$input['content'],PDO::PARAM_STR);
    $stmt->bindValue(':pw',$input['pw'],PDO::PARAM_STR);
    $stmt->bindValue(':comment',$input['comment'],PDO::PARAM_STR);
    $stmt->execute();
    $dbh->commit();
    echo 'New Password is registered!!';
}catch(PDOException $e){
    $dbh->rollBack();
    exit($e);
}

?>

<p><a href="index.php">Back to top page</a></p>