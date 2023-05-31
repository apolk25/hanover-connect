<?php 
include('library.php');
$conn = get_database_connection();
$msgId = $_GET['id'];
$sql = <<<SQL
    update messages
    set message_read = 1
    where message_id = $id
SQL;

if(mysqli_query($conn, $sql)){
    header('location: ../messages.php?view=unread');
}
?>