<?php

include('library.php');
$dbh = get_database_connection();
$email = mysqli_real_escape_string($dbh, $email);
$password = mysqli_real_escape_string($dbh, $password);


$sql = <<<SQL
SELECT user_id, user_first_name, user_last_name
  FROM users
 WHERE user_email = '{$email}'
   AND user_password = '{$password}'
SQL;

echo $sql;

$result = mysqli_query($dbh, $sql);

$count = mysqli_num_rows($result);
if ($count == 1)
{
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    session_start();

    $_SESSION['userId'] = $row['user_id'];
    $_SESSION['firstName'] = $row['user_first_name'];
    $_SESSION['lastName'] = $row['user_last_name'];


    session_write_close();

    http_response_code(200);
}
else
{
    // header('location: ../login.php?success=false');
    http_response_code(401);

}