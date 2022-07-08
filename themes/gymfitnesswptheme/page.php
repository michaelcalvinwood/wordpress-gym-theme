<?php
    /*
        page.php is the default template for post type: pages.
        However, home.php is the template for the page representing the homepage of the blog posts
    */
?>

<?php get_header(); ?>

    <main class="container page section no-sidebars">
        <?php get_template_part('template-parts/page', 'loop'); ?>
    </main>


<?php get_footer(); ?>