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
						'posts_per_page'=>6,
						));

						if($movies_posts->have_posts() ) : while ( $movies_posts->have_posts() ) : $movies_posts->the_post(); 
								echo get_the_title();
					endwhile;
				endif;
				}
			}
			?>

			<section class="container">
				<div class="row">
					<div class="col-sm-8">
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							<!-- Indicators -->
							<ol class="carousel-indicators">
								<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
								<li data-target="#carousel-example-generic" data-slide-to="1"></li>
							</ol>

							<!-- Wrapper for slides -->
							<div class="carousel-inner" role="listbox">
								<div class="item active">
									<img src="..." alt="...">
									<div class="carousel-caption">
									</div>
								</div>
								<div class="item">
									<img src="..." alt="...">
									<div class="carousel-caption">
									</div>
								</div>
							</div>
					
						</div>
					</div>
					<aside class="col-sm-4"></aside>
				</div> <!-- row -->
			</section> <!-- container -->

<?php
get_footer();
