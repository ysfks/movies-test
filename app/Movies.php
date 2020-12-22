<?php

namespace App\Data;

use App\Core\Storage;

class Movies
{

    const MOVIES_DATASET = __DIR__ . '/../public/movies-in-theaters.json';
    private static $instance = null;
    private $moviesDataSet = [], $result = [];


    public function __construct()
    {
        $this->load();
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            return new Movies();
        }

        return self::$instance;
    }

    private function load()
    {
        $this->moviesDataSet = json_decode(file_get_contents(self::MOVIES_DATASET), true);
    }

    public function all($json = false)
    {
        if ($json) {
            return $this->format($this->moviesDataSet)->json();
        }

        return $this->format($this->moviesDataSet)->getResult();
    }

    public function recommended()
    {
        $data = array_filter($this->moviesDataSet, function ($k) {
            return $this->moviesDataSet[$k]['imdbRating'] > 7.0;
        }, ARRAY_FILTER_USE_KEY);

        return $this->format($data)->getResult();
    }

    public function search($title)
    {
        $data = array_filter($this->moviesDataSet, function ($k) use ($title) {
            return preg_match('/' . $title . '/i', $this->moviesDataSet[$k]['title']);
        }, ARRAY_FILTER_USE_KEY);

        return $this->format($data)->json();
    }

    public function filterByGenre($genre)
    {
        $data = array_filter($this->moviesDataSet, function ($k) use ($genre) {
            return in_array($genre, $this->moviesDataSet[$k]['genres']);
        }, ARRAY_FILTER_USE_KEY);

        return $this->format($data)->json();
    }

    public function updateWatchList(Storage $storage, $data)
    {
        $storage->add('watchList', json_encode($data));
        return true;
    }

    private function format($array)
    {
        $this->result = array_map(function ($array) {
            return [
                'title' => $array['title'],
                'imdbRating' => $array['imdbRating'],
                'genres' => $array['genres'],
                'posterUrl' => $array['posterurl'],
                'year' => $array['year']
            ];
        }, $array);

        return $this;
    }

    private function getResult()
    {
        return $this->result;
    }

    private function json()
    {
        return json_encode($this->result);
    }
}