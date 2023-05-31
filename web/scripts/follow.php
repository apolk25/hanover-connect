<?php 
include('library.php');
session_start();
$userId = $_SESSION['userId'];
$toFollow = $_GET['userId'];
$action = $_GET['action'];
$from = $_GET['from'];
$conn = get_database_connection();
if($action == 'follow'){
    $sql = <<<SQL
        insert into followers (follower, follows)
        values ($userId, $toFollow)
    SQL;
    $result = mysqli_query($conn, $sql);
    http_response_code(200);
    header('location: ../' . $from . '.php?id=' . $toFollow);
}

if($action == 'unfollow'){
    $sql = <<<SQL
    delete from followers
    where follower = $userId
    and follows = $toFollow
    SQL;

    $result = mysqli_query($conn, $sql);
    http_response_code(200);
    header('location: ../' . $from . '.php?id=' . $toFollow);
  
}


?>