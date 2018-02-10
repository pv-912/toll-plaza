<?php

    define('base_url', 'http://localhost/toll-plaza/');
    define('base_url_toll', 'http://localhost/toll-plaza/toll/');
    define('base_url_user', 'http://localhost/toll-plaza/user/');

    $servername = "";
    $username = "";
    $password = "";
    $dbname = "tollplaza";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>