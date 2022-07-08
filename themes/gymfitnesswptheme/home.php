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
    <ul class="blog-entries">
        <?php while (have_posts() ): the_post(); ?>
            <?php 
                $postThumbnail = the_post_thumbnail('mediumSize');
                $postPermalink = get_the_permalink();
                $postTitle = get_the_title();
                $postDate = get_the_time( get_option('date_format'));
                $authorId = get_the_author_meta('ID');
                $authorUrl = get_author_posts_url($authorId);
                $authorName = get_the_author_meta('display_name');
            ?>
            <li class="card gradient">
                <?php $postThumbnail ?>
                <div class="card-content">
                    <a href="<?php echo $postPermalink; ?>">
                        <h3><?php echo $postTitle ?></h3>
                    </a>
                    <p class="meta">
                        <span>By: </span>
                        <a href="<?php echo $authorUrl?>">
                            <?php echo $authorName ?>
                        </a>
                    </p>
                    <p class="date-published meta">
                        <span>Date: </span>
                        <?php echo $postDate ?>
                    </p>
                </div>
            </li>
        <?php endwhile; ?>
    </ul>
</main>

<?php get_footer(); ?>