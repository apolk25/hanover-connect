<?php
include('library.php');
session_start();
$userId = $_SESSION['userId'];
$conn = get_database_connection();
// $bio = nl2br($bio);
// echo $bio;
$updateBio = <<<SQL
    update users
    set user_bio = '$bio'
    where user_id = $userId
SQL;
echo $updateBio;
if(mysqli_query($conn, $updateBio)){
    header('location: ../profile.php?id=' . $userId);
}
?>
