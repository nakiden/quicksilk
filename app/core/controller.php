<?php
    class Controller {

        public $model;
        public $view;

        // assign views to new controllers
        function Controller()
        {
            $this->view = new View();
        }

        function action_default()
        {
        }
    }