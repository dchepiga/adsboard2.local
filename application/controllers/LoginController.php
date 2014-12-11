<?php
/**
 * Created by PhpStorm.
 * User: dani
 * Date: 07.12.14
 * Time: 20:21
 */
class LoginController extends Controller{
    
    function indexAction() {
        $this->view->render("LoginView.php","Layout.phtml");

    }

}