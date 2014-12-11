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

    function submitAction()
    {
        $users = file_get_contents("db.txt");
        $users = json_decode($users,true);
        if(!is_null($users) && array_key_exists($_POST['input-email'],$users)){
            if($users[$_POST['input-email']]['pass']==$_POST['input-password']){
                $_SESSION["logged"]=1;
//                header('Location: /');

                $data=array("url"=>"/","message"=>"Logged In");
                    $this->view->render("NotificationRedirect.php","Layout.phtml", $data);
            }else $this->view->error("ErrorView.php","Layout.phtml", "Password is wrong");

        }else {
            $this->view->error("ErrorView.php","Layout.phtml", "User not found");
            //   header('Location: /');
        }
    }
}