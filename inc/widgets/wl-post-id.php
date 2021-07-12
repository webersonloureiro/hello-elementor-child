<?php

namespace Elementor;

if( !defined('ABSPATH') ) exit;

class WL_Post_ID extends Widget_Base {
	
	public function get_name() {
		return 'wp-post-id';
	}
	
	public function get_title() {
		return 'Search Post ID';
	}
	
	public function get_icon() {
		return 'fa fa-search';
	}
	
	public function get_categories() {
		return [ 'basic' ];
	}
	
	protected function _register_controls() {

		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Content', 'hello-elementor-child' ),
			]
		);
		
		$this->add_control(
			'title',
			[
				'label' => __( 'Form Title', 'hello-elementor-child' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the form title', 'hello-elementor-child' ),
                'default' => __( 'Insert Post ID', 'hello-elementor-child' ),
			]
		);

		$this->add_control(
			'placeholder',
			[
				'label' => __( 'Input placeholder', 'hello-elementor-child' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter the input placeholder', 'hello-elementor-child' ),
			]
		);

		$this->add_control(
			'button',
			[
				'label' => __( 'Button text', 'hello-elementor-child' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Submit', 'hello-elementor-child' ),
				'default' => __( 'Submit', 'hello-elementor-child' ),
			]
		);

		$this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();
        ?>
		 
         <div class="wl-post-id">
             <form id="wl_post_id_form" action="#" method="post" class="wl-post-id__form">
                <h3><?php echo $settings['title']; ?></h3>
                <input type="number" class="wl-post-id__form__input" name="wl_post_id" placeholder="<?php echo $settings['placeholder']; ?>" value="" />
                <input type="submit" class="wl-post-id__form__btn" value="<?php echo $settings['button']; ?>" />
             </form>
         </div>

        <?php
	}
	
	protected function _content_template() {
        ?>
		 
         <div class="wl-post-id">
             
             <form id="wl_post_id_form" action="#" method="post" class="wl-post-id__form">
                <h3>{{{ settings.title }}}</h3>
                <input type="number" class="wl-post-id__form__input" name="wl_post_id" placeholder="{{{ settings.placeholder }}}" value="" />
                <input type="submit" class="wl-post-id__btn" value="{{{ settings.button }}}" />
             </form>
         </div>

        <?php
    }
}