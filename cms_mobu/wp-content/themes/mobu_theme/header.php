<?php

/**
 *
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <header>
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MobuTheme
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge, chrome=1" />

	<title>
		<?php
		wp_title('');
		bloginfo('name');
		bloginfo('description');
		?>
	</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>">

	<?php wp_head(); ?>

</head>

<body>

	<?php get_template_part('navbar'); ?>
