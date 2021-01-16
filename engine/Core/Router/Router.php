<?php

namespace Engine\Core\Router;


class Router 
{
    private $host;

    private $routes = [
        'GET'  => [],
        'POST' => []
    ];

    private $patterns = [
        'int' => '[0-9]+',
        'str' => '[a-zA-z\.\-_@]+',
        'any' => '[a-zA-z0-9\.\-_@]+'
    ];

    public function __construct($host) 
    {
        $this->host = $host;
    }


    public function add($key, $url, $controller, $method = 'GET')
    {
            $convert = $this->convertPattern($url);
            
            $this->routes[strtoupper($method)][$convert] = $controller;
    }

    public function getRoutes($method)
    {
        return isset($this->routes[$method]) ? $this->routes[$method] : [];
    }


    public function dispatch($method, $uri)
    {
        $routes = $this->getRoutes(strtoupper($method));

        if(array_key_exists($uri, $routes))
        {
          return new DispatchedRoute($routes[$uri]);
        }
           return $this->doDispatch($method, $uri); 
    }

    private function doDispatch($method, $uri)
    { 

        foreach($this->getRoutes($method) as $route => $controller)
        {
            $pattern = '#^' . $route . '$#s';

            if(preg_match($pattern, $uri, $parameters))
            {
                return new DispatchedRoute($controller, $this->processParam($parameters));
            }
        }
        return new DispatchedRoute('ErrorController');
    }
    //______________________________________________________________________

    private function convertPattern($pattern)
    {
       if(strpos($pattern, '(') === false)
       {
        return $pattern;
       }
       return preg_replace_callback('#\((\w+):(\w+)\)#', [$this, 'replacePattern'], $pattern);
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

    public function addPattern($key, $pattern)
    {
        $this->patterns[$key] = $pattern;
    }

}


?>