<?php
mb_internal_encoding("utf8");

//セッションスタート
session_start();

//DB接続・try catch文
try{
    $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
} catch (PDOExeption $e){
    die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセス出来ません。<br>しばらくしてから再度ログインをしてください。</p>
    <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>");
}

//preparedステートメント(update)でSQLをセット$ //bindValueメソッドでパラメータをセット
$stmt = $pdo->prepare("update login_mypage set name=?,mail=?,password=?,comments=?
                    where mail=? && password=?");

$stmt->bindvalue(1,$_POST['name']);
$stmt->bindvalue(2,$_POST['mail']);
$stmt->bindvalue(3,$_POST['password']);
$stmt->bindvalue(4,$_POST['comments']);
$stmt->bindvalue(5,$_SESSION['mail']);
$stmt->bindvalue(6,$_SESSION['password']);

//executeでクエリを実行
$stmt->execute();

//preparedステートメント(更新された情報をDBからselect文で取得)でSQLをセット$ //bindValueメソッドでパラメータをセット
$stmt = $pdo->prepare("select * from login_mypage where mail=? && password=?");

$stmt->bindvalue(1,$_SESSION['mail']);
$stmt->bindvalue(2,$_SESSION['password']);

//executeでクエリを実行
$stmt->execute();

//データベースを切断
$pdo=NULL;

//fetch・while文でデータ取得し、sessionに代入
while($row = $stmt->fetch()){
    $_SESSION['name'] = $row['name'];
    $_SESSION['mail'] = $row['mail'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['path_filename'] = $row['picture'];
    $_SESSION['comments'] = $row['comments'];
}
//mypage.phpへリダイレクト
header("location:http://localhost/login_mypage/login_mypage/mypage.php");

?>