<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php echo wp_head(); ?>
</head>

<body <?php body_class( 'bg-white text-gray-600 antialiased' ); ?>>

<?php do_action( 'receitasdoparaiso_theme_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'receitasdoparaiso_theme_header' ); ?>

	<header id="scrollHeader" class="w-full sticky top-0 z-40 bg-white transition-shadow duration-500">
		<?php get_template_part( 'components/navbar/index'); ?>
	</header>

	<?php $container = ! is_front_page() ? "container mx-auto" : ""; ?>

	<div id="content" class="site-content flex-grow my-8 <?php echo $container; ?>">

		<?php do_action( 'receitasdoparaiso_theme_content_start' ); ?>

		<main>
