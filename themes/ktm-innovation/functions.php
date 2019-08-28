<?php
    // function enqueueParentStyle() {
    //     wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
    // }
    // add_action( 'wp_enqueue_scripts', 'enqueueParentStyle' );

    //dequeue all styles and add it in one style.css
    function dequeueStyles() {
        wp_dequeue_style( 'parent-style', get_template_directory_uri().'/style.css' );
        wp_dequeue_style( 'magnific-popup', get_template_directory_uri().'/includes/builder/styles/magnific_popup.css' );
        wp_dequeue_style( 'contact-form-7' );
        wp_dequeue_style( 'dashicons' );
        wp_deregister_style('wp-mediaelement');
    }
    add_action( 'wp_print_styles', 'dequeueStyles' );

    function deregister_styles() {
        $is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );
     
        if( !$is_page_builder_used ) {
            wp_dequeue_style('et-builder-modules-style');
        }
    }
    add_action( 'wp_print_styles', 'deregister_styles', 100 );

    add_filter( 'tablepress_use_default_css', '__return_false' );


    // wp_deregister_script('wp-mediaelement');


    // function deregister_script() {
    //     $is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );
     
    //         // if( !$is_page_builder_used ) {
    //             wp_dequeue_script('et-builder-modules-global-functions-script');
    //             wp_dequeue_script('google-maps-api');
    //             wp_dequeue_script('divi-fitvids');
    //             wp_dequeue_script('waypoints');
    //             wp_dequeue_script('magnific-popup');
                 
    //             wp_dequeue_script('hashchange');
    //             wp_dequeue_script('salvattore');
    //             wp_dequeue_script('easypiechart');
                 
    //             wp_dequeue_script('et-jquery-visible-viewport');
                 
    //             wp_dequeue_script('magnific-popup');
    //             wp_dequeue_script('et-jquery-touch-mobile');
    //             wp_dequeue_script('et-builder-modules-script');
    //         // }
    // }
    // add_action( 'wp_print_scripts', 'deregister_script', 100 );


// custom post type function
function create_posttype() {
 
    register_post_type( 'projects',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Projects' ),
                'singular_name' => __( 'Project' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'projects'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );




    // REMOVE WP EMOJI
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');

    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );

    // hide projects
    add_filter( 'et_project_posttype_args', 'mytheme_et_project_posttype_args', 10, 1 );
    function mytheme_et_project_posttype_args( $args ) {
        return array_merge( $args, array(
            'public'              => false,
            'exclude_from_search' => false,
            'publicly_queryable'  => false,
            'show_in_nav_menus'   => false,
            'show_ui'             => false
        ));
    }

    //set js directory
    $my_js_dir = array(
        'path' => get_stylesheet_directory_uri() . '/assets/js'
    );
    wp_localize_script( 'the-dependent', 'variable_reference', $my_js_dir );

    //allow SVG upload
    function cc_mime_types($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
    add_filter('upload_mimes', 'cc_mime_types');


    // List Child pages of a parent. 
    function list_child_pages() {							
        global $post;
        
        if ( is_page() && $post->post_parent )
            $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
        else
            $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );
        
        if ( $childpages ) { ?>
            <div class="submenu">
                <ul>
                    <?php echo $string = $childpages; ?>
                </ul>
            </div>
            
        <?php   
        }
        return $string;
    }
    // Add Shortcode for additional support, not just in the theme template
    add_shortcode('childpages', 'list_child_pages');
	
	// Custom Divi Modules
	function LX_Divi_Custom_Modules(){
		if ( class_exists("ET_Builder_Module") ) {
			// include(get_stylesheet_directory() . "/custom-modules/manager-person.php");
			// include(get_stylesheet_directory() . "/custom-modules/text-header.php");
			// include(get_stylesheet_directory() . "/custom-modules/contact-form.php");
			// include(get_stylesheet_directory() . "/custom-modules/organigramm.php");
		}
	}
	function LX_Custom_Modules(){
		global $pagenow;
		
		$is_admin = is_admin();
		$action_hook = $is_admin ? 'wp_loaded' : 'wp';
		$required_admin_pages = array( 'edit.php', 'post.php', 'post-new.php', 'admin.php', 'customize.php', 'edit-tags.php', 'admin-ajax.php', 'export.php' ); // list of admin pages where we need to load builder files
		$specific_filter_pages = array( 'edit.php', 'admin.php', 'edit-tags.php' );
		$is_edit_library_page = 'edit.php' === $pagenow && isset( $_GET['post_type'] ) && 'et_pb_layout' === $_GET['post_type'];
		$is_role_editor_page = 'admin.php' === $pagenow && isset( $_GET['page'] ) && 'et_divi_role_editor' === $_GET['page'];
		$is_import_page = 'admin.php' === $pagenow && isset( $_GET['import'] ) && 'wordpress' === $_GET['import'];
		$is_edit_layout_category_page = 'edit-tags.php' === $pagenow && isset( $_GET['taxonomy'] ) && 'layout_category' === $_GET['taxonomy'];
		
		if ( ! $is_admin || ( $is_admin && in_array( $pagenow, $required_admin_pages ) && ( ! in_array( $pagenow, $specific_filter_pages ) || $is_edit_library_page || $is_role_editor_page || $is_edit_layout_category_page || $is_import_page ) ) ) {
			add_action($action_hook, 'LX_Divi_Custom_Modules', 9789);
		}
	}
    LX_Custom_Modules();
    
    function lx_widgets_init() {
 
        register_sidebar( array(
            'name'          => 'Custom Header Widget Area',
            'id'            => 'custom-header-widget',
            'before_widget' => '<div class="chw-widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="chw-title">',
            'after_title'   => '</h2>',
        ));
        register_sidebar( array(
            'name'          => 'Custom Menu Left Widget Area',
            'id'            => 'custom-menu-left',
            'before_widget' => '<div class="LxMenuInner">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="LxMenuTitle">',
            'after_title'   => '</h2>',
        ));
        register_sidebar( array(
            'name'          => 'Custom Menu Middle Widget Area',
            'id'            => 'custom-menu-middle',
            'before_widget' => '<div class="LxMenuInner">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="LxMenuTitle">',
            'after_title'   => '</h2>',
        ));
        register_sidebar( array(
            'name'          => 'Custom Menu Right Widget Area',
            'id'            => 'custom-menu-right',
            'before_widget' => '<div class="LxMenuInner">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="LxMenuTitle">',
            'after_title'   => '</h2>',
        ));
        register_sidebar( array(
            'name'          => 'Footer Bottom Widget Area',
            'id'            => 'custom-footer-bottom',
            'before_widget' => '<div class="LxFooterBottom">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="LxFBTitle">',
            'after_title'   => '</h2>',
        ));
        register_sidebar( array(
            'name'          => 'Footer Image Widget Area',
            'id'            => 'custom-footer-image',
            'before_widget' => '<div class="LxFooterImage">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="">',
            'after_title'   => '</h2>',
        ));
        register_sidebar( array(
            'name'          => 'Footer Content Widget Area',
            'id'            => 'custom-footer-content',
            'before_widget' => '<div class="LxFooterContent">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="">',
            'after_title'   => '</h2>',
        ));
     
    }
    add_action( 'widgets_init', 'lx_widgets_init' );

?>
