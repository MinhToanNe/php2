<?php
function getBlogCategory()
{
    include "database.php";
    $sql = "SELECT * FROM categorys";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $categories = $result->fetch_all(MYSQLI_ASSOC);
    return $categories;
    
}