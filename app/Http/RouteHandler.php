<?php

namespace Http;

require "config/routes.php";

class RouteHandler
{
    static function handle()
    {
        $path = preg_replace('/^./', '', $_SERVER['REQUEST_URI']);

        // Middleware ...
        if(!array_key_exists($path, ROUTES)) {
            Response::view("404");
        }

        // TODO Refactor below code
        $route = ROUTES[$path];

        if(count($route) !== 2) {
            Response::view("404");
        }

        $controller = "\\$route[0]";
        $method = $route[1];

        if(!class_exists($controller)) {
            Response::view("404");
        }

        if(!method_exists($controller, $method)) {
            Response::view("404");
        }

        $controller = new $controller();
        $controller->$method();
    }
}