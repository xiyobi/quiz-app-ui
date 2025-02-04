<?php

require 'vendor/autoload.php';

date_default_timezone_set('Asia/Tashkent');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if ($_ENV['APP_DEBUG']) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}


require 'helpers.php';