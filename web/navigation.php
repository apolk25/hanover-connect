
<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top">
            <a class="navbar-brand con-text" href="index.php"><img src="img/icon.png" class="home-icon"><img src="img/home-text.png" class="home-text"></a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <a href="posts.php" class="navbar-link"><p class="navbar-link">Posts</p></a>
                    <?php  if (!isset($_SESSION['userId'])) : ?>
                        <div class="reg-lgn-btns">
                            <a href="register.php"><button class="btn btn-success"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</button></a>
                            <a href="login.php"><button class="btn btn-primary"><i class="fas fa-sign-in-alt" aria-hidden="true"></i> Login</button></a>
                        </div>
                    <?php endif ?> 

                    <?php if (isset($_SESSION['userId'])) : ?>
                    <a href="friends.php" class="navbar-link"><p class="navbar-link">Friends</p></a>
                    
                    
                    <div class="dropdown">
                        <div id="name">
                        <a href="messages.php?view=unread"><i class="fas fa-envelope" id="msg-btn"></i></a>
                        <span class="signed-in">
                            <?php $userId = $_SESSION['userId']; 
                            echo '<a class="user" id="name-tag" href="profile.php?id=' .  $userId . '">';
                            echo $_SESSION['firstName'];
                            echo '</a>'; ?>
  
                        </span>
                        </div>
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                    <img src="img/default-profile.jpg" id="pfp">

                    <?php
                        $filename = 'uploads/' . $_SESSION['userId'] . '.png';
                        if(file_exists($filename)){
                            echo "<script>document.getElementById('pfp').src = 'uploads/" . $_SESSION['userId'] . ".png';</script>";
                        }    
                    ?>  
                    </button>
                    <ul class="dropdown-menu">
                        <?php
                        $userId = $_SESSION['userId'];
                        echo '<li><a class="dropdown-item" href="profile.php?id=' . $userId . '"><i class="fas fa-id-card"></i> Profile</a></li>';
                        ?>
                        <li><a class="dropdown-item" href="profileUpload.php    "><i class="fas fa-user-circle"></i> Change photo</a></li>
                        <li><a class="dropdown-item" href="index.php?logout='1'"><i class="fas fa-sign-out-alt"></i> Sign out</a></li>

                    </ul>
                    </div>
                    <?php endif ?>   
            </div>
        </nav>
