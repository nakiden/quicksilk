<?php
require '/db/DataBase.php';

class Model_Login extends Model
{
    // check records existing by login
    function isLoginExist($login){
        $db = new DataBase();
        $mysqli = $db->getMysqli();
        $sql = 'SELECT * FROM users WHERE login ="'.$login.'"';

        if ($result = $mysqli->query($sql)){
            if ($result->num_rows != 0) return 1;
            return 0;
        } else {
            return null;
        }
    }

    // get all data from user table in data base by login
    function get_dataByLogin($login){
        $db = new DataBase();
        $mysqli = $db->getMysqli();
        $sql = 'SELECT * FROM users WHERE login ="'.$login.'"';

        if ($result = $mysqli->query($sql)){
           return $result->fetch_assoc();
        } else {
            return null;
        }
    }
}
