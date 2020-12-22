<?php


namespace App\Core\Storage;


use App\Core\StorageDriver;

class Cookie implements StorageDriver
{

    public function add($name, $value)
    {
        setcookie($name, $value, time() + 60*60*24);
    }

    public function remove($name)
    {
        if(isset($_COOKIE[$name])) {
            setcookie($name, '', time()-3600);
        }
    }

    public function clear()
    {
        foreach($_COOKIE as $key => $value) {
            $this->remove($key);
        }
    }
}