<?php 
include('library.php');
session_start();
$userId = $_SESSION['userId'];
$toFollow = $_GET['userId'];
$conn = get_database_connection();
$sql = <<<SQL
    insert into followers (follower, follows)
    values ($userId, $toFollow)
SQL;

$result = mysqli_query($conn, $sql);

http_response_code(200);
header('location: ../profile.php?id=' . $toFollow);
?>