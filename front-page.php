<?php get_header(); ?>

<div class="container mx-auto my-8">

    <?php if ( is_front_page() ) { ?>
        <?php get_template_part( 'template-parts/home/index'); ?>
    <?php } ?>

</div>

<?php get_footer(); ?>
