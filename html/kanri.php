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

// コメントの表示/非表示状態を切り替える処理
if (isset($_POST['messages_id']) && isset($_POST['visible-selection'])) {
  $commentId = $_POST['messages_id'];
  $visible = $_POST['visible-selection'];

  // コメントの表示/非表示状態をデータベースに更新するクエリを実行する
  $query = "UPDATE messages SET visible = 1 WHERE no = ' $visible'";
  $result = mysqli_query($con, $query);
  if (!$result) {
    exit('データを更新できませんでした。');
  }
}

// コメントを削除する処理
if (isset($_GET['delete_id'])) {
  $deleteId = $_GET['delete_id'];

  // コメントをデータベースから削除するクエリを実行する
  $query = "DELETE FROM messages WHERE no = '$deleteId'";
  $result = mysqli_query($con, $query);
  if (!$result) {
    exit('データを削除できませんでした。');
  }
}

// コメントデータを取得するクエリを実行する
$query = "SELECT * FROM messages ORDER BY no DESC";
$result = mysqli_query($con, $query);
if (!$result) {
  exit('クエリの実行に失敗しました。');
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>コメント管理</title>
</head>
<body>
  <h1>コメント管理</h1>
  <form action="" method="post">
    <table>
      <tr>
        <th>ID</th>
        <th>名前</th>
        <th>Email</th>
        <th>電話番号</th>
        <th>年齢</th>
        <th>メッセージ</th>
        <th>作成日時</th>
        <th>表示</th>
        <th>操作</th>
      </tr>
      <?php while ($row = mysqli_fetch_assoc($result)) : ?>
      <tr>
        <td><?php echo $row['no']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['fhone']; ?></td>
        <td><?php echo $row['age']; ?></td>
        <td><?php echo $row['message']; ?></td>
        <td><?php echo $row['created']; ?></td>
        <td>
          <input type="hidden" name="messages_id" value="<?php echo $row['no']; ?>">
          <input type="checkbox" name="visible-selection" value="<?php echo $row['no']; ?>">
        </td>
        <td>
          <a href="?delete_id=<?php echo $row['no']; ?>">削除</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </table>
    <input type="submit" value="選択した物を表示">
  </form>
</body>
</html>

<?php
// データベース接続を閉じる
mysqli_close($con);
?>
