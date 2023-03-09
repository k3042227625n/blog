<?php

// namespace Blog\Dbc;

// 1.データベース接続
// 引数:なし
// 返り値:接続結果を返す
function dbConnect() {
    $dsn = 'mysql:host=localhost;dbname=blog_app;charset=utf8';
    $user = 'blog_user';
    $pass = '00000abc';

    try {
        $dbh = new \PDO($dsn,$user,$pass,[
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        ]);    
    } catch(PDOException $e) {
        echo '接続失敗'. $e->getMessage();
        exit();
    };

    return $dbh;
}
    
// 2.データを取得する
// 引数:なし
// 返り値:取得したデータ
function getAllBlog() {
    $dbh = dbConnect();
    // 1.SQLの準備
    $sql = 'SELECT * FROM blog';
    // 2.SQLの実行
    $stmt = $dbh->query($sql);
    // 3.SQLの結果を受け取る
    $result = $stmt->fetchall(\PDO::FETCH_ASSOC);
    return $result;
    $dbh = null;
}
// 取得したデータを表示
$blogData = getAllBlog();


// 3.カテゴリー名を表示
// 引数:数字
// 返り値:カテゴリーの文字列
function setCategoryName($category) {
    if ($category === '1') {
        return '日常';
    } elseif ($category === '2') {
        return 'プログラミング';
    } else {
        return 'その他';
    }
    
}

// 引数:$id
// 返り値:$result
function getBlog($id) {
    if(empty($id)) {
        exit('IDが不正です。 ');
    }
    
    $dbh = dbConnect();
    
    // SQL準備
    $stmt = $dbh->prepare('SELECT * FROM blog Where id = :id');
    $stmt->bindValue(':id', (int)$id, \PDO::PARAM_INT);
    
    // SQL実行
    $stmt->execute();
    
    // 結果を取得
    $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    
    if(!$result) {
        exit('ブログがありません');
    }

    return $result;
}

?>


