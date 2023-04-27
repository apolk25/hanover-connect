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
    <link rel="stylesheet" href="styles.css?v=<?php echo rand(); ?>">
    <?php include('library.php');?>
    <script src="scripts.js"></script>

</head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="<?php print($content == 'index' ? 'active' : ''); ?> navbar-brand con-text" href="index.php?content=index.php"><img src="icon.png" class="home-icon"><img src="home-text.png" class="home-text"></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="<?php print($content == 'index' ? 'active' : ''); ?> nav-link" href="index.php?content=index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">TBD</a>
                </li>
                
                </ul>
                
                <div class="reg-lgn-btns">
                    <!-- <button class="btn btn-primary">Register</button> -->

                    <!-- <button class="btn btn-primary">Register</button> -->
                    <a class="<?php print($content == 'register' ? 'active' : ''); ?>" href="index.php?content=register"><button class="btn btn-success"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</button></a>
                    <a class="<?php print($content == 'login' ? 'active' : ''); ?>" href="index.php?content=login"><button class="btn btn-primary"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</button></a>


                </div>
            </div>

        </nav>


        <div id="carousel" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="banner" src="connect-banner.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img class="" src="" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img class="" src="" class="d-block w-100" alt="...">
                </div>
            </div>


        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        </div>

            <div class="bottom-body"></div>
        <div class="bottom-border">
            <h6 id="bottom-text">Hanover Connect || 2023<h6>
        </div>

</body>
</html>