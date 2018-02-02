<?php
define('base_url', 'http://localhost/toll-plaza/');


$servername = "localhost";
$username = "";
$password = "";
$dbname = "tollplaza";
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}   ?>