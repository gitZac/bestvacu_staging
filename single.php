<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_4
 */

get_header(); ?>

<?php
	$default_sidebar_position = 'right';
?>

	<div class="container">
		<div class="row">

            <div class="col-md-8 wp-bp-content-width">

				<div id="primary" class="content-area">
					<main id="main" class="site-main">

					<?php
                    while ( have_posts() ) : the_post(); ?>
                    
                        <?php get_template_part('template-parts/single-content'); ?>

						<?php the_post_navigation(array(
				            'prev_text' => esc_html__( '&laquo; Previous Post', 'wp-bootstrap-4' ),
				            'next_text' => esc_html__( 'Next Post &raquo;', 'wp-bootstrap-4' ),
				        ) );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>

					</main><!-- #main -->
				</div><!-- #primary -->
			</div>

				<?php if ( $default_sidebar_position === 'right' ) : ?>
					<div class="col-md-4 wp-bp-sidebar-width">
						<?php get_sidebar(); ?>
					</div>
					<!-- /.col-md-4 -->
			    <?php endif; ?>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->

<?php
get_footer();
