<?php

\error_reporting(E_ALL);

include_once \dirname(__DIR__) . '/vendor/autoload.php';

$envPath = __DIR__ . '/../';

if (file_exists($envPath . '.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable($envPath);
    $dotenv->load();
}