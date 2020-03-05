<?php


namespace App\controller;


use App\Model\IndexModel;
use App\utils\session\Session;

class IndexController extends AppController
{
    public function home(){
        $this->render('home');
    }

    public function authentication()
    {
        $this->logout();
    }

    public function logout(){
        session_start();
        session_unset();
        $this->renderWithoutAuth('authentication');
    }
}