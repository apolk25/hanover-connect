<?php
include('scripts/library.php');
session_start();
?>
<?php include('head.php'); ?>
<?php include('navigation.php'); ?>

<h1 id="feed" class="grays">Recent Posts</h1>
<?php if(isset($_SESSION['userId'])) : ?>
<div class="create-post">
    <!-- WHEN BUTTON CLICKED, MAKE THESE OPTIONS APPEAR, THEN WHEN SUBMITTED
    MAKE IT POST AND COLLAPSE -->
    <button id="create-btn" class="btn btn-primary" onclick="showOptions()">Create a post</button>
    <form id="post-form" action="scripts/uploadPost.php" method="post" enctype="multipart/form-data">
        <input id="file" type="file" placeholder="Upload Image" name="fileToUpload" id="fileToUpload" onchange="loadFile(event)">
        <img id="preview" class="post-img" style="padding-bottom: 30px;"/>

        <div id="caption-form">
            <input type="text" id="caption-field" placeholder="Type caption here" name="caption">

        </div> 
        </br>
        <button id="submit-btn" class="btn btn-primary" type="submit">Submit</button>
    </form>
</div>
<?php endif ?>


<?php
$conn = get_database_connection();
$sql = <<<SQL
    select * from posts
    join users on post_user_id = user_id
    order by post_id desc
    limit 50
SQL;

$result = mysqli_query($conn, $sql);
while ($row = $result->fetch_assoc()) {
    if($row['user_pfp'] != null){
        $pfp = $row['user_pfp'];
    }elseif ($row['user_pfp'] == null){
        $pfp = '../img/default-profile.jpg';
    }
    echo '<div class="post" id="user-post-' . $row['post_id'] . '">';
    echo '<img class="post-pfp" src="uploads/' . $pfp. ' ">';
    echo '<a id="user" href="profile.php?id=' . $row['user_id'] . '"><h5 class="user-posted">' . $row['user_first_name'] . ' ' . $row['user_last_name'] . '</h5></a>';
    echo '<h6 class="posted-date"> @ ' . $row['post_created'] . '<h6>';
    if (isset($_SESSION['userId']) && $_SESSION['userId'] == $row['user_id']){
        echo '&nbsp&nbsp';
        echo '<button onclick="deletePost(' . $row['post_id'] . ', 1, 0)" class="delete-post">Delete post <i class="fas fa-trash"></i></button>';
    }
    echo '</br>';
    echo '</br>';
    echo '</br>';
    echo '<h6 class="post-caption">' . $row['post_caption'] .  '</h6> ';

    if($row['post_img_url'] != "null"){
        echo '<img class="post-img" src="posts/' . $row['post_img_url'] . '">';

    }
    
    echo '</div>';
    
    echo '</div>';
}




?>