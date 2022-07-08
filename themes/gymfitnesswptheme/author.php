<?php get_header(); ?>

<main class="container page section">
    <?php 
        $author = get_queried_object();
        $authorName = $author->data->display_name;
        $authorId = $author->data->ID;
        $authorDescription = get_the_author_meta('description', $authorId);
    ?>
    <h2 class="text-center primary-text">
        Author: <?php echo $authorName; ?>
    </h2>
    <p class="text-center">
        <?php echo $authorDescription; ?>
    </p>
    <?php get_template_part('template-parts/blog', 'loop'); ?>
</main>

<?php get_footer(); ?>