<?php

class DBConnection {
    private function __construct()
    {
        echo "New object create \n";
    }

    public static function getInstance() {
        static $instance = null;

        if ($instance == null) {
            $instance = new static();
        } else {
            echo "Using same object \n";
        }

        return $instance;
    }
}