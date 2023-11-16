<?php get_header(); ?>

<div class="">

	<h1>Receitas</h1>

	<?php if ( have_posts() ) : ?>

		<div class="grid grid-flow-row gap-8 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/receitas', get_post_format() ); ?>

			<?php endwhile; ?>
		</div>

	<?php endif; ?>

	<?php

    storefront_paging_nav( array(
		'mid_size'  => 2,
		'prev_text' => __( 'Anterior', 'textdomain' ),
		'next_text' => __( 'Seguinte', 'textdomain' ),
	) );

	?>

</div>

<?php get_footer(); ?>
