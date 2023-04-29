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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css?v=<?php echo rand(); ?>">
    
    <?php include('library.php');?>
    <script src="scripts.js?v=<?php echo rand(); ?>"></script>
    <link rel="icon" type="image/x-icon" href="icon.png">
</head>
    <body class="indexbody">
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
                    <a href="login.php"><button class="btn btn-primary"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</button></a>


                </div>
            </div>

        </nav>


        
        
    </div>
    <div id="carousel" class="carousel slide active" data-bs-ride="carousel">
        <div class="carousel-inner" >
            <div class="carousel-item active" data-bs-bg-image="connect-banner.png">
                <img class="banner" src="connect-banner.png" class="d-block w-100" alt="...">
                <h1 class="welcome"> Welcome to Hanover Connect! </h1>
            </div>
        </div>
<!-- 
        <div class="bottom-body">
                <div class="text"></div>
            </div> -->
        <!-- <div class="bottom-border">
            <h6 id="bottom-text">Hanover Connect || 2023<h6>
        </div> -->

</body>
</html>