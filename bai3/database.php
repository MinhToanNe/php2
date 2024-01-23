<?php

$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "php2";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}


mysqli_set_charset($conn, 'utf8');
var_dump($conn);

