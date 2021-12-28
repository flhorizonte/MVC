<?php

namespace App\Modules;

abstract class Controller {
    
    use View;

    protected function view(string $view) {
        $this->getContent($view);
    }
}