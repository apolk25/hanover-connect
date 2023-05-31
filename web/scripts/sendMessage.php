<?php
include('library.php');
session_start();
$userId = $_SESSION['userId'];
$message = $_GET['message'];
$to = $_GET['to'];
$conn = get_database_connection();
$sql = <<<SQL
    insert into messages (message_sender, message_recipient, message_message, message_read, message_created)
    values ($userId, $to, '$message', 0, NOW())
SQL;

if(mysqli_query($conn, $sql)){
    header('location: ../messages.php?view=sent');
}
?>
