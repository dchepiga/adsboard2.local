<?php
/**
 * Created by PhpStorm.
 * User: dani
 * Date: 07.12.14
 * Time: 18:29
 */
 class User {

     private $userEmail;
     private $userName;
     private $userPassword;


     public function __construct($data)
     {
         $this->userEmail = isset($data['userEmail']) ? $data['userEmail'] : '';
         $this->userName = isset($data['userName']) ? $data['userName'] : '';
         $this->userPassword = isset($data['userPassword']) ? $data['userPassword'] : '';
     }

     public function getUser() {

         return array(
             'userEmail' => $this->userEmail,
             'userName' => $this->userName,
             'userPassword' => $this->userPassword
         );
     }

 }