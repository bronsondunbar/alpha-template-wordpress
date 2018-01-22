<?php
/**
 * Additional features to allow styling of the templates
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */



function get_logo () {

	$custom_logo_id = get_theme_mod('custom_logo');
	$logo = wp_get_attachment_image_src($custom_logo_id , 'full');

	if (has_custom_logo()) {

		if (get_header_textcolor()!='blank') {
			echo "<li><a class='navbar-brand' href='" . get_home_url() . "'><img src='" . esc_url($logo[0]) . "'/>" . get_bloginfo($show, 'name') . "</a></li>";
		} else {
	 		echo "<li><a class='navbar-brand' href='" . get_home_url() . "'><img src='" . esc_url($logo[0]) . "'/></a></li>";
	 	}

	    
	} else {

		if (get_header_textcolor() != "blank") {
			echo "<li><a class='navbar-brand' href='" . get_home_url() . "'><img src='" . get_template_directory_uri() . "/assets/images/brand.png' />" . get_bloginfo($show, "name") . "</a></li>";
		} else {
			echo "<li><a class='navbar-brand' href='" . get_home_url() . "'><img src='" . get_template_directory_uri() . "/assets/images/brand.png' alt='" . get_the_title($post->ID) . "' /></a></li>";
		}

	}

}

function get_post_tags () {

	$postTags = get_the_tags();
	$displayTags = "";

	if ($postTags) {

		$displayTags = "<ul>";

	  	foreach ($postTags as $tag) {

	    	$displayTags .= "<li><strong>" . $tag->name . "</strong></li>"; 

	  	}

	  	$displayTags .= "</ul>";
	  	return $displayTags;

	}

}

function get_post_excerpt ($numberOfCharacters) {

	$postExcerpt = get_the_excerpt();
	$numberOfCharacters++;

	if (mb_strlen($postExcerpt) > $numberOfCharacters) {

		$subex = mb_substr($postExcerpt, 0, $numberOfCharacters - 5);
		$exwords = explode(' ', $subex);
		$excut = - (mb_strlen($exwords[count($exwords) - 1 ]));

		if ($excut < 0) {
			return mb_substr("<p class='post-excerpt'>" .  $subex . "...</p>", 0, $excut );
		} else {
			return "<p class='post-excerpt'>" . $subex . "...</p>";
		}

	} else {

		return $postExcerpt;

	}

}

