<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php'); ?>

    
</head>
<body class="logbody">
    <?php include('navigation.php'); ?>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <form class="logform">
        <h3 class="logh3">Login Here</h3>

        <label class="loglabel" for="email" >Username</label>
        <input class="loginput" type="text" placeholder="Email or Phone" id="email" name="email">

        <label class="loglabel" for="password">Password</label>
        <input class="loginput" type="password" placeholder="Password" id="password" name="password">

        <div class="social">
            <div class="go"><i class="fab fa-google"></i>  Google</div>
            <div class="fb"><i class="fab fa-facebook"></i>  Facebook</div>
        </div>
        <button type="button" class="logbutton" onclick="loginRequest()">Log In</button>

    </form>

    
</body>
</html>
