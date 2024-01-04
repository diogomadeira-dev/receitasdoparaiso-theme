<?php get_header(); ?>

<div class="container mx-auto">

	<h1>Receitas</h1>

	<?php get_template_part( 'template-parts/receitas/category-filter' ); ?>

	<?php if ( have_posts() ) : ?>

		<div class="grid grid-flow-row gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/receitas', get_post_format() ); ?>

			<?php endwhile; ?>
		</div>

	<?php endif; ?>

	<?php storefront_paging_nav(); ?>

	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3405549652085163"
		crossorigin="anonymous"></script>
	<!-- bloco -->
	<ins class="adsbygoogle"
		style="display:block"
		data-ad-client="ca-pub-3405549652085163"
		data-ad-slot="3076912833"
		data-ad-format="auto"
		data-full-width-responsive="true"></ins>
	<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
	</script>

</div>

<?php get_footer(); ?>