function get_post_highlights ($screensize) {

	if ($screensize == "desktop") {

		if (have_posts()) {

			if (wp_count_posts()->publish >= 3) {

				global $post;
	    		$i = 3;

			    $publishedPosts = get_posts();

	      		$chunks = array_chunk($publishedPosts, $i);
	      		$postHighlights = "";

		      	foreach($chunks as $chunk):

			        ($chunk === reset($chunks)) ? $active = "active" : $active = "";
			        $postHighlights .= "<div class='item ". $active . "'><div class='grid'>";

			        foreach($chunk as $post):

			        	if (get_the_post_thumbnail() !== "") {

			        		$postHighlights .= "<div class='item post'>";
				      		$postHighlights .= "<a href='" . get_permalink() . "'>";

				      		$postHighlights .= "<img src='" . get_the_post_thumbnail_url() . "' class='img-responsive' alt='" . get_the_title($post->ID) . "' />";

				      		$postHighlights .= "</a>";
				      		$postHighlights .= "<div class='post-caption'>";
				          	$postHighlights .= "<h4>" . get_the_title($post->ID) . "</h4>";

				          	if (get_the_category($post->ID)[0]->name != "Uncategorized") {
				      			$postHighlights .= "<p>" . get_the_category($post->ID)[0]->name . "</p>";
				      		}

				          	$postHighlights .= "<a href='" . get_permalink() . "' class='btn btn-default'>Read more</a>";
				          	$postHighlights .= "</div>";
				          	$postHighlights .= "</div>";

			        	} else {

			        		$postHighlights .= "<div class='item post'>";

			        		$postHighlights .= "<a href='" . get_permalink() . "'>";
				      		$postHighlights .= "<div class='post-image'><i class='fa fa-4x fa-picture-o' aria-hidden='true'></i></div>";
				      		$postHighlights .= "</a>";

				      		$postHighlights .= "<div class='post-caption'>";
				          	$postHighlights .= "<h4>" . get_the_title($post->ID) . "</h4>";

				          	if (get_the_category($post->ID)[0]->name != "Uncategorized") {
				      			$postHighlights .= "<p>" . get_the_category($post->ID)[0]->name . "</p>";
				      		}

				          	$postHighlights .= "<a href='" . get_permalink() . "' class='btn btn-default'>Read more</a>";
				          	$postHighlights .= "</div>";

			        		$postHighlights .= "</div>";

			        	}
			        	

			        endforeach;

		        	$postHighlights .= "</div></div>";	

		      	endforeach;

		      	echo $postHighlights;

			} else if (wp_count_posts()->publish == 2) {

				global $post;
	    		$i = 3;

			    $publishedPosts = get_posts();

	      		$chunks = array_chunk($publishedPosts, $i);
	      		$postHighlights = "";

		      	foreach($chunks as $chunk):

			        ($chunk === reset($chunks)) ? $active = "active" : $active = "";
			        $postHighlights .= "<div class='item ". $active . "'><div class='grid'>";

			        foreach($chunk as $post):

			        	if (get_the_post_thumbnail() !== "") {

			        		$postHighlights .= "<div class='item post'>";
				      		$postHighlights .= "<a href='" . get_permalink() . "'>";

				      		$postHighlights .= "<img src='" . get_the_post_thumbnail_url() . "' class='img-responsive' alt='" . get_the_title($post->ID) . "' />";

				      		$postHighlights .= "</a>";
				      		$postHighlights .= "<div class='post-caption'>";
				          	$postHighlights .= "<h4>" . get_the_title($post->ID) . "</h4>";

				          	if (get_the_category($post->ID)[0]->name != "Uncategorized") {
				      			$postHighlights .= "<p>" . get_the_category($post->ID)[0]->name . "</p>";
				      		}

				          	$postHighlights .= "<a href='" . get_permalink() . "' class='btn btn-default'>Read more</a>";
				          	$postHighlights .= "</div>";
				          	$postHighlights .= "</div>";

			        	} else {

			        		$postHighlights .= "<div class='item post'>";

			        		$postHighlights .= "<a href='" . get_permalink() . "'>";
				      		$postHighlights .= "<div class='post-image'><i class='fa fa-4x fa-picture-o' aria-hidden='true'></i></div>";
				      		$postHighlights .= "</a>";

				      		$postHighlights .= "<div class='post-caption'>";
				          	$postHighlights .= "<h4>" . get_the_title($post->ID) . "</h4>";

				          	if (get_the_category($post->ID)[0]->name != "Uncategorized") {
				      			$postHighlights .= "<p>" . get_the_category($post->ID)[0]->name . "</p>";
				      		}

				          	$postHighlights .= "<a href='" . get_permalink() . "' class='btn btn-default'>Read more</a>";
				          	$postHighlights .= "</div>";

			        		$postHighlights .= "</div>";

			        	}
			        	

			        endforeach;

		        	$postHighlights .= "</div></div>";	

		      	endforeach;

		      	echo $postHighlights;

			} else if (wp_count_posts()->publish == 1) {

				global $post;
	    		$i = 3;

			    $publishedPosts = get_posts();

	      		$chunks = array_chunk($publishedPosts, $i);
	      		$postHighlights = "";

		      	foreach($chunks as $chunk):

			        ($chunk === reset($chunks)) ? $active = "active" : $active = "";
			        $postHighlights .= "<div class='item ". $active . "'><div class='grid'>";

			        foreach($chunk as $post):

			        	if (get_the_post_thumbnail() !== "") {

			        		$postHighlights .= "<div class='item post'>";
				      		$postHighlights .= "<a href='" . get_permalink() . "'>";

				      		$postHighlights .= "<img src='" . get_the_post_thumbnail_url() . "' class='img-responsive' alt='" . get_the_title($post->ID) . "' />";

				      		$postHighlights .= "</a>";
				      		$postHighlights .= "<div class='post-caption'>";
				          	$postHighlights .= "<h4>" . get_the_title($post->ID) . "</h4>";

				          	if (get_the_category($post->ID)[0]->name != "Uncategorized") {
				      			$postHighlights .= "<p>" . get_the_category($post->ID)[0]->name . "</p>";
				      		}

				          	$postHighlights .= "<a href='" . get_permalink() . "' class='btn btn-default'>Read more</a>";
				          	$postHighlights .= "</div>";
				          	$postHighlights .= "</div>";

			        	} else {

			        		$postHighlights .= "<div class='item post'>";

			        		$postHighlights .= "<a href='" . get_permalink() . "'>";
				      		$postHighlights .= "<div class='post-image'><i class='fa fa-4x fa-picture-o' aria-hidden='true'></i></div>";
				      		$postHighlights .= "</a>";

				      		$postHighlights .= "<div class='post-caption'>";
				          	$postHighlights .= "<h4>" . get_the_title($post->ID) . "</h4>";

				          	if (get_the_category($post->ID)[0]->name != "Uncategorized") {
				      			$postHighlights .= "<p>" . get_the_category($post->ID)[0]->name . "</p>";
				      		}

				          	$postHighlights .= "<a href='" . get_permalink() . "' class='btn btn-default'>Read more</a>";
				          	$postHighlights .= "</div>";

			        		$postHighlights .= "</div>";

			        	}
			        	

			        endforeach;

		        	$postHighlights .= "</div></div>";	

		      	endforeach;

		      	echo $postHighlights;

			}

		} else {

			$postHighlights = "";

			$postHighlights .= "<div class='grid'>";
			$postHighlights .= "<div class='item'>";
			$postHighlights .= "<div>";
			$postHighlights .= "<p>No posts. Please come back later.</p>";
			$postHighlights .= "</div>";
	      	$postHighlights .= "</div>";
	      	$postHighlights .= "</div>";

	      	echo $postHighlights;

		}

	} else if ($screensize == "mobile") {

		if (have_posts()) {

			global $post;
    		$i = 1;
    		$counter = 0;

		    $publishedPosts = get_posts();

      		$chunks = array_chunk($publishedPosts, $i);
      		$postHighlights = "";
      		$postIndicators = "";

	      	foreach($chunks as $chunk):

		        ($chunk === reset($chunks)) ? $active = "active" : $active = "";
		        $postHighlights .= "<div class='item " . $active . "'>";
		        $postIndicators .= "<li data-target='#carousel-mobile' data-slide-to='" . $counter . "' class='" . $active . "'></li>";
		        $counter++;

		        foreach($chunk as $post):

		          	if (get_the_post_thumbnail() !== "") {

		        		$postHighlights .= "<div class='post'>";
			      		$postHighlights .= "<a href='" . get_permalink() . "'>";

			      		$postHighlights .= "<img src='" . get_the_post_thumbnail_url() . "' class='img-responsive' alt='" . get_the_title($post->ID) . "' />";

			      		$postHighlights .= "</a>";
			      		$postHighlights .= "<div class='post-caption'>";
			          	$postHighlights .= "<h4>" . get_the_title($post->ID) . "</h4>";

			          	if (get_the_category($post->ID)[0]->name != "Uncategorized") {
			      			$postHighlights .= "<p>" . get_the_category($post->ID)[0]->name . "</p>";
			      		}

			          	$postHighlights .= "<a href='" . get_permalink() . "' class='btn btn-default'>Read more</a>";
			          	$postHighlights .= "</div>";
			          	$postHighlights .= "</div>";

		        	} else {

		        		$postHighlights .= "<div class='post'>";

		        		$postHighlights .= "<a href='" . get_permalink() . "'>";
			      		$postHighlights .= "<div class='post-image'><i class='fa fa-4x fa-picture-o' aria-hidden='true'></i></div>";
			      		$postHighlights .= "</a>";

			      		$postHighlights .= "<div class='post-caption'>";
			          	$postHighlights .= "<h4>" . get_the_title($post->ID) . "</h4>";

			          	if (get_the_category($post->ID)[0]->name != "Uncategorized") {
			      			$postHighlights .= "<p>" . get_the_category($post->ID)[0]->name . "</p>";
			      		}

			          	$postHighlights .= "<a href='" . get_permalink() . "' class='btn btn-default'>Read more</a>";
			          	$postHighlights .= "</div>";

		        		$postHighlights .= "</div>";

		        	}
		          	

		        endforeach;

	        	$postHighlights .= "</div>";

	      	endforeach;

	      	echo $postHighlights;
	      	echo "<ol class='carousel-indicators'>" . $postIndicators . "</ol>";


		} else {

			$postHighlights = "";

			$postHighlights .= "<div class='grid'>";
			$postHighlights .= "<div class='item'>";
			$postHighlights .= "<div>";
			$postHighlights .= "<p>No posts. Please come back later.</p>";
			$postHighlights .= "</div>";
	      	$postHighlights .= "</div>";
	      	$postHighlights .= "</div>";

	      	echo $postHighlights;

		}


	}
	
}

