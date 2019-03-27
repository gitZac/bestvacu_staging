<?php

$featured_post_ids = get_theme_mod( 'featured_ids' );
$featured_count = get_theme_mod( 'featured_count', 5 );

if( $featured_post_ids && $featured_post_ids[0]!= '' ) {
	$args = array( 'post_type' => array('post'), 'post__in' => $featured_post_ids, 'showposts' => $featured_count, 'orderby' => 'post__in', 'ignore_sticky_posts' => true );
} else {
	$args = array( 'post_type' => array('post'), 'showposts' => $featured_count, 'ignore_sticky_posts' => true );
}

$featured_query = new WP_Query( $args );

?>

<?php if ( $featured_query->have_posts() ) : ?>

    <div class="container no-padding">
        <div class="row">

            <div id="wp-bp-posts-slider" class="col-md-8 no-padding carousel slide rounded" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php $post_counter = 0; ?>
                    <?php while ( $featured_query->have_posts() ) : $featured_query->the_post(); ?>
                        <li data-target="#wp-bp-posts-slider" data-slide-to="<?php echo esc_attr( $post_counter ); ?>" class="<?php if ( $post_counter === 0 ) : echo "active"; endif; ?>"></li>
                        <?php $post_counter++; ?>
                    <?php endwhile; ?>
                </ol>
                <div class="carousel-inner rounded">
                    <?php $post_counter = 0; ?>
                    <?php while ( $featured_query->have_posts() ) : $featured_query->the_post(); ?>
                        <?php
                            $feat_image = get_template_directory_uri() . '/assets/images/default.jpg';
                            $feat_img_alt = '';
                            if( has_post_thumbnail() ) {
                                $get_feat_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                                $feat_image = $get_feat_image[0];
                                $feat_img_alt = get_post_meta( get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true );
                            }
                            if ( $feat_img_alt === '' ) {
                                $feat_img_alt = get_the_title();
                            }
                        ?>
                        <div class="carousel-item rounded <?php if ( $post_counter === 0 ) : echo "active"; endif; ?>">
                            <img class="d-block w-100 rounded" src="<?php echo esc_url( $feat_image ); ?>" alt="<?php echo esc_attr( $feat_img_alt ); ?>">
                            <div class="carousel-caption d-md-flex align-items-end">
                                <div class="w-100 text-left mb-4">
                                    <h5><?php the_title(); ?></h5>
                                    <p><?php echo esc_html( wp_bootstrap_4_get_short_excerpt( 20 ) ); ?></p>
                                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-primary btn-sm button-animation"><?php esc_html_e( 'Continue Reading', 'wp-bootstrap-4' ); ?> <small class="oi oi-chevron-right ml-1"></small></a>
                                </div>
                            </div>
                        </div>
                        <?php $post_counter++; ?>
                    <?php endwhile; ?>
                </div>
            </div>

            <!-- START COLS -->

<?php 
    $args_2 = array(
        'p' => '5918'
    );

    $query = new WP_Query($args_2);
?>

            <div class="review-boxes col-md-4">

                <div class="review-boxes__single">
                    <figure class="review-boxes__assets">
                        <?php if ( $query->have_posts( ) ): ?>
                            <?php while ($query->have_posts() ) : $query->the_post(); ?>

                                <div class="review-boxes__content">
                                    <h3 class="review-boxes__title"><?php the_title(); ?></h3>
                                    <p class="review-boxes__excerpt">Excerpt needs hooked!</p>
                                    <a href="<?php the_permalink(); ?>" class="review-boxes__link">Read More</a>
                                </div>

                                <?php the_post_thumbnail(); ?>

                            <?php endwhile; ?>
                        <?php endif; ?>

                    </figure>
                </div>

            <?php 
                $args_3 = array(
                    'page_id' => '5'
                );

                $query = new WP_Query($args_3);
            ?>

                <div class="review-boxes__single">
                    <figure class="review-boxes__assets">
                        <?php if ( $query->have_posts( ) ): ?>
                            <?php while ($query->have_posts() ) : $query->the_post(); ?>

                                <div class="review-boxes__content">
                                    <h3 class="review-boxes__title"><?php the_title(); ?></h3>
                                    <p class="review-boxes__excerpt">Excerpt needs hooked!</p>
                                    <a href="<?php the_permalink(); ?>" class="review-boxes__link">Read More</a>
                                </div>

                                <?php the_post_thumbnail(); ?>

                            <?php endwhile; ?>
                        <?php endif; ?>

                    </figure>
                </div>

            </div>
        
        </div> <!--END ROW  -->
    </div> <!--END CONTAINER  -->
   
<?php endif; ?>
