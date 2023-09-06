<?php

namespace Pathology\Core;

/**
 * Controller class
 */
class Controller {

    /**
     * Basic model loader 
     * @param   string $model   Model class
     * @return  mix             Class instance or error if model doesn't exist
     */
    protected function model($model) {
        if (file_exists('../app/Models/' . $model . '.php')) {

            require_once '../app/Models/' . $model . '.php';
            $model = 'Pathology\Models\\' . $model;
            return new $model;
        }

        return exit('Model doesn\'t exist');
    }

    /**
     * Basic view loader
     * @param   string $view    View file
     * @param   array $data     Array data
     */
    protected function view($view, $data = []) {

        if (file_exists('../Views/' . $view . '.php')) {

            require_once '../Views/' . $view . '.php';
        }
    }

}
