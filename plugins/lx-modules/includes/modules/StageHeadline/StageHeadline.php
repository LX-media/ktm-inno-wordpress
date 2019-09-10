<?php

class LXMO_StageHeadline extends ET_Builder_Module {

	public $slug       = 'lxmo_stageheadline';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'www.lx-media.at',
		'author'     => 'LX Media',
		'author_uri' => 'www.lx-media.at',
	);

	public function init() {
		$this->name = esc_html__( 'Stage Headline', 'lxmo-lx-modules' );
	}

	public function get_fields() {
		return array(
			'title_one' => array(
				'label'           => esc_html__( 'Headline', 'et_builder' ),
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
		$title_one     		= $this->shortcode_atts['title_one'];
		
		$img_src        = $this->shortcode_atts['image'];
		$image_id 		= LXMO_StageHeadline::wp_get_image_id($img_src);
		$image_alt      = get_post_meta( $image_id, '_wp_attachment_image_alt', true);

		ob_start();
		?>
		<div class="LxStageHeadline">
			<div class="LxTilted">
				<img src="<?php echo $img_src; ?>" alt="<?php echo $image_alt; ?>" class="LxStageHeadImage">
			</div>
			<div class="LxContainer">
				<div class="LxTilted">
					<h1><?php echo $title_one; ?></h1>
				</div>
			</div>
		</div>
		<?php
		$output = ob_get_contents();
		ob_end_clean();
		return $output;	// retrieves the attachment ID from the file URL

	}
}

new LXMO_StageHeadline;
