<?php

namespace WordpressAdventure\Controllers;

use WordpressAdventure\Admin\AdminPage;

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

    public function renderAdminPage(){
        $pages = array(0,1,2,3);
        $settings = array(0,1,2,3);
        
        AdminPage::render($pages, $settings);
    }
}