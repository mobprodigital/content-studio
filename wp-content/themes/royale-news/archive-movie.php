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

                                    $mov_category = get_terms( array(
                                        'taxonomy' => 'movie_category',
                                        'hide_empty' => true,
                                    ) );
                                    $mov_cat_html = '<ul class="filters-filteringModeMulti filter-btns filters">';
                                    // $mov_cat_html.='<li class="filtr-active"><button value="all" type="button" class="filtr-button filtr" >All</button></li>';
                                    foreach($mov_category as $current_cat){
                                        $mov_cat_html.='<li><label><input type="checkbox"  value=".'.$current_cat->slug.'" class="filtr-button filter-check filtr" /><span class="fancy-filter">'.$current_cat->name.'</span></label></li>';
                                    }
                                    $mov_cat_html.='</ul>';

                                    echo $mov_cat_html;

								/* Start the Loop */
                                echo '<div id="filter-container" class="row filtr-container-movie filteringModeMulti">';
                                $movie_list_html='';
                                
                                while ( have_posts() ) : the_post();

									/*
									 * Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
                                    // get_template_part( 'template-parts/content', get_post_format() );
                                    $current_post_id = get_the_ID();
                                    
                                    $single_movie_cat = wp_get_post_terms( $current_post_id, 'movie_category');
                                    $single_movie_cat_arr = array();
                                    foreach($single_movie_cat as $s_m_cat){
                                        $single_movie_cat_arr[] = $s_m_cat->slug;
                                    }

                                    $featured_img_url = '/wp-content/uploads/2018/06/download.png';
                                    if(has_post_thumbnail($current_post_id)){
                                        $featured_img_url = get_the_post_thumbnail_url($current_post_id);
                                    }
                                    $movie_release_year = get_post_meta( $current_post_id, 'mov_release_year', true );
                                    $movie_country = get_post_meta( $current_post_id, 'mov_country', true );
                                    $movie_list_html.='<section class="col-sm-3 archive-single-mov mix '.implode(' ', $single_movie_cat_arr).'">'
                                                        .'<div class="mov-arch-single-wrap">'
                                                            .'<a href="'.get_the_permalink().'">'
                                                                .'<div class="mov-arch-img" style="background-image:url('.$featured_img_url.')"></div>'
                                                            .'</a>'
                                                            .'<div class="mov-arch-content">'
                                                                .'<h4 class="news-title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>'
                                                                .'<div class="mov-extra-info-text">'.$movie_release_year.', '.$movie_country.'</div>'
                                                                .'<div class="mov-extra-info-text">'.implode(',', $single_movie_cat_arr).'</div>'
                                                            .'</div>'
                                                        .'</div><!--mov-arch-single-wrap-->'
                                                    .'</section><!--col-->';
                                
                                endwhile;
                                echo $movie_list_html;

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
