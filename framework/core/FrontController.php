<?php
/**
 * Created by PhpStorm.
 * User: dani
 * Date: 07.12.14
 * Time: 18:38
 */
include __DIR__ . '/Dispatcher.php';
include __DIR__ . '/View.php';
include __DIR__ . '/Model.php';
include __DIR__ . '/Controller.php';
include dirname(__DIR__).'/classes/Config.php';
include dirname(__DIR__).'/classes/Route.php';
include dirname(__DIR__).'/classes/Registry.php';


class FrontController {


    static function run() {
        session_start();
        Dispatcher::start();

    }

}