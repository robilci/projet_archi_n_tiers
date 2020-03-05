<?php

namespace App\utils\router;

/**
 * Class Router
 * @package App\utils\router
 */
class Router
{
    /**
     * @var - Url that we enter
     */
    private $url;
    /**
     * @var array - List of existing routes
     */
    private $routes = [];

    /**
     * @var array - Named routes
     */
    private static $namedRoutes = [];

    /**
     * Router constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * @param $path
     * @param $callable
     * @param $name
     */
    public function get($path, $callable, $name = null){
        return $this->add($path, $callable, $name, 'GET');
    }


    /**
     * @param $path
     * @param $callable
     * @param $name
     */
    public function post($path, $callable, $name = null){
        return $this->add($path, $callable, $name, 'POST');
    }

    /**
     * @param $path - Path or the new route
     * @param $callable - Method to call
     * @param $name - Name of the new route
     * @param $method - Type of route (POST or GET)
     * @return Route - Add new route
     */
    private function add($path, $callable, $name, $method){
        $route = new Route($path, $callable);
        $this->routes[$method][] = $route;

        if(is_string($callable) && $name === null){
            $name = $callable;
        }

        if($name){
            static::$namedRoutes[$name] = $route;
        }
        return $route;
    }

    public static function url($name, $params = []){
        if(!isset(static::$namedRoutes[$name])){
            throw new RouteurException('No route matching this route name');
        }

        return static::$namedRoutes[$name]->getUrl($params);
    }

    /**
     * @return mixed - Check if the route exists and retrieve the parameters if necessary
     * @throws RouteurException - Return an error if the route does not exist
     */
    public function run(){
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
            throw new RouterException('REQUEST_METHOD does not exist');
        }

        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
            if($route->match($this->url)){
                return $route->call();
            }
        }

        throw new RouteurException('No matching route');
    }
}