<?php 
include('library.php');
session_start();
$userId = $_SESSION['userId'];
$conn = get_database_connection();
$id = mysqli_real_escape_string($conn, $_GET['post_id']);
$comment = mysqli_real_escape_string($conn, $_GET['comment']);

$sql = <<<SQL
    insert into comments (comment_post_id, comment_user_id, comment_comment, comment_created)
    values ($id, $userId, '$comment', NOW())

SQL;

if(mysqli_query($conn, $sql)){
    header('location: ../posts.php');
}
?>