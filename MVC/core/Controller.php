<?php
    class Controller {
        public function model($model) {
            require_once '/MVC/model/' . $model . '.php';
            return new $model();
        }
        public function view($view, $data = []) {
            require_once './MVC/view/' . $view . '.php';
        }
    }
?>