<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-white text-gray-900 antialiased' ); ?>>

<?php do_action( 'receitasdoparaiso_theme_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'receitasdoparaiso_theme_header' ); ?>

	<header>
		<?php get_template_part( 'components/navbar/index'); ?>
	</header>

	<div id="content" class="site-content flex-grow">

		<?php do_action( 'receitasdoparaiso_theme_content_start' ); ?>

		<main>
