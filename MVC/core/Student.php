<?php
    class Student{
        protected $controller = "Home";
        protected $action = "index";
        protected $params = [];
        function __construct() {
            $array = $this->urlProcess();
            if (file_exists("./MVC/controllers/".$array[0].".php")) {
                $this->controller = $array[0];
                unset($array[0]);
            }
            require_once "./MVC/controllers/".$this->controller.".php";
            $this->controller = new $this->controller;
        }
        function urlProcess() {
            if (isset($_GET["url"])) {
                return explode("/", filter_var(trim($_GET["url"], "/")));
            }
        }
    }
?>