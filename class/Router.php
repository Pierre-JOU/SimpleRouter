<?php

/**
 * Class Router
 * Provide a router service. Routes are set by
 * Router::get($route = '/controller/{param1}/...', $controller = "controller@method"
 */
class Router
{
    /**
     * @var array
     * Contain all routes
     */
    private static $_routes = [];
    /**
     * @var
     * Contain all matches
     */
    private static $_matches;

    /**
     * @param $route
     * @param $controller
     * Example : Router::get('/posts/{id}', 'post@listByID')
     */
    public static function get($route, $controller){

        $route = trim($route, '/');

        self::$_routes[$route] = $controller;
    }

    /**
     * @return mixed
     * When set all routes, run the Router Application !
     */
    public static function run(){
        foreach (self::$_routes as $route => $controller){

            if(self::match($_GET['url'], $route)){

                return self::call($controller);

            }
        }
        self::error();
    }

    /**
     * @param $url
     * @param $route
     * @return bool
     * Is a match in routes with url ?
     */
    public static function match($url, $route){

        $path = preg_replace('#{[a-z]+}#', '([a-z0-9\-]+)', $route);

        $url = rtrim($url, '/');

        if(!preg_match("#^$path$#", $url , $matches)){

            return false;

        } else {

            array_shift($matches);
            self::$_matches = $matches;
            return true;

        }

    }

    /**
     * @param $controller
     * @return mixed
     * Call the controller and call method with args
     */
    public static function call($controller){
        $params = explode('@',$controller);

        $controller_name = $params[0].'Controller';

        require 'controller/'.$controller_name.'.php';

        $controller = new $controller_name();

        return call_user_func_array([$controller, $params[1]], self::$_matches);
    }

    /**
     *  Route is incorrect
     */
    public static function error(){
        header('HTTP/1.0 404 Not Found');
        die("HTTP/1.0 404 Not Found. Please contact an administrator");
    }
}