<?php
namespace Library\Database;

use Library\Log\Log;

/**
 * Pattern: Singleton
 * Type: Padrões de criação
 */
final class Transaction 
{   
    
    private static $conn; 
    private static $logger;

    private function __construct(){} 

    public static function open($database)
    {
        if(empty(self::$conn))
        {
            self::$conn = Connection::open($database);
            self::$conn->beginTransaction();
            self::$logger = null;
        }
    }

    public static function get()
    {
        return self::$conn;
    }

    public static function rollback()
    {
        if (self::$conn){
            self::$conn->rollback();
            self::$conn = NULL;
        }
    }

    public static function close()
    {
        if (self::$conn){
            self::$conn->commit();
            self::$conn = NULL;
        }
    }
    
    public static function setLogger(Log $logger)
    {
        self::$logger = $logger;
    }

    public static function log($message)
    {
        if (self::$logger) {
            self::$logger->info($message);
        }
    }
}