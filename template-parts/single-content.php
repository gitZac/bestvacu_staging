<article class="blog-post">

    <h1 class="blog-post__title--single"><?php the_title(); ?></h1>

    <div class="blog-post__image">
        <?php the_post_thumbnail(''); ?>
    </div>

    <div class="blog-post__content">
        <p class="text-muted">By <?php the_author(); ?> | <?php the_date(); ?></p>
        <p class="blog-post__excerpt"><?php the_content(); ?></p>
        <a href="<?php the_permalink(); ?>" class="blog-post__link">Read More</a>    
    </div>
    
</article><!-- #post-<?php the_ID(); ?> -->