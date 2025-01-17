<?php

/*************************************************************************************************
 * library.php
 *
 * Common environment settings and functions used througout the Hanover Connect
 * application.
 *************************************************************************************************/

extract($_REQUEST);
/*
 * Returns a connection to the underlying MySQL database.
 */
function get_database_connection()
{
    $servername = 'localhost';
    // TODO: Don't use 'root', make a separate user for this database
    $username = 'root';
    $password = '';
    $dbname = 'hanover_connect';

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error)
    {
        die('Connection failed: ' . $conn->connect_error);
    }

    return $conn;
}

if(isset($_SESSION['userId'])){
    $userId = $_SESSION['userId'];
}





