<?php

namespace App\Data;

class Movies
{

    const MOVIES_DATASET = __DIR__ . '/../public/movies-in-theaters.json';
    private static $instance = null;
    private $moviesDataSet = [];

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

    public function all()
    {
        return json_encode($this->moviesDataSet);
    }

    public function recommended()
    {
        $data = array_filter($this->moviesDataSet, function ($k) {
            return $this->moviesDataSet[$k]['imdbRating'] > 7.0;
        }, ARRAY_FILTER_USE_KEY);

        return $this->format($data);
    }

    public function search($title)
    {
        $data = array_filter($this->moviesDataSet, function ($k) use ($title) {
            return preg_match('/' . $title . '/i', $this->moviesDataSet[$k]['title']);
        }, ARRAY_FILTER_USE_KEY);

        return $this->format($data);
    }

    public function filterByGenre($genre)
    {
        $data = array_filter($this->moviesDataSet, function ($k) use ($genre) {
            return in_array($genre, $this->moviesDataSet[$k]['genres']);
        }, ARRAY_FILTER_USE_KEY);

        return $this->format($data);
    }

    private function format($array)
    {
        return json_encode(array_map(function ($array) {
            return [
                'title' => $array['title'],
                'imdbRating' => $array['imdbRating'],
                'genres' => $array['genres'],
                'posterUrl' => $array['posterurl'],
                'year' => $array['year']
            ];
        }, $array));
    }
}