<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 10.12.14
 * Time: 11:10
 */

class Config
{
    private static $conf;


    static function get($key)
    {
        if(array_key_exists($key,self::$conf))
            return self::$conf[$key];
        return self::$conf;
    }

    public static function init($dir = null)
    {
        $pathDefault = $_SERVER['DOCUMENT_ROOT'].'/application/config/default/';
        $confDefault = Config::assembleConfig($pathDefault);
        self::$conf = $confDefault;

        if(isset($dir)) {
            $pathConfig = $_SERVER['DOCUMENT_ROOT'] . '/application/config/' . $dir . '/';
            $confUser = Config::assembleConfig($pathConfig);
            self::$conf = array_replace_recursive($confDefault,$confUser);
        }
        return self::$conf;
    }

    function assembleConfig($path)
    {
        $filesList = glob($path.'*.php');
        $config = array();
        foreach($filesList as $file)
        {
            $confTemp = require_once $file;
            $config = array_merge($config,$confTemp);
        }
        return $config;
    }

}