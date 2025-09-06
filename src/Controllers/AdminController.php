<?php

namespace WordpressAdventure\Controllers;

use WordpressAdventure\Admin\AdminPage;
use WP_REST_Request;

class AdminController extends Controller
{
    public function renderAdminPage(){
        $pages = array(0,1,2,3);
        $settings = array(0,1,2,3);
        
        AdminPage::render($pages, $settings);
    }

    public function getSettings(): array{
        $settings = get_option('adventure_settings',[]);

        return is_array($settings) ? $settings : json_decode($settings, true);
    }

    public function setSettings(WP_REST_Request $request): void{
        $settings = $request->get_param('adventureSettings');

        $settings = json_encode($settings);

        update_option('adventure_settings', $settings, false);
    }
}