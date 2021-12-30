<?php

namespace App\Modules;

trait Http {

    use Auth;

    public function getControllerMethod() {
        $method = isset($_GET['method']) ? $_GET['method'] : null;
        $controller = isset($_GET['controller']) ? $_GET['controller'] : null;
        return [$method, $controller];
    }

    public function getControllerView() {
        $view = isset($_GET['view']) ? $_GET['view'] : null;
        $controller = isset($_GET['controller']) ? $_GET['controller'] : null;
        return [$view, $controller];
    }

    public function dispatchRoute($method, $controller) {
        $path = "\\App\\Http\\Controllers\\{$controller}";
        if(class_exists($path)){
            if(method_exists($path, $method)){
                (new $path())->$method();
            }
        }
    }

    public function dispatchView($defaultViewController, $defaultView) {
        [$view, $controller] = $this->getControllerView();
        if($view !== null && $controller !== null && $this->verifyAuthSession()){
            $this->dispatchRoute($view, $controller);
        } else {
            $this->dispatchRoute($defaultView, $defaultViewController);
        }
    }
}