function get_all_posts () {

	if (have_posts()) {

		if (wp_count_posts()->publish == 0) {

			$postHighlights .= "<div class='item'>";
			$postHighlights .= "<div>";
			$postHighlights .= "<p>No posts. Please come back later.</p>";
			$postHighlights .= "</div>";
	      	$postHighlights .= "</div>";

	      	echo $postHighlights;

		} else {

			global $post;
			$i = 1;

		    $publishedPosts = get_posts();

	  		$chunks = array_chunk($publishedPosts, $i);
	  		$postHighlights = "";

	      	foreach($chunks as $chunk):

		        foreach($chunk as $post):

		        	if (get_the_post_thumbnail() !== "") {

		        		$postHighlights .= "<div class='item post'>";
			      		$postHighlights .= "<a href='" . get_permalink() . "'>";

			      		$postHighlights .= "<img src='" . get_the_post_thumbnail_url() . "' class='img-responsive' alt='" . get_the_title($post->ID) . "' />";

			      		$postHighlights .= "</a>";
			      		$postHighlights .= "<div class='post-caption'>";
			          	$postHighlights .= "<h4>" . get_the_title($post->ID) . "</h4>";

			          	if (get_the_category($post->ID)[0]->name != "Uncategorized") {
			      			$postHighlights .= "<p>" . get_the_category($post->ID)[0]->name . "</p>";
			      		}

			          	$postHighlights .= "<a href='" . get_permalink() . "' class='btn btn-default'>Read more</a>";
			          	$postHighlights .= "</div>";
			          	$postHighlights .= "</div>";

		        	} else {

		        		$postHighlights .= "<div class='item post'>";
			      		$postHighlights .= "<a href='" . get_permalink() . "'>";

		        		$postHighlights .= "<a href='" . get_permalink() . "'>";
			      		$postHighlights .= "<div class='post-image'><i class='fa fa-4x fa-picture-o' aria-hidden='true'></i></div>";
			      		$postHighlights .= "</a>";

			      		$postHighlights .= "</a>";
			      		$postHighlights .= "<div class='post-caption'>";
			          	$postHighlights .= "<h4>" . get_the_title($post->ID) . "</h4>";

			          	if (get_the_category($post->ID)[0]->name != "Uncategorized") {
			      			$postHighlights .= "<p>" . get_the_category($post->ID)[0]->name . "</p>";
			      		}

			          	$postHighlights .= "<a href='" . get_permalink() . "' class='btn btn-default'>Read more</a>";
			          	$postHighlights .= "</div>";
			          	$postHighlights .= "</div>";

		        	}

		        endforeach;


	      	endforeach;

	      	echo $postHighlights;

		}

	} else {

		$postHighlights .= "<div class='item post'>";
		$postHighlights .= "<div>";
		$postHighlights .= "<p>No posts. Please come back later.</p>";
		$postHighlights .= "</div>";
      	$postHighlights .= "</div>";

      	echo $postHighlights;

	}

}

