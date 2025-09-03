<?php
/*
Plugin Name: WordPress Adventure
Description: A Wordpress text adventure plugin. Turn your site into an adventure
Version: 1.0.0
Author: Mirco Baalmans
License: GPL2
*/
require_once 'vendor/autoload.php';
use WordpressAdventure\WordpressAdventure;

define('VERSION', '1.0.0');
define('BASE_URL',plugin_dir_url(__FILE__));
define('BASE_DIR', plugin_dir_path(__FILE__));
define('CSS_URL', BASE_URL . '/assets/css/');
define('JS_URL', BASE_URL . '/assets/js/');
define('TEXT_DOMAIN','wordpress-adventure');

// Activation hook
function wp_adventure_activate() {
    // Code to run on activation
    createAdventureTables();
    regsiterAdventureRolesAndCapabilities();
}
register_activation_hook(__FILE__, 'wp_adventure_activate');

// Deactivation hook
function wp_adventure_deactivate() {
    // Code to run on deactivation
}
register_deactivation_hook(__FILE__, 'wp_adventure_deactivate');

// Uninstall hook
function wp_adventure_uninstall() {
    // Code to run on uninstall
    deleteAdventureTables();
}
register_uninstall_hook(__FILE__, 'wp_adventure_uninstall');

// Plugin initialization
function wp_adventure_init() {
    $wp_adventure = new WordpressAdventure();
    
    //Register actions & filters
    add_action("admin_menu", [$wp_adventure,'registerAdminPage']);
    add_action('admin_enqueue_scripts', function(){
        loadAdminStyles();
        loadAdminScripts();
    });

    add_action('wp_enqueue_scripts', function(){
        loadStyles();
        loadScripts();
    });

    $wp_adventure->init();
}
add_action('init', 'wp_adventure_init');

function loadAdminStyles(){
    wp_enqueue_style('material-icons', "https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined");
    wp_enqueue_style('adventure-admin',BASE_URL . 'assets/css/adventure-admin.css',array(),VERSION);
}

function loadAdminScripts(){
    
}

function loadStyles(){
        
}

function loadScripts(){

}

function regsiterAdventureRolesAndCapabilities(){
    // Create custom roles
    add_role('adventurer','Adventurer',['adventure' => true]);
    add_role('adventure_manager','Adventure Manager',['adventure' => true, 'manage_adventures' => true]);
    
    // Add capabilities to admins as well
    $admin = get_role('administrator');
    $admin->add_cap('adventure', true);
    $admin->add_cap('manage_adventures',true);
}

function createAdventureTables(){
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    // Characters table
    $characters = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}adventure_characters (
        ID bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
        equipment json DEFAULT NULL,
        stats json DEFAULT NULL,
        gold int(11) DEFAULT 0,
        level int(11) DEFAULT 1,
        PRIMARY KEY (ID)
    ) $charset_collate;";

    // UserCharacters table
    $user_characters = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}adventure_user_characters (
        user_id bigint(20) UNSIGNED NOT NULL,
        character_id bigint(20) UNSIGNED NOT NULL,
        PRIMARY KEY (user_id, character_id),
        KEY character_id (character_id)
    ) $charset_collate;";

    // ItemTypes table
    $item_types = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}adventure_item_types (
        ID bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
        PRIMARY KEY (ID)
    ) $charset_collate;";

    // Items table
    $items = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}adventure_items (
        ID bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
        description text DEFAULT NULL,
        type int(11) UNSIGNED NOT NULL,
        effect varchar(255) DEFAULT NULL,
        effect_value double DEFAULT NULL,
        PRIMARY KEY (ID),
        KEY type (type),
        CONSTRAINT fk_item_type FOREIGN KEY (type) REFERENCES {$wpdb->prefix}adventure_item_types(ID) ON DELETE CASCADE
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($characters);
    dbDelta($user_characters);
    dbDelta($item_types);
    dbDelta($items);
}

function deleteAdventureTables(){
    global $wpdb;

    $tables = [
        "{$wpdb->prefix}adventure_items",
        "{$wpdb->prefix}adventure_item_types",
        "{$wpdb->prefix}adventure_user_characters",
        "{$wpdb->prefix}adventure_characters"
    ];

    foreach ($tables as $table) {
        $wpdb->query("DROP TABLE IF EXISTS $table");
    }
}