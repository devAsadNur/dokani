<?php
/**
 * Right Sidebar Page Template.
 *
 * Template Name: Right Sidebar Page
 *
 * @package dokani
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

	<div id="primary" <?php dokani_content_class();?>>
		<main id="main" <?php dokani_main_class(); ?>>
			<?php
			/**
			 * dokani_before_main_content hook.
			 *
			 * @since 1.0.0
			 */
			do_action( 'dokani_before_main_content' );

			while ( have_posts() ) : the_post();

				get_template_part( 'content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || '0' != get_comments_number() ) : ?>

					<div class="comments-area">
						<?php comments_template(); ?>
					</div>

				<?php endif;

			endwhile;

			/**
			 * dokani_after_main_content hook.
			 *
			 * @since 1.0.0
			 */
			do_action( 'dokani_after_main_content' );
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	/**
	 * dokani_after_primary_content_area hook.
	 *
	 * @since 1.0.0
	 */
	 do_action( 'dokani_after_primary_content_area' );

	 dokani_construct_sidebars( 'right-sidebar' );

get_footer();