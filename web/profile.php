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
    $user_first_name = $row['user_first_name'];
    $user_bio = $row['user_bio'];
    echo '<div class="user-profile-info">';
    echo '<img class="profile-pfp" src="uploads/' . $pfp. ' ">';
    echo '<h5 class="user-name">' . $row['user_first_name'] . ' ' . $row['user_last_name'] . '</h5>';
    echo '<p class="user-created">Joined on ' . date_format(date_create($row['user_created']), 'n/d/Y') . '</p>';

}

echo '<pre id="user-bio">';
echo '<p id="bio-text">' . $user_bio .  '</p>';
echo '</pre>';
// show buttons to edit if profile = users profile
if(isset($userId)){
    if($userId == $id){
        ?>
        <button class="btn btn-primary" id="edit-btn" onclick="updateBio()">Edit</button>
        <button class="btn btn-success" id="save-btn" onclick="saveBio()">Save</button>
        <button class="btn btn-danger" id="cancel-btn" onclick="cancelBio()">Cancel</button>

        <?php
    }
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
        echo '<button class="btn btn-primary follow-btn" onclick="follow(' . $id . ', 0, 1)">Follow</button>';
    }elseif ($count == 1){
        echo '<button class="btn btn-secondary follow-btn" onclick="follow(' . $id . ', 1, 1)">Following</button>';

    }
    echo '<button class="btn btn-warning msg-btn">Message</button>';
}
echo '</div>';

$sql = <<<SQL
    select * from users
    join posts on post_user_id = $id
    where user_id = $id
SQL;
echo '<h1 class="users-posts">' . $user_first_name . "'s Posts</h1>";

;



$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
if($count == 0){
    echo '<p id="no-posts">' . $user_first_name . ' has no posts</p>';
}
while ($row = $result->fetch_assoc()) {
    if(isset($row['user_pfp'])){
        $pfp = $row['user_pfp'];
    }elseif (!isset($row['user_pfp'])){
        $pfp = '../img/default-profile.jpg';
    }
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