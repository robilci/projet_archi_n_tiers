<?php
namespace App\controller;

 use App\Model\UserModel;

 class UserController  extends AppController{

     public function adminPage()
     {
         $this->render('user.admin');
     }

     public function getUser()
     {   $Auth = new AuthentificationController();
         $m = new UserModel();
         $user=$m->getUser($Auth->user('Droit_ID'));
        // $this->render('user.account',array($user));
      var_dump($user);
     }


     /**
      *Access to the page my account
      */
     public function myAccount()
     {
         $this->render('user.account');
     }
     public function changePassword()
     {         var_dump($_SESSION);
$this->render('user.password');

     }
 }