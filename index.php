<?php

// Load Composer Autoload
require('vendor/autoload.php');

// Load dotenv
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
