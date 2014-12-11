<?php
/**
 * Created by PhpStorm.
 * User: dani
 * Date: 07.12.14
 * Time: 20:34
 */
class View
{
    public function render($contentView, $templateView = 'Layout.phtml', $data = null)
    {
        ob_start();
        include 'application/views/content/'.$contentView;
        $content = ob_get_clean();
        include 'application/views/layout/'.$templateView;
    }

    public function error($contentView, $templateView = 'Layout.phtml')
    {
        ob_start();
        include 'application/views/error/'.$contentView;
        $content = ob_get_clean();
        include 'application/views/layout/'.$templateView;

    }
}