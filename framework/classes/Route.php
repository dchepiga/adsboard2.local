<?php
/**
 * Created by PhpStorm.
 * User: dani
 * Date: 07.12.14
 * Time: 19:24
 */
class Route
{
    private  $actionName;

    /**
     * @return mixed
     */
    public function getControllerName()
    {
        return $this->controllerName;
    }

    /**
     * @return mixed
     */
    public function getActionName()
    {
        return $this->actionName;
    }
    private $controllerName;

    public function getRoute()
    {

        $routes = explode('/', $_GET['action']);

        if (!empty($routes[0])) {
            $this->$controllerName = $routes[0];
        }

        if (!empty($routes[1])) {
            $this->$actionName = $routes[1];
        }

        return [$this->controllerName, $this->actionName];

    }

//    function errorPage()
//    {
//        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
//        header('HTTP/1.1 404 Not Found');
//        header("Status: 404 Not Found");
//        include '/application/views/error/ErrorView.php';
//    }
}
