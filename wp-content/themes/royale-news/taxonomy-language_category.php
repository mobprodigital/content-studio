<?php
/**
 * The template for displaying archive pages
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
				<?php
					// $sidebar_position = royale_news_get_option( 'royale_news_sidebar_position' );
					// if( $sidebar_position == 'none' || !is_active_sidebar( 'sidebar-1' ) ) :
						$class = 'col-md-12';
					/* else :
						$class = 'col-md-8';
					endif;
					if( $sidebar_position == 'left' ) :
						get_sidebar();
					endif; */
				?>
				<div class="<?php echo esc_attr( $class ); ?> sticky-section">
					<div class="row clearfix news-section news-section-three">
						<div class="col-md-12">
							<?php
							if( have_posts() ) :
							?>
								<div class="news-section-info clearfix">
									<?php
										the_archive_title( '<h3 class="section-title">', '</h3>' );
									?>
								</div><!-- .news-section-info -->
								<?php

                                   

								/* Start the Loop */
                                echo '<div class="row">';
                                $video_list_html='';
                                
                                while ( have_posts() ) : the_post();

									/*
									 * Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
                                    // get_template_part( 'template-parts/content', get_post_format() );
                                    $current_post_id = get_the_ID();
                                    
                                    $single_video_cat = wp_get_post_terms( $current_post_id, 'video_category');
                                    

                                    $featured_img_url = '/wp-content/uploads/2018/06/download.png';
                                    if(has_post_thumbnail($current_post_id)){
                                        $featured_img_url = get_the_post_thumbnail_url($current_post_id);
                                    }
									
                                    $video_list_html.='<section class="filtr-item col-sm-3 archive-single-mov">'
															.'<div class="vid-arch-single-wrap">'
																.'<a href="'.get_the_permalink().'">'
                                                                    .'<div class="vid-arch-img" style="background-image:url('.$featured_img_url.')">'
                                                                        .'<div class="post-type-name-red">'.get_post_type_object(get_post_type($current_post_id))->label.'</div>'
                                                                    .'</div>'
																.'</a>'
																.'<div class="mov-arch-content">'
																	.'<h4> <a href="'.get_the_permalink().'" title="'.get_the_title().'"> '.get_the_title().'</a></h4>'
																.'</div>'
															.'</div><!--vid-arch-single-wrap-->'
														.'</section><!--col-->';
                                
                                endwhile;
                                echo $video_list_html;

                                echo '</div> <!--row-->';
							endif;
							?>
						</div>
						<?php
							/**
							* Hook - royale_news_pagination.
							*
							* @hooked royale_news_pagination_action - 10
							*/
							do_action( 'royale_news_pagination' );
						?>
					</div><!--.row.clearfix.news-section.news-section-three-->
				</div>
				<?php
					if( $sidebar_position == 'right' ) :
						get_sidebar();
					endif;
				?>
			</div><!-- .row.section -->
		</div><!-- .container -->
	</main><!-- .main-container -->

<?php
get_footer();
