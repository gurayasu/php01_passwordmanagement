<?php

require_once('dbc.php');
$id = $_GET['id'];
$result = output_pw($id);

$id = $result['id'];
$name = $result['name'];
$content = $result['content'];
$comment = $result['comment'];
$pw = $result['pw'];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Update</title>
</head>
<body>
    <h2>Password Update</h2>
    <form action="update_table.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id ?>">
        <p>Name</p>
        <input type="text" name="name" value="<?php echo $name ?>">
        <p>Content</p>
        <input type="text" name="content" value="<?php echo $content ?>">
        <p>Comment</p>
        <textarea name="comment" cols="20" rows="5"><?php echo $comment ?></textarea>
        <p>Password</p>
        <input type="text" name="pw" value="<?php echo $pw ?>">
        <input type="submit" value="Update">
    </form>
    <p><a href="index.php">Back</a></p>
    
</body>
</html>