<?php
/*
Plugin Name: Advanced Custom Fields (ACF): Crypotgraphically Secure Unique ID Field
Plugin URI: 
Description: Creates a cryptographically secure unique ID for immutable identification of repeater field's rows.
Version: 1.0.0
Author: Michael Wood
Author URI: https://github.com/michaelcalvinwood
License: Copyright 2022. PYMNTS.com. All rights reserved.
License URI:
*/

/*
 * uuidv4() returns an RFC 4122 compliant UUID.
 * Requires: PHP 7 or higher (as it uses the random_bytes function to generate crypographically secure randomness)
 */

function uuidv4() {
        // $uuid = random_bytes(16);
        
        // $uuid[6] = chr(ord($uuid[6]) & 0x0f | 0x40);
        // $uuid[8] = chr(ord($uuid[8]) & 0x3f | 0x80);
    
        // return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($uuid), 4));

        return 'hello';
}

function acf_unique_id_field_type( $ver ) {
	class acf_field_unique_id extends acf_field {
        function __construct() {  
            $this->name = 'unique_id';
            $this->label = __('Secure Unique ID', 'acf_secure_unique_id');
            $this->category = 'layout';
            $this->l10n = array();
            parent::__construct();
        }

        function render_field( $field ) {
            /*?>
            
            <input type="text" readonly="readonly" name="<?php echo esc_attr($field['name']) ?>" value="<?php echo esc_attr($field['value']) ?>" />
            <?php
            */
            ?> <input type="text" readonly="readonly" name="hello-world" value="hello-world" />
            <?php
        }
    
        function update_value( $value, $post_id, $field ) {
            if (!$value) {
                $value = uuidv4();
            }
            return $value;
        }
    
        function validate_value( $valid, $value, $field, $input ){
            return true;
        }
        
    }
    
    // new acf_unique_id_field_type();
}

add_action('acf/include_field_types', 'acf_unique_id_field_type');
