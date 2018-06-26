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
                    <div class= "row">
					<?php
                        
                        while ( have_posts() ) : the_post();
                        $current_post_id = get_the_ID();
                        $single_videosong_cat = wp_get_post_terms( $current_post_id, 'videosong_category');
                        $single_videosong_cat_arr = array();
                        foreach($single_videosong_cat as $s_m_cat){
                            $single_videosong_cat_arr[] = $s_m_cat->name;
                        }
                        
                        $single_videosong_lang = wp_get_post_terms( $current_post_id, 'language_category');
                        $single_videosong_lang_arr = array();
                        foreach($single_videosong_lang as $s_m_cat){
                            $single_videosong_lang_arr[] = $s_m_cat->name;
                        }
                        
                        $videosong_release_year = get_post_meta( $current_post_id, 'vidsong_release_year', true );
                        $videosong_country = get_post_meta( $current_post_id, 'vidsong_country', true );
                        $videosong_duration = get_post_meta( $current_post_id, 'vidsong_duration', true );
                        $videosong_artist = get_post_meta( $current_post_id, 'vidsong_artist', true );
                        $videosong_embedded_code = get_post_meta( $current_post_id, 'vidsong_embedded_code', true );

                        $videosong_single_html.= '<section class="col-sm-8">'
                                            .'<div class = "single-videosong_show">'
                                              .'<div class="news-section-info clearfix"><h3 class= "section-title">'.get_the_title().'</h3></div>'
                                               /*  .get_the_post_thumbnail($current_post_id) */
                                               .   '<div class= "movie-frame">'.$videosong_embedded_code.'</div>'
                                            .'</div>'
                                            .'</br>'
                                            .'<div>'
                                                
                                                .'<div class="vidsong-info-list">'
                                                    .'<table class="table table-bordered table-inline">'
                                                        .'<tr><th>Release Year</th><td> '.$videosong_release_year.'</td></tr>'
                                                        .'<tr><th>Duration</th><td> '.$videosong_duration.'</td></tr>'
                                                        .'<tr><th>Country</th><td> '.$videosong_country.'</td></tr>'
                                                        .'<tr><th>Artist</th><td> '.$videosong_artist.'</td></tr>'
                                                        .'<tr><th>Genres </th><td>'.implode(',', $single_videosong_cat_arr).'</td></tr>'
                                                        .'<tr><th>Language </th><td>'.implode(',', $single_videosong_lang_arr).'</td></tr>'
                                                    .'</table><!--vidsong-info-list-->'
                                                .'</div>'
                                                .'<div class="videosong-content">'
                                                .get_the_content()
                                                .'</div><!--videosong-content-->'
                                            .'</div>'
                                            .'</section>';
                        
                                            $videosong_single_html.= '<section class="col-sm-4"><div class="news-section-info clearfix"><h3 class="section-title">Recent Songs</h3></div>';
                                            $recent_posts = wp_get_recent_posts(array(
                                                'numberposts' => 5,
                                                'post_status' => 'publish',
                                                'post_type' => 'videosong',
                                            ));
                                            
                                            $videosong_single_html.='<ul class="post-list-wrap">';
                                            if(!empty($recent_posts)){
                                                foreach( $recent_posts as $recent ){
                                                    if($recent["ID"] == $current_post_id){
                                                        continue;
                                                    }
                                                    $videosong_single_html.='<li class="post-list"><a class="recent-post-custom" href="' . get_permalink($recent["ID"]) . '">'
                                                    .'<div class="recent-post-thumb" style="background-image:url('.get_the_post_thumbnail_url($recent["ID"]).')"></div>'
                                                    .'<h5 class="recent-post-title">'.$recent["post_title"]
                                                        .'<span class="recent-post-meta">'. get_post_meta( $recent["ID"], 'vidsong_duration', true ).'</span>'
                                                    .'</h5>'
                                                    .'</a></li> ';
                                                }
                                            } else{
                                                $videosong_single_html.='<li class="post-list">No recent movie found</li> ';
                                            }
                                            
                                            $videosong_single_html.='</ul>';
                                            wp_reset_query();
                          
                            echo $videosong_single_html;
                            
							/**
							* Hook - royale_news_post_navigation.
							*
							* @hooked royale_news_post_navigation_action - 10
							*/
							do_action( 'royale_news_post_navigation' );

							// If comments are open or we have at least one comment, load up the comment template.
							/* if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif; */

						endwhile; // End of the loop.

					?>
                    </div> <!-- row -->
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
