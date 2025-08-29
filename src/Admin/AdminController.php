<?php

namespace WordpressAdventure\Admin;

class AdminController
{
    private static $instance = null;

    private function __construct()
    {
        // Initialization code here
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function init()
    {
        // Admin initialization logic
    }

    public function renderAdminPage(){
        return "";
    }
}