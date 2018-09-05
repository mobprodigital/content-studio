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
								
								<?php

                                    $vid_category = get_terms( array(
                                        'taxonomy' => 'video_category',
                                        'hide_empty' => true,
                                    ) );

                                    $parent_cat_id = get_queried_object()->term_id;

                                    $vid_cat_html = '<ul class="filters-filteringModeMulti filter-btns filters">';
/*                                     $vid_cat_html.='<li><button type="button" class="filtr-button filtr" data-filter="all">All</button></li>'; */
                                    foreach($vid_category as $current_cat){
                                        if($current_cat->parent == $parent_cat_id){
											$vid_cat_html.='<li><label><input type="checkbox"  value=".'.$current_cat->slug.'" class="filtr-button filter-check filtr" /><span class="fancy-filter">'.$current_cat->name.'</span></label></li>';
										}
                                    }
                                    $vid_cat_html.='</ul>';

                                    echo $vid_cat_html;

								/* Start the Loop */
                                echo '<div id="filter-container" class="row filtr-container-video filteringModeMulti">';
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
                                    $single_video_cat_arr = array();
                                    foreach($single_video_cat as $s_m_cat){
                                        $single_video_cat_arr[] = $s_m_cat->slug;
                                    }

                                    $featured_img_url = '/wp-content/uploads/2018/06/download.png';
                                    if(has_post_thumbnail($current_post_id)){
                                        $featured_img_url = get_the_post_thumbnail_url($current_post_id);
                                    }
									$vid_album = get_post_meta( $current_post_id, 'vid_album', true );
                                    /* $video_country = get_post_meta( $current_post_id, 'vid_country', true ); */
                                    $video_list_html.='<section class=" filtr-item mix '.implode(' ', $single_video_cat_arr).' col-sm-3 archive-single-vid">'
															.'<div class="vid-arch-single-wrap">'
																.'<a href="'.get_the_permalink().'">'
																	.'<div class="vid-arch-img" style="background-image:url('.$featured_img_url.')"></div>'
																.'</a>'
																.'<div class="mov-arch-content">'
																	.'<h4> <a title="'.get_the_title().'" href="'.get_the_permalink().'">'.get_the_title().'</a></h4>'
																	.'<div class="vid-extra-info-text">'.$video_release_year.' </div>'
																	.'<div class="vid-extra-info-text">'.implode(',', $single_video_cat_arr).'</div>'
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
