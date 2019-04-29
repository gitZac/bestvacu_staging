<div class="review-boxes col-md-4">

<?php $args = array(
'post_type' => 'post',							
'posts_per_page' => 2,							
'orderby' => 'rand',
'order' => 'desc',
); ?>

<?php $boxes = new WP_Query($args); while($boxes->have_posts()): $boxes->the_post(); ?>

    <div class="review-boxes__single">
        <figure class="review-boxes__assets">

            <div class="review-boxes__content">
                <h3 class="review-boxes__title"><?php the_title(); ?></h3>
                <p class="review-boxes__excerpt"><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" class="review-boxes__link">Read More</a>
            </div>

            <?php the_post_thumbnail(); ?>

        </figure>
    </div>

<?php endwhile; wp_reset_postdata(); ?>
</div>