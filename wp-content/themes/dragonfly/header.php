<!DOCTYPE html>
<html lang="pl">
    <head>    
        <meta charset="utf-8">  
        <meta http-equiv="X-UA-Compatible" content="IE=edge">  
        <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" /> 
        <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
        <link rel="manifest" href="site.webmanifest">
        <?php wp_head();?> 
    </head>
<header>
    <nav class="navbar sticky-top">
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-container" aria-controls="navbar-container" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar top-bar"></span>
                <span class="icon-bar middle-bar"></span>
                <span class="icon-bar bottom-bar"></span>				
            </button>
                <?php
                    wp_nav_menu( array(
                        'theme_location'    => 'primary',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse no-transition',
                        'container_id'      => 'navbar-container',
                        'menu_class'        => 'nav navbar-nav',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker(),
                    ) );
                ?>

    </nav>
</header>

<body <?php body_class();?>>

