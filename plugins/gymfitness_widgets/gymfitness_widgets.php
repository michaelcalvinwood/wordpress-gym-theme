<?php
/*
    Plugin Name: Gym Fitness - Widgets
    Plugin URI:
    Description: Adds a Custom Widgent into the WordPress Panel
    Version: 1.0
    Author: Michael Wood
    Author URI: https://michaelcalvinwood.net
    Text Domain: gymfitness
*/
if (!defined('ABSPATH')) die();

/*
    IMPORTANT: Be sure to activate the widget in the Plugins section after saving the widgets file.
*/

// class code from: https://codex.wordpress.org/Widgets_API
/**
 * Adds Foo_Widget widget.
 */
class mcwGymFitnessClassesWidget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'gymfitness_classes', // Base ID
			esc_html__( 'GymFitness: Classes List', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'Displays the available classes in the widget', 'text_domain' ), ) // Args
		);
	}

	/*
		The front-end portion of the widget is what is shown on the webpage itself.
		The back-end portion is what is displayed inside the admin panel for the user to customize the widget.
	*/

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */

		/*
			The widget $args (such as before_widget and after_widget) were set in our functions.php file:
				 register_sidebar([
					'name' => 'Sidebar',
					'id' => 'sidebar',
					'before_widget' => '<div class="widget">',
					'after_widget' => '</div>',
					'before_title' => '<h3>',
					'after_title' => '</h3>'
				]);
			Notice how the widget echoes the content of before_widget and after_widget
			The widget $instance is the values from the database (see backend below).
			In the backend form below, we set the title and quantity instances.
		*/
	public function widget( $args, $instance ) {
		echo $args['before_widget']; 

		// To understand $args and $instance show the following
		// echo "<pre>";
		// 	var_dump($instance);
		// 	var_dump($args);
		// echo "</pre>";

		?>

		<h2 class="text-primary text-center classes-title">
			<?php echo esc_html($instance['title']) ?>
		</h2>

		<ul class="sidebar-classes-list">
			<?php
				$args = [
					'post_type' => 'gymfitness_classes',
					'posts_per_page' => $instance['quantity'],
					/*
						if you want to blog use post_type 'post', if you want to query webpages use post_type 'page', etc.
						You can use posts_per_page to limit the number of posts displayed
					*/
					'orderby' => 'rand'
				];
				$classes = new WP_Query($args);
				while($classes->have_posts()): $classes->the_post();
			?>
				<!-- li is going to be the parent of a flexbox. Each child will be therefore be formatted. Study this design pattern. -->
				<li class="sidebar-class">
					<div class="sidebar-widget-image">
						<?php the_post_thumbnail('thumbnail'); ?>
					</div>

					<div class='class-content'>
						<a href="<?php the_permalink(); ?>">	
							<h3><?php the_title() ?></h3>
						</a>

						<?php
							$start_time = get_field('start_time');
							$end_time = get_field('end_time');
						?>
						<p >
							<?php echo the_field('class_days') . " - " . $start_time . " to " . $end_time; ?>
						</p>
					</div>


				</li>

				
				
			<?php 
				endwhile;
				// always remember to use wp_reset_postdata after each while loop involving queries 
				wp_reset_postdata(); 
			?>
			

		<?php
		echo $args['after_widget'];
	}


	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		/*
			This form allows the admin to set two values on the widget: Title and Number of Classes to Display.
			IMPORTANT: If you add any more inputs, make sure to include them in the update function below so that the value changes when the user updates the widget with their settings.
		*/

		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );

		$quantity = ! empty( $instance['quanityt'] ) ? $instance['quantity'] : esc_html__( '5', 'text_domain' );

		?>
		<p>
			<label 
				for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
				<?php esc_attr_e( 'Title:', 'text_domain' ); ?>
			</label> 
			<input 
				class="widefat" 
				id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
				name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
				type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label 
				for="<?php echo esc_attr( $this->get_field_id( 'quantity' ) ); ?>">
				<?php esc_attr_e( 'Number of Classes to Display:', 'text_domain' ); ?>
			</label> 
			<input 
				class="widefat" 
				id="<?php echo esc_attr( $this->get_field_id( 'quantity' ) ); ?>" 
				name="<?php echo esc_attr( $this->get_field_name( 'quantity' ) ); ?>" 
				type="number" value="<?php echo esc_attr( $quantity ); ?>"
				min="0">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		$instance['quantity'] = ( ! empty( $new_instance['quantity'] ) ) ? sanitize_text_field( $new_instance['quantity'] ) : '';

		return $instance;
	}

} // class Foo_Widget

// add_action code from: https://codex.wordpress.org/Widgets_API

// register Foo_Widget widget
function register_gymfitness_widget() {
    register_widget( 'mcwGymFitnessClassesWidget' );
}
add_action( 'widgets_init', 'register_gymfitness_widget' );