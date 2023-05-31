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


  var loadFile = function(event) {
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