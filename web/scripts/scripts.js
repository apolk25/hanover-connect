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

function follow(id){
    location.href = 'scripts/follow.php?userId=' + id;
}