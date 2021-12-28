<?php

namespace App\Modules;

trait View {
    //responsável pelas funções de view

    public static function getView($view) {
        //percorrer as views
        //dar um include na view selecionada
        $path = './src/App/Resources/Views/' . $view . '.php';
        if(!file_exists($path)) {
            die('view não encontrada');
        } 

        return $path;
    }

    public function getContent($view) {
        //pegar o conteúdo da view escolhida
        include $this->getView($view);
    }
}