<?php get_header(); ?>

<div class="container mx-auto">

	<h1>Receitas</h1>

	<?php
	    $category = get_query_var('categoria');

		$terms = get_terms(
			array(
				'taxonomy'   => 'categoria',
			)
		);

		if ( ! empty( $terms ) && is_array( $terms ) ) { ?>
			<div class="collapse collapse-plus border border-neutral-50">
				<input type="checkbox" /> 
				<div class="collapse-title text-xl font-medium flex gap-2 items-center">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg>
					Filtrar
				</div>
				<div class="collapse-content"> 
					<div class="flex gap-2 flex-wrap"> 
						<?php foreach ( $terms as $term ) { ?>
								<a href="<?php echo esc_url( get_term_link( $term ) ) ?>">
									<span class="badge <?php echo ($term->name === $category) ? 'bg-primary/10' : ''; ?>">
										<?php echo $term->name; ?>
									</span>
								</a>
						<?php } ?>
					</div> 
				</div>
			</div>
		<?php 
		} 
	?>

	<?php if ( have_posts() ) : ?>

		<div class="grid grid-flow-row gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/receitas', get_post_format() ); ?>

			<?php endwhile; ?>
		</div>

	<?php endif; ?>

	<?php storefront_paging_nav(); ?>

</div>

<?php get_footer(); ?>
