<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Smooth_Step
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'sstep' ); ?></a>

	<div id="masthead" class="flex justify-between fixed w-full z-20 px-10 py-5">
		<a href="<?php echo home_url( '/' ) ?>">
			<img class="h-12" src="<?php echo get_template_directory_uri() ?>/assets/img/logo.svg">
		</a>
		<nav id="site-navigation" class="items-center hidden md:flex">
			<?php $nav = get_field('navigation', 'option'); ?>
			<ul class="flex space-x-14">
      	<?php foreach ($nav as $key => $item): ?>
      		<li class="whitespace-nowrap">
            <a class="text-lg text-white font-medium" href="<?php echo $item['link']['url'] ?>">
            	<?php echo $item['link']['title'] ?>
            </a>
          </li>	
      	<?php endforeach ?>	
      </ul>
		</nav><!-- #site-navigation -->
	</div><!-- #masthead -->
