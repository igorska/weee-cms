/* Global */
function notify(msg, duration) {
    $("#notify").html(msg).show('highlight').delay(duration||2000).hide('highlight');
}

/* Accounts */
function subscribeTag(id) {
    $("#subscribe_button").replaceWith('<a href="#" id="unsubscribe_button" class="subscribe-button" onClick="unsubscribeTag(' + id + '); return false;">Отписаться</a>');

    $.ajax({
        url : '/posts/tag/subscribe/id/' + id,
        dataType : 'json',
        success : function (response) {
            console.log(response.msg);
        }
    })
}

function unsubscribeTag(id) {
    $("#unsubscribe_button").replaceWith('<a href="#" id="subscribe_button" class="subscribe-button" onClick="subscribeTag(' + id + '); return false;">Подписаться</a>');
        
    $.ajax({
        url : '/posts/tag/unsubscribe/id/' + id,
        dataType : 'json',
        success : function (response) {
            console.log(response.msg);
        }
    })
}

/* Tweets */
function getNewTweets() {
    var last_id = $("#content .feed-item:first").attr('data-id');
    
    $.ajax({
        url : '/feed/main/getnew/last_id/' + last_id,
        success : function (response) {
            $("#tweets-feed").prepend(response);
        }
    })
}

function reTweet(id) {
    $('#tweet_' + id + ' .retweet-button').remove();
    $('#tweet_' + id + ' .retweet-count').text(parseInt($('#tweet_' + id + ' .retweet-count').text()) + 1);
    
    notify('Пост добавлен в вашу ленту');
    
    $.ajax({url : '/feed/tweet/re/id/' + id, success : 
        function() {
            getNewTweets();
        }
    });
}

function likePost(id) {
    $('#post_' + id + ' .like-button').remove();
    $('#post_' + id + ' .like-count').text(parseInt($('#post_' + id + ' .like-count').text()) + 1);
    
    $.ajax({url : '/posts/post/like/id/' + id})
}

function addComment(post_id) {
    var text = $("#comment_textarea").val();

    if (text != '') {
        $("#comment_form").hide();
        $(".comments").append('<div class="ajax-preloader">&nbsp;</div>');
        $("#comment_textarea").val('');

        $.ajax({
            url : '/posts/comment/add/post_id/' + post_id,
            type : 'POST',
            data : 'text=' + text,
            success : function (response) {
                $(".comments").append(response);
                $('#comments_count').text(parseInt($('#comments_count').text()) + 1);
                $(".comments .nocomments").remove();
                $(".comments .ajax-preloader").remove();
                $("#comment_form").show();
            }
        })
    }
}

/* Parsed tweets */
function approveParsedTweet(id) {
    $("#tweet_" + id).hide('drop', 500);
    
    $.ajax({
        url : '/crawler/admin/approve/id/' + id
    });
}

function deleteParsedTweet(id) {
    $("#tweet_" + id).hide('drop', 500);
    
    $.ajax({
        url : '/crawler/admin/delete/id/' + id
    });
}