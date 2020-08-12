<?php

//Front Controller

//Общие настройки

// 1. Отображение ошибок
use config\Router;

ini_set('display_errors',1);
error_reporting(E_ALL);

//Подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once(ROOT . '/components/Router.php');

//Подключение к БД


//Вызов Router
$router = new Router();
$router->run_route();
/*

include 'controllers/HomeController.php';

use config\Router;

spl_autoload_register(function ($class)
{
    $path = str_replace('\\', '/', $class.'.php');
    if (file_exists($path))
    {
       require $path;
    }
});

session_start();

$router = new Router();
$router->run_route();*/
