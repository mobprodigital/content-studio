<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php $args=array( 
				'post_type' => 'movie', //set the post_type to use.
				'taxonomy' => 'movie_categories', // set the taxonomy to use.
				'term' => 'php', //set which term to use. 
				'posts_per_page' => 10  // how many posts or comment out for all.       
				);

				$movieloop = new WP_Query($args);
				if($movieloop->have_posts()) : while($movieloop->have_posts()) :
				$movieloop->the_post();

				get_template_part( 'content' ); //or whatever method your theme uses for displaying content. 

				endwhile; endif; //end the custom post_type loop

			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
