<?php
    class Controller_Display extends Controller{
        // assign models and views to display controller
        function Controller_Display(){
            parent::Controller();
            $this->model = new Model_Display();
            $this->view = new View();
        }

        function action_default()
        {
            $this->action_get(1);
        }

        // get user data from Data Base by logged in user
        function action_get($arg){
            session_start();

            if(isset($_SESSION['login'])){
                $data['session'] = $_SESSION['login'];
                $data['currentPage'] = $arg;
                $data['books'] = $this->model->get_data_by_user($_SESSION['login']);
                $this->view->render('display_view.php', 'default_view.php', $data);
            } else {
                header('Location:/login/');
            }
        }

    }