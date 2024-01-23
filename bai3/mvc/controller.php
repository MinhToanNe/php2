<?php
include "model.php";
if(isset($_GET["id"]))
{
$id = $_GET["id"];
$blog = getBlogById($id);}
include "view.php";