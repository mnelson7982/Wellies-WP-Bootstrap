<?php
/*
 * Javascript Plugin Shortodes for Twitter Bootstrap
 * REF: http://twitter.github.com/bootstrap/
 */

// Start Carousel

// Add ShortCode to Create Carousel Wrapper
function wellies_plugin_carousel($atts, $content = null){
    extract(shortcode_atts(array(
	    "id"=> '',
	    "class" => 'slide',
    ), $atts));
    return  '<div id="'.$id.'" rel="Carousel" class="thumbnail carousel '.$class.'">'."\n".
	'<div class="carousel-inner">'."\n".
	    do_shortcode($content)."\n".
	'</div>'."\n".
	'<a class="left nav" href="#'.$id.'" data-slide="prev">&laquo;</a>'."\n".
	'<a class="right nav" href="#'.$id.'" data-slide="next">&raquo;</a>'."\n".
	'</div>';
}
add_shortcode('carousel-wrap', 'wellies_plugin_carousel');


//Add ShortCode to Create Carousel Items
function wellies_plugin_carousel_item($atts, $content = null){
	extract(shortcode_atts(array(
		"class" => '',
		"img" => '',
		"title" => '',
	), $atts));
	return  '<div class="item '.$class.'">'."\n".
                '<img src="'.$img.'"" alt="">'."\n".
		'<div class="caption">'."\n".
		'<h5>'.$title.'</h5>'."\n".
		'<p>'."\n".
		do_shortcode($content)."\n".
		'</p>'."\n".
		'</div>'."\n".
		'</div>'."\n";
}
add_shortcode('carousel-item', 'wellies_plugin_carousel_item');


//
?>