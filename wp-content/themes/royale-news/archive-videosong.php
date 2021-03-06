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

                                    $vidsong_category = get_terms( array(
                                        'taxonomy' => 'videosong_category',
                                        'hide_empty' => true,
                                    ) );
                                    $vidsong_cat_html = '<ul class="filters-filteringModeMulti filter-btns filters">';
                                    /* $vidsong_cat_html.='<li><button type="button" class="filtr-button filtr" data-filter="all">All</button></li>'; */
                                    foreach($vidsong_category as $current_cat){
                                        $vidsong_cat_html.='<li><label><input type="checkbox"  value=".'.$current_cat->slug.'" class="filtr-button filter-check filtr" /><span class="fancy-filter">'.$current_cat->name.'</span></label></li>';
                                    }
                                    $vidsong_cat_html.='</ul>';

                                    echo $vidsong_cat_html;

								/* Start the Loop */
                                echo '<div id="filter-container" class="row filtr-container-videosong filteringModeMulti">';
                                $videosong_list_html='';
                                
                                while ( have_posts() ) : the_post();

									/*
									 * Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
                                    // get_template_part( 'template-parts/content', get_post_format() );
                                    $current_post_id = get_the_ID();
                                    
                                    $single_videosong_cat = wp_get_post_terms( $current_post_id, 'videosong_category');
                                    $single_videosong_cat_arr = array();
                                    foreach($single_videosong_cat as $s_m_cat){
                                        $single_videosong_cat_arr[] = $s_m_cat->slug;
                                    }

                                    $featured_img_url = '/wp-content/uploads/2018/06/download.png';
                                    if(has_post_thumbnail($current_post_id)){
                                        $featured_img_url = get_the_post_thumbnail_url($current_post_id);
                                    }
									$videosong_release_year = get_post_meta( $current_post_id, 'vidsong_release_year', true );
									$vidsong_album = get_post_meta( $current_post_id, 'vidsong_album', true );
                                    $videosong_country = get_post_meta( $current_post_id, 'vidsong_country', true );
                                    $videosong_list_html.='<section class="filtr-item col-sm-3 mix '.implode(' ', $single_videosong_cat_arr).' archive-single-vidsong">'
															.'<div class="vidsong-arch-single-wrap">'
																.'<a href="'.get_the_permalink().'">'
																	.'<div class="vidsong-arch-img" style="background-image:url('.$featured_img_url.')"></div>'
																.'</a>'
																.'<div class="mov-arch-content">'
																	.'<h4><a href="'.get_the_permalink().'" title="'.get_the_title().'">'.get_the_title().'</h4>'
																	.'<div class="vidsong-extra-info-text">'.$videosong_release_year.', '.$videosong_country.'</div>'
																	.'<div class="vidsong-extra-info-text">'.implode(',', $single_videosong_cat_arr).'</div>'
																.'</div>'
															.'</div><!--vidsong-arch-single-wrap-->'
														.'</section><!--col-->';
                                
                                endwhile;
                                echo $videosong_list_html;

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
