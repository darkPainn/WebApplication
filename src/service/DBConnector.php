<?php

namespace service;


class DBConnector {
    private static $config;
    private static $connection;
    
    public static function setConfig(array $configPar)
    {
        self::$config = $configPar;
    }
    
    private static function createConnection()
    {
        //$connection = new PDO('mysql:host=localhost;dbname=register','root');
        $dsn = sprintf(
                '%s:host=%s;dbname=%s',
                self::$config['driver'],
                self::$config['host'],
                self::$config['dbname']
                );
        self::$connection = new \PDO($dsn, self::$config['dbuser'], self::$config['dbpass']);
    }
    
    public static function getConnection()
    {
        if(!self::$connection)
        {
            self::createConnection();
        } 
        return self::$connection;
    }
}
