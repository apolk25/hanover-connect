<?php
 
include('scripts/library.php');
// Starting the session, to use and
// store data in session variable
session_start();
// If the session variable is empty, this
// means the user is yet to login
// User will be sent to 'login.php' page
// to allow the user to login

  
// Logout button will destroy the session, and
// will unset the session variables
// User will be headed to 'login.php'
// after logging out
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['userId']);
    header("location: index.php");
}
?>
<!DOCTYPE html>


    <?php include('head.php'); ?>
    <body class="indexbody">
        <?php include('navigation.php'); ?>
    </div>
    <div id="carousel" class="carousel slide active" data-bs-ride="carousel">
        <div class="carousel-inner" >
            </div>
            <div class="carousel-item active" data-bs-bg-image="img/connect-banner.png">
                <img class="banner" src="img/connect-banner.png" class="d-block w-100" alt="...">
                <h1 class="welcome"> Welcome to Hanover Connect! </h1>
            </div>
        </div>
    </div>

    <div id="alert" class="alert alert-position alert-success">
        <a class="close" onclick="$('#alert').fadeOut()"><span aria-hidden="true">&times;</span></a>
        <strong id="alertTitle">Success!</strong> <span id="alertMessage">Success message.</span>
    </div>



</body>
</html>