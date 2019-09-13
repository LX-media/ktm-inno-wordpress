<?php

class LXMO_Streams extends ET_Builder_Module {

	public $slug       = 'lxmo_streams';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'www.lx-media.at',
		'author'     => 'LX Media',
		'author_uri' => 'www.lx-media.at',
	);

	public function init() {
		$this->name = esc_html__( 'Leistungen / Streams Overview', 'lxmo-lx-modules' );
	}
	static function get_fullwidth_menu( $args = array() ) {
		$defaults = array(
			'submenu_direction' => '',
			'menu_id'           => '',
		);

		// modify the menu item to include the required data
		add_filter( 'wp_setup_nav_menu_item', array( 'ET_Builder_Module_Fullwidth_Menu', 'modify_fullwidth_menu_item' ) );

		$args = wp_parse_args( $args, $defaults );

		$menu = '<nav class="streams-menu">';

		$menuClass = 'streams-menu nav';

		// divi_disable_toptier option available in Divi theme only
		if ( ! et_is_builder_plugin_active() && 'on' === et_get_option( 'divi_disable_toptier' ) ) {
			$menuClass .= ' et_disable_top_tier';
		}
		$menuClass .= ( '' !== $args['submenu_direction'] ? sprintf( ' %s', esc_attr( $args['submenu_direction'] ) ) : '' );

		$primaryNav = '';

		$menu_args = array(
			'theme_location' => 'primary-menu',
			'container'      => '',
			'fallback_cb'    => '',
			'menu_class'     => $menuClass,
			'menu_id'        => '',
			'echo'           => false,
			'items_wrap' 	=> '<ol id="%1$s" class="%2$s">%3$s</ol>'
		);

		if ( '' !== $args['menu_id'] ) {
			$menu_args['menu'] = (int) $args['menu_id'];
		}

		$primaryNav = wp_nav_menu( apply_filters( 'et_fullwidth_menu_args', $menu_args ) );

		if ( empty( $primaryNav ) ) {
			$menu .= sprintf(
				'<ol class="%1$s">
					%2$s',
				esc_attr( $menuClass ),
				( ! et_is_builder_plugin_active() && 'on' === et_get_option( 'divi_home_link' )
					? sprintf( '<li class="test"><a href="%2$s">%3$s</a></li>',
						( is_home() ? ' class="current_page_item"' : '' ),
						esc_url( home_url( '/' ) ),
						esc_html__( 'Home', 'et_builder' )
					)
					: ''
				)
			);

			ob_start();

			// @todo: check if Fullwidth Menu module works fine with no menu selected in settings
			if ( et_is_builder_plugin_active() ) {
				wp_page_menu();
			} else {
				show_page_menu( $menuClass, false, false );
				show_categories_menu( $menuClass, false );
			}

			$menu .= ob_get_contents();

			$menu .= '</ol>';

			ob_end_clean();
		} else {
			$menu .= $primaryNav;
		}

		$menu .= '</nav>';

		remove_filter( 'wp_setup_nav_menu_item', array( 'ET_Builder_Module_Fullwidth_Menu', 'modify_fullwidth_menu_item' ) );

		return $menu;
	}


	public function get_fields() {
		return array(
			'menu_id' => array(
				'label'           => esc_html__( 'Menu', 'et_builder' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'options'         => et_builder_get_nav_menus_options(),
				'description'     => sprintf(
					'<p class="description">%2$s. <a href="%1$s" target="_blank">%3$s</a>.</p>',
					esc_url( admin_url( 'nav-menus.php' ) ),
					esc_html__( 'Select a menu that should be used in the module', 'et_builder' ),
					esc_html__( 'Click here to create new menu', 'et_builder' )
				),
				'toggle_slug'      => 'main_content',
				'computed_affects' => array(
					'__menu',
				),
			),
			'__menu' => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'LXMO_Streams', 'get_fullwidth_menu' ),
				'computed_depends_on' => array(
					'menu_id'
				),
			),
			'line_bottom' => array(
				'label'           => esc_html__( 'Line Bottom', 'et_builder' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'options'         => array(
					'on'       => esc_html__( 'Yes', 'et_builder' ),
					'off'      => esc_html__( 'No', 'et_builder' ),
				),
				'affects'           => array(
					'use_circle_border',
					'circle_color',
				),
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Triangular line on the bottom of the module', 'et_builder' ),
				'default_on_front'=> 'off',
				'dynamic_content' => 'text',
			),
			'line_top' => array(
				'label'           => esc_html__( 'Line Top', 'et_builder' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'options'         => array(
					'on'       => esc_html__( 'Yes', 'et_builder' ),
					'off'      => esc_html__( 'No', 'et_builder' ),
				),
				'affects'           => array(
					'use_circle_border',
					'circle_color',
				),
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Triangular line on the top of the module', 'et_builder' ),
				'default_on_front'=> 'off',
				'dynamic_content' => 'text',
			),

		);
	}

	function render( $attrs, $content = null, $render_slug ) {
		$menu_id  	= $this->props['menu_id'];
		$top  		= $this->shortcode_atts['line_top'];
		$bottom  	= $this->shortcode_atts['line_bottom'];

		$menu = self::get_fullwidth_menu( array(
			'menu_id'  => $menu_id,
		));

		$menu = wp_get_nav_menu_object($menu_id);
		$menu_items = wp_get_nav_menu_items($menu->term_id);

		$menu_list = '<nav class="streams-menu">' ."\n";
		$menu_list .= "\t\t\t\t". '<ul>' ."\n";
		foreach ((array) $menu_items as $key => $menu_item) {
			$id 		= $menu_item->ID;
			$object_id 	= $menu_item->object_id;
			$title 		= $menu_item->title;
			$url 		= $menu_item->url;
	
			$my_post = get_post( $object_id ); 
			$excerpt = $my_post->post_excerpt;
	
			$menu_list .= "\t\t\t\t\t". '<li><a href="'. $url .'">'. $title .'</a>';
			$menu_list .= "<span class='line'> </span>";
			$menu_list .= "<div class='excerpt' data-post='". $id ."' data-object='". $object_id ."'> ". $excerpt . " </div>";

			
			$menu_list .= '</li>' ."\n";
		}
		$menu_list .= "\t\t\t\t". '</ul>' ."\n";
		$menu_list .= "\t\t\t". '</nav>' ."\n";
		
		ob_start();
		?>
		<?php if($top == "on"): ?> <span class="triangle top grey"></span> <?php endif; ?>
		<div class="LxStreams">
			<div class="LxContainer">
				<div class="LxStreamsInner">
					<?php echo $menu_list; ?>
				</div>
				<div class="hiddenmenu"> </div>
			</div>
		</div>
		<?php if($bottom == "on"): ?><span class="triangle bottom grey"></span><?php endif; ?>
		<?php
		$output = ob_get_contents();
		ob_end_clean();
		return $output;	// retrieves the attachment ID from the file URL
	}
}

new LXMO_Streams;