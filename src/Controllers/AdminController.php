<?php

namespace WordpressAdventure\Controllers;

use WordpressAdventure\Admin\AdminPage;

class AdminController extends Controller
{
    public function renderAdminPage(){
        $pages = array(0,1,2,3);
        $settings = array(0,1,2,3);
        
        AdminPage::render($pages, $settings);
    }

    public function getSettings(): array{
        return [];
    }

    public function setSettings($request): void{

    }
}