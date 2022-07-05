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

    // Slicknav css

   wp_enqueue_style('slicknavcss', get_template_directory_uri() . '/css/slicknav.min.css', [], '1.0.10');

   // Main Stylesheet

   wp_enqueue_style('style', get_stylesheet_uri(), ['normalize', 'googlefont'], '1.0.0');

   // Load JS files

        // For additional built-in script handles see https://developer.wordpress.org/reference/functions/wp_enqueue_script/

   wp_enqueue_script('jquery');

   wp_enqueue_script('slicknavjs', get_template_directory_uri() . '/js/jquery.slicknav.min.js', ['jquery'], '1.0.10', true);

   wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', ['jquery'], true);
}

add_action('wp_enqueue_scripts', 'mcwGymFitnessScripts');

// Enable Feature Image Upload and Other Stuff

function mcwGymFitnessSetup() {
    
    // register new image sizes

    add_image_size('square', 350, 350, true);  // install the regenerate thumbnails plugin to regenerate sizes for all images already uploaded
    add_image_size('portrait', 350, 724, true);
    add_image_size('box', 400, 375, true);
    add_image_size('mediumSize', 700, 400, true);
    add_image_size('blog', 966, 644, true);

    add_theme_support('post-thumbnails'); // enables feature image
}
add_action('after_setup_theme', 'mcwGymFitnessSetup'); // when the theme is activated and ready




