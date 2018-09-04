<?php /* Template Name: Main Home */ ?>
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
	?>
	
<main class="main-container">
	<header class="slider-header">
		<div id="home-slider" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner carousel-inner-slide">
				<div class="item item-slider active">
				<img class="d-block w-100" src="/wp-content/uploads/2018/06/fitness-2.jpg" alt="First slide">
					<div class="carousel-slog">
						<p>HERE YOU CAN TYPE</p>
						<h3>YOUR COMPANY SLOGAN</h3>					
					</div>
				</div>
				<div class="item item-slider">
				<img class="d-block w-100" src="/wp-content/uploads/2018/06/show.jpg" alt="Second slide">
				<div class="carousel-slog">
					<p>HERE YOU CAN TYPE</p>
						<h3>YOUR COMPANY SLOGAN</h3>					
					</div>
				</div>
				<div class="item item-slider">
				<img class="d-block w-100" src="/wp-content/uploads/2018/06/banner-1-1.jpg" alt="Third slide">
					<div class="carousel-slog">
						<p>HERE YOU CAN TYPE</p>
						<h3>YOUR COMPANY SLOGAN</h3>					
					</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#home-slider" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
 			<a class="carousel-control-next" href="#home-slider" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</header> <!-- slider-header -->
	
	<section class=" sec bg-defult">
		<div class="container">
			<div class="bg-defult"> 
				<div class="sec-title text-dark">Who We are</div>
			</div>
		</div>
	</section> <!-- Who We are section -->

	
	<section class=" sec bg-cyan"> 
		<div class="container"> 
			<div class="sec-title text-white">Concept, Content, Customization</div>
				<div class="sec-content text-white">We at “Content Studio” make sure that you explore the incredible media handpicked and incredible videos t
					hat will be there to entertain you. We deal into content aggregation, production, and redistribution of content.</div>
				</div>
		</div>
	</section> <!-- section end -->
	<div class="vactor-shape vactor-cyan">
	</div>

	<section class="sec bg-white">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<img class= "content-media float-center" src="/wp-content/uploads/2018/08/Content-Production.png" alt="CONTENT PRODUCTION">
						<p class="content-text">CONTENT PRODUCTION</p>
				</div>	
			
				<div class="col-sm-4">
					<img class= "content-media float-center" src="/wp-content/uploads/2018/08/Content-Distribution.png" alt="CONTENT DISTRIBUTION">
						<p class="content-text">CONTENT DISTRIBUTION</p>
				</div>

				<div class="col-sm-4">
				<img class= "content-media" src="/wp-content/uploads/2018/08/Digital-Marketing.png" alt="DIGITAL MARKETING">
					<p class="content-text">DIGITAL MARKETING</p>
				</div>
			</div> <!-- row -->

			<div class="row">
				<div class="col-sm-4">
					<img class= "content-media" src="/wp-content/uploads/2018/08/content-agrgegation.png" alt="CONTENT PRODUCTION">
						<p class="content-text">CONTENT AGGREGATION AND SYNDICATION</p>
				</div>	
			
				<div class="col-sm-4">
					<img class= "content-media" src="/wp-content/uploads/2018/08/content-monetization.png" alt="CONTENT DISTRIBUTION">
						<p class="content-text">CONTENT MONETIZATION</p>
				</div>

				<div class="col-sm-4">
				<img class= "content-media" src="/wp-content/uploads/2018/08/Digital-Marketing.png" alt="DIGITAL MARKETING">
					<p class="content-text">SPONSORED CONTENT</p>
				</div>
			</div> <!-- row -->
			</div>
	</section> <!-- section end -->
	<div class="vactor-shape vactor-white">
	</div>

	<section class=" sec bg-greengray"> 
		<div class="container"> 
			<div class="sec-title text-dark">Some of Our Video</div>
				<div class="sec-content text-dark">Videos are the best way to entertain as well as to explore new things, so if you are the one who loves to be
					entertained by something good, then our videos section is for you. Here we have dierent genres of videos
					such as food, kids, and lifestyle.</div>
			<div>
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
			</div> <!-- display categories of post -->
		</div> <!-- container -->
	</section> <!-- section end -->
	<div class="vactor-shape vactor-greengray vactor-pin">
	</div>

	<section class="sec-map map-pin">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3509.415035017939!2d77.0395180150775!3d28.406730982507334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d187486549b29%3A0x3622b3b2c4b174a2!2sJack+Morris+Media+Pvt.+Ltd.!5e0!3m2!1sen!2sin!4v1535706686692" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	</section> <!-- google map section -->
	<div class="vactor-shape vactor-map">
	</div>

	<section class=" sec bg-cyan sec-partner"> 
		<div class="container"> 
			<div class="sec-title text-white">Our Partners</div>
			<div class="row">
				<div class="col-sm-3">
					<img src="/wp-content/uploads/2018/08/demoimages.png" class="img-fluid" alt="...">
				</div>
				<div class="col-sm-3">
					<img src="/wp-content/uploads/2018/08/demoimages.png" class="img-fluid" alt="...">
				</div>
				<div class="col-sm-3">
					<img src="/wp-content/uploads/2018/08/demoimages.png" class="img-fluid" alt="...">
				</div>
				<div class="col-sm-3">
					<img src="/wp-content/uploads/2018/08/demoimages.png" class="img-fluid" alt="...">
				</div> 
			</div><!-- row end -->
			</div> <!-- container  -->
		</section> <!-- section end -->
		

		<section class="vactor-div">
			
		</section>

</main><!-- .main-container -->
<?php
get_footer();
