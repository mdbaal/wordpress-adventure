<?php

namespace WordpressAdventure\Api\Endpoints;

use WP_REST_Server;
use WordpressAdventure\Controllers\PagesController;

class PagesEndpoints extends Endpoint{

    public function registerPageEndpoints(){
        // Pages
        register_rest_route($this->apiNamespace,'/pages',
            [
                [
                    'methods' => WP_REST_Server::READABLE,
                    'callback' => [PagesController::getInstance(),'getPages'],
                    'permission_callback' => [$this,'readPermissionCheck'],
                    'args' => [

                    ]
                ],
                [
                    'methods' => WP_REST_Server::CREATABLE,
                    'callback' => [PagesController::getInstance(),'createPage'],
                    'permission_callback' => [$this,'createPermissionCheck'],
                    'args' => [
                        
                    ]
                ],
                [
                    'methods' => WP_REST_Server::EDITABLE,
                    'callback' => [PagesController::getInstance(),'editPage'],
                    'permission_callback' => [$this,'editPermissionCheck'],
                    'args' => [
                        
                    ]
                ],
                [
                    'methods' => WP_REST_Server::DELETABLE,
                    'callback' => [PagesController::getInstance(),'deletePage'],
                    'permission_callback' => [$this,'deletePermissionCheck'],
                    'args' => [
                        
                    ]
                ]
            ]
         );
    }
}