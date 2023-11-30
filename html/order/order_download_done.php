<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
    print'ログインされていません。<br/>';
    print'<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
    exit();
}
else
{
    print $_SESSION['staff_name'];
    print 'さんログイン中<br/>';
    print'<br/>';
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ろくまる農園</title>
</head>
<body>

<?php

try{

    $dsn = 'mysql:dbname=shop;host=mysql;port=3306;charset=utf8mb4';
    $user = 'root';
    $password = 'root';
    $dbh =new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT code,name FROM mst_staff WHERE 1';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $dbh = null;

    
}
    
    catch (Exception $e)
    {
        print'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
    
?>

<br/>
<a href="../staff_login/staff_top.php">トップメニューへ</a><br/>

</body>
</html>