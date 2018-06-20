<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Royale_News
 */

get_header(); ?>

<main class="main-container">
	<div class="container">
		<div class="section">
			<?php
				/* $sidebar_position = royale_news_get_option( 'royale_news_sidebar_position' );
				if( $sidebar_position == 'none' || !is_active_sidebar( 'sidebar-1' ) ) : */
					$class = '';
				// else :
					// $class = 'col-md-8';
				// endif;
				/* if( $sidebar_position == 'left' ) :
					get_sidebar();
				endif; */
			?>
			<div >
				<div class="clearfix news-section">
					<?php
                        
                        while ( have_posts() ) : the_post();
                        $current_post_id = get_the_ID();
                        $single_movie_cat = wp_get_post_terms( $current_post_id, 'movie_category');
                        $single_movie_cat_arr = array();
                        foreach($single_movie_cat as $s_m_cat){
                            $single_movie_cat_arr[] = $s_m_cat->name;
                        }
                        
                        $single_movie_lang = wp_get_post_terms( $current_post_id, 'language_category');
                        $single_movie_lang_arr = array();
                        foreach($single_movie_lang as $s_m_cat){
                            $single_movie_lang_arr[] = $s_m_cat->name;
                        }
                        
                        $movie_release_year = get_post_meta( $current_post_id, 'mov_release_year', true );
                        $movie_country = get_post_meta( $current_post_id, 'mov_country', true );
                        $movie_duration = get_post_meta( $current_post_id, 'mov_duration', true );
                        $movie_cast = get_post_meta( $current_post_id, 'mov_cast', true );

                        $movie_single_html.= '<section>'
                                            .'<div class = "single-movie_show">'
                                                .get_the_post_thumbnail($current_post_id)
                                            .'</div>'
                                            .'</br>'
                                            .'<div>'
                                                
                                                .'<div class="news-section-info clearfix"><h1 class= "section-title">'.get_the_title().'</h1></div>'
                                                .'<div class="mov-info-list">'
                                                    .'<table class="table table-bordered table-inline">'
                                                        .'<tr><th>Release Year</th><td> '.$movie_release_year.'</td></tr>'
                                                        .'<tr><th>Duration</th><td> '.$movie_duration.'</td></tr>'
                                                        .'<tr><th>Country</th><td> '.$movie_country.'</td></tr>'
                                                        .'<tr><th>Cast</th><td> '.$movie_cast.'</td></tr>'
                                                        .'<tr><th>Genres </th><td>'.implode(',', $single_movie_cat_arr).'</td></tr>'
                                                        .'<tr><th>Language </th><td>'.implode(',', $single_movie_lang_arr).'</td></tr>'
                                                    .'</table><!--mov-info-list-->'
                                                .'</div>'
                                                .'<div class="movie-content">'
                                                .get_the_content()
                                                .'</div><!--movie-content-->'
                                            .'</div>'
                                            .'</section>';
                        
                            
                          
                            echo $movie_single_html;
                            
							/**
							* Hook - royale_news_post_navigation.
							*
							* @hooked royale_news_post_navigation_action - 10
							*/
							do_action( 'royale_news_post_navigation' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.

					?>
				</div><!-- .row.clearfix.news-section -->
			</div>
			<?php
				/* if( $sidebar_position == 'right' ) :
					get_sidebar();
				endif; */
			?>
		</div><!-- .row.section -->
	</div><!-- .container -->
</main><!-- .main-container -->

<?php
get_footer();
