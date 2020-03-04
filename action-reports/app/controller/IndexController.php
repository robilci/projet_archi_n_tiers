<?php


namespace App\controller;


use App\Model\IndexModel;

class IndexController extends AppController
{
    public function home(){
        $this->render('home');
    }

    public function authentication()
    {
        $this->renderWithoutAuth('authentication');
    }
}