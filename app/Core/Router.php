<?php
namespace App\Core;

class Router
{
    protected $routes = [];

    private function addRoute($method, $uri, $controller)
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller
        ];
    }

    public function get($uri, $controller)
    {
        $this->addRoute('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        $this->addRoute('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        $this->addRoute('DELETE', $uri, $controller);
    }

    public function dispatch($uri, $method)
    {
        foreach ($this->routes as $route) {
            // Very simple direct match routing. 
            // In a real app we might use regex to pull dynamic {id} variables.
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                $action = $route['controller'];

                // Handle closure routes (e.g. $router->get('/', function() { ... }))
                if (is_callable($action)) {
                    return call_user_func($action);
                }

                // Handle Controller array syntax (e.g. [HomeController::class, 'index'])
                if (is_array($action)) {
                    $class = $action[0];
                    $methodName = $action[1];

                    $controller = new $class();
                    return call_user_func([$controller, $methodName]);
                }
            }
        }

        $this->abort();
    }

    protected function abort($code = 404)
    {
        http_response_code($code);
        // If we have a view for it, display it. Otherwise raw text.
        $viewPath = BASE_PATH . "/resources/views/errors/{$code}.php";
        if (file_exists($viewPath)) {
            require $viewPath;
        }
        else {
            echo "{$code} - Route Not Found";
        }
        die();
    }
}
