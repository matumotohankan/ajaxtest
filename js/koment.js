$("#load-comments-btn").on("click", function() {
  $.ajax({
    url: "get_comments.php", // コメントを取得するPHPファイルのパス
    type: "GET",
    dataType: "json",
    data: { lastID: lastCommentID }, // 最後に取得したコメントのIDを送信
    success: function(response) {
      // 新しいコメントがあれば追加表示
      if (response.length > 0) {
        response.forEach(function(comment) {
          $("#comments-container").append("<p>" + comment.message + "</p>");
        });

        // 最後に取得したコメントのIDを更新
        lastCommentID = response[response.length - 1].id;
      }
    },
    error: function() {
      console.error("コメントの取得に失敗しました。");
    }
  });
});
