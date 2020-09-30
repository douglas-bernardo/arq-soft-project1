<?php

namespace Library\Log;

use Monolog\Handler\HandlerInterface;
use Monolog\Logger;

class Log
{
    
    const DEBUG = Logger::DEBUG;
    const CRITICAL = Logger::CRITICAL;
    const EMERGENCY = Logger::EMERGENCY;

    private Logger $logger;    

    public function __construct(string $channel_name) 
    {
        $this->logger = new Logger($channel_name);
    }

    public function addHandler(HandlerInterface $handler)
    {
        $this->logger->pushHandler($handler);
    }

    public function addProcessor()
    {
        
    }

    public function info(string $message, array $context = [])
    {
        $this->logger->info($message, $context);
    }

    public function emergency(string $message, array $context = [])
    {
        $this->logger->emergency($message, $context);
    }

    public function critical(string $message, array $context = [])
    {
        $this->logger->critical($message, $context);
    }
    
}