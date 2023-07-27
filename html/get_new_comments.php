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

$output = '';
while ($data = mysqli_fetch_array($result)) {
  $output .= "<p>\n";
  $output .= '<strong>[No.' . $data['no'] . '] ' . htmlspecialchars($data['name'], ENT_QUOTES) . ' ' . $data['created'] . "</strong><br />\n";
  $output .= "<br />\n";
  $output .= nl2br(htmlspecialchars($data['message'], ENT_QUOTES));
  $output .= "</p>\n";
}

mysqli_close($con);

echo $output;
?>