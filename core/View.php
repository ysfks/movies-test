<?php


namespace App\Core;


class View
{
    public static function render($file, $array)
    {
        foreach ($array as $key => $value) {
            $$key = $value;
        }

        require( __DIR__ . '/../views/'.$file.'.php' );
    }
}