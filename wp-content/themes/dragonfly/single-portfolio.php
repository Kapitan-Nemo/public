<?php
/*
 * Template Name: Portfolio
 * Template Post Type: portfolio
*/
 ?>

<?php get_header();?>


<div id="post-content" class="container-fluid">
<h1 class="position-relative display-1 font-weight-bold text-center py-4"><?php the_title();?></h1>
    <div class="row">
        <div class="col-md-6 col-12 text-justify order-2 order-md-1">
            <!--<?php echo get_the_post_thumbnail( $post_id, array( 900, 600), array( 'class' => 'img-fluid' ) ); ?> -->
                <?php if (have_posts()) : while(have_posts()) : the_post();?>
                <p class="display-4 mt-3 mt-md-0">Info about project:</p>
                <div class="d-inline">
                <span class="mr-1">Category: </span>
                <?php
                    $terms = get_the_terms( $post->ID , 'categories' );
                    if ( $terms != null ){
                    foreach( $terms as $term ) {
                    $term_link = get_term_link( $term, 'categories' );
                    echo '<a class="badge badge-pill badge-dark" href="' . $term_link . '">' . $term->name . '</a>';
                    unset($term); } } ?>
                <span class="ml-2 mr-1">Date:</span>
                    <span class="badge badge-pill badge-dark"> <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time></span>
                </div>
                <?php the_content();?>
            <?php endwhile; endif; ?>
        </div>
        <div class="col-md-6 col-12 order-1 order-md-2">
            
        </div>
    </div>
</div>

<?php get_footer();?>