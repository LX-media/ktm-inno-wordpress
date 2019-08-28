<?php

class LXMO_Streams extends ET_Builder_Module {

	public $slug       = 'lxmo_streams';
	public $vb_support = 'on';
	public $child_slug = 'lxmo_streams_item';

	protected $module_credits = array(
		'module_uri' => 'www.lx-media.at',
		'author'     => 'LX Media',
		'author_uri' => 'www.lx-media.at',
	);

	public function init() {
		$this->name = esc_html__( 'Leistungen / Streams Overview', 'lxmo-lx-modules' );

		$this->settings_modal_toggles = array(
			'advanced' => array(
				'toggles' => array(
					'icon'          => esc_html__( 'Icon', 'et_builder' ),
					'toggle_layout' => esc_html__( 'Toggle', 'et_builder' ),
					'text'          => array(
						'title'    => esc_html__( 'Text', 'et_builder' ),
						'priority' => 49,
					),
				),
			),
		);

		$this->advanced_fields = array(
			'borders'               => array(
				'default' => array(
					'css'      => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element} .lxmo_streams_item",
							'border_styles' => "{$this->main_css_element} .lxmo_streams_item",
						),
					),
					'defaults' => array(
						'border_radii' => 'on||||',
						'border_styles' => array(
							'width' => '1px',
							'color' => '#d9d9d9',
							'style' => 'solid',
						),
					),
				),
			),
			'box_shadow'            => array(
				'default' => array(
					'css' => array(
						'main' => '%%order_class%% .et_pb_toggle',
					),
				),
			),
			'fonts'                 => array(
				'toggle'        => array(
					'label'            => esc_html__( 'Title', 'et_builder' ),
					'css'              => array(
						'main'      => "{$this->main_css_element} h5.et_pb_toggle_title, {$this->main_css_element} h1.et_pb_toggle_title, {$this->main_css_element} h2.et_pb_toggle_title, {$this->main_css_element} h3.et_pb_toggle_title, {$this->main_css_element} h4.et_pb_toggle_title, {$this->main_css_element} h6.et_pb_toggle_title",
						'important' => 'plugin_only',
					),
					'header_level'     => array(
						'default' => 'h5',
					),
					'options_priority' => array(
						'toggle_text_color' => 9,
					),
				),
				'closed_toggle' => array(
					'label'           => esc_html__( 'Closed Title', 'et_builder' ),
					'css'             => array(
						'main'      => "{$this->main_css_element} .et_pb_toggle_close h5.et_pb_toggle_title, {$this->main_css_element} .et_pb_toggle_close h1.et_pb_toggle_title, {$this->main_css_element} .et_pb_toggle_close h2.et_pb_toggle_title, {$this->main_css_element} .et_pb_toggle_close h3.et_pb_toggle_title, {$this->main_css_element} .et_pb_toggle_close h4.et_pb_toggle_title, {$this->main_css_element} .et_pb_toggle_close h6.et_pb_toggle_title",
						'important' => 'plugin_only',
					),
					'hide_text_color' => true,
					'line_height'     => array(
						'default' => '1.7em',
					),
					'font_size'       => array(
						'default' => '16px',
					),
					'letter_spacing'  => array(
						'default' => '0px',
					),
				),
				'body'          => array(
					'label'          => esc_html__( 'Body', 'et_builder' ),
					'css'            => array(
						'main'         => "{$this->main_css_element} .et_pb_toggle_content",
						'limited_main' => "{$this->main_css_element} .et_pb_toggle_content, {$this->main_css_element} .et_pb_toggle_content p",
						'line_height'  => "{$this->main_css_element} .et_pb_toggle_content p",
					),
					'block_elements' => array(
						'tabbed_subtoggles' => true,
					),
				),
			),
			'margin_padding' => array(
				'draggable_padding' => false,
				'css'        => array(
					'padding'   => "{$this->main_css_element} .et_pb_toggle_content",
					'margin'    => $this->main_css_element,
					'important' => 'all',
				),
			),
			'button'                => false,
		);

		$this->custom_css_fields = array(
			'toggle' => array(
				'label'    => esc_html__( 'Toggle', 'et_builder' ),
				'selector' => '.et_pb_toggle',
			),
			'open_toggle' => array(
				'label'    => esc_html__( 'Open Toggle', 'et_builder' ),
				'selector' => '.et_pb_toggle_open',
			),
			'toggle_title' => array(
				'label'    => esc_html__( 'Toggle Title', 'et_builder' ),
				'selector' => '.et_pb_toggle_title',
			),
			'toggle_icon' => array(
				'label'    => esc_html__( 'Toggle Icon', 'et_builder' ),
				'selector' => '.et_pb_toggle_title:before',
			),
			'toggle_content' => array(
				'label'    => esc_html__( 'Toggle Content', 'et_builder' ),
				'selector' => '.et_pb_toggle_content',
			),
		);

		$this->help_videos = array(
			array(
				'id'   => esc_html( 'OBbuKXTJyj8' ),
				'name' => esc_html__( 'An introduction to the Accordion module', 'et_builder' ),
			),
		);
	}


	public function get_fields() {
		return array(
			


		);
	}

	
	function render( $attrs, $content = null, $render_slug ) {


		$output = sprintf(
			'<span class="triangle top grey"></span>
			<div%3$s class="LxStreams %2$s">
				%5$s
				%4$s
				%1$s
			</div> <!-- .et_pb_accordion -->
			<span class="triangle bottom grey"></span>',
			$this->content,
			$this->module_classname( $render_slug ),
			$this->module_id()
		);

		return $output;
	}

	public function add_new_child_text() {
		return esc_html__( 'Add New Accordion Item', 'et_builder' );
	}
}


new LXMO_Streams;

