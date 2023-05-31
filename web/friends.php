<?php

include('scripts/library.php');

session_start();
include('head.php');
include('navigation.php');
$userId = $_SESSION['userId'];
$conn = get_database_connection();
$sql = <<< SQL
    SELECT u.*
    FROM users u
    INNER JOIN followers f ON u.user_id = f.follower
    INNER JOIN followers f2 ON u.user_id = f2.follows AND f.follower = f2.follows
    WHERE f.follows = $userId;
SQL;

$result = mysqli_query($conn, $sql);
while($row = $result->fetch_assoc()){
    $currentUser = $row['user_id'];
    if($row['user_pfp'] != null){
        $pfp = $row['user_pfp'];
    }elseif ($row['user_pfp'] == null){
        $pfp = '../img/default-profile.jpg';
    }

    echo '<div class="friend">';
    echo '<img class="friend-pfp" src="uploads/' . $pfp. ' ">';
    echo '<a class="user" href="profile.php?id=' . $row['user_id'] . '"><h5 class="friend-name">' . $row['user_first_name'] . ' ' . $row['user_last_name'] . '</h5></a>';
    echo '<button class="btn btn-secondary friend-follow-btn" onclick="follow(' . $currentUser . ', 1, 3)">Following</button>';
    echo '<button class="btn btn-warning friend-msg-btn" onclick="message(' . $row['user_id'] . ')">Message</button>';

    // echo '</br>';
    // echo '</br>';
    // echo '</br>';

    
    
    echo '</div>';

}
?>