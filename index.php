<?php
// ①staticを使ってみる
// ②アクセス修飾子をつける
// ③コンストラクタを理解する
// ④継承を使ってみる
require_once('blog.php');
ini_set('display_errors', "On");

$blog = new Blog();
// var_dump($dbc);
$blogData = $blog->getAll();

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
    <p><a href="/form.html">新規作成</a></p>
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
            <td><?php echo $blog->setCategoryName($column['category'])?></td>
            <td><a href="/detail.php?id=<?php echo $column['id'] ?>">詳細</a></td>
            <td><a href="/update_form.php?id=<?php echo $column['id'] ?>">編集</a></td>
            
        </tr>
        <?php endforeach; ?>
    </table>
    
</body>
</html>