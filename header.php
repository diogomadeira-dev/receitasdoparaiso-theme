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

	<header class="w-full border-b border-grey sticky top-0 z-50 bg-white">
		<?php get_template_part( 'components/navbar/index'); ?>
	</header>

	<div id="content" class="site-content flex-grow container mx-auto my-8">

		<?php do_action( 'receitasdoparaiso_theme_content_start' ); ?>

		<main>
