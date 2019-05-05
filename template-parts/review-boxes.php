
<?php $args = array(
'post_type' => 'page',							
'posts_per_page' => 1,							
'order' => 'asc',
); 

function wp_bootstrap_child_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wp_bootstrap_child_custom_excerpt_length', 999 );

?>

<div class="col-md-4">

<?php $boxes = new WP_Query($args); while($boxes->have_posts()): $boxes->the_post(); ?>

    <div class="card profile-card-2">
        <div class="card-img-block">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="card-body pt-5">
            <img src="https://staging1.bestvacuumcleanerinfo.com/wp-content/uploads/2018/12/William.jpg" alt="profile-image" class="profile"/>
            <a href="<?php the_permalink(); ?>"><h5 class="card-title"><?php the_title(); ?></h5></a>
            <p class="card-text"><?php the_excerpt(); ?><a href="<?php the_permalink();?>">Read More</a></p>
            <div class="icon-block"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"> <i class="fa fa-twitter"></i></a><a href="#"> <i class="fa fa-google-plus"></i></a></div>
        </div>
    </div>

<?php endwhile;  
remove_filter( 'excerpt_length','wp_bootstrap_child' );
wp_reset_postdata();
?>

</div>