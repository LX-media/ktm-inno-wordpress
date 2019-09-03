<?php

class LXMO_Stage extends ET_Builder_Module {

	public $slug       = 'lxmo_stage';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'www.lx-media.at',
		'author'     => 'LX Media',
		'author_uri' => 'www.lx-media.at',
	);

	public function init() {
		$this->name = esc_html__( 'Stage', 'lxmo-lx-modules' );
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
				'option_category' => 'basic_option',
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
				'dynamic_content' => 'text',

			),  
			'image' => array(
				'label'              => esc_html__( 'Background image ', 'et_builder' ),
				'type'               => 'upload',
				'option_category'    => 'configuration',
				'upload_button_text' => esc_attr__( 'Upload an image', 'et_builder' ),
				'choose_text'        => esc_attr__( 'Choose Image', 'et_builder' ),
				'update_text'        => esc_attr__( 'Set Image', 'et_builder' ),
				'affects'            => array(
					'image_alt',
				),
				'description'        => esc_html__( '', 'et_builder' ),
				'toggle_slug'        => 'main_content',
				'dynamic_content'    => 'image',
			)    
	
		);
	}

	function render( $attrs, $content = null, $render_slug ) {
		$title_one     		= $this->shortcode_atts['title_one'];
		$content_one    	= $this->shortcode_atts['content_one'];
		$button_one			= $this->shortcode_atts['button_one'];
		$button_one_url		= $this->shortcode_atts['button_one_url'];
		$link_target_one 	= $this->shortcode_atts['link_target_one'];
		
		$img_src        = $this->shortcode_atts['image'];
		$image_id 		= LXMO_Stage::wp_get_image_id($img_src);
		$image_alt      = get_post_meta( $image_id, '_wp_attachment_image_alt', true);

		ob_start();
		?>
		<img src="<?php echo $img_src; ?>" alt="<?php echo $image_alt; ?>" class="clip LxStageImage">
		<div class="LxStage">
			<div class="LxContainer">
				<div class="LxBox">
					<h2><?php echo $title_one; ?></h2>
					<p><?php echo $content_one; ?></p>
					<?php if($button_one): ?>
						<a class="LxBtn LxBtnOrange" href="<?php echo $button_one_url; ?>" <?php if($link_target_one == "off"): ?> target="_blank" <?php endif; ?>>
							<?php echo $button_one; ?>
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

new LXMO_Stage;
