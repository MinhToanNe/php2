<?php
// require "database.php";



// spl_autoload_register(
//     function ($class) {
//         include $class . ".php";
//     }
// );

require 'vendor/autoload.php';

use Core\database as db;
$db = new db();

use Core1\route as route;
$db = new route();

use model\basemodel as model;
$db = new model();

use controller\baseController as controller;
$db = new controller();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    Home page
</body>

</html>