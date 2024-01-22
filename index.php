<?php


require 'vendor/autoload.php';


use app\core\Form;
use App\Models\user;

use app\core\route as Router;

$router = new Router();
$router->register('/' ,function (){echo"home";});
// $user = new user('user');
// $user->getOne(1,1);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>

</body>

</html>