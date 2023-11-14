<?php get_header(); ?>

	<div class="">

	<?php if ( have_posts() ) : ?>

		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<?php get_template_part( 'template-parts/receitas/content', 'single' ); ?>

		<?php endwhile; ?>

	<?php endif; ?>

	</div>

<?php
get_footer();
