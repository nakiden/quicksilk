<?php
    class Controller_Login extends Controller
    {
        // assign models and views to login controller
        function Controller_Login()
        {
            parent::Controller();
            $this->model = new Model_Login();
            $this->view = new View();
        }

        // handle authorisation
        private function login_auth(){

            if(isset($_POST['login']) && isset($_POST['password']))
            {
                $login = $_POST['login'];
                $password = $_POST['password'];

                if ($this->model->isLoginExist($login)) {
                    $data = $this->model->get_dataByLogin($login);
                } else {
                    $data["login_status"] = "access_denied";
                }

                if (isset($data)) {
                    if ($login == $data['login'] && $password == $data['password']) {
                        $data["login_status"] = "access_granted";

                        session_start();
                        $_SESSION['login'] = $login;
                        header('Location:/display/');
                    } else {
                        $data["login_status"] = "access_denied";
                    }
                }
                return $data;
            } else {
                $data["login_status"] = "";
                return $data;
            }
        }

        // log out from the account
        function action_logout(){
            session_start();
            $_SESSION['login'] = null;
            header('location: /login/');
        }

        // render login page and check log in status
        function action_default()
        {
            $data = $this->login_auth();
            session_start();

            if (isset($_SESSION['login'])) {
                $this->view->render('login_view_logged.php', 'default_view.php', $data);
            } else {
                $this->view->render('login_view.php', 'default_view.php', $data);
            }
        }
    }