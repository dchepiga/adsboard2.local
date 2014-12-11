<?php
/**
 * Created by PhpStorm.
 * User: dani
 * Date: 09.12.14
 * Time: 20:56
 */
//include __DIR__.'/../classes/Route.php';

class Dispatcher
{

    static function start()
    {


        // контроллер и действие по умолчанию


        $router = new Route();
        $router->getRoute();

        $controllerName = ucfirst($router->getControllerName()) . 'Controller';
        $actionName = $router->getActionName() . 'action';


        // подцепляем файл с классом контроллера
        $controllerFile = $controllerName . '.php';
        $controllerPath = "application/controllers/" . $controllerFile;
        if (file_exists($controllerPath)) {
            include "application/controllers/" . $controllerFile;
        } else {

        }

        // создаем контроллер
        $controller = new $controllerName;
        $action = $actionName;

        if (method_exists($controller, $action)) {
            // вызываем действие контроллера
            $controller->$action();
        } else {
            // здесь также разумнее было бы кинуть исключение
            $router->errorPage();
        }
    }
}