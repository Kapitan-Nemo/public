# Dragonfly
Main purpose of this project was to build clean and modern WordPress portfolio theme, and also get new decent job.

Dragonfly theme use: 
- Gulp
- Sass
- Bootstrap | ver 4.5.2
- jQuery | ver 3.5.1
- Advance Custom Fields | ver 5.9.1
- Contact form 7 | ver 5.2.2

Core functions:
- Minification with Gulp: | .scss | .js | .png | .gif | .jpg | files (from folders src => dist)
- Browsersync 

Scripts:
- Skip link focus fix
- Smooth back to top scroll
- Navigation transition (black fade)
- Contact form 7 alert events 
- Filtering gallery buttons

Changes from functions.php:
- Deregister standard WP jQuery and register new one
- Enqueue scripts and styles
- Custom Navigation Walker for Bootstrap
- Filter excrept length to 35 words / Remove [...] from excerpt
- Custom Post Type / Custom taxonomy ( Separate categories for portfolio and posts )
- Contact Form 7 remove p tags from form
- Disable standard editor and Gutenberg for the homepage

Testing on local development environment with:
 - Local by flywheel | ver 5.7.4
 - Server | Nginx
 - PHP | ver 7.3.5
 - Database MySQL | ver 8.0.16
 - WordPress | ver 5.5.1
 
 Settings & Info: 
 - Domain name | portfolio.local
 - MySQL file inside folder Database (need to import!)
 - WP Login Name | Silent
 - WP Password | Anathema
 - Folder dev-gulp is without node_modules! (need to download!)
 - To run minification and browsersync | go into folder => dev-gulp | run "gulp watch"
