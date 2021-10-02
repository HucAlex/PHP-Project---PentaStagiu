<?php 

class Router
{
    protected $routes = [];

    public function __construct($routes = [])
    {
        $this->routes = $routes;
    }

    public function setRoutes(array $routes)
    {
        $this->routes = $routes;
    }

    public function addRoutes(array $routes)
    {
        $this->routes = array_merge($this->routes, $routes);
    }

    public function direct($uri)
    {
        if(array_key_exists($uri, $this->routes))
        {
            list($class, $method) = explode('@', $this->routes[$uri]);
            $contr = new $class();
            $contr->{$method}();
        }
        else
        {
            throw new Exception("Page not found");
        }
    }
}


?>