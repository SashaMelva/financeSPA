<?php
//Автозагрузка классов с помощью composer
require_once dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

define('LOGGER_PATH', dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . "logs" . DIRECTORY_SEPARATOR . "monolog.log");
