<?php
namespace WordpressAdventure;

use WordpressAdventure\Admin\AdminController;

class WordpressAdventure
{
    public function __construct() {
       //
    }

    public function init()
    {
        // Initialization code here
        $this->registerAdventurePostType();
        $this->loadSettings();
        $this->loadCharacter();
    }

    public function registerAdminPage(){
        add_menu_page(
            "Wordpress Adventure",
            "WP Adventure",
            "manage_options",
            'wordpress-adventure',
            [AdminController::getInstance(),'renderAdminPage']
        );
    }

    private function registerAdventurePostType(){
        register_post_type(
            "adventure_location",
            [
                'label' => __('location','wordpress'),
                'description' => "A location where you can adventure to on your site",
                'public' => false,
                'has_archive' => false,
                'rewrite' => array( 'slug' => 'adventure'),
                'supports' => array( 'title', 'excerpt'),
                'template' => array(),
                'template_lock' => true
            ]
        );
   }

    private function loadSettings(){

    }

    private function loadCharacter(){

    }
}