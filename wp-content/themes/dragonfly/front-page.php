<?php
/*
 * Template Name: Strona główna
 * Template Post Type: page
*/
 ?>

<?php get_header();?>

<main id="main">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 order-2 order-md-1 col-12 my-auto">
        <?php $mainTitle = get_field( "main_title" );
          if( $mainTitle ) {
              echo '<h1 class="display-2 font-weight-lighter text-center mt-md-0 mt-4">' . $mainTitle . '</h1>';
          } else {
              echo '<h1 class="display-2 font-weight-lighter text-center mt-md-0 mt-4">' . 'Dominika Bratek' . '</h1>';
          } 
        ?>
        <hr class="my-2 w-100"> 
        <?php $subTitle = get_field( "sub_title" );
          if( $subTitle ) {
              echo '<p class="text-lead text-center mb-0">' . $subTitle . '</p>';
          } else {
              echo '<p class="text-lead text-center mb-0">' . 'Dead tired all the time.' . '</p>';
          } 
        ?>   
      </div>
      <div class="col-md-6 order-1 order-md-2 col-12 p-0 pr-md-0">
      <?php 
          $main_Image = get_field('main_image');
          if( !empty($main_Image) ): ?>
	        <img class="img-fluid vh-101 w-100 mt-n6" src="<?php echo $main_Image['url']; ?>" alt="<?php echo $main_Image['alt']; ?>" />
      <?php endif; ?>
      </div>
    </div>
  </div>
</main>
 


<?php wp_footer();?>