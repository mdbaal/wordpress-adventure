<?php

namespace WordpressAdventure;

use WordPressAdventure\Admin\AdminController;

class WordpressAdventure
{

    public function init()
    {
        // Initialization code here
        $this->registerAdventurePostType();
        $this->registerAdminPage();
        $this->loadSettings();
        $this->loadCharacter();
    }

    private function registerAdminPage(){
        add_menu_page(
            "Wordpress Adventure",
            "WP Adventure",
            "manage_adventures",
            'wordpress-adventure',
            [AdminController::getInstance(),'renderAdminPage'],
            'shield'
        );
    }

    private function registerAdventurePostType(){
        register_post_type(
            "adventure_location",
            [
                'label' => __('location','wordpress'),
                'description' => "A location where you can adventure to on your site",
                'public' => false,
                'has_archive' => false
            ]
        );
   }

    private function loadSettings(){

    }

    private function loadCharacter(){

    }
}