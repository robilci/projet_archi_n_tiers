<?php

namespace App;

/**
 * Class Autoloader
 * @package App all classes must be in a namespace with their absolute path from the project root
 */
class Autoloader
{
    /**
     * autoload automatically called class
     */
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * @param $class the called class
     */
    static function autoload($class){
        if(strpos($class, __NAMESPACE__.'\\') === 0){
            $class = str_replace(__NAMESPACE__.'\\', '', $class);
         
            require __DIR__ . '/' .$class.'.php';

        }
    }
}