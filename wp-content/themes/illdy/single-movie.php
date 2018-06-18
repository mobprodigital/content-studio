<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
			<div class="container-fluid">
				<div class= "row">
					<div class= "col">
						<?php
						/* Start the Loop */
						 while ( have_posts() ) : the_post(); ?>
						<?php the_post_thumbnail('single-post-thumbnail'); ?>
							<h3>
						<?php	
							 echo wp_title(); ?>
							</h3>
						<?php
							 echo the_content(); 
						?>
						<?php
					// If we are in a loop we can get the post ID easily
						echo ('Release Year : ');
						echo get_post_meta( get_the_ID(), 'movie_name', true );
						echo ('</br>');
						echo ('Genres Type: ');
						echo get_post_meta( get_the_ID(), 'movie_genres', true );
						?>
					</div> <!--col -->
				</div> <!--row -->
					<?php
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

					the_post_navigation( array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
					) );

				endwhile; // End of the loop.
				?>
				
			</div> <!--container-fluid -->
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
