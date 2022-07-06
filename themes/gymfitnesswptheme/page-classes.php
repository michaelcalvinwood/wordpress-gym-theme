<?php
/*
    This is the template for the page with the slug 'classes' hence the name 'page-classes.php' (page-{slug}.php)
*/
?>
<?php get_header();?>

    <main class="container page section classes-index">
       <?php
         mcwGymFitnessClassesList();
       ?>
    </main>


<?php get_footer(); ?>

?>