<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Smooth_Step
 */

get_header();
?>
	
<main id="primary" class="site-main">
<?php
while ( have_posts() ) :
	the_post();
	include get_template_directory() . '/template-parts/single.php'; 
endwhile; // End of the loop.
?>
</main><!-- #main -->

<?php
get_footer();
