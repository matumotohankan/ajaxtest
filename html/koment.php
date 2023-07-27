<!DOCTYPE html>

<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ドラゴンボール映画ランキング感想</title>
<link rel="stylesheet" href="../css/kansou.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <!-- CDN読み込み -->
 <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
 <!-- CSSファイル読み込み -->
 <link rel="stylesheet" href="../css/ranking.css" />
 <link rel="stylesheet" href="../berry-mini-1.37" />
</head>
<body>

    <div class="buro1">
<div class="buro">
    <img src="../img/timaturi.jpg">
</div>

<div class="buro2">
    <p>
        感想や聞きたいことがあれば下に書いて送ってくれ　ああああああ
    </p>
</div>

    </div>

    <div id="comments-container"></div>



    <button id="load-comments-btn">新しいコメントを読み込む</button>

    <div id="commentSection">
    <?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'kansou';
$con = mysqli_connect($host, $username, $password, $database);

if (!$con) {
  exit('データベースに接続できませんでした。');
}

mysqli_set_charset($con, 'utf8');

$query = "SELECT * FROM messages WHERE visible = 1 ORDER BY no DESC";
$result = mysqli_query($con, $query);
if (!$result) {
  exit('クエリの実行に失敗しました。');
}

while ($data = mysqli_fetch_array($result)) {
  echo "<p>\n";
  echo '<strong>[No.' . $data['no'] . '] ' . htmlspecialchars($data['name'], ENT_QUOTES) . ' ' . $data['created'] . "</strong><br />\n";
  echo "<br />\n";
  echo nl2br(htmlspecialchars($data['message'], ENT_QUOTES));
  echo "</p>\n";
}

mysqli_close($con);

?></div>


<form action="regist.php" method="post">
  名前：<br />
  <input type="text" name="name" size="30" value="" /><br />
  メールアドレス：<br />
  <input type="text" name="email" size="30" value="" /><br />
  電話番号：<br />
  <input type="text" name="phone" size="30" value="" /><br />
  年齢：<br />
  <input type="text" name="age" size="30" value="" /><br />
  メッセージ：<br />
  <textarea name="message" cols="30" rows="5"></textarea><br />
  <br />
  <input type="submit" value="投稿する" />
</form>



<script src=" https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="js/koment.js"></script>
</body>
</html>