<?php
function getBlogById($id)
{
    include "database.php";
    $sql = "SELECT * FROM blogs WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0)
    {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        return $row;
    }

}