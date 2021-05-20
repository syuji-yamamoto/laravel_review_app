$("#new_comment").on('submit', function (e) {
  e.preventDefault();
  let comment = $("#comment").val();
  let nickName = $('#user-id').attr('name') 
  let bookId = $("#book-id").val();
  $.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
  });
  $.ajax({
    //POST通信
    type: "post",
    //ここでデータの送信先URLを指定します。
    url: "/ajaxcomment",
    dataType: "json",
    data: {
      nickname: nickName,
      book_id: bookId,
      comment: comment,
    },

  })
  //通信が成功したとき
  .done((result) => {
    console.log(result)
    html = `
            <div class="border-top">
              <p>
                投稿者：${result.nickname}<br>
                コメント：${result.comment}
              </p>
            </div>
           `;
    $("#ajax_comment").append(html);
    })
    
  //通信が失敗したとき
  .fail((error) => {
    console.log(error.statusText);
  });
});