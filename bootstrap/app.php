<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$storage = \App\Core\Storage::getInstance();
$movies = \App\Data\Movies::getInstance();

require(__DIR__ . '/functions.php');