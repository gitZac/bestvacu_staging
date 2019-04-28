

<div class="container">

    <div class="container-cmp-wrapper">

        <h2 class="main-title">
            <i class="icon fas fa-archive"></i>
            <span class="main-title__title">Review Categories</span>
            <div class="site-navigation-search"></div>
        </h2>

        <div class="row">

                <?php

                    $categories = get_categories( array(
                        'orderby' => 'name',
                        'order'   => 'ASC'
                    ) );

                    foreach ($categories as $category) { //Loop through the categories ?>

                        <?php
                        
                        $args=array(
                            'showposts'=>3,
                            'category__in' => array($category->term_id),
                            'caller_get_posts'=>1
                        );
                                            
                        $posts = query_posts($args);

                        if($posts){ //If the category has posts... ?>

                            <div class="catcard col-md-3">
                                <div class="catcard__inner">
                                    <div class="catcard__upper">
                                        <a href="<?php get_category_link($category) ?>" class="cardcard__link">
                                            <div class="catcard__cat-image">
                                                <?php the_post_thumbnail($size, $attr); ?>

                                                <div class="catcard__cat-title-container">
                                                    <h4 class="catcard__cat-title"><?php echo $category->name ?></h4>
                                                    <p class="catcard__post-title"><a  class="catcard__post-link" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>

                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="catcard__lower">
                                        <?php
                                            foreach($posts as $post){ //...Loop through all of the posts in that category

                                            setup_postdata($post); ?>

                                        <?php  } //end innerforeach ?>
                                    </div>

                                </div><!-- ./ catcard__inner -->

                            </div><!-- ./ catcard  -->

                        <?php }  //endif ?>

                <?php } //end outer foreach ?>

        </div><!--./ BS row -->

    </div>

</div> <!-- BS ./ container -->