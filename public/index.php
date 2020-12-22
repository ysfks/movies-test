<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Start session
session_start();

// Load Composer Autoload
require('../vendor/autoload.php');
require('../bootstrap/app.php');

$watchList = [];
if(isset($_COOKIE['watchList'])) {
    $watchList = json_decode($_COOKIE['watchList'], true);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    if(isset($_GET['export'])) {
        $storage->export();
    } else {
        $allMovies = $movies->all();
        $recommendedMovies = $movies->recommended();

        view('home', compact('allMovies', 'recommendedMovies', 'watchList'));
    }

} else {
    if (isset($_POST['search'])) {
        echo $movies->search(trim($_POST['search']));
    } else if(isset($_POST['listAll'])) {
        echo $movies->all(true);
    } else if(isset($_POST['filter'])) {
        echo $movies->filterByGenre(trim($_POST['filter']));
    } else if(isset($_POST['update-watch-list'])) {
        echo $movies->updateWatchList($storage, $_POST['update-watch-list']);
    }
}
