<?php
/**
 * Created by PhpStorm.
 * User: dani
 * Date: 07.12.14
 * Time: 18:26
 */


class IndexController extends Controller{

    function homeAction() {

        $this->view->render("HomeView.php","Layout.phtml");
        

    }
}