<?php

namespace WordpressAdventure\Api\Endpoints;

use WordpressAdventure\Controllers\AdminController;

use WP_REST_Server;

class AdminEndpoints extends Endpoint
{
    public function registerAdminEndpoints(){
        // Settings
        register_rest_route($this->apiNamespace,'/settings',
            [
                [
                    'methods' => WP_REST_Server::READABLE,
                    'callback' => [AdminController::getInstance(),'getSettings'],
                    'permission_callback' => [$this,'readPermissionCheck'],
                ],
                [
                    'methods' => WP_REST_Server::CREATABLE,
                    'callback' => [AdminController::getInstance(),'setSettings'],
                    'permission_callback' => [$this,'createPermissionCheck'],
                ]
            ]
        );
    }
}