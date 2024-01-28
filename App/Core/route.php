<?php

namespace app\core;



class route
{
    protected array $routes;
    public function register(string $requestMethod, string $route,  $action): self
    {
        //var_dump($route);
        $this->routes[$requestMethod][$route] = $action;
        // var_dump($this->routes);
        return $this;
    }


    public function get(string $route,  $action): self
    {
        return $this->register('get', $route, $action);
    }
    public function post(string $route,  $action): self
    {
        return $this->register('post', $route, $action);
    }
    public function resolve(string $requestMethod, string $requestUrl)
    {

        $route = explode('?', $requestUrl)[0];
        $action = $this->routes[$requestMethod][$route] ?? null;
        // var_dump($this->routes);
        // var_dump($action);
        if (!$action) {
            // throw new RouteNotFoundException();
            echo "Không tồn tại";
        }
        if (is_callable($action)) {
            return call_user_func($action);
        }
    
        if (is_array($action)) {
            [$class, $method] = $action;
            // echo $class;
            // echo $method;
            if (class_exists($class)) {
                $class = new $class();
                if (method_exists($class, $method)) {;
                    return call_user_func_array([$class, $method], []);
                }
            }
            else
            {
                echo "class không tồn tại";
            }
        }
    }
}
