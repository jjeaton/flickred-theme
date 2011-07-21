<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<ul>',
        'after_widget' => '</ul>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));

/******************************************
 * Mom Top Widget
 */

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'load_mom_widgets' );

/**
 * Register our widget.
 *
 * @since 0.1
 */
function load_mom_widgets() {
	register_widget( 'Mom_Top_Widget' );
}

/**
 * Mom_Top_Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class Mom_Top_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function Mom_Top_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'mom_top_widget', 'description' => __('Displays a picture, Page list, optional text and antispam email.', 'Mom_Top_Widget') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'mom-top-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'mom-top-widget', __('Mom\'s Top Widget', 'mom_top_widget'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$picture = $instance['picture'];
		$widget_text = $instance['widget_text'];
		$show_picture = isset( $instance['show_picture'] ) ? $instance['show_picture'] : false;
        $show_Pages = isset( $instance['show_Pages'] ) ? $instance['show_Pages'] : false;
        $show_email = isset( $instance['show_email'] ) ? $instance['show_email'] : false;

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

        echo "<li>\n\t<ul>\n";
		
		if ( $show_picture )
			printf( "\t<li>" . __('<img src="%1$s" alt="Top Widget Image" />', 'mom_top_widget') . "</li>\n\t", $picture );

         /* Display user-specified text from widget settings if one was input. */
         if ( $widget_text )
            printf( "\t<li>" . __('%1$s', 'mom_top_widget') . "</li>\n\t", $widget_text );
            
		if ( $show_Pages )
			echo wp_list_pages('depth=1&title_li=');
        
        if ( $show_email )
            echo "\t<li>" . antispambot(get_the_author_meta('email')) . "</li>\n";

        echo "\t</ul>\n</li>\n";
        
		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and picture to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['picture'] = strip_tags( $new_instance['picture'] );
        $instance['widget_text'] = strip_tags( $new_instance['widget_text'] );

		/* No need to strip tags for show_picture, show_Pages, show_email. */
		$instance['show_picture'] = $new_instance['show_picture'];
		$instance['show_Pages'] = $new_instance['show_Pages'];
        $instance['show_email'] = $new_instance['show_email'];

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Mom\'s Top Widget', 'mom_top_widget'), 'name' => __('Mom\'s Top Widget', 'mom_top_widget'), 'picture' => 'http://merriecontrary.com/blog/wp-content/themes/flickred-202/images/momage3.jpg', 'widget_text' => '', 'show_picture' => true, 'show_Pages' => true, 'show_email' => true );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title: (optional)', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		<!-- Picture: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'picture' ); ?>"><?php _e('Picture URI:', 'mom_top_widget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'picture' ); ?>" name="<?php echo $this->get_field_name( 'picture' ); ?>" value="<?php echo $instance['picture']; ?>" style="width:100%;" />
		</p>

		<!-- Widget text: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'widget_text' ); ?>"><?php _e('Widget text: (optional)', 'mom_top_widget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'widget_text' ); ?>" name="<?php echo $this->get_field_name( 'widget_text' ); ?>" value="<?php echo $instance['widget_text']; ?>" style="width:100%;" />
		</p>
        
		<!-- Show Picture? Checkbox -->
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_picture'], true ); ?> id="<?php echo $this->get_field_id( 'show_picture' ); ?>" name="<?php echo $this->get_field_name( 'show_picture' ); ?>" /> 
			<label for="<?php echo $this->get_field_id( 'show_picture' ); ?>"><?php _e('Display Picture?', 'mom_top_widget'); ?></label>
		</p>

        <!-- Show List of Pages? Checkbox -->
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_Pages'], true ); ?> id="<?php echo $this->get_field_id( 'show_Pages' ); ?>" name="<?php echo $this->get_field_name( 'show_Pages' ); ?>" /> 
			<label for="<?php echo $this->get_field_id( 'show_Pages' ); ?>"><?php _e('Display list of Pages?', 'mom_top_widget'); ?></label>
		</p>
        
        <!-- Show Author e-mail -->
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_email'], true ); ?> id="<?php echo $this->get_field_id( 'show_email' ); ?>" name="<?php echo $this->get_field_name( 'show_email' ); ?>" /> 
			<label for="<?php echo $this->get_field_id( 'show_email' ); ?>"><?php _e('Display author\'s email?', 'mom_top_widget'); ?></label>
		</p>
        
	<?php
	}
}

/******************************************
 * Header image replacement
 */

/* Check to see if options already exist in the database */
$header_id = get_option('his_header_path');

if($header_id == '') {
	add_option('his_header_path', 'http://www.merriecontrary.com/blog/wp-content/themes/flickred-202/images/bannerandwords.jpg');
}

/* Functions */
function img_switcher_admin_menu() {
	add_submenu_page('themes.php', 'Header Image Switcher', 'Header Image Switcher', 'manage-options', __FILE__, 'img_switcher_options');
}

function his_add_css(){
	//$img = switch_image();
	$headerID = get_option('his_header_path');
    if ( $headerID ) {
        
    }
	print 
	<<<EOT
	<style type="text/css">
	div#banner {
    height:215px;
    width:100%;
	}

    div#banner a{
    display:block;
    width:100%; height:100%;
    background: url('$headerID') no-repeat;
    background-position: top left;    
	}
	</style>
EOT;
}

function img_switcher_options() {
	if (isset($_POST['his_header_path']) ){
		update_option("his_header_path", ($_POST['his_header_path']));
	}

?>
<div class="wrap">
<form method="post">
<h2>Header Image Switcher Settings</h2>
<?php
    if (isset($_POST['his_header_path'])){
        echo '<div id="message" class="updated fade"><p><strong>Settings Updated.</strong></p></div>' . "\n";
    }
?>
	<p>Enter the URL for the header image you would like to use:<br />
    <em>Ex. (http://www.merriecontrary.com/blog/wp-content/themes/flickred-202/images/bannerandwords.jpg)</em><br />
    Image dimensions should be 760 x 200.
    </p>
    <p>
		<label for="his_header_path"><?php _e('Header Image URL', 'hybrid'); ?></label>
		<input id="his_header_path" name="his_header_path" value="<?php echo get_option('his_header_path'); ?>" style="width:500px;" />
	</p>

<p><input type="submit" name="submitButtonName" value="Update" border="0"></p>
<p></p>
<h4>Instructions</h4>
<p>
To upload a new image:
</p>
<ol>
    <li>Go to Media > Add New.</li>
    <li>Select an image to upload.</li>
    <li>Note the File URL of the image you just uploaded.</li>
    <li>Go to Appearance > Header Image Switcher.</li>
    <li>Enter the File URL and click Update.</li>
    <li>Your header image should now be updated.</li>
</ol>
</form>

</div>
<?php
}
/* Add actions */
add_action('admin_menu', 'img_switcher_admin_menu');

	/* Check for correct initialization, if not found, don't add css */
//	if(is_dir(IMAGE_PATH) && count(get_files(IMAGE_PATH)) > 0) {
		add_action('wp_head', 'his_add_css');
//	}
//}
?>