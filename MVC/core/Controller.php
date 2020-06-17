<?php

class Controller {
    protected function model($model) {
        require_once './MVC/Models/' . $model . '.php';
        return new $model;
    }

    protected function view($view, $data = []) {
        require_once './MVC/Views/' . $view . '.php';
    }
}