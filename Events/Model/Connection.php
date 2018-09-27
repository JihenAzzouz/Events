<?php


if (!isset($_SESSION)){
    session_start();
}

class Connection
{

    private $PDOInstance = null;


    private static $instance = null;


    const DEFAULT_SQL_USER = 'root';


    const DEFAULT_SQL_HOST = 'localhost';


    const DEFAULT_SQL_PASS = '';


    const DEFAULT_SQL_DTB = 'gmcevent';


    private function __construct()
    {
        $this->PDOInstance = new PDO('mysql:dbname='.self::DEFAULT_SQL_DTB.';host='.self::DEFAULT_SQL_HOST,self::DEFAULT_SQL_USER ,self::DEFAULT_SQL_PASS);
    }

    public static function getInstance()
    {
        if(is_null(self::$instance))
        {
            self::$instance = new Connection();
        }
        return self::$instance;
    }


    public function query($query)
    {
        return $this->PDOInstance->query($query);
    }
}