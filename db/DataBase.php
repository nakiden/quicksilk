<?php


class DataBase
{
    private $password = '';
    private $host = 'localhost';
    private $user = 'root';
    private $mysqli;
    private $dbname = 'data';


    // get connected mysqli variable
    function getMysqli(){
        return $this->DBconnect();
    }

    // connect to data base
    public function DBconnect(){
        $this->mysqli = new mysqli($this->host,$this->user,$this->password,$this->dbname);
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            return null;
        } else {
            return $this->mysqli;
        }
    }

}