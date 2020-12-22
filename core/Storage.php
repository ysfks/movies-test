<?php


namespace App\Core;


use App\Core\Storage\Cookie;
use App\Core\Storage\Session;

class Storage
{
    private static $instance = null;
    private $driver;

    public function __construct(StorageDriver $driver)
    {
        $this->driver = $driver;
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            return new Storage(self::getStorageDriver());
        }

        return self::$instance;
    }

    public function add($name, $value)
    {
        $this->driver->add($name, $value);
    }

    public function remove($name)
    {
        $this->driver->remove($name);
    }

    public function clear()
    {
        $this->driver->clear();
    }

    private static function getStorageDriver()
    {
        switch ($_ENV['STORAGE']) {
            case 'cookie':
                return new Cookie();
                break;
            case 'session':
                return new Session();
                break;
            default:
                return new Cookie();
                break;
        }
    }

}