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



function display_logo () {

	$custom_logo_id = get_theme_mod('custom_logo');
	$logo = wp_get_attachment_image_src($custom_logo_id , 'full');

	if (has_custom_logo()) {

		if (get_header_textcolor()!='blank') {
			echo '<li><a class="navbar-brand" href="' . get_home_url() . '"><img src="'. esc_url( $logo[0] ) . '" />' . get_bloginfo($show, 'name') . '</a></li>';
		} else {
	 		echo '<li><a class="navbar-brand" href="' . get_home_url() . '"><img src="'. esc_url( $logo[0] ) . '" /></a></li>';
	 	}

	    
	} else {
		if (get_header_textcolor()!='blank') {
			echo '<li><a class="navbar-brand" href="' . get_home_url() . '"><img src="' . get_template_directory_uri() . '/assets/images/brand.png" />' . get_bloginfo($show, 'name') . '</a></li>';
		} else {
			echo '<li><a class="navbar-brand" href="' . get_home_url() . '"><img src="' . get_template_directory_uri() . '/assets/images/brand.png" /></a></li>';
		}
	    
	}

}

function display_post_tags () {

	$post_tags = get_the_tags();
	$display_tags = "";

	if ($post_tags) {

		$display_tags = "<ul>";

	  	foreach($post_tags as $tag) {

	    	$display_tags .= "<li><strong>" . $tag->name . "</strong></li>"; 

	  	}

	  	$display_tags .= "</ul>";
	  	echo $display_tags;

	}

}

function display_post_excerpt ($charlength) {

	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {

		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );

		if ( $excut < 0 ) {
			echo mb_substr("<p class='post-excerpt'>" .  $subex . "...</p>", 0, $excut );
		} else {
			echo "<p class='post-excerpt'>" . $subex . "...</p>";
		}

	} else {

		echo $excerpt;

	}
}

