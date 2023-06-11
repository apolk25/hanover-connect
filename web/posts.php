<?php
include('scripts/library.php');
session_start();
include('head.php');
include('navigation.php');

if(isset($_GET['success'])){
    $success = $_GET['success'];
}

if(isset($success)){
    if($success == 'true'){
        echo '<div class="successbox">';
        echo '<p class="successmessage">Post uploaded successfully!</p>';
        echo '</div>';
    }else if($success == 'false'){
        echo '<div class="failurebox">';
        echo '<p class="failmessage">Upload unsuccessful, please try again.</p>';
        echo '</div>';   
    }
}
?>

<h1 id="feed" class="grays">Recent Posts</h1>
<?php if(isset($_SESSION['userId'])) : ?>
<div class="create-post">
    <!-- WHEN BUTTON CLICKED, MAKE THESE OPTIONS APPEAR, THEN WHEN SUBMITTED
    MAKE IT POST AND COLLAPSE -->
    <button id="create-btn" class="btn btn-primary" onclick="showOptions()">Create a post</button>
    <form id="post-form" action="scripts/uploadPost.php" method="post" enctype="multipart/form-data">
        <input id="file" type="file" placeholder="Upload Image" name="fileToUpload" id="fileToUpload" onchange="loadFile(event)">
        <br>
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
    echo '<a class="user" href="profile.php?id=' . $row['user_id'] . '"><h5 class="user-posted">' . $row['user_first_name'] . ' ' . $row['user_last_name'] . '</h5></a>';
    echo '<h6 class="posted-date">' . date_format(date_create($row['post_created']), 'n/d/Y H:i A') . '<h6>';
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
        echo '<br>';
        echo '<br>';
    }
    echo '<button class="btn btn-primary comment-btn" id="comment-btn' . $row['post_id'] . '" onclick="comment(' . $row['post_id'] . ')">Comment</button>';
    echo '<pre id="comment-field-' . $row['post_id'] . '">';
    echo '</pre>';
    echo '<button style="display:none; margin-top:10px;" class="btn btn-success" id="commentsend-btn' . $row['post_id'] . '"onclick="sendComment(' . $row['post_id'] . ')">Save</button>';
    echo '<button style="display:none; margin-top:10px;" class="btn btn-danger" id="commentcancel-btn' . $row['post_id'] . '"onclick="cancelComment(' . $row['post_id'] . ')">Cancel</button>';


    echo '<button class="btn btn-secondary viewcomment-btn" id="viewcomment-btn' . $row['post_id'] . '" onclick="viewComments(' . $row['post_id'] . ')">View Comments</button>';

    $postId = $row['post_id'];
    $sql = <<<SQL
        select comment_id, comment_post_id, 
        comment_user_id, comment_comment, comment_created, user_id, 
        user_first_name, user_last_name, user_pfp
        from comments
        join users on comment_user_id = user_id
        where comment_post_id = $postId
        order by comment_created desc
    SQL;
    $commentResult = mysqli_query($conn, $sql);
    $numComments = mysqli_num_rows($commentResult);
    echo '<h6 class="num-comments">Comments: ' . $numComments . '</h6>';
    echo '<div class="comments" style="display:none;" id="comments-' . $row['post_id'] . '">';
    while ($commentRow = $commentResult->fetch_assoc()) {
        if($commentRow['user_pfp'] != null){
            $commenterPfp = $commentRow['user_pfp'];
        }elseif ($commentRow['user_pfp'] == null){
            $commenterPfp = '../img/default-profile.jpg';
        }
        echo '<div class="comment">';
        echo '<img class="friend-pfp" style="margin-left:25px; margin-top:2px;" src="uploads/' . $commenterPfp. ' ">';
        echo '<a class="user" href="profile.php?id=' . $commentRow['user_id'] . '"><h5 style="margin-left:20px; margin-top:15px;" class="friend-name">' . $commentRow['user_first_name'] . ' ' . $commentRow['user_last_name'] . '</h5></a>';
        echo '<h5 class="comment-text">' . $commentRow['comment_comment'] . '</h5></a>';
        echo '</div>';
    }
    echo '</div>';

    echo '</div>';
    

}






?>