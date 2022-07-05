<?php
// Create the menu

function mcwGymFitnessMenus() {
    // wordpress function
    register_nav_menus([
        'main-menu' => 'Main Menu',
        'other-menu' => 'Other Menu'
    ]);
}

// Hook

add_action('init', 'mcwGymFitnessMenus');


// add stylesheets and js files

function mcwGymFitnessScripts() {
   // Normalize CSS
   wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', [], '8.0.1'); 

   // Google font
   wp_enqueue_style('googlefont', 'https://fonts.googleapis.com/css?family=Open+Sans|Raleway:400,700,900|Staatliches&display=swap', [], '1.0.0' );

   // Main Stylesheet

   wp_enqueue_style('style', get_stylesheet_uri(), ['normalize', 'googlefont'], '1.0.0');
}

add_action('wp_enqueue_scripts', 'mcwGymFitnessScripts');




