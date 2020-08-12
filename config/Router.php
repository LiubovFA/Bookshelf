<?php

namespace config;

class Router
{
    private $routes = [];
    private $params = [];

    function __construct()
    {
        //считываем маршруты и запоминаем их в routes
        $routesPath = ROOT.'\config\routes.php';
        $this->routes = include ($routesPath);

        //echo 'I am a router class';
        //
    }

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI']))
        {
            return(trim($_SERVER['REQUEST_URI'], '/'));
        }
    }

    public function run_route()
    {
        //Получить стоку запроса
        $uri = $this->getURI();
        //echo $uri.' ';

        //Проверить наличие такого запроса в routes
        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", $uri)) {
                //При совпадении определить контроллер и экшен
                // echo $uriPattern.' ';

                $segments = explode('/', $path);
                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);
                // echo $controllerName.' '.$segments[0];

                $methodName = ucfirst($segments[0]);
                //echo $methodName;

                /*  echo '<pre>';
                  print_r($segments);
                  echo '</pre>';*/

                //Подключить файл класса-контроллера
                $controllerFile = ROOT . '/mvc/controllers/' . $controllerName . '.php';
                // echo ' '.$controllerFile;

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                //Создать объект, вызвать метод
                $controllerObj = new $controllerName;

                $result = $controllerObj->$methodName();

                if ($result != NULL) {
                    //выход из цикла
                    break;
                }
            }
        }
    }
}