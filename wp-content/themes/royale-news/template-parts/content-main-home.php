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

<main class="main-container">
	<header> 
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="/wp-content/uploads/2018/06/show.jpg" alt="header Image" width="1100" height="500">
			</div>
		</div>	
	</header>
	
	<section class=" sec bg-defult">
		<div class="container">
			<div class="bg-defult"> 
				<div class="sec-title text-dark">Who We are</div>
			</div>
		</div>
	</section> <!-- Who We are section -->

	<section class=" sec bg-success"> 
		<div class="container"> 
			<div class="sec-title text-dark">Concept, Content, Customization</div>
				<div class="sec-content text-dark">We at “Content Studio” make sure that you explore the incredible media handpicked and incredible videos t
hat will be there to entertain you. We deal into content aggregation, production, and redistribution of content.</div>
				</div>
		</div>
	</section> <!-- section end -->

	<section class="sec bg-red">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<img class= "content-media" src="/wp-content/uploads/2018/08/demo.png" alt="CONTENT PRODUCTION">
						<p>CONTENT PRODUCTION</p>
				</div>	
			
				<div class="col-sm-4">
					<img class= "content-media" src="/wp-content/uploads/2018/08/demo.png" alt="CONTENT DISTRIBUTION">
						<p>CONTENT DISTRIBUTION</p>
				</div>

				<div class="col-sm-4">
				<img class= "content-media" src="/wp-content/uploads/2018/08/demo.png" alt="DIGITAL MARKETING">
					<p>DIGITAL MARKETING</p>
				</div>
			</div> <!-- row -->

			<div class="row">
				<div class="col-sm-4">
					<img class= "content-media" src="/wp-content/uploads/2018/08/demo.png" alt="CONTENT PRODUCTION">
						<p>CONTENT AGGREGATION AND SYNDICATION</p>
				</div>	
			
				<div class="col-sm-4">
					<img class= "content-media" src="/wp-content/uploads/2018/08/demo.png" alt="CONTENT DISTRIBUTION">
						<p>CONTENT MONETIZATION</p>
				</div>

				<div class="col-sm-4">
				<img class= "content-media" src="/wp-content/uploads/2018/08/demo.png" alt="DIGITAL MARKETING">
					<p>SPONSORED CONTENT</p>
				</div>
			</div> <!-- row -->
			</div>
	</section>

			<section class=" sec bg-success"> 
		<div class="container"> 
			<div class="sec-title text-dark">Concept, Content, Customization</div>
				<div class="sec-content text-dark">We at “Content Studio” make sure that you explore the incredible media handpicked and incredible videos t
hat will be there to entertain you. We deal into content aggregation, production, and redistribution of content.</div>
				</div>
		</div>
	</section> <!-- section end -->

		

</main><!-- .main-container -->
<?php
get_footer();
