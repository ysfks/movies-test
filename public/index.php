<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Start session
session_start();

// Load Composer Autoload
require('../vendor/autoload.php');
require('../bootstrap/app.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $allMovies = $movies->all();
    $recommendedMovies = $movies->recommended();

    view('home', compact('allMovies', 'recommendedMovies'));
} else {
    if (isset($_POST['search'])) {
        echo $movies->search(trim($_POST['search']));
    } else if(isset($_POST['listAll'])) {
        echo $movies->all(true);
    }
}
