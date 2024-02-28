<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

require_once './vendor/autoload.php';
require_once './App/core/function.php';
use App\Core\Route;
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$App = new Route();


