<?php get_header();?>
<div id="posts-category" class="container py-5"> 
    <div id="gallery" class="row mx-auto">
        <p class="display-4 mb-5 mx-auto">Category: 
            <?php
                $terms = get_the_terms( $post->ID , 'categories' );
                if ( $terms != null ) {
                    foreach( $terms as $term ) {
                        $term_link = get_term_link( $term, 'categories' );
                        echo $term->name;
                        unset($term); 
                    } 
                } 
            ?>
        </h2>

        <?php 
            $terms = wp_get_post_terms( $post->ID, 'categories'); 
            $terms_ids = [];
            foreach ( $terms as $term ) {
                $terms_ids[] = $term->term_id;
            }

            $args = array(
                'post_type' => 'portfolio',
                'tax_query' => array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'categories',
                        'field'    => 'term_id',
                        'terms'    => $terms_ids
                    )
                ),
            );

            $query = new WP_Query($args);
            if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post() 
        ?>

        <a href="<?php the_permalink() ?>" >
            <?php if (has_post_thumbnail()):?>
              <div style="background-image: url( <?php the_post_thumbnail_url('large'); ?>);" class="card mb-6 mb-lg-0 pt-14 overlay overlay-black overlay-30 bg-cover shadow-light-lg">
            <?php endif; ?>
              <div class="card-body mt-auto">
                <h3 class="text-white">
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