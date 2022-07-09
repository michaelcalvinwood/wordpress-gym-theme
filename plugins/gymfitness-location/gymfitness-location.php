<?php
/*
    Plugin Name: Gym Fitness - Location with Leaflet
    Plugin URI:
    Description: Creates a Shortcode to display the location
    Version: 1.0
    Author: Michael Wood
    Author URI: https://michaelcalvinwood.net
    Text Domain: gymfitness
*/
if (!defined('ABSPATH')) die();

// Shortcode API function

function mcwGymFitnessLocationShortcode() {
    $location = get_field('location');
    $type = gettype($location);
    if ($type === 'string') return;
    
    echo "<pre>";
    var_dump($location);
    echo "</pre>";
    echo "count: " . count($location);
?>
    <div class="location">
        <input 
            type="hidden" 
            id="lat" 
            value="<?php echo $location['lat'] ?>"
        >
        <input 
            type="hidden" 
            id="lng" 
            value="<?php echo $location['lng'] ?>"
        >
        <input 
            type="hidden" 
            id="address" 
            value="<?php echo $location['address'] ?>"
        >
    </div>

    <div id="map"></div>

<?php
}

// Register the shortcode [gymfitness_location] to call the function above
add_shortcode('gymfitness_location', 'mcwGymFitnessLocationShortcode'); 

// Enqueue the CSS and JS files needed

function mcwGymFitnessLocationScripts() {
    if(!is_page('contact-us')) return;

    wp_enqueue_style('leafletcss', 'https://unpkg.com/leaflet@1.8.0/dist/leaflet.css', [], '1.8.0');

    wp_enqueue_script('leafletjs', 'https://unpkg.com/leaflet@1.8.0/dist/leaflet.js', [], '1.8.0', true);
}
add_action('wp_enqueue_scripts', 'mcwGymFitnessLocationScripts');
