<?php


namespace App\Controller;


use App\App;

/**
 * Class AppController
 * @package App\Controller
 * Contains all methods that are specific to the application
 */

class AppController extends Controller {

    protected $template = 'default';

    public function __construct() {
        $this->viewPath = ROOT . '/app/view/';
    }

    protected function loadModel($model_name) {
        $this->$model_name = \App::getInstance()->getTable($model_name);
    }

}