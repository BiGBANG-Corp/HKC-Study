$(function() {

    $('#spinner').hide();

    $('#commentAdd').on('click', function() {
        
        let comment = $('#commentText').val();

        if ($.trim(comment) !== '') {
            addComment();
        }
        
    });

});


function addComment()
{
    $.ajax({
        url : '/sample/post/add-comment',
        data: {
            post_id : $('#postId').val(),
            comment : $('#commentText').val()
        },
        beforeSend: function() {
            $('#spinner').show();
            $('#commentAdd').prop('disabled', true);
        }
    })
    .done(function(jsonData) {
        
        addCommentList(jsonData);
        $('#commentText').val('');

    })
    .fail(function() {

        alert('通信中にエラーが発生しました。');

    })
    .always(function() {

        $('#spinner').hide();
        $('#commentAdd').prop('disabled', false);

    });
}


function addCommentList(jsonData)
{
    let tag = `
        <div class="card mb-3">
            <div class="card-body">
                <div>
                    ${jsonData.comment_content}
                </div>
                <div class="d-flex justify-content-end mt-2 text-secondary">
                    コメント日時： ${jsonData.created_at}
                </div>
            </div>
        </div>
    `;

    $('#commentList').prepend(tag);
}