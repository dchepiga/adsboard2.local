<?php
/**
 * Created by PhpStorm.
 * User: dani
 * Date: 07.12.14
 * Time: 20:34
 */
class View
{
   // public $templateView = 'layout.phtml';

    function view($contentView, $templateView)
    {
        ob_start();
        include 'application/views/'.$contentView;
        $content = ob_get_clean();
        include 'application/views/'.$templateView;
    }
}