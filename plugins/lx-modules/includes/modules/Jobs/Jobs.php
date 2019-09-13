<?php

class LXMO_Jobs extends ET_Builder_Module {

	public $slug       = 'lxmo_jobs';

	protected $module_credits = array(
		'module_uri' => 'www.lx-media.at',
		'author'     => 'LX Media',
		'author_uri' => 'www.lx-media.at',
	);

	public function init() {
		$this->name = esc_html__( 'Jobs Slider', 'lxmo-lx-modules' );
	}

	public function get_fields() {
		return array(
			'title_one' => array(
				'label'           => esc_html__( 'Title', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'et_builder' ),
				'dynamic_content' => 'text',
			)
			

		);
	}

	function render( $attrs, $content = null, $render_slug ) {
		$title_one     		= $this->shortcode_atts['title_one'];



		ob_start();
		?>
		<div class="LxJobs">
			<div class="LxContainer">
				
					<h2><?php echo $title_one; ?></h2>
				
				
					
					<?php 

					$args = array(
						'post_type'		=> 'jobs',
						'numberposts'	=> -1, 
						'order'    		=> 'ASC'
						);              

					$posts = get_posts($args);

					// If there are posts
					if($posts):
						// Loop the posts
						?><div class="LxJobSlider LxOwl"><?php
						foreach ($posts as $mypost):
					?>
						<a href="<?php echo the_field('link', $mypost->ID); ?>">
							<div class="LxJob">
								<div class="inner">
									<span class="title"><?php echo get_the_title($mypost->ID); ?></span>
									<span class="subtitle"><?php echo the_field('job_subline', $mypost->ID); ?></span>
								</div>
								<div class="LxArrow"></div>
							</div>
						</a>
					
						<?php endforeach; wp_reset_postdata(); ?>
						</div> 
					<?php endif; ?>

			</div>
		</div>
		<?php
		$output = ob_get_contents();
		ob_end_clean();
		return $output;	// retrieves the attachment ID from the file URL

	}
}

new LXMO_Jobs;
