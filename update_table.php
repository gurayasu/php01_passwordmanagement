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

$dbh = dbconnect();

$sql = 'UPDATE gs_pw_table SET
            name=:name,content=:content,pw=:pw,comment=:comment,indate=sysdate()
        WHERE
            id=:id';

$dbh = dbconnect();
$dbh->beginTransaction();

try{
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id',(int)$input['id'],PDO::PARAM_INT);
    $stmt->bindValue(':name',$input['name'],PDO::PARAM_STR);
    $stmt->bindValue(':content',$input['content'],PDO::PARAM_STR);
    $stmt->bindValue(':pw',$input['pw'],PDO::PARAM_STR);
    $stmt->bindValue(':comment',$input['comment'],PDO::PARAM_STR);
    $stmt->execute();
    $dbh->commit();
    echo 'Inforamtion is updated!!';
}catch(PDOException $e){
    $dbh->rollBack();
    exit($e);
}

?>

<p><a href="index.php">Back to top page</a></p>