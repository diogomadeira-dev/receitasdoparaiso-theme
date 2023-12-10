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

			<div class="flex justify-start items-center">
				<button class="btn btn-ghost" onclick="recipe_category_filter.showModal()">
					<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#383837" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-list-filter"><path d="M3 6h18"/><path d="M7 12h10"/><path d="M10 18h4"/></svg>
					Filtrar
				</button>

				<?php if ( $category ) : ?>
					<span class="badge bg-primary/10">
						<?php echo $category; ?>
					</span>

					<a href="/receitas"><button class="btn btn-link no-underline text-xs text-accent tracking-tight">Limpar filtros</button></a>
				<?php endif; ?>
			</div>

			<dialog id="recipe_category_filter" class="modal modal-bottom sm:modal-middle">

			<div class="modal-box">
				<h2 class="text-lg pb-6">Filtrar categoria</h2>
				
				<div class="flex gap-2 flex-wrap"> 
					<?php foreach ( $terms as $term ) { ?>
							<a href="<?php echo esc_url( get_term_link( $term ) ) ?>">
								<span class="badge py-4 <?php echo ($term->name === $category) ? 'bg-primary/10' : ''; ?>">
									<?php echo $term->name; ?>
								</span>
							</a>	
					<?php } ?>
				</div> 

				<div class="modal-action py-12">
					<form method="dialog">
						<button class="btn">Fechar</button>
					</form>
				</div>
			</div>
			</dialog>


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
