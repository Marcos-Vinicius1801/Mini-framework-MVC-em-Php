<?php
namespace SON\Init;

abstract class Bootstrap{
    private $route;

    public function __construct()
    {
        $this->initRoutes();
        $this->run($this->getUrl());
    }

    abstract protected function initRoutes();

    protected function run($url)
    {
       //Recebe a rota
        array_walk($this->routes, function($route) use ($url){
            if($url == $route['route']){
                $class = "App\\Controllers\\".ucfirst($route['controller']);
                //instância da classe criada acima 
                $controller = new $class;
                $action = $route['action'];
                $controller->$action();
            }
        });
    }

    protected function setRoute(array $routes)
    {
        $this->routes = $routes;
    }

    protected function getUrl()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}