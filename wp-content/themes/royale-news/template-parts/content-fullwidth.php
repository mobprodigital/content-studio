<?php /* Template Name: Full width */ ?>
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
 * @package Royale_News
 */

	get_header(); 
?>
<main class="main-container">
	<div class="container">
		<div class="row section">
			<div class="<?php echo esc_attr( $class ); ?> sticky-section">
				<div class="row clearfix news-section">
					<?php
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content', 'page' );
						endwhile; // End of the loop.

					?>
				</div><!-- .row.clearfix.news-section -->
			</div>
		</div><!-- .row.section -->
	</div><!-- .container -->
</main><!-- .main-container -->
<?php
get_footer();
