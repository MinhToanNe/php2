<?php
require 'vendor/autoload.php';
require './App/home.php';
require './App/login.php';
use Core\database as db;
$database = new db();
$database->pdo_get_connection();

if (session_status() == PHP_SESSION_NONE) {
    session_start();

}
use app\core\route as Router;
$router = new Router();
// $router->register('/' ,function (){echo"home";});
// $router->register('/invoices' ,function (){echo"invoices";});
$router
->get('/' , [app\home::class,"index"])
->post('/upload' , [app\home::class,"upload"])
->post('/login', [app\login::class,"login"])
->get('/login', [app\login::class,"login"])
->get('/logout', [app\login::class,"logout"])
->get('/forgetpassword', [app\login::class,"ForgetForm"]);;
 echo $router->resolve(strtolower($_SERVER['REQUEST_METHOD']),$_SERVER['REQUEST_URI']);





