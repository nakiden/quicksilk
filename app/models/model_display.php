<?php

require "/db/DataBase.php";

class Model_Display extends Model
{
    // get all books from data base
    function get_data()
    {
        $db = new DataBase();
        $mysqli = $db->getMysqli();
        $sql = 'SELECT * FROM books';

        if($result = $mysqli->query($sql)){
            $i = 0;

            while ($row = mysqli_fetch_assoc($result)){
                $books[$i]['title'] = $row['title'];
                $books[$i]['author'] = $row['author'];
                $books[$i]['pages'] = $row['pages'];
                $books[$i]['language'] = $row['language'];
                $i++;
            }
            return $books;
        } else {
            return null;
        }
    }

    // get user id by login from database
    function get_user_id($login){
        $db = new DataBase();
        $mysqli = $db->getMysqli();
        $sql = 'SELECT * FROM users WHERE login ="'.$login.'"';

        if($result = $mysqli->query($sql)){
            $row = $result->fetch_assoc();
            return $row['id'];
        } else {
            return null;
        }
    }

    // get books from data base by user id
    function get_data_by_user($login){
        $db = new DataBase();
        $mysqli = $db->getMysqli();
        $userID = $this->get_user_id($login);
        $sql = 'SELECT books.* FROM books INNER JOIN relations
                    ON relations.bookID = books.id WHERE relations.userID = '.$userID;

        if($result = $mysqli->query($sql)){
            $i = 0;

            while ($row = $result->fetch_assoc()){
                $books[$i]['title'] = $row['title'];
                $books[$i]['author'] = $row['author'];
                $books[$i]['pages'] = $row['pages'];
                $books[$i]['language'] = $row['language'];
                $i++;
            }
            return $books;
        } else {
            return null;
        }
    }




}
