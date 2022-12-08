<?php

abstract class Connection{

    private static $conn;

    public static function getConn(){
        if(!self::$conn){
            self::$conn = new PDO('mysql:host=localhost;dbname=db_crud_php_login_dashboard', 'root', '');
        }

        return self::$conn;
    }

}

?>