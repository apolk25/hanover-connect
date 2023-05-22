<!DOCTYPE html>
<?php include('head.php'); ?>

<body class="logbody">
    <?php include('navigation.php'); ?>

        
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <form class="logform" method="POST" action="scripts/registerRequest.php">
        <h3 class="logh3">Registration</h3>

        <label class="loglabel" for="first_name" >First Name</label>
        <input class="loginput" type="text" placeholder="John" id="first_name" name="first_name">

        <label class="loglabel" for="last_name" >Last Name</label>
        <input class="loginput" type="text" placeholder="Doe" id="last_name" name="last_name">

        <label class="loglabel" for="email" >Email</label>
        <input class="loginput" type="text" placeholder="Email or Phone" id="email" name="email">

        <label class="loglabel" for="password">Password</label>
        <input class="loginput" type="password" placeholder="Password" id="password" name="password">


        <button class="logbutton">Create account</button>

    </form>
    <!-- change this to make an x buton -->
    <?php
        if(isset($_GET["registerSuccess"]) && htmlspecialchars($_GET["registerSuccess"])){
            echo '<div id="alert" class="alert alert-position alert-success">';
            echo '<a class="close" onclick="$("#alert").fadeOut()"><span aria-hidden="true">&times;</span></a>';
            echo "<h1 class='success alertTitle'>Registration successful, please log in.</h1>";
            echo '</div>';
        }
    ?>
</body>
</html>
