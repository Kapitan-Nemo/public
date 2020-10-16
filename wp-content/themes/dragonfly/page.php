<?php get_header();?>

<div class="container pt-5 pb-5">
    <div class="row">
        <div class="col-12">
            <?php if (have_posts()) : while(have_posts()) : the_post();?>
            <h1 class="display-5"><?php single_post_title(); ?> </strong></h1>
            <?php the_content();?>
            <?php endwhile; else: ?>
                <div class="alert alert-warning" role="alert">
                    <strong>Ups...</strong> Nothing found.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>



<?php get_footer();?>