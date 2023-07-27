$(document).ready(function() {
  // ボタンがクリックされた時の処理
  $("#load-comments-btn").on("click", function() {
    // コメントを全て削除
    $("#comments-container").empty();

    // 新しいコメントを取得
    $.ajax({
      url: "get_new_comments.php",
      type: "GET",
      dataType: "json",
      success: function(response) {
        // 新しいコメントを表示
        $("#comments-container").append(response.output);
      },
      error: function() {
        console.error("コメントの取得に失敗しました。");
      }
    });
  });
});
