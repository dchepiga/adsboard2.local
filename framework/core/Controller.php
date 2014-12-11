<?php
/**
 * Created by PhpStorm.
 * User: dani
 * Date: 09.12.14
 * Time: 20:55
 */

class Controller {

    private $model;
    private $view;

    function __construct()
    {
        $this->view  = new View();
        $this->model = new Model();
    }


    function render(){
        echo get_class ($this).'\n';
        echo $this->$myAction;
    }

}