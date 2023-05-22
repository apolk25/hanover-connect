<?php

include('library.php');
$dbh = get_database_connection();
$email = mysqli_real_escape_string($dbh, $email);
$password = mysqli_real_escape_string($dbh, $password);
$first_name = mysqli_real_escape_string($dbh, $first_name);
$last_name = mysqli_real_escape_string($dbh, $last_name);

$sql = <<<SQL
SELECT user_id
  FROM users
 WHERE user_email = '{$email}'
SQL;

$result = mysqli_query($dbh, $sql);

$count = mysqli_num_rows($result);
if ($count == 0)
{
    $sql = <<<SQL
    INSERT INTO users (user_first_name, user_last_name, user_email, user_password, user_created)
    VALUES ('{$first_name}', '{$last_name}', '{$email}', '{$password}', NOW())
SQL;

    if (mysqli_query($dbh, $sql))
    {
        http_response_code(200);
        header('location: ../register.php?registerSuccess=true');

    }
    else
    {
        http_response_code(500);
    }
}
else
{
    // Email already in use
    http_response_code(400);

}