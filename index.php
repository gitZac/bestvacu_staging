<?php
/**
 * CHILD THEME INDEX FILE
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Bootstrap_4 (CHILD-THEME)
 */

get_header(); ?>

<?php
	$default_sidebar_position = get_theme_mod( 'default_sidebar_position', 'right' );
?>

<?php if ( get_theme_mod( 'blog_display_cover_section', 1 ) ) : ?>
	<?php if( get_theme_mod( 'blog_cover_title' ) || get_theme_mod( 'blog_cover_lead' ) || get_theme_mod( 'blog_cover_btn_text' ) ) : ?>
		<section class="jumbotron bg-white text-center wp-bs-4-jumbotron border-bottom">
			<div class="container">
				<h1 class="jumbotron-heading"><?php echo wp_kses_post( get_theme_mod( 'blog_cover_title' ) ); ?></h1>
				<p class="lead text-muted"><?php echo wp_kses_post( get_theme_mod( 'blog_cover_lead' ) ); ?></p>
				<?php if( get_theme_mod( 'blog_cover_btn_text' ) ) : ?><a href="<?php echo esc_url( get_theme_mod( 'blog_cover_btn_link' ) ); ?>" class="btn btn-primary"><?php echo esc_html( get_theme_mod( 'blog_cover_btn_text' ) ); ?></a><?php endif; ?>
			</div>
			<!-- /.container -->
		</section>
		<!-- /.jumbotron text-center -->
	<?php endif; ?>
<?php endif; ?>

	<div class="container">
		<div class="row">

			<?php if ( $default_sidebar_position === 'no' ) : ?>
				<div class="col-md-12 wp-bp-content-width">
			<?php else : ?>
				<div class="col-md-8 wp-bp-content-width">
			<?php endif; ?>
				<div id="primary" class="content-area">
					<main id="main" class="site-main">
				
					<?php
					if ( have_posts() ) :

						if ( is_home() && ! is_front_page() ) : ?>
							<header>
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header>

						<?php
						endif;

						if( get_theme_mod( 'blog_display_posts_slider', '1' ) && is_home() && !is_paged() ) {
							get_template_part( 'posts-slider', 'feature' );
						}

						?>

						<h2 class="main-title">
							<i class="icon fas fa-newspaper"></i>
							<span class="main-title__title">Latest Articles</span>
							<div class="site-navigation-search"></div>
						</h2>

						<?php get_template_part( 'template-parts/fp-content', get_post_format() ); ?>

						<?php

						the_posts_navigation( array(
							'next_text' => esc_html__( 'Newer Posts', 'wp-bootstrap-4' ),
							'prev_text' => esc_html__( 'Older Posts', 'wp-bootstrap-4' ),
						) );

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>

					<?php get_template_part('template-parts/catcards'); wp_reset_postdata();?>

					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
			<!-- /.col-md-8 -->

			<?php if ( $default_sidebar_position != 'no' ) : ?>
				<?php if ( $default_sidebar_position === 'right' ) : ?>
					<div class="col-md-4 wp-bp-sidebar-width">
				<?php elseif ( $default_sidebar_position === 'left' ) : ?>
					<div class="col-md-4 order-md-first wp-bp-sidebar-width">
				<?php endif; ?>
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