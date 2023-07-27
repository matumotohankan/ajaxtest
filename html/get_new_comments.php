<?php
// データベース接続情報などの設定
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'kansou';
$con = mysqli_connect($host, $username, $password, $database);

if (!$con) {
  exit('データベースに接続できませんでした。');
}

mysqli_set_charset($con, 'utf8');

// コメントを10件取得するクエリの作成（例として可視性が1のコメントを取得）
$query = "SELECT * FROM messages WHERE visible = 1 ORDER BY no DESC LIMIT 10";
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

// コメントをJSON形式で出力
echo json_encode(array('output' => $output));
?>