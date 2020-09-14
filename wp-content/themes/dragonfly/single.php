<?php get_header();?>

<div id="post-content" class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-12">
            <?php if (has_post_thumbnail()):?>
                <img class="img-fluid mb-3" src="<?php the_post_thumbnail_url( 'large' );?>">
            <?php endif;?>
            <h1 class="text-primary"><?php the_title();?></h1>
            <?php if (have_posts()) : while(have_posts()) : the_post();?>
                <?php the_content();?>
            <?php endwhile; endif; ?>
        </div>
    </div>
</div>

<?php get_footer();?>