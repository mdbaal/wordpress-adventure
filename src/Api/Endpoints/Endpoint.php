<?php

namespace WordpressAdventure\Api\Endpoints;

use WP_Error;

class Endpoint{

    protected string $apiNamespace = "wp-adventure/v1";

    protected function createPermissionCheck(): bool|WP_Error{
        if(current_user_can('manage_adventures')){
            return true;
        }

        return new WP_Error('rest_forbidden', esc_html__("Not allowed to set settings."));
    }

    protected function editPermissionCheck(): bool|WP_Error{
        if(current_user_can('manage_adventures')){
            return true;
        }

        return new WP_Error('rest_forbidden', esc_html__("Not allowed to set settings."));
    }

    protected function deletePermissionCheck(): bool|WP_Error{
        if(current_user_can('manage_adventures')){
            return true;
        }

        return new WP_Error('rest_forbidden', esc_html__("Not allowed to set settings."));
    }

    protected function readPermissionCheck(): bool|WP_Error{
        if(current_user_can('adventure')){
            return true;
        }

        return new WP_Error('rest_forbidden', esc_html__("Not allowed to get settings."));
    }
}