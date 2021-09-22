<?php

function dbconnect(){

$dsn = 'mysql:host=localhost;dbname=gs_db;charset=utf8';
$user = 'gs_pw_table';
$pass = null;

try{
    $dbh = new PDO ($dsn, $user,$pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    //echo '接続成功';
    } catch(PDOException $e){
        echo '接続失敗'.$e->getMessage();
        exit();
    };
    return $dbh;
}


function getpw(){

$dbh = dbconnect();

//SQL prepration
$sql = 'SELECT * FROM gs_pw_table';

//SQL action
$stmt = $dbh->query($sql);

//SQL result recive
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($result);

return $result;

$dbh = null;
// var_dump($bdh);
}

function output_pw ($id){

if(empty($id)){
    exit('idが不正です。');
}

    
$dbh = dbconnect();

//SQL prepration
$stmt = $dbh->prepare('SELECT * FROM gs_pw_table WHERE id = :id');
$stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);

//SQL action
$stmt->execute();

//result
$result = $stmt->fetch(PDO::FETCH_ASSOC);
//var_dump($result);

if(!$result){
    exit('PWが正しく登録されていません。');
}

return $result;

}

?>