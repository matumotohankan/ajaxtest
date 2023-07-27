<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一言</title>
</head>
<body>
<?php

if ($_POST['name'] == '' || $_POST['message'] == '') {
  exit('error');
}

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'kansou'; // 実際のデータベース名に変更する

$con = mysqli_connect($host, $username, $password, $database);
if (!$con) {
  exit('データベースに接続できませんでした。');
}

mysqli_set_charset($con, 'utf8');

$name    = $_POST['name'];
$email   = $_POST['email'];
$phone   = $_POST['fhone']; // 正しい列名を指定する
$age     = $_POST['age'];
$message = $_POST['message'];
$created = date('Y-m-d H:i:s');

$stmt = mysqli_prepare($con, "INSERT INTO messages(name, email, fhone, age, message, created) VALUES(?, ?, ?, ?, ?, ?)"); // 列名を修正する
mysqli_stmt_bind_param($stmt, 'ssisss', $name, $email, $phone, $age, $message, $created); // パラメータの型を修正する
$result = mysqli_stmt_execute($stmt);

$stmt = mysqli_prepare($con, "INSERT INTO comments(name, email, fhone, age, message, created) VALUES(?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, 'ssisss', $name, $email, $phone, $age, $message, $created);
$result = mysqli_stmt_execute($stmt);

if (!$result) {
  exit('データを登録できませんでした。');
}

mysqli_close($con);

?>
<p>メッセージを投稿しました。</p>
<ul>
  <li><a href="koment.php">一覧へ戻る</a></li>
</ul>
</body>
</html>