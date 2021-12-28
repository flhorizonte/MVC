<?php

namespace App;

use App\Modules\Http;

class Kernel
{

    use Http;

    private $defaultViewController = 'AppController';
    private $defaultView = 'login';

    public function run()
    {
        [$method, $controller] = $this->getControllerMethod();

        $pathController = "\\App\\Http\\Controllers\\{$controller}";
        if (class_exists($pathController)) {
            if (method_exists($pathController, $method)) {
                (new $pathController())->$method(); //rodando as classes dinamicamente
            }
        }
    }

    public function view()
    {

        [$view, $controller] = $this->getControllerView();

        if ($view !== null && $controller !== null) {
            $pathController = "\\App\\Http\\Controllers\\{$controller}";
            if (class_exists($pathController)) {
                if (method_exists($pathController, $view)) {
                    (new $pathController())->$view(); //rodando as views dinamicamente
                }
            }
        } else {
            $controller = "\\App\\Http\\Controllers\\{$this->defaultViewController}";
            $method = $this->defaultView;
            (new $controller())->$method();
        }
    }
}
