<?php
/*
 * Template Name: Contact
 * Template Post Type: page
*/
 ?>

<?php
if (is_page('contact')) { 
    if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
        wpcf7_enqueue_scripts();
    }
  
    if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
        wpcf7_enqueue_styles();
    }
}
?>

<?php get_header();?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 order-1 order-md-1 col-12 p-0">
            <img class="img-fluid w-100 vh-100"" <?php awesome_acf_responsive_image(get_field( 'contact_image' ),'thumb-1000','1000px'); ?>  alt="Xirnaul" /> 
        </div>
        <div class="col-md-6 order-2 order-md-1 col-12 text-center">
            <h2 class="display-4 font-weight-200 mt-3 mt-md-0 mb-5">Write to me.</h2>
            <?php echo do_shortcode( '[contact-form-7 id="102" title="Contact form"]' ); ?>
        </div>
    </div>
</div>

<?php get_footer();?>