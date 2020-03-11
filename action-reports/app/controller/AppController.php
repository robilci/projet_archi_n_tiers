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

    protected function convert_from_latin1_to_utf8_recursively($dat)
    {
        if (is_string($dat)) {
            return utf8_encode($dat);
        } elseif (is_array($dat)) {
            $ret = [];
            foreach ($dat as $i => $d) $ret[ $i ] = self::convert_from_latin1_to_utf8_recursively($d);

            return $ret;
        } elseif (is_object($dat)) {
            foreach ($dat as $i => $d) $dat->$i = self::convert_from_latin1_to_utf8_recursively($d);

            return $dat;
        } else {
            return $dat;
        }
    }
}