<?php

namespace App;

use App\security\ForbiddenException;

class Router
{

    /**
     * @var string
     */
    private $controllerPath;
    private $viewsPath;

    /**
     * @var Altorouter
     */
    private $router;


    public function __construct()
    {
        $this->controllerPath = dirname(__DIR__) . '/src/Controller';
        $this->viewsPath = dirname(__DIR__) . '/views';

        $this->router = new \AltoRouter();
    }

    public function get(string $url, string $view, ?string $name = null): self
    {
        $this->router->map('GET', $url, $view, $name);

        return $this;
    }

    public function post(string $url, string $view, ?string $name = null): self
    {
        $this->router->map('POST', $url, $view, $name);

        return $this;
    }

    public function match(string $url, string $view, ?string $name = null): self
    {
        $this->router->map('POST|GET', $url, $view, $name);

        return $this;
    }


    public function url(string $name, array $params = [])
    {
        return $this->router->generate($name, $params);
    }

    public function run(): self
    {
        $match = $this->router->match();
        $view = $match['target'] ?: 'e404';
        $params = $match['params'];
        $router = $this;
        $isAdmin = strpos($view, 'admin/') !== false;
        $layout = $isAdmin ? 'admin/layouts/default' : 'layouts/default';

        try {
            ob_start();
            require $this->controllerPath  . DIRECTORY_SEPARATOR . $view . '.php';
            $content = ob_get_clean();
            require $this->viewsPath  . DIRECTORY_SEPARATOR . $layout  . '.php';
        } catch (ForbiddenException $e) {
            header('Location: ' . $this->url('login_member') . '?forbidden=1');
            exit();
        }
        return $this;
    }
}
