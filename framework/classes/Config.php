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

    public static function init ($confName="default")
    {
        self::$conf = require $_SERVER['DOCUMENT_ROOT'].'/application/config/default.php';
        if(isset($confName)&& !is_null(self::$conf))
        {
            $userConfig = require $_SERVER['DOCUMENT_ROOT'].'/application/config/'.$confName.'/'.$confName.'.php';
            self::$conf = array_merge_recursive(self::$conf, $userConfig);
        }
        return self::$conf;

    }
    static function get ($key)
    {
        if(array_key_exists($key,self::$conf))
            return self::$conf[$key];
        return self::$conf;
    }

    public static function initTest($dir)
    {
        $pathDefault = $_SERVER['DOCUMENT_ROOT'].'/application/config/default/';
        $pathConfig =  $_SERVER['DOCUMENT_ROOT'].'/application/config/'.$dir.'/';

        $confDefault = Config::assembleConfig($pathDefault);
        $confUser = Config::assembleConfig($pathConfig);

        return self::$conf = array_replace_recursive($confDefault,$confUser);
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