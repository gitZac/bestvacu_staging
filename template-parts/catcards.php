
<div class="container">

    <h2>Categories</h2>

    <div class="row">

            <?php

                $categories = get_categories( array(
                    'orderby' => 'name',
                    'order'   => 'ASC'
                ) );

                foreach ($categories as $category) { //Loop through the categories ?>

                    <?php $args=array(
                        'showposts'=>3,
                        'category__in' => array($category->term_id),
                        'caller_get_posts'=>1
                    );
                                        
                    $posts = get_posts($args);

                    if($posts){ //If the category has posts... ?>

                        <div class="catcard col-md-3">
                            <div class="catcard__inner">
                                <div class="catcard__upper">
                                    <a href="<?php get_permalink($category->term_id); ?>" class="cardcard__link">
                                        <div class="catcard__cat-image">
                                            <img src="https://placeimg.com/640/480/any">
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
                                            <p class="catcard__post-title"><a  class="catcard__post-link" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>

                                    <?php } //end innerforeach ?>
                                </div>

                            </div><!-- ./ catcard__inner -->

                        </div><!-- ./ catcard  -->

                    <?php } //endif ?>

            <?php } //end outer foreach ?>

    </div><!--./ BS row -->

</div> <!-- BS ./ container -->