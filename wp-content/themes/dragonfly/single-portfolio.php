<?php
/*
 * Template Name: Portfolio
 * Template Post Type: portfolio
*/
 ?>

<?php get_header();?>


<div id="post-content" class="container-fluid">
<h1 class="position-relative display-1 text-center mt-5 font-weight-200"><?php the_title();?></h1>
    <div class="row">
        <div class="col-md-6 col-12 text-justify order-2 order-md-1 my-auto">
                <?php if (have_posts()) : while(have_posts()) : the_post();?>
                <div class="mb-2 mt-2 mt-md-0 d-flex">
                    <div class="my-3 text-center">
                        <span class="mr-1">Category: </span>
                        <?php
                            $terms = get_the_terms( $post->ID , 'categories' );
                            if ( $terms != null ){
                            foreach( $terms as $term ) {
                            $term_link = get_term_link( $term, 'categories' );
                            echo '<a class="badge badge-pill badge-dark px-3 py-2" href="' . $term_link . '">' . $term->name . '</a>';
                            unset($term); } } 
                        ?>
                    </div>
                    <div class="my-3 text-center ml-md-3">
                        <span class="ml-2 mr-1">Date:</span>
                            <span class="badge badge-pill badge-dark px-3 py-2"><time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time></span>
                        </div>
                    </div>

                <?php the_content();?>
            <?php endwhile; endif; ?>
        </div>
        <div class="col-md-6 col-12 order-1 order-md-2 p-0 p-md-3">
            <?php echo get_the_post_thumbnail( $post_id, array( 680, 454), array( 'class' => 'img-fluid rounded' ) ); ?>
        </div>
    </div>
</div>

<?php get_footer();?>