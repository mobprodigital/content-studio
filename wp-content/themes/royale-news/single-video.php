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
					<div class="row">
					<?php
                        
                        while ( have_posts() ) : the_post();
                        $current_post_id = get_the_ID();
                        $single_video_cat = wp_get_post_terms( $current_post_id, 'video_category');
                        $single_video_cat_arr = array();
                        foreach($single_video_cat as $s_m_cat){
                            $single_video_cat_arr[] = $s_m_cat->name;
                        }
                        
                        $single_video_lang = wp_get_post_terms( $current_post_id, 'language_category');
                        $single_video_lang_arr = array();
                        foreach($single_video_lang as $s_m_cat){
                            $single_video_lang_arr[] = $s_m_cat->name;
                        }
                        $video_release_year = get_post_meta( $current_post_id, 'vid_release_year', true );
                        $video_duration = get_post_meta( $current_post_id, 'vid_duration', true );
                        $video_embedded_code = get_post_meta( $current_post_id, 'vid_embedded_code', true );

                        
                        $video_single_html.= '<section class="col-sm-8">'
                                            .'<div class = "single-video_show">'
                                              .'<div class="news-section-info clearfix"><h3 class= "section-title">'.get_the_title().'</h3></div>'
                                               /*  .get_the_post_thumbnail($current_post_id) */
                                               .   '<div class= "movie-frame">'.$video_embedded_code.'</div>'
                                            .'</div>'
                                            .'</br>'
                                            .'<div>'
                                                .'<div class="vid-info-list">'
                                                    .'<table class="table table-bordered table-inline">'
                                                        .'<tr><th>Release Year</th><td> '.$video_release_year.'</td></tr>'
                                                        .'<tr><th>Duration</th><td> '.$video_duration.'</td></tr>'
                                                        .'<tr><th>Genres </th><td>'.implode(',', $single_video_cat_arr).'</td></tr>'
                                                        .'<tr><th>Language </th><td>'.implode(',', $single_video_lang_arr).'</td></tr>'
                                                    .'</table><!--vid-info-list-->'
                                                .'</div>'
                                                .'<div class="video-content">'
                                                .get_the_content()
                                                .'</div><!--video-content-->'
                                            .'</div>'
											.'</section>';
											
											$video_single_html.= '<section class="col-sm-4"><div class="news-section-info clearfix"><h3 class="section-title">Recent Video</h3></div>';
                                            $recent_posts = wp_get_recent_posts(array(
                                                'numberposts' => 5,
                                                'post_status' => 'publish',
                                                'post_type' => 'video',
                                            ));
                                            
                                            $video_single_html.='<ul class="post-list-wrap">';
                                            if(!empty($recent_posts)){
                                                foreach( $recent_posts as $recent ){
                                                    if($recent["ID"] == $current_post_id){
                                                        continue;
                                                    }
                                                    $video_single_html.='<li class="post-list"><a class="recent-post-custom" href="' . get_permalink($recent["ID"]) . '">'
                                                    .'<div class="recent-post-thumb" style="background-image:url('.get_the_post_thumbnail_url($recent["ID"]).')"></div>'
                                                    .'<h5 class="recent-post-title">'.$recent["post_title"]
                                                        .'<span class="recent-post-meta">'. get_post_meta( $recent["ID"], 'vid_duration', true ).'</span>'
                                                    .'</h5>'
                                                    .'</a></li> ';
                                                }
                                            } else{
                                                $video_single_html.='<li class="post-list">No recent movie found</li> ';
                                            }
                                            
                                            $video_single_html.='</ul>';
                                            wp_reset_query();
                                                
                                                $video_single_html.='</section>';



                            echo $video_single_html;
                            
							/**
							* Hook - royale_news_post_navigation.
							*
							* @hooked royale_news_post_navigation_action - 10
							*/
							do_action( 'royale_news_post_navigation' );

							// If comments are open or we have at least one comment, load up the comment template.
						/* 	if ( comments_open() || get_comments_number() ) :
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
