<?php

if( !defined('ABSPATH') ) exit;

class Widget_loader {

    protected static $instance = null;

	public static function get_instance() {
		if ( ! isset( static::$instance ) ) {
			static::$instance = new static;
		}

		return static::$instance;
	}

    public function __construct() {
        require_once('widgets/wl-post-id.php');
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'wl_register_widgets' ] );
    }

    public function wl_register_widgets() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\WL_Post_ID() );
	}

}

add_action( 'init', 'wl_elementor_init' );

function wl_elementor_init() {
	Widget_loader::get_instance();
}

add_action('wp_ajax_wl_search_post_id', 'wl_search_post_id');
add_action('wp_ajax_nopriv_wl_search_post_id', 'wl_search_post_id');

function wl_search_post_id() {  

    $wl_post_id = $_REQUEST['wl_post_id'];

    if( $wl_post_id ) {
        $post_id = sanitize_text_field( $wl_post_id );
        $post   = get_post( $post_id );
        $title = $post->post_title;

    ?>
        <div id="wl_post_title" class="wl-post-title">
            <h3><span>Post title:&nbsp;</span><?php echo $title ? $title : __('Post not found', 'hello-elementor-child') ?></h3>
        </div>
    <?php
    }
    die();

}