<?php
/*
 * Template Name: Home page
 * Template Post Type: page
*/
 ?>

<?php get_header();?>

<main id="main">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 order-1 order-md-2 col-12 p-0">
        <img class="img-fluid vh-100 w-100" <?php awesome_acf_responsive_image(get_field( 'main_image' ),'thumb-1000','1000px'); ?>  alt="Xirnaul" /> 
      </div>
      <div class="col-md-6 order-2 order-md-1 col-12 p-0 my-auto">
        <?php $mainTitle = get_field( "main_title" );
          if( $mainTitle ) {
              echo '<h1 class="display-2 font-weight-lighter text-center mt-md-0 mt-4">' . $mainTitle . '</h1>';
          } else {
              echo '<h1 class="display-2 font-weight-lighter text-center mt-md-0 mt-4">' . 'Enter Main Title' . '</h1>';
          } 
        ?>
        <hr class="my-2 w-100"> 
        <?php $subTitle = get_field( "sub_title" );
          if( $subTitle ) {
              echo '<p class="text-lead text-center mb-0">' . $subTitle . '</p>';
          } else {
              echo '<p class="text-lead text-center mb-0">' . 'Enter Subtitle.' . '</p>';
          } 
        ?>  
      </div>
    </div>
  </div>
</main>
 
<?php wp_footer();?>