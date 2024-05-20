<?php
class Router
{
    private $routes = [];
    private $notFound;

    public function get($pattern, $callback)
    {
        $this->routes['GET'][$pattern] = $callback;
    }

    public function post($pattern, $callback)
    {
        $this->routes['POST'][$pattern] = $callback;
    }

    public function delete($pattern, $callback)
    {
        $this->routes['DELETE'][$pattern] = $callback;
    }

    public function notFound($callback)
    {
        $this->notFound = $callback;
    }


    public function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach ($this->routes[$method] as $pattern => $callback) {
            $regex = preg_replace('/\//', '\/', $pattern);
            $regex = preg_replace('/\:\w+/', '(\w+)', $regex);

            if (preg_match('/^' . $regex . '$/', $path, $matches)) {
                array_shift($matches);
                return call_user_func_array($callback, $matches);
            }
        }

        if ($this->notFound) {
            call_user_func($this->notFound);
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }
}
