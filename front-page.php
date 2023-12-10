<?php get_header(); ?>

<div class="site-main">

    <?php if ( is_front_page() ) { ?>
        <?php get_template_part( 'template-parts/home/hero-section'); ?>
    <?php } ?>

    <?php if ( is_front_page() ) { ?>
        <?php get_template_part( 'template-parts/home/stats'); ?>
    <?php } ?>

    <?php if ( is_front_page() ) { ?>
        <?php get_template_part( 'template-parts/home/about'); ?>
    <?php } ?>

    <?php if ( is_front_page() ) { ?>
        <?php get_template_part( 'template-parts/home/christmas-recipes'); ?>
    <?php } ?>

    <?php if ( is_front_page() ) { ?>
        <?php get_template_part( 'template-parts/home/recipes'); ?>
    <?php } ?>

    <?php if ( is_front_page() ) { ?>
        <?php get_template_part( 'template-parts/home/products'); ?>
    <?php } ?>

    <?php if ( is_front_page() ) { ?>
        <?php get_template_part( 'template-parts/home/testimonials'); ?>
    <?php } ?>

</div>

<?php get_footer(); ?>
