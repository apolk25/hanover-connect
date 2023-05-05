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

function showAlert(title, message) {
    $('#alert').hide();
    // $('#alert').removeClass('alert-success alert-info alert-warning alert-danger').addClass('alert-' + type);
    $('#alertTitle').text(title);
    $('#alertMessage').html(message);
    $('#alert').fadeIn();
}

function profilePrompt(){
    if($('.profileBody').css('visibility') == 'visible'){
        $('.profileBody').css('visibility', 'hidden');
        $('.carousel-inner').css('visibility', 'visible');


    }else{
        $('.profileBody').css('visibility', 'visible');
        $('.carousel-inner').css('visibility', 'hidden');

    }
    console.log("called");
    // $('.profileBody').css('visibility', 'visible');
}