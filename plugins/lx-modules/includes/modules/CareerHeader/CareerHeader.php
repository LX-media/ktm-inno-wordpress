
<?php

class LXMO_CareerHeader extends ET_Builder_Module {

	public $slug       = 'lxmo_careerhead';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'www.lx-media.at',
		'author'     => 'LX Media',
		'author_uri' => 'www.lx-media.at',
	);

	public function init() {
		$this->name = esc_html__( 'Career Page Header', 'lxmo-lx-modules' );
	}

	public function get_fields() {
		return array(
			'title' => array(
				'label'           => esc_html__( 'Title', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'et_builder' ),
				'dynamic_content' => 'text',
			),
			'subtitle' => array(
				'label'           => esc_html__( 'Subtitle', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'et_builder' ),
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
		$title     		= $this->shortcode_atts['title'];
		$subtitle    	= $this->shortcode_atts['subtitle'];
		
		$img_src        = $this->shortcode_atts['image'];
		$image_id 		= LXMO_CareerHeader::wp_get_image_id($img_src);
		$image_alt      = get_post_meta( $image_id, '_wp_attachment_image_alt', true);
	

		ob_start();
		?>

		<div class="LxCareerHeaderHeader">
			<img src="<?php echo $img_src; ?>" alt="<?php echo $image_alt; ?>" />
			<div class="LxContainer">
				
			 	<div class="LxCareerHeaderInner">
					<h1><?php echo $title; ?></h1>
					<p><?php echo $subtitle; ?></p>
				</div>
					
            </div>
		</div>
		<?php
		$output = ob_get_contents();
		ob_end_clean();
		return $output;	// retrieves the attachment ID from the file URL

	}
}

new LXMO_CareerHeader;
