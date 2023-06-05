<?php 
include('library.php');
session_start();
$userId = $_SESSION['userId'];
$conn = get_database_connection();
$id = $_GET['post_id'];
$comment = $_GET['comment'];
$comment = mysqli_real_escape_string($conn, $comment);

$sql = <<<SQL
    insert into comments (comment_post_id, comment_user_id, comment_comment, comment_created)
    values ($id, $userId, '$comment', NOW())

SQL;

if(mysqli_query($conn, $sql)){
    header('location: ../posts.php');
}
?>