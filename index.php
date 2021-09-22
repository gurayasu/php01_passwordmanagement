<?php

require_once('dbc.php');
$pwdata = getpw();

function h($s){
    return htmlspecialchars($s, ENT_QUOTES, 'UTD-8');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Manager</title>
</head>
<body>
    <h2>Password Manager</h2>
    <h3>≪My Password list≫</h3>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Content</th>
            <th>Comment</th>
            <th>Date</th>
            <th>Password</th>
        </tr>
        <?php foreach($pwdata as $column):?>
        <tr>
            <td><?php echo h($column['name']) ?></td>
            <td><?php echo h($column['content']) ?></td>
            <td><?php echo h($column['comment']) ?></td>
            <td><?php echo h($column['indate']) ?></td>
            <td><a href="detail.php?id=<?php echo $column['id'] ?>">Password</a></td>
            <td><a href="update.php?id=<?php echo $column['id'] ?>">Update</a></td>
            <td><a href="delete.php?id=<?php echo $column['id'] ?>">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <h3>≪<a href="form.html">New Password Register</a>≫</h3>
    <a href="public/mypage.php">Back to My Page</a>
</body>
</html>
