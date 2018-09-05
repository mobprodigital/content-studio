<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Royale_News
 */

   	/**
   	* Hook - royale_news_doctype.
   	*
   	* @hooked royale_news_doctype_action - 10
   	*/
   	do_action( 'royale_news_doctype' );
  
   	/**
   	* Hook - royale_news_head.
   	*
   	* @hooked royale_news_head_action - 10
   	*/
   	do_action( 'royale_news_head' );

   	/**
   	* Hook - royale_news_body_before.
   	*
   	* @hooked royale_news_body_before_action - 10
   	*/
   	do_action( 'royale_news_body_before' );


  	/**
   	* Hook - royale_news_header_before.
   	*
   	* @hooked royale_news_header_before_action - 10
   	*/
   	do_action( 'royale_news_header_before' );

   	/**
   	* Hook - royale_news_top_header_before.
   	*
   	* @hooked royale_news_top_header_before_action - 10
   	*/
/*    	do_action( 'royale_news_top_header_before' );
 */

	/**
	* Hook - royale_news_ticker.
	*
	* @hooked royale_news_ticker_action - 10
	*/
/* 	do_action( 'royale_news_ticker' );
 */
	/**
	* Hook - royale_news_before_current_date.
	*
	* @hooked royale_news_before_current_date_action - 10
	*/
	do_action( 'royale_news_before_current_date' );
								
	/**
	* Hook - royale_news_current_date.
	*
	* @hooked royale_news_current_date_action - 10
	*/
	do_action( 'royale_news_current_date' );

	/**
	* Hook - royale_news_social_menu.
	*
	* @hooked royale_news_social_menu_action - 10
	*/
	do_action( 'royale_news_social_menu' );

	/**
	* Hook - royale_news_after_social_menu.
	*
	* @hooked royale_news_after_social_menu_action - 10
	*/
	do_action( 'royale_news_after_social_menu' );

	/**
	* Hook - royale_news_top_header_after.
	*
	* @hooked royale_news_top_header_after_action - 10
	*/
	do_action( 'royale_news_top_header_after' );

	/**
	* Hook - royale_news_middle_header_before.
	*
	* @hooked royale_news_middle_header_before_action - 10
	*/
	do_action( 'royale_news_middle_header_before' );

	/**
	* Hook - royale_news_logo.
	*
	* @hooked royale_news_logo_action - 10
	*/
	do_action( 'royale_news_logo' );

	/**
	* Hook - royale_news_header_ad.
	*
	* @hooked royale_news_header_ad_action - 10
	*/
	do_action( 'royale_news_header_ad' );

	/**
	* Hook - royale_news_middle_header_after.
	*
	* @hooked royale_news_middle_header_after_action - 10
	*/
	do_action( 'royale_news_middle_header_after' );

	/**
	* Hook - royale_news_bottom_header_before.
	*
	* @hooked royale_news_bottom_header_before_action - 10
	*/
	do_action( 'royale_news_bottom_header_before' );

	/**
	* Hook - royale_news_main_menu.
	*
	* @hooked royale_news_main_menu_action - 10
	*/
	do_action( 'royale_news_main_menu' );

	/**
	* Hook - royale_news_search.
	*
	* @hooked royale_news_search_action - 10
	*/
	do_action( 'royale_news_search' );

	/**
	* Hook - royale_news_bottom_header_after.
	*
	* @hooked royale_news_bottom_header_after_action - 10
	*/
	do_action( 'royale_news_bottom_header_after' );

	/**
   	* Hook - royale_news_header_after.
   	*
   	* @hooked royale_news_header_after_action - 10
   	*/
   	do_action( 'royale_news_header_after' );

	/**
	* Hook - royale_news_breadcrumb.
	*
	* @hooked royale_news_breadcrumb_action - 10
	*/
	do_action( 'royale_news_breadcrumb' );

	

	$curr_page_id = get_queried_object_id();
	if(!is_front_page()){
		if ( has_post_thumbnail( $page_id ) ) :
			$image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'optional-size' );
			$image = $image_array[0];
		else :
			$image = get_template_directory_uri() . '/images/default-background.jpg';
		endif;
		
?>
<header class="page-header-custom">
	<div class="featured-img-page" style="background-image:url('<?php echo $image; ?>')">
		<div class="comp-slogan">
			Company tag line
		</div>
	</div>
	<div class="page-title-sec curved-sec-gray">
		<div class="container"> 
			<h1 class="page-title"><?php echo is_archive() ? the_archive_title() : get_the_title($curr_page_id); ?></h1>
		</div>
	</div>
</header>

<?php } ?>