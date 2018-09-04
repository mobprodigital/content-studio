<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Royale_News
 */

?>
<div class="col-md-12" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="single-news-content">
		
		<div class="news-detail clearfix">
			<div class="news-content">
				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'royale-news' ),
						'after'  => '</div>',
					) );					
				?>
			</div><!-- .news-content -->
			<?php if ( get_edit_post_link() ) : ?>
				<footer class="entry-footer">
					<?php
						edit_post_link(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Edit <span class="screen-reader-text">%s</span>', 'royale-news' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								get_the_title()
							),
							'<span class="edit-link">',
							'</span>'
						);
					?>
				</footer><!-- .entry-footer -->
			<?php endif; ?>							        
		</div><!-- .news-detail.clearfix -->
	</div><!-- .single-news-content -->
</div><!-- #post-<?php the_ID(); ?> -->
