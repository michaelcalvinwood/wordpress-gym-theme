<?php while (have_posts() ): the_post(); ?>
    <h1 class="text-center text-primary"><?php the_title(); ?></h1>

        
        <?php // If image exists then display it
            if(has_post_thumbnail()):
                the_post_thumbnail('blog', ['class' => 'featured-image']);
            endif;
        ?>

        <?php // If the current post type is gymfitness_classes then display the class time
            if(get_post_type() === 'gymfitness_classes'):
                $start_time = get_field('start_time');
                $end_time = get_field('end_time');
                ?>
                <p class="content-class">
                    <?php echo the_field('class_days') . " -  " .  $start_time . " to " . $end_time ?>
                </p>
            <?php endif;?>
        <?php the_content(); ?>
            
<?php endwhile; ?>