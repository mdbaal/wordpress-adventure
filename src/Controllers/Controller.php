<?php

namespace WordpressAdventure\Controllers;

class Controller
{

    private static $instance = null;

    private function __construct()
    {
        // Initialization code here
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new static();
        }
        return self::$instance;
    }
}