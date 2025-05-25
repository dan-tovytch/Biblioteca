<?php 

namespace Core;

class Router {
    protected $routes = [];

    public function __construct() {
        $this->routes = [
            ""                      =>      "HomeController@index",
            "user/login/save"       =>      "UserController@login",
            "user/login"            =>      "UserController@loginForm",
            "user/register"         =>      "UserController@registerForm",
            "user/register/save"    =>      "UserController@register",
            "user/logout"           =>      "UserController@logout",
            "user/delete"           =>      "UserController@delete",
            "user/bag"              =>      "UserController@bag",
            "user/bag/reserved"     =>      "UserController@bagReserved",
            "user/bag/rented"       =>      "UserController@bagRented",
            "books/register"        =>      "BookController@registerForm",
            "books/register/save"   =>      "BookController@register",
            "books/edit"            =>      "BookController@edit",
            "books/list"            =>      "BookController@list",
        ];
    }

    /**
     * Summary of run
     * @return void
     */
    public function run() {
        $uri = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), '/');

        if(array_key_exists($uri, $this->routes)) {
            $this->dispatch($this->routes[$uri]);
        } else {
            echo "404 Não encontrado";
        }
    }

    public function dispatch($routes) {
        list($controller, $method) = explode('@', $routes);
        $controller = "App\\Controller\\" . $controller;

        if(class_exists($controller)) {
            $controllerInstace = new $controller();
            if (method_exists($controllerInstace, $method)) {
                $controllerInstace->$method();
            } else {
                echo "Método $method não encontrado no controller $controller";
            }
        } else {
            echo "Controller $controller não encontrado";
        }
        
    } 
}