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
//Vars
    $default_sidebar_position = 'right';
?>

	<div class="container">
		<div class="row">

            <div class="col-md-8 wp-bp-content-width">

				<div id="primary" class="content-area">
					<main id="main" class="site-main">

                        <header class="page-header">
                            <?php the_archive_title( '<h1 class="pager-header__title">', '</h1>' ); ?>
                            <?php the_archive_description( '<p class="page-header__description">', '</p>' ); ?>
                        </header>

					    <?php
                            while ( have_posts() ) : the_post(); ?>
                    
                        <?php get_template_part('template-parts/short-content'); ?>

						<?php endwhile; // End of the loop. ?>

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
