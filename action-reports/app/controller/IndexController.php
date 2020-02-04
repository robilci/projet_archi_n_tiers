<?php


namespace App\controller;


class IndexController extends AppController
{
    public function home(){
        $this->render('home');
    }

    public function authentication(){
        $this->render('authentication');
    }
}