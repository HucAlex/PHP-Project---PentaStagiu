<?php

class DB
{
    private static ?PDO $instance = null;

    public static function getInstance()
    {
        if(is_null(self::$instance))
        {
            $dbPassword = "PhpFundamentals";
            $dbUserName = "PhpFundamentals";
            $dbServer = "localhost";
            $dbName = "Tema1";

            self::$instance = new PDO('mysql:host='.$dbServer.';dbname='.$dbName, $dbUserName, $dbPassword);
        }
        return self::$instance;
    }
}


?>