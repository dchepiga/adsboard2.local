<?php

/**
 * Created by PhpStorm.
 * User: dev
 * Date: 12.12.14
 * Time: 9:50
 */


class Registry {

    static private $data = array();

    static public function set($key, $value) {
       // if(self::has($key)) return false; //Should it be overwritten ?
        self::$data[$key] = $value;
    }
    static public function get($key=null) {
        if(!isset($key)) return self::$data;
        return isset(self::$data[$key]) ? self::$data[$key] : null;
    }
    static public function delete($key) {
        if ( isset(self::$data[$key]) ) {
            unset(self::$data[$key]);
        }
    }
    static public function has($key) {
        return isset(self::$data[$key]);
    }



}
