<?php

require_once('dbc.php');
$id = $_GET['id'];

$dbh = dbconnect();

$sql = 'DELETE FROM gs_pw_table WHERE id=:id';

$stmt = $dbh->prepare($sql);
$stmt->bindValue(':id',(int)$id,PDO::PARAM_INT);
$stmt->execute();
echo 'Password is deleted!!';

?>

<p><a href="index.php">Back to top page</a></p>