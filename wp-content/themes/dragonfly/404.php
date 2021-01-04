<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 */

get_header(); ?>

<div id="content" role="main">
    <img class="vh-error-page vw-100" src="<?php echo get_template_directory_uri(); ?>/dist/images/Page_not_found_404.gif" alt="Page not found 404" title="Page not found 404"/>
    <p class="display-2 w-100 img-text-center text-center text-white">404! Page not found! </p>
</div>

<?php get_footer(); ?>