<?php


namespace App\Core;


interface StorageDriver
{
    public function add($name, $value);
    public function remove($name);
    public function clear();
    public function retrieveAll();
}