<?php
// require "database.php";



// spl_autoload_register(
//     function ($class) {
//         include $class . ".php";
//     }
// );

require 'vendor/autoload.php';

use app\core\Field;
use app\core\Form;
// use Core\database as db;
// $db = new db();

// use Core1\route as route;
// $db = new route();

// use model\basemodel as model;
// $db = new model();

// use controller\baseController as controller;
// $db = new controller();
// 
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
    <div class="container">
        <h1>Create an account</h1>
        <?php $form = Form::begin('', 'post'); ?>
        <div class="row">
            <div class="col">
                <?php echo $form->field('firstname'); ?>
            </div>
            <div class="col">
                <?php echo $form->field('lastname'); ?>
            </div>
        </div>

        <div class="col"><?= $form->field('email'); ?></div>
        <div class="col"><?= $form->field('password')->passwordField(); ?></div>
        <?= $form->field('confirmpassword')->passwordField(); ?>
        <button type="submit" class="btn btn-primary">submit</button>
        <?= Form::end() ?>
    </div>
</body>

</html>