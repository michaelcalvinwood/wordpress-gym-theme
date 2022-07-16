<?php 
    // load header-front.php (not header.php)
    get_header('front'); 
?>

    <?php while(have_posts()): the_post(); ?>

        <section class="welcome text-center section">
            <h2 class="text-primary">
                <?php the_field('welcome_heading'); ?>
            </h2>
            <p>
                <?php the_field('welcome_text'); ?>
            </p>
        </section>

        <section class="section-areas">
            <ul class="areas-container">
                <?php for ($i = 1; $i <= 4; ++$i): ?>

                <li class="area">
                    <?php
                        $area = get_field("area_$i"); 
                        $image = wp_get_attachment_image_src($area['area_image'], 'mediumSize')[0];
                    ?>
                    <img src="<?php echo $image; ?>" />
                    <p><?php echo $area['area_name'] ?></p>
                </li>

                <?php endfor; ?>
            </ul>
        </section>

        <section class="classes-homepage">
            <div class="container section">
                <h2 class="text-primary text-center">
                    Our Classes
                </h2>
                <?php mcwGymFitnessClassesList(4); ?>

                <div class="button-container">
                    <a class="button" href="<?php echo get_permalink( get_page_by_title('Classes')); ?>" >
                        View All Classes
                    </a>
                </div>
            </div>
        </section>

        <section class="instructors">
            <div class="container section">
                <h2 class="text-center">
                    Our Instructors
                </h2>
                <p class="text-center">
                    Professional instructors that will help you achieve your goals.
                </p>

                <?php mcsGymFitnessInstructorsList(); ?>
            </div>
        </section>

    <?php endwhile; ?>

<?php get_footer(); ?>