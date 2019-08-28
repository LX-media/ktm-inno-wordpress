<?php
/**
 * Fires after the main content, before the footer is output.
 *
 * @since 3.10
 */
do_action( 'et_after_main_content' );

if ( 'on' === et_get_option( 'divi_back_to_top', 'false' ) ) : ?>

	<span class="et_pb_scroll_top et-pb-icon"></span>

<?php endif;

if ( ! is_page_template( 'page-template-blank.php' ) ) : ?>

			<footer id="main-footer">
	
				<div id="LxFooter">
				<?php
					if ( is_active_sidebar( 'custom-footer-image' ) ) : ?>
						<div class="LxFooterImageContainer" role="complementary">
						<?php dynamic_sidebar( 'custom-footer-image' ); ?> 
						</div>
					<?php endif; 

					if ( is_active_sidebar( 'custom-footer-content' ) ) : ?>
						<div class="LxFooterContentContainer" role="complementary">
							<div class="LxFooterInner">
								<?php dynamic_sidebar( 'custom-footer-content' ); ?> 
							</div>
						</div>
					<?php endif; ?>				
				</div> 
				<div id="LxFooterBottom">
					<div class="LxFooterBottomInner">
				<?php
				

					if ( is_active_sidebar( 'custom-footer-bottom' ) ) : ?>
						<div id="menu-widget-area" class="" role="complementary">
						<?php dynamic_sidebar( 'custom-footer-bottom' ); ?> 
						</div>
					<?php endif; 
					// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
					// echo et_core_fix_unclosed_html_tags( et_core_esc_previously( et_get_footer_credits() ) );
					// phpcs:enable
				?>
					<?php if ( false !== et_get_option( 'show_footer_social_icons', true ) ) {
							get_template_part( 'includes/social_icons', 'footer' );
				} ?>
					</div>	<!-- .container -->
				</div>
			
			</footer> <!-- #main-footer -->
		</div> <!-- #et-main-area -->

<?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>

	</div> <!-- #page-container -->

	<?php wp_footer(); ?>

	<script data-main="/wp-content/themes/ktm-innovation/assets/js/main" src="/wp-content/themes/ktm-innovation/assets/js/helper/require.js"></script>

	<script> // need to fix the colors
		VANTA.NET({
		el: "#vantajs",
		color: 0xff6600,
		backgroundColor: 0xffffff,
		points: 8.00,
		maxDistance: 22.00,
		spacing: 16.00,
		showDots: false
	})
	</script>
</body>
</html>
