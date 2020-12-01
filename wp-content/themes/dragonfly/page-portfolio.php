<?php
/*
 * Template Name: Portfolio page
 * Template Post Type: page
*/
 ?>

<?php get_header();?>

<div id="posts-category" class="container py-5"> 
  <div class="row mb-5">
    <div class="col-12 d-flex justify-content-center">
      <div id="galleryButtons"></div>
    </div>
  </div>

  <div id="gallery" class="row">

      <?php
          $args = array(
          'post_type' => 'portfolio',
          'post_status' => 'publish',
          'posts_per_page' => 10,
          );
          $arr_posts = new WP_Query( $args );
          if ($arr_posts->have_posts()) :
          while ($arr_posts->have_posts()) : $arr_posts->the_post()
      ?>

        <div id="parent" data-tags="<?php $term_obj_list = get_the_terms( $post->ID, 'categories' ); $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));  echo $terms_string; ?>" class="col-12 col-md-6 col-lg-4">
          <a href="<?php the_permalink() ?>" >
                <div class="card mb-6 mb-lg-0 shadow-light-lg">
                <?php if (has_post_thumbnail()):?>
                  <div class="img-overlay"></div>
                  <img class="card-img img-responsive" src="<?php the_post_thumbnail_url( 'full' ); ?>" />
                <?php endif; ?>
              <div class="card-body">
                <h3 class="text-white mb-3">
                  <?php the_title(); ?>
                </h3>
                <p class="mb-0 text-white">
                  <?php $excerpt = get_the_excerpt(); echo $excerpt?>
                </p>
              </div>
              <div class="card-meta">
                <hr class="card-meta-divider border-white-20">
                <div class="avatar avatar-sm mr-2">
                  <img class="avatar-img rounded-circle w-100" src="<?php echo get_avatar_url ( get_the_author_meta ( 'ID'), 32); ?>" alt="Avatar Image" >                   
                </div>
                <h6 class="text-uppercase text-white-80 mr-2 mb-0">
                  <?php get_author_name() ?>
                </h6>
                <p class="h6 text-uppercase text-white-80 mb-0 ml-auto">
                  <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time>
                </p>
              </div>
            </div>
            </a>
        </div>

        <?php endwhile ?>
        <?php else :?>
          <div class="col-12 text-center">
            <p class="display-2 text-center mb-5">No posts to display!</p>
            <img class="img-fluid rounded-lg" src="<?php echo get_template_directory_uri(); ?>/dist/images/No_posts_to_display.gif" alt="No posts to display" title="No posts to display"/>
          </div>
        <?php endif; wp_reset_postdata();?>
  </div>
</div>

<?php get_footer();?>