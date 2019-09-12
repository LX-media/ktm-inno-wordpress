<?php

class LXMO_Counter extends ET_Builder_Module {

	public $slug       = 'lxmo_counter';

	protected $module_credits = array(
		'module_uri' => 'www.lx-media.at',
		'author'     => 'LX Media',
		'author_uri' => 'www.lx-media.at',
	);

	public function init() {
		$this->name = esc_html__( 'Counter', 'lxmo-lx-modules' );
	}

	public function get_fields() {
		return array(
			'percent' => array(
				'label'           => esc_html__( 'Percent', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'et_builder' ),
				'dynamic_content' => 'text',
			),
			'text_left' => array(
				'label'           => esc_html__( 'Text Left', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'et_builder' ),
				'dynamic_content' => 'text',
			),
			'text_right' => array(
				'label'           => esc_html__( 'Text Right', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'et_builder' ),
				'dynamic_content' => 'text',
			)
			

		);
	}

	function render( $attrs, $content = null, $render_slug ) {
		$percent     = $this->shortcode_atts['percent'];
		$left   	 = $this->shortcode_atts['text_left'];
		$right   	 = $this->shortcode_atts['text_right'];



		ob_start();
		?>
		<div class="LxCounter">
			<div class="LxContainer LxCounterInner">
				<div class="third LxLeft"> <span> <?php echo $left; ?> </span></div>
				<div class="third LxPercent" data-percent="<?php echo $percent; ?>">  <span><?php echo $percent; ?> %</span></div>
				<div class="third LxRight"> <span> <?php echo $right; ?> </span></div>
			</div>
		</div>
		<?php
		$output = ob_get_contents();
		ob_end_clean();
		return $output;	// retrieves the attachment ID from the file URL

	}
}

new LXMO_Counter;
