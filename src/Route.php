<?php
namespace App;
class Route{
    public $routes = [];
   

    private function addRoute($method, $route, $controller, $action) {
        $this->routes[$method][$route] = ['controller' => $controller, 'action' => $action];
    }
    public function get($route, $controller, $action){
        $this->addRoute('GET',$route, $controller, $action);
    }
    public function post($route, $controller, $action){
        $this->addRoute('POST',$route, $controller, $action);
    }
    public function dispatch(){
        $path=parse_url($_SERVER['REQUEST_URI'])['path'];
        $_SESSION["data"]=isset(parse_url($_SERVER['REQUEST_URI'])['query'])? parse_url($_SERVER['REQUEST_URI'])['query']: Null;
        $method=$_SERVER["REQUEST_METHOD"];
        if(array_key_exists($path, $this->routes[$method])){
            $controller = $this->routes[$method][$path]['controller'];
            $action = $this->routes[$method][$path]['action'];
            $controller = new $controller();
            $controller->$action();
        }
        
    }
}