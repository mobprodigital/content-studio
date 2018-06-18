<?php
/**
 * The template for displaying archive pages
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

	<?php if ( have_posts() ) : ?>
		<header class="container text-center">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				//the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header><!-- .page-header -->
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container-fluid">
		<?php

			$args = array (
				'post_type' => 'kids'
			);

			$the_query = new WP_Query($args);

		if ( $the_query->have_posts() ) : ?>
		
			<div class="row">
			<?php
			/* Start the Loop */
			while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							
						<div class="col">
							<figure><?php the_post_thumbnail('thumbnail'); ?></figure>
							<?php echo '<h5>'.the_title(). '</h5>'; ?>
						</div> <!--col-->
					
			

			 <?php 
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				// get_template_part( 'template-parts/post/content', get_post_format() );
		endwhile;
     
			the_posts_pagination( array(
				'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
			) );
?>
			</div><!--row-->




		
	</div><!--container-fluid-->


<?php
		else :

			get_template_part( 'template-parts/post/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();