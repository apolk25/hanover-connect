<?php

/*************************************************************************************************
 * library.php
 *
 * Common environment settings and functions used througout the Hanover DPW Park Permitting
 * application.
 *************************************************************************************************/

extract($_REQUEST);

/*
 * Returns the content to be included based on the 'content' request parameter, if present.
 */
function get_content()
{
    global $content;

    if (!isset($content))
    {
        $content = 'list';
    }

    $content = 'connect' . ucfirst(strtolower($content));

    return $content;
}

/*
 * Returns a connection to the underlying MySQL database.
 */
function get_database_connection()
{
    $servername = 'localhost';
    // TODO: Don't use 'root', make a separate user for this database
    $username = 'root';
    $password = 'Adampolk25!';
    $dbname = 'hanover_connect';

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error)
    {
        die('Connection failed: ' . $conn->connect_error);
    }

    return $conn;
}