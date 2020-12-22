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

    public function export()
    {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.csv');

        $columnNames = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $data = json_decode($this->driver->retrieveAll(),true);
        $csvData = [];

        $maxCount = 0;
        foreach($data as $d) {
            if (count($d) > $maxCount) {
                $maxCount = count($d);
            }
        }

        $calcData = [];
        for($i=0; $i < $maxCount; $i++) {
            $calcData[$i] = [];
            foreach ($columnNames as $key => $columnName) {
                if (isset($data[$key][$i])) {
                    $calcData[$i][$key] = $data[$key][$i];
                } else {
                    $calcData[$i][$key] = '';
                }
            }
        }

        array_push($csvData, $columnNames, ...$calcData);

        $fp = fopen('php://output', 'w');

        foreach ($csvData as $fields) {
            fputcsv($fp, $fields);
        }

        fclose($fp);
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