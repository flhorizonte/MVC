<?php

namespace App;

use App\Modules\Auth;
use App\Modules\Http;

class Kernel
{
    use Http;

    private $defaultViewController = 'AppController';
    private $defaultView = 'login';

    public function run()
    {
        [$method, $controller] = $this->getControllerMethod();
        $this->dispatchRoute($method, $controller);
    }

    public function view()
    {
        $this->dispatchView($this->defaultViewController, $this->defaultView);
    }
}
