<?php
/*
 * Template Name: Portfolio
 * Template Post Type: portfolio
*/
 ?>

<?php get_header();?>

<?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'img-fluid d-block d-sm-block d-md-none mt-n6' ) ); ?>
<div id="post-content" class="container-fluid">
<h1 class="display-1 text-center my-4"><?php the_title();?></h1>
    <div class="row">
        <div class="col-md-6 col-12 mt-3 mt-md-0 text-justify order-2 order-md-1">
            <?php if (have_posts()) : while(have_posts()) : the_post();?>
                <?php the_content();?>
            <?php endwhile; endif; ?>
        </div>
        <div class="col-md-6 col-12 order-1 order-md-2">
            <p class="display-4 font-weight-lighter mt-3 mt-md-0">Info about project:</p>
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
         
        </div>
    </div>
</div>

<?php get_footer();?>