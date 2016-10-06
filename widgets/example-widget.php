<?php
// Example Text Widget
class GenerateWP_Text_Widget extends WP_Widget {

	public function __construct() {

		parent::__construct(
			'generatewp_text_widget',
			__( 'Text Widget', 'generatewp' ),
			array(
				'description' => __( 'Text or HTML content.', 'generatewp' ),
				'classname'   => 'widget_text',
			)
		);

	}

	public function widget( $args, $instance ) {

		$title = apply_filters( 'widget_title', empty( $instance['generatewp_title'] ) ? '' : $instance['generatewp_title'], $instance, $this->id_base );
		$text  = apply_filters( 'widget_text',  empty( $instance['generatewp_text']  ) ? '' : $instance['generatewp_text'],  $instance );
		
		// Before widget tag
		echo $args['before_widget'];
		
		// Title
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		
		// Text
		echo '<div class="textwidget">' . $text . '</div>';
		
		// After widget tag
		echo $args['after_widget'];

	}

	public function form( $instance ) {

		// Set default values
		$instance = wp_parse_args( (array) $instance, array( 
			'generatewp_title' => '',
			'generatewp_text' => '',
		) );

		// Retrieve an existing value from the database
		$generatewp_title = !empty( $instance['generatewp_title'] ) ? $instance['generatewp_title'] : '';
		$generatewp_text = !empty( $instance['generatewp_text'] ) ? $instance['generatewp_text'] : '';

		// Form fields
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'generatewp_title' ) . '" class="generatewp_title_label">' . __( 'Title', 'generatewp' ) . '</label>';
		echo '	<input type="text" id="' . $this->get_field_id( 'generatewp_title' ) . '" name="' . $this->get_field_name( 'generatewp_title' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'generatewp' ) . '" value="' . esc_attr( $generatewp_title ) . '">';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'generatewp_text' ) . '" class="generatewp_text_label">' . __( 'Content', 'generatewp' ) . '</label>';
		echo '	<textarea id="' . $this->get_field_id( 'generatewp_text' ) . '" name="' . $this->get_field_name( 'generatewp_text' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'generatewp' ) . '">' . $generatewp_text . '</textarea>';
		echo '</p>';

	}

	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['generatewp_title'] = !empty( $new_instance['generatewp_title'] ) ? strip_tags( $new_instance['generatewp_title'] ) : '';
		$instance['generatewp_text'] = !empty( $new_instance['generatewp_text'] ) ? strip_tags( $new_instance['generatewp_text'] ) : '';

		return $instance;

	}

}

function generatewp_register_widgets() {
	register_widget( 'GenerateWP_Text_Widget' );
}
add_action( 'widgets_init', 'generatewp_register_widgets' );