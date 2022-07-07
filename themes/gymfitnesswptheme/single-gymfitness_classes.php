<?php
/*
    We created our own post type (gymfitness_classes).
    Templates can target individual post types using the naming convention: single-{post-type}.php
    Hence, we are targetting our custom post type here: single-gymfitness_classes.php

    IMPORTANT: If your file is not being loaded, go to settings->permalink and click Save Changes two times.
    This should reset the page hierarchy.
    You can do this anytime you register a new template file but Wordpress does not pick it up.
*/
?>

<?php get_header(); ?>

<main class="container page section with-sidebar">
        <div class="page-content">
            <?php get_template_part('template-parts/page', 'loop'); ?>
        </div>
        
            <?php get_sidebar(); ?>
    </main>

<?php get_footer(); ?>