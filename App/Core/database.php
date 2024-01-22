<?php

namespace Core;

use mysqli;

class database
{
    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "mysql";
        $dbname = "php2";

        // Tạo kết nối
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }
        echo "Kết nối thành công";
    }

    public function HelloWorld()
    {
        echo "Hello World";
    }
}
