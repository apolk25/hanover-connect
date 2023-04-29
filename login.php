<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Hanover Connect | Login</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css?v=<?php echo rand(); ?>">
    <?php include('library.php');?>
    <script src="scripts.js?v=<?php echo rand(); ?>"></script>
    <link rel="icon" type="image/x-icon" href="icon.png">
</head>
<body class="logbody">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand con-text" href="index.php"><img src="icon.png" class="home-icon"><img src="home-text.png" class="home-text"></a>



            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">TBD</a>
                </li>
                
                </ul>
                
                <div class="reg-lgn-btns">
                    <!-- <button class="btn btn-primary">Register</button> -->

                    <!-- <button class="btn btn-primary">Register</button> -->
                    <a href="register.php"><button class="btn btn-success"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</button></a>
                    <a href="login.php"><button class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login</button></a>


                </div>
            </div>

        </nav>
        
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <form class="logform" method="POST" action="loginRequest.php">
        <h3 class="logh3">Login Here</h3>

        <label class="loglabel" for="username" >Username</label>
        <input class="loginput" type="text" placeholder="Email or Phone" id="username" name="username">

        <label class="loglabel" for="password">Password</label>
        <input class="loginput" type="password" placeholder="Password" id="password" name="password">

        <button class="logbutton">Log In</button>
        <div class="social">
          <div class="go"><i class="fab fa-google"></i>  Google</div>
          <div class="fb"><i class="fab fa-facebook"></i>  Facebook</div>
        </div>
    </form>
</body>
</html>
