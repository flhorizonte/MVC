<?php

namespace App\Modules;

trait Http {

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
}