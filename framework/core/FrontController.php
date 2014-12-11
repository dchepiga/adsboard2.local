<?php
/**
 * Created by PhpStorm.
 * User: dani
 * Date: 07.12.14
 * Time: 18:38
 */
include __DIR__ . '/Dispatcher.php';
include __DIR__.'/../classes/Route.php';

class FrontController {


    static function run() {
        Dispatcher::start();

    }

}