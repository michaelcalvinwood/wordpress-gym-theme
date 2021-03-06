<ul class="blog-entries">
        <?php while (have_posts() ): the_post(); ?>
            <?php 
                /*
                    Important: Only assign variables to get_ functions
                */
                $postPermalink = get_the_permalink();
                $postTitle = get_the_title();
                $postDate = get_the_time( get_option('date_format'));
                $authorId = get_the_author_meta('ID');
                $authorUrl = get_author_posts_url($authorId);
                $authorName = get_the_author_meta('display_name');
            ?>
            <li class="card gradient">
                <?php the_post_thumbnail('mediumSize'); ?>
                <?php the_category(); ?>

                <div class="card-content">
                    <a href="<?php echo $postPermalink; ?>">
                        <h3><?php echo $postTitle ?></h3>
                    </a>                
                    <p class="meta">
                        <span class="text-primary">By: </span>
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