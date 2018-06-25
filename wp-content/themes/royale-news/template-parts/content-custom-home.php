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
<div class="Container-fluid">
 
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="/wp-content/uploads/2018/06/show.jpg" alt="movies" >
        <div class="carousel-caption">
          <h3>All your video needs</h3>
        
        </div>
      </div>

      <div class="item">
        <img src="/wp-content/uploads/2018/06/background-image.jpg" alt="videos" >
        <div class="carousel-caption">
          <h3>All your video needs</h3>
          <p>The highest quality, more control, unlimited inspiration, and everything else for your video.</p>
        </div>
      </div>
     
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

 <!-- After Slider Division Start-->

<section class="bg-info sec-wrapper">    
  <div class="container">
	<div class="row">
		<div class= "col-sm-6 sec-image-wrapper">
			<img class="sec-img" src ="/wp-content/uploads/2018/06/player.png" alt ="div image" />
		</div>
		
		<div class= "col-sm-6 sec-text-wrapper">
			<h3 class="sec-title"> Host videos in the highest quality possible </h3> 
			<p class="sec-text">  Start uploading and enjoy 4K Ultra HD with HDR, video management tools, no ads before, during, or after your videos, and professional live streaming plans. </p>
			<a href="#" class="btn btn-primary btn-lg">Learn more</a>
		</div>
		
	</div> <!-- Row End -->
   </div>
</section>



<!-- After Slider Division End-->

<!-- Video show Division Start-->

<div class="bg-secondary sec-wrapper">
	<div class="container">    
		  <h2 class="section-wrapper">Discover today’s best videos</h2><br>
		 <?php 
		 $post_types = get_post_types(array(
			'public'   => true,
			'_builtin' => false
			)); 
			// echo '<pre>'.print_r($post_types, true).'</pre>';

			if(count($post_types) > 0){
				foreach($post_types as $po){
					$movies_posts = new WP_Query( array(
						'post_type'=> $po,
						'posts_per_page'=>4,
						));
						$get_the_post_thumbnail_url = '/wp-content/uploads/2018/06/download.png';
						if(has_post_thumbnail($current_post_id)){ 
							$featured_img_url = get_the_post_thumbnail($current_post_id);
						}
						if($movies_posts->have_posts() ) : while ( $movies_posts->have_posts() ) : $movies_posts->the_post(); 
						/* echo '<pre>' .get_the_post_thumbnail(null, 'thumbnail').'</pre>';	
						echo '<pre>'.get_the_title().'</pre>'; */
						$all_vid_show_html.='<section class="filtr-item col-sm-3 archive-single-vid">'
											.'<div class="vid-arch-single-wrap">'
												.'<div class="mov-arch-img" style="background-image:url('.get_the_post_thumbnail_url(null).')"><a href="/'.$po.'" class="post-type-name-red">'.$po.'</a></div>'
													.'<div class="vid-arch-content">'
														.'<a href="'.get_the_permalink().'">'
															.'<h4>'.get_the_title().'</h4>'	
														.'</a>'
																					
												.'</div>'
											.'</div><!--vid-arch-single-wrap-->'
										.'</section><!--col-->';


						


					endwhile;
				endif;
				}
			}
			echo $all_vid_show_html;
		 ?>
		<div class="row">
			
        </div>
  	</div>
</div>

<!-- Video show Division End-->

<?php
get_footer();
