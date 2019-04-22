<?php
/**
 * Front page template for displaying pists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Bootstrap_4
 */

?>

<?php $args = array(
'post_type' => 'post',							
'posts_per_page' => 5,							
'orderby' => 'date',
'order' => 'DESC',
); ?>

<?php $all_posts = new WP_Query($args); while($all_posts->have_posts()): $all_posts->the_post(); ?>

    <article class="blog-post">

        <h3 class="blog-post__title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>

        <div class="blog-post__image">
            <?php the_post_thumbnail(''); ?>
        </div>

        <div class="blog-post__content">
            <p class="text-muted">By <?php the_author(); ?> | <?php the_date(); ?></p>
            <p class="blog-post__excerpt"><?php the_excerpt(); ?></p>
            <a href="<?php the_permalink(); ?>" class="blog-post__link">Read More</a>    
        </div>

    </article><!-- #post-<?php the_ID(); ?> -->

<?php endwhile; wp_reset_postdata(); ?>