<?php

    /*
        home.php is index (home) page of the blog. 
        In settings->reading we set the Blogs page to be the Posts Page. 
        Therefore, home.php is the template that will be loaded for the Blogs page.
        In other words, this is the home page for all the Posts (post-type posts).
        This is where users are going to know which posts exist and be able to select them.
    */

    get_header();
?>

<main class="container page section">
    <?php get_template_part('template-parts/blog', 'loop'); ?>
</main>

<?php get_footer(); ?>