function post_highlights ($screensize) {

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
			        $postHighlights .= '<div class="item '. $active . '"><div class="grid">';

			        foreach($chunk as $post):

			        	if (get_the_post_thumbnail() !== "") {

			        		$postHighlights .= '<div class="item post">';
				      		$postHighlights .= '<a href="' . get_permalink() . '">';

				      		$postHighlights .= '<img src="' . get_the_post_thumbnail_url() . '" class="img-responsive" alt="" />';

				      		$postHighlights .= '</a>';
				      		$postHighlights .= '<div class="post-caption">';
				          	$postHighlights .= '<h4>' . get_the_title($post->ID) . '</h4>';

				          	if (get_the_category($post->ID)[0]->name != "Uncategorized") {
				      			$postHighlights .= '<p>' . get_the_category($post->ID)[0]->name . '</p>';
				      		}

				          	$postHighlights .= '<a href="' . get_permalink() . '" class="btn btn-default">Read more</a>';
				          	$postHighlights .= '</div>';
				          	$postHighlights .= '</div>';

			        	} else {

			        		$postHighlights .= '<div class="item post">';

			        		$postHighlights .= '<a href="' . get_permalink() . '">';
				      		$postHighlights .= '<div class="post-image"><i class="fa fa-4x fa-picture-o" aria-hidden="true"></i></div>';
				      		$postHighlights .= '</a>';

				      		$postHighlights .= '<div class="post-caption">';
				          	$postHighlights .= '<h4>' . get_the_title($post->ID) . '</h4>';

				          	if (get_the_category($post->ID)[0]->name != "Uncategorized") {
				      			$postHighlights .= '<p>' . get_the_category($post->ID)[0]->name . '</p>';
				      		}

				          	$postHighlights .= '<a href="' . get_permalink() . '" class="btn btn-default">Read more</a>';
				          	$postHighlights .= '</div>';

			        		$postHighlights .= '</div>';

			        	}
			        	

			        endforeach;

		        	$postHighlights .= '</div></div>';	

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
			        $postHighlights .= '<div class="item '. $active . '"><div class="grid">';

			        foreach($chunk as $post):

			        	if (get_the_post_thumbnail() !== "") {

			        		$postHighlights .= '<div class="item post">';
				      		$postHighlights .= '<a href="' . get_permalink() . '">';

				      		$postHighlights .= '<img src="' . get_the_post_thumbnail_url() . '" class="img-responsive" alt="" />';

				      		$postHighlights .= '</a>';
				      		$postHighlights .= '<div class="post-caption">';
				          	$postHighlights .= '<h4>' . get_the_title($post->ID) . '</h4>';

				          	if (get_the_category($post->ID)[0]->name != "Uncategorized") {
				      			$postHighlights .= '<p>' . get_the_category($post->ID)[0]->name . '</p>';
				      		}

				          	$postHighlights .= '<a href="' . get_permalink() . '" class="btn btn-default">Read more</a>';
				          	$postHighlights .= '</div>';
				          	$postHighlights .= '</div>';

			        	} else {

			        		$postHighlights .= '<div class="item post">';

			        		$postHighlights .= '<a href="' . get_permalink() . '">';
				      		$postHighlights .= '<div class="post-image"><i class="fa fa-4x fa-picture-o" aria-hidden="true"></i></div>';
				      		$postHighlights .= '</a>';

				      		$postHighlights .= '<div class="post-caption">';
				          	$postHighlights .= '<h4>' . get_the_title($post->ID) . '</h4>';

				          	if (get_the_category($post->ID)[0]->name != "Uncategorized") {
				      			$postHighlights .= '<p>' . get_the_category($post->ID)[0]->name . '</p>';
				      		}

				          	$postHighlights .= '<a href="' . get_permalink() . '" class="btn btn-default">Read more</a>';
				          	$postHighlights .= '</div>';

			        		$postHighlights .= '</div>';

			        	}

			        endforeach;

		        	$postHighlights .= '</div></div>';	

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
			        $postHighlights .= '<div class="item '. $active . '"><div class="grid">';

			        foreach($chunk as $post):

			        	if (get_the_post_thumbnail() !== "") {

			        		$postHighlights .= '<div class="item post">';
				      		$postHighlights .= '<a href="' . get_permalink() . '">';

				      		$postHighlights .= '<img src="' . get_the_post_thumbnail_url() . '" class="img-responsive" alt="" />';

				      		$postHighlights .= '</a>';
				      		$postHighlights .= '<div class="post-caption">';
				          	$postHighlights .= '<h4>' . get_the_title($post->ID) . '</h4>';

				          	if (get_the_category($post->ID)[0]->name != "Uncategorized") {
				      			$postHighlights .= '<p>' . get_the_category($post->ID)[0]->name . '</p>';
				      		}

				          	$postHighlights .= '<a href="' . get_permalink() . '" class="btn btn-default">Read more</a>';
				          	$postHighlights .= '</div>';
				          	$postHighlights .= '</div>';

			        	} else {

			        		$postHighlights .= '<div class="item post">';

			        		$postHighlights .= '<a href="' . get_permalink() . '">';
				      		$postHighlights .= '<div class="post-image"><i class="fa fa-4x fa-picture-o" aria-hidden="true"></i></div>';
				      		$postHighlights .= '</a>';

				      		$postHighlights .= '<div class="post-caption">';
				          	$postHighlights .= '<h4>' . get_the_title($post->ID) . '</h4>';

				          	if (get_the_category($post->ID)[0]->name != "Uncategorized") {
				      			$postHighlights .= '<p>' . get_the_category($post->ID)[0]->name . '</p>';
				      		}

				          	$postHighlights .= '<a href="' . get_permalink() . '" class="btn btn-default">Read more</a>';
				          	$postHighlights .= '</div>';

			        		$postHighlights .= '</div>';

			        	}

			        endforeach;

		        	$postHighlights .= '</div></div>';

		      	endforeach;

		      	echo $postHighlights;

			} else if (wp_count_posts()->publish == 0) {

				$postHighlights = "";

				$postHighlights .= '<div class="item">';
				$postHighlights .= '<div>';
				$postHighlights .= '<p>No posts.</p>';
				$postHighlights .= '</div>';
		      	$postHighlights .= '</div>';

		      	echo $postHighlights;

			}

		} else {

			$postHighlights = "";

			$postHighlights .= '<div class="grid">';
			$postHighlights .= '<div class="item">';
			$postHighlights .= '<div>';
			$postHighlights .= '<p>No posts. Please come back later.</p>';
			$postHighlights .= '</div>';
	      	$postHighlights .= '</div>';
	      	$postHighlights .= '</div>';

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
		        $postHighlights .= '<div class="item ' . $active . '">';
		        $postIndicators .= '<li data-target="#carousel-mobile" data-slide-to="' . $counter . '" class="' . $active . '"></li>';
		        $counter++;

		        foreach($chunk as $post):

		          	if (get_the_post_thumbnail() !== "") {

		        		$postHighlights .= '<div class="post">';
			      		$postHighlights .= '<a href="' . get_permalink() . '">';

			      		$postHighlights .= '<img src="' . get_the_post_thumbnail_url() . '" class="img-responsive" alt="" />';

			      		$postHighlights .= '</a>';
			      		$postHighlights .= '<div class="post-caption">';
			          	$postHighlights .= '<h4>' . get_the_title($post->ID) . '</h4>';

			          	if (get_the_category($post->ID)[0]->name != "Uncategorized") {
			      			$postHighlights .= '<p>' . get_the_category($post->ID)[0]->name . '</p>';
			      		}

			          	$postHighlights .= '<a href="' . get_permalink() . '" class="btn btn-default">Read more</a>';
			          	$postHighlights .= '</div>';
			          	$postHighlights .= '</div>';

		        	} else {

		        		$postHighlights .= '<div class="post">';

		        		$postHighlights .= '<a href="' . get_permalink() . '">';
			      		$postHighlights .= '<div class="post-image"><i class="fa fa-4x fa-picture-o" aria-hidden="true"></i></div>';
			      		$postHighlights .= '</a>';

			      		$postHighlights .= '<div class="post-caption">';
			          	$postHighlights .= '<h4>' . get_the_title($post->ID) . '</h4>';

			          	if (get_the_category($post->ID)[0]->name != "Uncategorized") {
			      			$postHighlights .= '<p>' . get_the_category($post->ID)[0]->name . '</p>';
			      		}

			          	$postHighlights .= '<a href="' . get_permalink() . '" class="btn btn-default">Read more</a>';
			          	$postHighlights .= '</div>';

		        		$postHighlights .= '</div>';

		        	}
		          	

		        endforeach;

	        	$postHighlights .= '</div>';

	      	endforeach;

	      	echo $postHighlights;
	      	echo '<ol class="carousel-indicators">' . $postIndicators . "</ol>";


		} else {

			$postHighlights = "";

			$postHighlights .= '<div class="grid">';
			$postHighlights .= '<div class="item">';
			$postHighlights .= '<div>';
			$postHighlights .= '<p>No posts. Please come back later.</p>';
			$postHighlights .= '</div>';
	      	$postHighlights .= '</div>';
	      	$postHighlights .= '</div>';

	      	echo $postHighlights;

		}


	}
	
}

