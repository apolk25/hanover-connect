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

        <div class="divider"></div>
        <div class="inner-pfp">
            <form class="pfpform" action="scripts/upload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
            </form>
        </div>
        <?php
        
        if(isset($_GET["success"]) && htmlspecialchars($_GET["success"])){
            echo "<h1 id='success'>Profile photo updated successfully!</h1>";
        }
        ?>
        
        



</body>
</html>