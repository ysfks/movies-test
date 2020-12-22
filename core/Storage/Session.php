<?php


namespace App\Core\Storage;


use App\Core\StorageDriver;

class Session implements StorageDriver
{

    public function add($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function remove($name)
    {
        if (isset($_SESSION[$name])) {
            unset($_SESSION[$name]);
        }
    }

    public function clear()
    {
        foreach($_SESSION as $session) {
            $this->remove($session);
        }
    }
}