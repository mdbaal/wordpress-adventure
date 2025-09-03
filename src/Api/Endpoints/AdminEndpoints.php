<?php

namespace WordpressAdventure\Api\Endpoints;

use WordpressAdventure\Controllers\AdminController;
use WP_Error;
use WP_REST_Server;

class AdminEndpoints
{
    private string $namespace = "wp-adventure/v1";

    public function registerAdventureAdminEndpoints(){
        register_rest_route($this->namespace,'/settings',
            [
                [
                    'methods' => WP_REST_Server::READABLE,
                    'callback' => [AdminController::getInstance(),'getSettings'],
                    'permission_callback' => [$this,'getSettingsPermissionsCheck'],
                    'args' => [

                    ]
                ],
                [
                    'methods' => WP_REST_Server::CREATABLE,
                    'callback' => [AdminController::getInstance(),'setSettings'],
                    'permission_callback' => [$this,'setSettingsPermissionsCheck'],
                    'args' => [
                        
                    ]
                ]
            ]
        );
    }

    private function setSettingsPermissionsCheck(): bool|WP_Error{
        if(current_user_can('manage_adventures')){
            return true;
        }

        return new WP_Error('rest_forbidden', esc_html__("Not allowed to set settings."));
    }

    private function getSettingsPermissionsCheck(): bool|WP_Error{
        if(current_user_can('adventure')){
            return true;
        }

        return new WP_Error('rest_forbidden', esc_html__("Not allowed to get settings."));
    }
}