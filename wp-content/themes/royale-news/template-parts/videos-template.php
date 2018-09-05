<?php /* Template Name: Videos Page */ ?>
<?php
/**
 * The template for displaying all videos
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
    
    $color_arr = [
                    'rgb(28, 142, 103)', 
                    'rgb(185, 107, 40)', 
                    'rgb(110, 99, 171)',
                    'rgb(162, 64, 114)',
                    'rgb(66, 179, 179)',
                    'rgb(236, 105, 105)'
    ];

    $videos_arr = [
        ["name" => "Bollywood", "link" => "", "thumbnail" => "/wp-content/uploads/2018/09/bollywood-1.jpg"],
        ["name" => "Hollywood", "link" => "", "thumbnail" => "/wp-content/uploads/2018/09/hollywood-1.jpg"],
        ["name" => "Tollywood", "link" => "", "thumbnail" => "/wp-content/uploads/2018/09/tollywood.jpg"],
        ["name" => "Kids", "link" => "", "thumbnail" => "/wp-content/uploads/2018/09/kids.jpg"],
        ["name" => "Health and Fitness", "link" => "", "thumbnail" => "/wp-content/uploads/2018/09/fitness-1.jpg"],
        ["name" => "Tour and travels", "link" => "", "thumbnail" => "/wp-content/uploads/2018/09/tour.jpg"],
    ];

?>
    <main class="main-container">
        <section class="container" >

<section class="sec bg-greengray">
<div class="page-text">Movies are the best sort of entertainment… So we have come up with the different genres of the movies to interest
you. At Content Studio you will nd movies of every genre whether, action, adventure, animation, comedy, animation,
crime, drama, action, horror, romance. <br>
We have approx 500 hour of movies as well as 1000+ movie pieces.</div>
<ul class="arrow-list">
	<li>500 Hour of movies</li>
	<li>Widespread genres</li>
	<li>1000+ Movies</li>
</ul>

	</section>

            <?php if(count($videos_arr) > 0){ ?>
                
            <div class="row video-sec">
                <?php foreach($videos_arr as $vid){ ?>
                    <div class="col-sm-6">
                        <aside class="video-img-single">
                            <img src="<?php echo $vid['thumbnail']; ?>" alt="Bollywood">
                            <div class="video-img-title"><span style="background-color: <?php echo $color_arr[rand(0, 5)]; ?>"> <?php echo $vid['name']; ?></span></div>
                        </aside>
                    </div>
                <?php } ?>
            </div>    
            <?php } ?>

            <div class="video-button"> 
                <button class="fancy-filter explore-video">View all video</button>
            </div>
        </section>
    </main>



<?php

get_footer(); ?>