<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Start session
session_start();

// Load Composer Autoload
require('../vendor/autoload.php');

// Load dotenv
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

//echo \App\Data\Movies::getInstance()->filterByGenre('Comedy');