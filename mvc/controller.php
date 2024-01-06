<?php
include "model.php";
$id = $_POST["id"];
$blog = getBlogById($id);
include "view.php";