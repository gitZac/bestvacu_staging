<div class="container">

    <div class="container-cmp-wrapper">

        <h2 class="main-title">
            <i class="icon fas fa-archive"></i>
            <span class="main-title__title">Menu</span>
            <div class="site-navigation-search"></div>
        </h2>

        <div class="row">

                <?php

                    $cat_args = array(
                        'orderby' => 'name',
                        'order' => 'asc'
                    );

                    $categories = get_categories( array($cat_args) );

                    foreach ($categories as $category) { //Loop through the categories ?>

                        <?php
                        
                        $args=array(
                            'showposts'=>3,
                            'category__in' => array($category->term_id),
                            'caller_get_posts'=>1 //Just turns sticky posts off
                        );
                                            
                        $posts = query_posts($args);

                        if($posts){ //If the category has posts... ?>

                            <div class="catcard col-md-4">
                                <div class="catcard__inner">
                                    <div class="catcard__upper">

                                        <a href="<?php echo get_category_link($category->term_id); ?>" class="cardcard__link">

                                            <div class="catcard__cat-image">                   
                                                <?php 
                                                    $term = get_queried_object();
                                                    $image = get_field('image', $term);
                                                ?>

                                                <img class="" src="<?php echo $image['url']; ?>">

                                                <div class="catcard__cat-title-container">
                                                    <h4 class="catcard__cat-title"><?php echo $category->name ?></h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="catcard__lower">

                                        <?php
                                            foreach($posts as $post){ //...Loop through all of the posts in that category
                                                
                                            setup_postdata($post); ?>

                                            <ul class="catcard__post-list">
                                                <li class="catcard__post-title">
                                                <a  class="catcard__post-link" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                                                    <?php
                                                    $thetitle = $post->post_title; /* or you can use get_the_title() */
                                                    $getlength = strlen($thetitle);
                                                    $thelength = 45;
                                                    echo substr($thetitle, 0, $thelength);
                                                    if ($getlength > $thelength) echo "...";
                                                    ?>
                                                </a>
                                                </li>                                          
                                            </ul>
    

                                        <?php  } //end innerforeach ?>
                                    </div>

                                </div><!-- ./ catcard__inner -->

                            </div><!-- ./ catcard  -->

                        <?php }  //endif ?>

                <?php } //end outer foreach ?>

        </div><!--./ BS row -->

    </div>

</div> <!-- BS ./ container -->