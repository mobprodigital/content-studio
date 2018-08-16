<?php /* Template Name: Home Page Custom */ ?>
<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Royale_News
 */

	get_header(); 


?>

<?php 

		$all_post_arr = array();

		 $post_types = get_post_types(array(
			'public'   => true,
			'_builtin' => false
			));
			
			if(count($post_types) > 0){
				foreach($post_types as $po){
					$movies_posts = new WP_Query( array(
						'post_type'=> $po,
						'posts_per_page'=>4,
						));

						$all_post_arr[$po] = array();
						
						if($movies_posts->have_posts() ) : while ( $movies_posts->have_posts() ) : $movies_posts->the_post(); 
							
						$single_post_array = array(
								'title' => get_the_title(),
								'thumbnail_url' => get_the_post_thumbnail_url(),
								'permalink' => get_the_permalink(),
								'duration' => get_post_meta(get_the_ID(), ($po == 'movie' ? 'mov_duration' : ($po== 'video' ? 'vid_duration' : ($po == 'videosong' ? 'vidsong_duration' : null))), true),
								'post_name' => $po,
								'archive_link' => get_post_type_archive_link($po),
								'language' => get_the_terms(get_the_ID(), 'language_category')
							);
							$all_post_arr[$po][] = $single_post_array;
							endwhile;
						endif;
				}
				
			}

			// echo '<pre>'.print_r($all_post_arr, true).'</pre>';
			

			?>

			<section class="container highlight-section" >
				<div class="row">
					<div class="col-sm-12">
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							
							<!-- Wrapper for slides -->
							<div class="carousel-inner" role="listbox">
								<?php 
									if(count($all_post_arr) > 0){
										$slider_html = '';
										$first_slide = true;
										foreach ($all_post_arr as $key => $value) {
											// echo '<pre>'.print_r($value[0]['thumbnail_url'], true).'</pre>';
											$slider_html.= '<div class="item '. ($first_slide ? 'active' : '') .'">'
																.'<div class="home-slider-image" style="background-image: url('. $value[0]['thumbnail_url'] .');">'
																	.'<span class="slider-post-name">'.$value[0]['post_name'].'</span>'
																	.'<a class="slider-link" href="'.$value[0]['permalink'].'">'
																		.'<h4 class="slide-tite">'.$value[0]['title'].'</h4>'
																	.'</a>'
																.'</div>'
																
															.'</div>';
											$first_slide = false;
										}
										echo $slider_html;
									}
									
								?>
								
							</div>
									<!-- Controls -->
							<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
								<i class="fas fa-chevron-left"></i>
								<span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
								<i class="fas fa-chevron-right"></i>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
				</div> <!-- row -->
			</section> <!-- container -->
			<section class="clearfix section">
				<section class="container" >
					<div class="row">
						<div class="col-sm-8">
							<?php 

								$content_html = '';

								if(count($all_post_arr) > 0){
									
									foreach ($all_post_arr as $post_key => $post_arr) {

										
										$content_html.= '<section class="news-section">'.
															'<div class="news-section-info clearfix">'
															.'<h5 class="section-title">'.$post_key.'</h5>'
															.'<a href="'. $post_arr[0]['archive_link'] .'" class="news-cat-link">View More <i class="fa fa-long-arrow-right"></i></a>'
															.'</div>';
										if(count($post_arr) > 0){
											$content_html.='<div class="row clearfix">';
											foreach ($post_arr as $single_post_key => $single_post_value) {

												$lang_arr = array();
												
												if(count($single_post_value['language']) > 0){
													for($x = 0 ; $x < count($single_post_value['language']);$x++) {

														
														$lang_arr[] = $single_post_value['language'][$x]->name;
													}
												}
												$content_html.= '<article class="col-sm-3">'
																	.'<div class="small-news-content single-post-wrap">'
																		.'<div class="single-post-imgae" style="background-image:url('. $single_post_value['thumbnail_url'] .')"><a href="'.$single_post_value['permalink'].'" class="post-full-img-link"></a></div>'
																		.'<h5 class="news-title"><a href="'.$single_post_value['permalink'].'">'.$single_post_value['title'].'</a></h5>'
																		.'<div class="entry-meta">'
																			.'<span class="posted-on"> <i class="far fa-clock"></i>
																				<span>'.$single_post_value['duration'].'</span>
																			</span>
																			<span class="byline"> <i class="fas fa-language"></i>
																				<span class="author vcard">'.implode(',', $lang_arr).'</span>
																			</span>
																		</div>'
																	.'</div>'
																.'</article> <!-- col-sm-6 -->';
											}
											$content_html.='</div><!-- row clearfix -->';
										}
										

										$content_html.='</section>';
									}
								}
								echo $content_html;
								
							?>
						</div> <!-- col-sm-8 -->
						<div class="col-sm-4 sidebar">
							<aside class="widget widget_categories">
								<div class="widget-info clearfix">
									<h3 class="widget-title">Language</h3>
								</div> 
								<?php
									$all_lang_category = get_terms( array(
                                        'taxonomy' => 'language_category',
                                        'hide_empty' => true,
									) );

									$lang_html = '<ul>';

									// echo '<pre>'. print_r($all_lang_category, true).'</pre>';
										foreach ($all_lang_category as $single_lang) {
											$lang_html.= '<li class="cat-item cat-item-4"><a href="'.get_term_link($single_lang).'">'.$single_lang->name.'</a></li>';
										}
										$lang_html .= '</ul>';
										echo $lang_html;
								?>
							</aside>
							<aside class="widget widget_categories">
								<div class="widget-info clearfix">
									<h3 class="widget-title">Recent Post</h3>
								</div>
								<ul>
								<li class="cat-item cat-item-4">
									<a href="/blog/"> Archive</a> 			
									</li>
								<?php
									$recent_posts = wp_get_recent_posts();
									
									foreach( $recent_posts as $recent ){
										echo '<li class="cat-item cat-item-4">'
											.'<a href="' . get_permalink($recent["ID"]) . '">' .$recent["post_title"].'</a>'
										.'</li> ';
									}
									wp_reset_query();
								?>
								</ul>
							</aside> <!-- Aside End-->

							<aside class="widget widget_categories">
								<div class="widget-info clearfix">
									<h3 class="widget-title">Post Categories</h3>
								</div>
								<ul>
								<?php
									wp_list_categories('exclude=&title_li=');
								?>
								</ul>
							</aside> <!-- Aside End -->

							<aside class="widget widget_categories"> <!-- Ad Aside Start -->
								<img src="/wp-content/uploads/2018/06/your-ad-here.jpg" alt="ad section">
								<br>
								<br>	
								<img src="/wp-content/uploads/2018/06/your-ad-here.jpg" alt="ad section">
							</aside>  <!-- Ad Aside End -->

						</div> <!-- col-sm-4 sidebar -->

					</div> <!-- row -->
				</section>
			</section> <!-- clearfix section -->
			
<?php

get_footer();
