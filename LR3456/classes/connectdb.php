<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

class Database
{
    private $connection = null;
    function connect()
    {
        try {
            $connection = new PDO("mysql:host=localhost;dbname=shops;charset=utf8", "root", '');
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
        return $connection;
    }
    protected function __clone()
    {
    }
    public function __wakeup()
    {
    }
}