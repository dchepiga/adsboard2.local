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


    public static function get($key = null, $subkey = null)
    {
        if (is_null($key) && is_null($subkey))
            return self::$conf;
        if (array_key_exists($key, self::$conf) && is_null($subkey))
            return self::$conf[$key];
        if (array_key_exists($subkey, self::$conf[$key]) && !is_null($key) && !is_null($subkey))
            return self::$conf[$key][$subkey];
        return false;
    }

    public static function init($dir = null)
    {
        $pathDefault = $_SERVER['DOCUMENT_ROOT'] . '/application/config/default/';
        $confDefault = Config::assembleConfig($pathDefault);
        self::$conf = $confDefault;

        if (isset($dir)) {
            $pathConfig = $_SERVER['DOCUMENT_ROOT'] . '/application/config/' . $dir . '/';
            $confUser = Config::assembleConfig($pathConfig);
            self::$conf = array_replace_recursive($confDefault, $confUser);
        }

        // Registry::init();
        $registry = Config::get('registry');
        if ($registry)
        {
            foreach($registry as $key => $value)
                Registry::set($key, $value);
        }

        // return self::$conf;
    }

    public function assembleConfig($path)
    {
        $filesList = glob($path . '*.php');
        $config = array();
        foreach ($filesList as $file) {
            $confTemp = require_once $file;
            $config = array_merge($config, $confTemp);
        }
        return $config;
    }

}