<?php
/**
 * Created by PhpStorm.
 * User: dani
 * Date: 07.12.14
 * Time: 19:24
 */
class Route
{
    static function start()
    {
        // контроллер и действие по умолчанию
        $controllerName = 'Index';
        $actionName = 'home';

        $routes = explode('/', $_GET['action']);
        //var_dump($_GET);

        // получаем имя контроллера
        if ( !empty($routes[0]) )
        {
            $controllerName = $routes[0];
        }

        // получаем имя экшена
        if ( !empty($routes[1]) )
        {
            $actionName = $routes[1];
        }

        $controllerName = ucfirst($controllerName).'Controller';
        $actionName = $actionName.'action';


        // подцепляем файл с классом контроллера
        $controllerFile = $controllerName.'.php';
        $controllerPath = "application/controllers/".$controllerFile;
        if(file_exists($controllerPath))
        {
            include "application/controllers/".$controllerFile;
        }
        else
        {
            /*
            правильно было бы кинуть здесь исключение,
            но для упрощения сразу сделаем редирект на страницу 404
            */
            Route::errorPage();
        }

        // создаем контроллер
        $controller = new $controllerName;
        $action = $actionName;

        if(method_exists($controller, $action))
        {
            // вызываем действие контроллера
            $controller->$action();
        }
        else
        {
            // здесь также разумнее было бы кинуть исключение
            Route::errorPage();
        }

    }

    function errorPage()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        include 'error.php';
    }
}
