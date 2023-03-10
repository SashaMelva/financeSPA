<?php

namespace App\Services;

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Log
{
    static function getLogger(): Logger
    {
        $log = new Logger('spa');
        $log->pushHandler(new StreamHandler(LOGGER_PATH, Level::Debug));
        return $log;
    }
}