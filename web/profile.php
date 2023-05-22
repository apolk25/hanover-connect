<?php
include('scripts/library.php');
session_start();
?>
<?php include('head.php'); ?>
<?php include('navigation.php'); ?>

<?php
if(isset($_SESSION['userId'])){
    $userId = $_SESSION['userId'];
}
$id = $_GET['id'];

$conn = get_database_connection();
$sql = <<<SQL
    select * from users
    where user_id = $id
SQL;

$result = mysqli_query($conn, $sql);
while ($row = $result->fetch_assoc()) {
    if(isset($row['user_pfp'])){
        $pfp = $row['user_pfp'];
    }elseif (!isset($row['user_pfp'])){
        $pfp = '../img/default-profile.jpg';
    }

    echo '<div class="user-profile-info">';
    echo '<img class="profile-pfp" src="uploads/' . $pfp. ' ">';
    echo '<h5 class="user-name">' . $row['user_first_name'] . ' ' . $row['user_last_name'] . '</h5>';
    echo '<p class="user-created">Joined on ' . $row['user_created'] . '</p>';
    
}


if(isset($userId) && $userId != $id){
    $follow = <<<SQL
        select * from followers
        where follower = $userId
        and follows = $id
    SQL;
    $result = mysqli_query($conn, $follow);
    $count = mysqli_num_rows($result);
    if($count == 0){
        echo '<button class="btn btn-primary follow-btn" onclick="follow(' . $id . ')">Follow</button>';
    }elseif ($count == 1){
        echo '<button class="btn btn-secondary follow-btn">Following</button>';

    }
}
echo '</div>';

$sql = <<<SQL
    select * from users
    join posts on post_user_id = $id
    where user_id = $id
SQL;

$result = mysqli_query($conn, $sql);
while ($row = $result->fetch_assoc()) {
    if(isset($row['user_pfp'])){
        $pfp = $row['user_pfp'];
    }elseif (!isset($row['user_pfp'])){
        $pfp = '../img/default-profile.jpg';
    }
        echo '<h1 class="users-posts">' . $row['user_first_name'] . "'s Posts</h1>";
        // echo '<div class="profile" id="user-post-' . $row['post_id'] . '">';
        echo '<div class="post" id="user-post-' . $row['post_id'] . '">';
        echo '<img class="post-pfp" src="uploads/' . $pfp . ' ">';
        echo '<h5 class="user-posted">' . $row['user_first_name'] . ' ' . $row['user_last_name'] . '</h5></a>';
        echo '<h6 class="posted-date"> @ ' . $row['post_created'] . '</h6>';
        if (isset($userId) && $userId == $row['user_id']){
            echo '&nbsp&nbsp';
            echo '<button onclick="deletePost(' . $row['post_id'] . ', 2,' . $id . ')" class="delete-post">Delete post <i class="fas fa-trash"></i></button>';
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


// }
?>