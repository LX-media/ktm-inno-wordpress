<?php

class LXMO_CareerTeaser extends ET_Builder_Module {

	public $slug       = 'lxmo_career_teaser';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'www.lx-media.at',
		'author'     => 'LX Media',
		'author_uri' => 'www.lx-media.at',
	);

	public function init() {
		$this->name = esc_html__( 'Career Teaser', 'lxmo-lx-modules' );
	}

	public function get_fields() {
		return array(
			'title_one' => array(
				'label'           => esc_html__( 'Box 1 title', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'et_builder' ),
				'dynamic_content' => 'text',
			),
			'content_one' => array(
				'label'           => esc_html__( 'Box 1 content', 'et_builder' ),
				'type'            => 'textarea',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'et_builder' ),
				'dynamic_content' => 'text',
			),
			'button_one' => array(
				'label'           => esc_html__( 'Button 1 title', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'et_builder' ),
				'dynamic_content' => 'text',
			),
			'button_one_url' => array(
				'label'           => esc_html__( 'Button 1 url', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'et_builder' ),
				'dynamic_content' => 'text',
			),
			'link_target_one' => array(
				'label'           => esc_html__( 'Button 1 Link target', 'et_builder' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'       => esc_html__( 'Same', 'et_builder' ),
					'off'      => esc_html__( 'New', 'et_builder' ),
				),
				'affects'           => array(
					'use_circle_border',
					'circle_color',
				),
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Same or new window', 'et_builder' ),
				'default_on_front'=> 'on',
			),      
			'title_two' => array(
				'label'           => esc_html__( 'Box 2 title', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'et_builder' ),
				'dynamic_content' => 'text',
			),
			'content_two' => array(
				'label'           => esc_html__( 'Box 2 content', 'et_builder' ),
				'type'            => 'textarea',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'et_builder' ),
				'dynamic_content' => 'text',
			),
			'button_two' => array(
				'label'           => esc_html__( 'Button 2 title', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'et_builder' ),
				'dynamic_content' => 'text',
			),
			'button_two_url' => array(
				'label'           => esc_html__( 'Button 2 url', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'et_builder' ),
				'dynamic_content' => 'text',
			),
			'link_target_two' => array(
				'label'           => esc_html__( 'Button 2 Link target', 'et_builder' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'       => esc_html__( 'Same', 'et_builder' ),
					'off'      => esc_html__( 'New', 'et_builder' ),
				),
				'affects'           => array(
					'use_circle_border',
					'circle_color',
				),
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Same or new window', 'et_builder' ),
				'default_on_front'=> 'on',
			)      
		);
	}

	function render( $attrs, $content = null, $render_slug ) {
		$title_one     		= $this->shortcode_atts['title_one'];
		$content_one    	= $this->shortcode_atts['content_one'];
		$button_one			= $this->shortcode_atts['button_one'];
		$button_one_url		= $this->shortcode_atts['button_one_url'];
		$link_target_one 	= $this->shortcode_atts['link_target_one'];

		$title_two     		= $this->shortcode_atts['title_two'];
		$content_two    	= $this->shortcode_atts['content_two'];
		$button_two			= $this->shortcode_atts['button_two'];
		$button_two_url		= $this->shortcode_atts['button_two_url'];
		$link_target_two 	= $this->shortcode_atts['link_target_two'];
	

		ob_start();
		?>
		<div class="LxContainer">
			<div class="LxCareerTeaser">
				<div class="LxBox LxBoxOne">
					<h2><?php echo $title_one; ?></h2>
					<p><?php echo $content_one; ?></p>
					<?php if($button_one): ?>
						<a class="LxBtn LxBtnOrange" href="<?php echo $button_one_url; ?>" <?php if($link_target_one == "off"): ?> target="_blank" <?php endif; ?>>
							<?php echo $button_one; ?>
						</a>
					<?php endif; ?>
				</div>

				<div class="LxBox LxBoxTwo">
					<h2><?php echo $title_two ?></h2>
					<p><?php echo $content_two; ?></p>
					<?php if($button_two): ?>
						<a class="LxBtn LxBtnOrange" href="<?php echo $button_two_url; ?>" <?php if($link_target_two == "off"): ?> target="_blank" <?php endif; ?>>
							<?php echo $button_two; ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php
		$output = ob_get_contents();
		ob_end_clean();
		return $output;	// retrieves the attachment ID from the file URL

	}
}

new LXMO_CareerTeaser;
