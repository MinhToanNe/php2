<?php

$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "php2";

// Tạo kết nối
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Thiết lập bảng mã kết nối
mysqli_set_charset($conn, 'utf8');

?>