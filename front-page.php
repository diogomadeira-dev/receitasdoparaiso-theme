<?php get_header(); ?>

<div class="">

    <?php if ( is_front_page() ) { ?>
        <?php get_template_part( 'template-parts/home/index'); ?>
    <?php } ?>

    <?php if ( is_front_page() ) { ?>
        <?php get_template_part( 'template-parts/home/about'); ?>
    <?php } ?>

    <?php if ( is_front_page() ) { ?>
        <?php get_template_part( 'template-parts/home/testimonials'); ?>
    <?php } ?>

</div>

<?php get_footer(); ?>
