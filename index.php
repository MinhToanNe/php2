<?php
require 'vendor/autoload.php';
require './App/home.php';
require './App/login.php';
use Core\database as db;
$database = new db();
$database->pdo_get_connection();

session_start();
use app\core\route as Router;
$router = new Router();
// $router->register('/' ,function (){echo"home";});
// $router->register('/invoices' ,function (){echo"invoices";});
$router
->get('/' , [app\home::class,"index"])
->post('/upload' , [app\home::class,"upload"])
->get('/login', [app\login::class,"login"])
->post('/login', [app\login::class,"login"]);
echo $router->resolve(strtolower($_SERVER['REQUEST_METHOD']),$_SERVER['REQUEST_URI']);





