<?php

require_once('dbc.php');
// // 取得したデータを表示

$blogData = getAllBlog();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブログ一覧</title>
</head>
<body>
    <h2>ブログ一覧</h2>
    <table>
        <tr>
            <td>No.</td>
            <td>タイトルtle</td>
            <td>カテゴリ</td>
        </tr>
        <?php foreach($blogData as $column): ?>
        <tr>
            <td><?php echo $column['id'] ?></td>
            <td><?php echo $column['title'] ?></td>
            <td><?php echo setCategoryName($column['category'])?></td>
            <td><a href="/detail.php?id=<?php echo $column['id'] ?>">詳細</a></td>
            
        </tr>
        <?php endforeach; ?>
    </table>
    
</body>
</html>