function all_posts () {

	if (have_posts()) {

		if (wp_count_posts()->publish == 0) {

			$postHighlights = "";

			$postHighlights .= '<div class="item">';
			$postHighlights .= '<div>';
			$postHighlights .= '<p>No posts. Please come back later.</p>';
			$postHighlights .= '</div>';
	      	$postHighlights .= '</div>';

	      	echo $postHighlights;

		} else {

			global $post;
			$i = 1;

		    $publishedPosts = get_posts();

	  		$chunks = array_chunk($publishedPosts, $i);
	  		$postHighlights = "";

	      	foreach($chunks as $chunk):

		        foreach($chunk as $post):

		        	$postHighlights .= '<div class="item post">';
		      		$postHighlights .= '<a href="' . get_permalink() . '">';

		      		if (get_the_post_thumbnail() !== "") {
		      			$postHighlights .= '<img src="' . get_the_post_thumbnail_url() . '" class="img-responsive" alt="" />';
		      		}

		      		$postHighlights .= '</a>';
		      		$postHighlights .= '<div class="post-caption">';
		          	$postHighlights .= '<h4>' . get_the_title($post->ID) . '</h4>';

		          	if (get_the_category($post->ID)[0]->name != "Uncategorized") {
		      			$postHighlights .= '<p>' . get_the_category($post->ID)[0]->name . '</p>';
		      		}

		          	$postHighlights .= '<a href="' . get_permalink() . '" class="btn btn-default">Read more</a>';
		          	$postHighlights .= '</div>';
		          	$postHighlights .= '</div>';

		        endforeach;


	      	endforeach;

	      	echo $postHighlights;

		}

	} else {

		$postHighlights = "";

		$postHighlights .= '<div class="item post">';
		$postHighlights .= '<div>';
		$postHighlights .= '<p>No posts. Please come back later.</p>';
		$postHighlights .= '</div>';
      	$postHighlights .= '</div>';

      	echo $postHighlights;

	}

}
