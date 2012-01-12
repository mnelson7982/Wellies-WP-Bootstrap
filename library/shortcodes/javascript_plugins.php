<?php
/*
 * Javascript Plugin Shortodes for Twitter Bootstrap
 * REF: http://twitter.github.com/bootstrap/
 */

//Create Row Shortcode
function wellies_scaffold_row($atts, $content = null){
	extract(shortcode_atts(array(
		"class" => '',
	), $atts));
	return '<div class="row '.$class.'">'.do_shortcode($content).'</div>';
}
add_shortcode('row', 'wellies_scaffold_row');



function wellies_plugin_carousel($atts, $content = null){
	extract(shortcode_atts(array(
		"class" => '',
	), $atts));
	return  '<div id="myCarousel" class="thumbnail carousel slide">'."\n".
			'<div class="carousel-inner">'."\n".
			do_shortcode($content)."\n".
			'</div>'."\n".
			'<a class="left nav" href="#myCarousel" data-slide="prev">&laquo;</a>'."\n".
			'<a class="right nav" href="#myCarousel" data-slide="next">&raquo;</a>'."\n".
			'</div>';
}
add_shortcode('carousel-wrap', 'wellies_plugin_carousel');

function wellies_plugin_carousel_item($atts, $content = null){
	extract(shortcode_atts(array(
		"class" => '',
	), $atts));
	return  '<div class="item">'."\n".
					'<img src="
					" alt="">
					<div class="caption">
						<h5>Third Thumbnail label</h5>
						<p>
							Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
						</p>
					</div>
				</div>'<div id="myCarousel" class="thumbnail carousel slide">'."\n".
			'<div class="carousel-inner">'."\n".
			do_shortcode($content)."\n".
			'</div>'."\n".
			'<a class="left nav" href="#myCarousel" data-slide="prev">&laquo;</a>'."\n".
			'<a class="right nav" href="#myCarousel" data-slide="next">&raquo;</a>'."\n".
			'</div>';
}
add_shortcode('carousel-item', 'wellies_plugin_carousel_item');



<div id="myCarousel" class="thumbnail carousel slide">
			<div class="carousel-inner">



			</div>
			<a class="left nav" href="#myCarousel" data-slide="prev">&laquo;</a>
			<a class="right nav" href="#myCarousel" data-slide="next">&raquo;</a>
		</div>


				<div class="item active">
				<div class="item">
					<img src="http://placehold.it/1100x400" alt="">
					<div class="caption">
						<h5>Third Thumbnail label</h5>
						<p>
							Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
						</p>
					</div>
				</div>


?>