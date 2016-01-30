<?php

    class Route{
        function start(){
            // default values
            $controller_name = 'Main';
            $action_name = "default";
            $isArgExist = false;
            $arg = null;

            $url = explode('/', $_SERVER['REQUEST_URI']);

            // get controller
            if (!empty($url[1])){
                $controller_name = $url[1];
            } else {
                $controller_name = 'Login';
            }

            // get action
            if (!empty($url[2])){

                if(!preg_match("/[0-9]+/",$url[2])){
                    $action_name = $url[2];
                } else {
                    $action_name = "get";
                    $arg = $url[2];
                    $isArgExist = true;
                }
            }

            //prefixes
            $model_name = 'Model_'.$controller_name;
            $controller_name = 'Controller_'.$controller_name;
            $action_name = "action_".$action_name;

            // model files
            $model_file = strtolower($model_name).'.php';
            $model_path = "app/models/".$model_file;

            // include models files
            if (file_exists($model_path)){
                require $model_path;
            }

            // assign controllers file
            $controller_file = strtolower($controller_name).'.php';
            $controller_path = "app/controllers/".$controller_file;

            // include controllers files
            if (file_exists($controller_path)){
                require $controller_path;
            } else {
                Route::ErrorPage();
            }

            // controllers creation
            $controller = new $controller_name;
            $action = $action_name;

            // check issset method and create a handler
            if(method_exists($controller,$action)){
                // run it
                if($isArgExist) {
                    $controller->$action($arg);
                } else {
                    $controller->$action();
                }
            } else {
                Route::ErrorPage();
            }


        }

        // redirect to error page
        function ErrorPage(){
            $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
            header('HTTP/1.1 404 Not Found');
            header("Status: 404 Not Found");
            header('Location:'.$host.'404');
        }
    }