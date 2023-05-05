<?php
 
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


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hanover Connect | Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css?v=<?php echo rand(); ?>">
    
    <?php include('scripts/library.php');?>
    <script src="scripts/scripts.js?v=<?php echo rand(); ?>"></script>
    <link rel="icon" type="image/x-icon" href="img/icon.png">
</head>
    <body class="indexbody">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand con-text" href="index.php"><img src="img/icon.png" class="home-icon"><img src="img/home-text.png" class="home-text"></a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- <ul class="navbar-nav"> -->
                    <?php  if (!isset($_SESSION['userId'])) : ?>
                        <div class="reg-lgn-btns">
                            <!-- <button class="btn btn-primary">Register</button> -->
        
                            <!-- <button class="btn btn-primary">Register</button> -->
                            <a href="register.php"><button class="btn btn-success"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</button></a>
                            <a href="login.php"><button class="btn btn-primary"><i class="fas fa-sign-in-alt" aria-hidden="true"></i> Login</button></a>
                        </div>
                    <?php endif ?> 

                    <?php if (isset($_SESSION['userId'])) : ?>
                    <li class="signed-in nav-item nav-link">
                        <?php echo $_SESSION['firstName']; ?>
                        <?php echo $_SESSION['lastName']; ?>
                    </li>


                    <!-- <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown button
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </div> -->
                    <div class="dropdown">
                    <?php if(isset($_SESSION['profilePicture'])) : ?>
                        <!-- img -->
                    <?php endif ?>   

                    <?php if(!isset($_SESSION['profilePicture'])) : ?>
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="img/default-profile.jpg" class="pfp">
                        </button>
                    <?php endif ?>      
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" onclick="profilePrompt()"><i class="fas fa-user-circle"></i> Change photo</a></li>
                        <li><a class="dropdown-item" href="index.php?logout='1'"><i class="fas fa-sign-out-alt"></i> Sign out</a></li>

                    </ul>

                    </div>


                <!-- <li class="logout nav-item">
                                <a href="index.php?logout='1'" style="color: red;">
                                        Click here to Logout
                                </a>
                </li> -->

                
                
                
                    <?php endif ?>   
            </div>
        </nav>


        
        
    </div>
    <div id="carousel" class="carousel slide active" data-bs-ride="carousel">
        <div class="carousel-inner" >
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

    <div class="profileBody"></div>

</body>
</html>