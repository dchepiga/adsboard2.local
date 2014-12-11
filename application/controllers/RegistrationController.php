<?php
/**
 * Created by PhpStorm.
 * User: dani
 * Date: 07.12.14
 * Time: 20:21
 */
class RegistrationController extends Controller {

    function indexAction()
    {
        $this->view->render("RegisterView.php","Layout.phtml");
    }

    function submitAction() {

        $users = file_get_contents("db.txt");
        $users = json_decode($users,true);

        $users[$_POST['input-email']] = array('name' => $_POST['input-email'], 'pass' => $_POST['input-password']);
        $users = json_encode($users);
        file_put_contents("db.txt",$users);
        header('Location: /');

    }
}