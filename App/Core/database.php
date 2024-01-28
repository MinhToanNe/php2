<?php

namespace Core;
use PDO;
use PDOException;
class database
{
    function pdo_get_connection(){
        $servername = "localhost";
        $username = "root";
        $password = "mysql";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=php2", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $conn;
    }

    function pdo_query_one($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try{
            $conn = $this->pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
        catch(PDOException $e){
            throw $e;
        }
        finally{
            unset($conn);
        }
    }
}
