const { format } = require("path");

function loginRequest() {
    if ($('#email').val() == '') {
        console.log("Missing email")
        showAlert('Email Required!', 'Enter your email address and try again.');
    } else if ($('#password').val() == '') {
        showAlert('Password Required!', 'Enter your password and try again.');
    } else {
        var settings = {
            'async': true,
            'url': 'scripts/loginRequest.php?email=' + $('#email').val() + '&password=' + $('#password').val(),
            'method': 'POST',
            'headers': {
                'Cache-Control': 'no-cache'
            }
        };

        $('#logbutton').prop('disabled', true);

        $.ajax(settings).done(function(response) {
            window.location.replace('index.php');
        }).fail(function(response) {
            showAlert('danger', 'Invalid Login!', 'Check your email address and password and try again.');
            console.log(response);
        }).always(function() {
            $('#logbutton').prop('disabled', false);
        });
    }
}

function showAlert() {
    $('#alert').hide();
    // $('#alert').removeClass('alert-success alert-info alert-warning alert-danger').addClass('alert-' + type);
    // $('#alertTitle').text(title);
    // $('#alertMessage').html(message);
    $('#alert').fadeIn();
}

function showOptions(){
    let form = document.getElementById("post-form");
    form.style.display = "block";
    let btn = document.getElementById('create-btn')
    btn.remove()
}


function loadFile(event) {
    var preview = document.getElementById('preview');
    preview.src = URL.createObjectURL(event.target.files[0]);
    preview.onload = function() {
      URL.revokeObjectURL(preview.src) // free memory
    }
  };


function deletePost(id, from, pfid){
    if (confirm('Are you sure you want to delete this post?')) {
        location.href = 'scripts/deletePost.php?id=' + id + '&from=' + from + '&pfid=' + pfid;
    }
}

function follow(id, action, from){
    to = ''

    if(from == 0){
        to = 'posts'
    }else if(from == 1){
        to = 'profile'
    }else if(from == 3){
        to = 'friends'
    }

    if(action == 0){
        location.href = 'scripts/follow.php?userId=' + id + '&action=follow' + '&from=' + to
    }

    if (action == 1){
        location.href = 'scripts/follow.php?userId=' + id + '&action=unfollow' + '&from=' + to
    }
}

function updateBio(){
    let editBtn = document.getElementById('edit-btn')
    editBtn.style.display = 'none';
    
    let save = document.getElementById('save-btn')
    let cancel = document.getElementById('cancel-btn')
    save.style.display = 'inline-block'
    cancel.style.display = 'inline-block'
    let bioTextElement = document.getElementById("bio-text")
    let bioTextDiv = document.getElementById("user-bio")
    let bioText = bioTextElement.innerHTML;
    // console.log(bioText);
    bioTextElement.remove();
    bioTextDiv.innerHTML += '<textarea id="bio-textarea" name="bio" for="bio" >' + bioText + '</textarea>'
    let bioForm = document.getElementById("bio-field")
    // bioTextElement.innerHTML = 'New bio';
    // let currentBio = 
}

function saveBio(){
    let bioTextElement = document.getElementById("bio-textarea")
    let bioText = bioTextElement.value;
    console.log('scripts/updateBio.php?bio=' + bioText)

    location.href = 'scripts/updateBio.php?bio=' + bioText;
}

function message(user_id){
    location.href = 'newMessage.php?id=' + user_id
}

function sendMessage(to){
    let area = document.getElementById('message-area')
    let message = area.value

    location.href = 'scripts/sendMessage.php?message=' + message + '&to=' + to
}

function changeView(type){
    if(type == 1){
        location.href = 'messages.php?view=unread'
    }

    if(type == 2){
        location.href = 'messages.php?view=read'
    }

    if(type == 3){
        location.href = 'messages.php?view=sent'
    }
}

function markAsRead(id){
    location.href = 'scripts/markAsRead.php?id=' + id
}

function reply(id){
    console.log("clicked")
    let replyBtn = document.getElementById('btn-reply-' + id)
    replyBtn.style.display = 'none';
    
    let replysave = document.getElementById('replysave-btn' + id)
    let replycancel = document.getElementById('replycancel-btn' + id)
    replysave.style.display = 'inline-block'
    replycancel.style.display = 'inline-block'
    replysave.style.marginRight = '10px'

    let replyPre = document.getElementById("reply-field-" + id)
    // console.log(bioText);
    replyPre.innerHTML += '<textarea id="bio-textarea" name="bio" for="bio"></textarea>'

    let markAsRead = document.getElementById('markread')
    if(markAsRead != null){
        markAsRead.style.display = 'none'
    }
}

function sendReply(id){
    console.log(id)
    let message = document.getElementById('bio-textarea').value
    location.href = 'scripts/sendMessage.php?to=' + id + '&message=' + message
}

function cancelReply(id){
    console.log("clicked")
    let replyBtn = document.getElementById('btn-reply-' + id)
    replyBtn.style.display = 'inline-block';
    
    let replysave = document.getElementById('replysave-btn' + id)
    let replycancel = document.getElementById('replycancel-btn' + id)
    replysave.style.display = 'none'
    replycancel.style.display = 'none'
    replysave.style.marginRight = '10px'

    let replyPre = document.getElementById("reply-field-" + id)
    replyPre.innerHTML = '';
    // console.log(bioText);
    let markAsRead = document.getElementById('markread')
    if(markAsRead != null){
        markAsRead.style.display = 'inline-block'
    }
}

function comment(id){
    let commentBtn = document.getElementById('comment-btn' + id)
    commentBtn.style.display = 'none';
    
    let commentSendBtn = document.getElementById('commentsend-btn' + id)
    let commentCancelBtn = document.getElementById('commentcancel-btn' + id)
    commentSendBtn.style.display = 'inline-block'
    commentCancelBtn.style.display = 'inline-block'
    commentSendBtn.style.marginRight = '10px'

    let commentPre = document.getElementById("comment-field-" + id)
    // console.log(bioText);
    commentPre.innerHTML += '<textarea id="comment-textarea' + id + '"></textarea>'


}

function cancelComment(id){
    let commentBtn = document.getElementById('comment-btn' + id)
    commentBtn.style.display = 'inline-block';
    
    let commentSendBtn = document.getElementById('commentsend-btn' + id)
    let commentCancelBtn = document.getElementById('commentcancel-btn' + id)
    commentSendBtn.style.display = 'none'
    commentCancelBtn.style.display = 'none'
    commentSendBtn.style.marginRight = '10px'

    let commentPre = document.getElementById("comment-field-" + id)
    commentPre.innerHTML = '';
    // console.log(bioText);

}

function sendComment(id){
    let comment = document.getElementById('comment-textarea' + id).value
    console.log(comment)
    location.href = 'scripts/sendComment.php?post_id=' + id + '&comment=' + comment
}

function viewComments(id){
    let viewCommentBtn = document.getElementById("viewcomment-btn" + id)
    let commentDiv = document.getElementById("comments-" + id)
    if(viewCommentBtn.innerHTML == "View Comments"){
        viewCommentBtn.innerHTML = "Hide Comments"
        commentDiv.style.display = ''

    } else if(viewCommentBtn.innerHTML == "Hide Comments"){
        viewCommentBtn.innerHTML = "View Comments"
        commentDiv.style.display = 'none'

    }
}