function get_post_header () {

	$postHeader = "<div class='grid'>";

	$postHeader .= "<div class='item'>";
	$postHeader .= "<div>";
	$postHeader .= "<header>";
	$postHeader .= "<h1>" . get_the_title() . "</h1>";

	if (get_the_category($post->ID)[0]->name != "Uncategorized") {
		$postHeader .= "<p><strong>Category:</strong> " . get_the_category($post->ID)[0]->name . "</p>";
	}

	$postHeader .= "<p>Posted on " . get_the_date() . " by " . get_the_author() . "</p>";
	$postHeader .= get_post_tags();
	$postHeader .= get_post_excerpt(140);
	$postHeader .= "</header>";
	$postHeader .= "</div>";
	$postHeader .= "</div>";

	if (get_the_post_thumbnail() !== "") {

		$postHeader .= "<div class='item'>";
		$postHeader .= "<div>";
		$postHeader .= "<img src='" . get_the_post_thumbnail_url() . "' class='img-responsive' alt='" . get_the_title() . "' />";
		$postHeader .= "</div>";
		$postHeader .= "</div>";

	} else {

		if (is_active_sidebar("post-1")) {

			ob_start();
			dynamic_sidebar("post-1");
			$postOneWidget = ob_get_contents();
			ob_end_clean();

			$postHeader .= "<div class='item'>";
			$postHeader .= "<div>";
			$postHeader .= $postOneWidget;
			$postHeader .= "</div>";
			$postHeader .= "</div>";

		}

	}

	$postHeader .= "</div>";

	echo $postHeader;

}
