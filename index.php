<?php
/**
 * Created by PhpStorm.
 * User: dani
 * Date: 07.12.14
 * Time: 19:34
 */
include __DIR__ . '/framework/core/FrontController.php';
//include __DIR__ . '/framework/core/View.php';

//FrontController::run();
var_dump(Config::init('dev'));
var_dump(Config::get('db','host'));
var_dump(Config::get('db'));
var_dump(Config::get());

var_dump(Registry::get());
var_dump(Registry::get('title'));


