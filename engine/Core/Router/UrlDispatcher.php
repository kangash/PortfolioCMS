<?php


namespace Engine\Core\Router;


class UrlDispatcher 
{
    private $methods = [
        'GET',
        'POST'
    ];

    private $routes = [
        'GET'  => [],
        'POST' => []
    ];

    private $patterns = [
        'int' => '[0-9]+',
        'str' => '[a-zA-z\.\-_@]+',
        'any' => '[a-zA-z0-9\.\-_@]+'
    ];

    public function addPattern($key, $pattern)
    {
        $this->patterns[$key] = $pattern;
    }
    public function register($method, $pattern, $controller)
    {
            $convert = $this->convertPattern($pattern);
            
            $this->routes[strtoupper($method)][$convert] = $controller;
    }

    private function convertPattern($pattern)
    {
       if(strpos($pattern, '(') === false)
       {
        return $pattern;
       }
       return preg_replace_callback('#\((\w+):(\w+)\)#', [$this, 'replacePattern'], $pattern);
    }

    public function routes($method)
    {
        return isset($this->routes[$method]) ? $this->routes[$method] : [];
    }


    public function dispatch($method, $uri)
    {
        $routes = $this->routes(strtoupper($method));

        if(array_key_exists($uri, $routes))
        {
          return new DispatchedRoute($routes[$uri]);
        }
           return $this->doDispatch($method, $uri); 
    }

    private function doDispatch($method, $uri)
    { 

        foreach($this->routes($method) as $route => $controller)
        {
            $pattern = '#^' . $route . '$#s';

            if(preg_match($pattern, $uri, $parameters))
            {
                return new DispatchedRoute($controller, $this->processParam($parameters));
            }
        }
    }
    
    private function replacePattern($matches)
    {
        return '(?<' . $matches[1] . '>' . strtr($matches[2], $this->patterns) . ')';
    }

    private function processParam($parameters)
    {
        foreach($parameters as $key => $value)
        {
            if(is_int($key))
            {
                unset($parameters[$key]);
            }
        }
        return $parameters; 
    }

}


class DispatchedRoute 
{
    private $controller;
    private $parameters;

    public function __construct($controller, $parameters = [])
    {
        $this->controller = $controller;
        $this->parameters = $parameters;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

}


?>