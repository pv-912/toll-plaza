<?php
define('base_url', 'http://localhost/toll-plaza/');
define('base_url_toll', 'http://localhost:4001/toll/');
define('base_url_user', 'http://localhost:4001/user/');


$servername = "localhost";
$username = "";
$password = "";
$dbname = "tollplaza";
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}   ?>