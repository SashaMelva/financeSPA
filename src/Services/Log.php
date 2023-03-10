<?php

namespace App\Services;

use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

class Log
{
    protected static Logger $instance;

    public static function getLogger(): Logger
    {
        self::createLoggerIfDoesntExist();

        return self::$instance;
    }

    private static function createLoggerIfDoesntExist(string $channel = 'spa'): void
    {
        if (!isset(self::$instance)) {
            $logger = new Logger($channel);
            $logger->pushHandler(new RotatingFileHandler(LOGGER_PATH, 200));
            self::$instance = $logger;
        }
    }

    public static function debug(string $message, array $context = []): void
    {
        self::getLogger()->debug($message, $context);
    }

    public static function warning(string $message, array $context = []): void
    {
        self::getLogger()->warning($message, $context);
    }

    public static function error(string $message, array $context = []): void
    {
        self::getLogger()->error($message, $context);
    }

    public static function critical(string $message, array $context = []): void
    {
        self::getLogger()->critical($message, $context);
    }


}