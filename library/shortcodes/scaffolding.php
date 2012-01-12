<?php
/*
 * Scaffolding Shortodes for Twitter Bootstrap
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

function wellies_scaffold_nested_row($atts, $content = null){
	extract(shortcode_atts(array(
		"class" => '',
	), $atts));
	return '<div class="row '.$class.'">'.do_shortcode($content).'</div>';
}
add_shortcode('=row', 'wellies_scaffold_nested_row');

function wellies_scaffold_double_nested_row($atts, $content = null){
	extract(shortcode_atts(array(
		"class" => '',
	), $atts));
	return '<div class="row '.$class.'">'.do_shortcode($content).'</div>';
}
add_shortcode('==row', 'wellies_scaffold_double_nested_row');


//Create Span1 with Ability to Offset
function wellies_scaffold_span_1($atts, $content = null){
	extract(shortcode_atts(array(
		"span" => 'span1',
		"offset" => '',
		"class" => '',
	), $atts));
	
	return '<div class="'.$class.' '.$span.' '.$offset.'">'.do_shortcode($content).'</div>';
}
add_shortcode("span1", "wellies_scaffold_span_1");


//Create Span2 with Ability to Offset
function wellies_scaffold_span_2($atts, $content = null){
	extract(shortcode_atts(array(
		"span" => 'span2',
		"offset" => '',
		"class" => '',
	), $atts));
	
	return '<div class="'.$class.' '.$span.' '.$offset.'">'.do_shortcode($content).'</div>';
}
add_shortcode("span2", "wellies_scaffold_span_2");

//Create Span3 with Ability to Offset
function wellies_scaffold_span_3($atts, $content = null){
	extract(shortcode_atts(array(
		"span" => 'span3',
		"offset" => '',
		"class" => '',
	), $atts));
	
	return '<div class="'.$class.' '.$span.' '.$offset.'">'.do_shortcode($content).'</div>';
}
add_shortcode("span3", "wellies_scaffold_span_3");

//Create Span4 with Ability to Offset
function wellies_scaffold_span_4($atts, $content = null){
	extract(shortcode_atts(array(
		"span" => 'span4',
		"offset" => '',
		"class" => '',
	), $atts));
	
	return '<div class="'.$class.' '.$span.' '.$offset.'">'.do_shortcode($content).'</div>';
}
add_shortcode("span4", "wellies_scaffold_span_4");

//Create Span5 with Ability to Offset
function wellies_scaffold_span_5($atts, $content = null){
	extract(shortcode_atts(array(
		"span" => 'span5',
		"offset" => '',
		"class" => '',
	), $atts));
	
	return '<div class="'.$class.' '.$span.' '.$offset.'">'.do_shortcode($content).'</div>';
}
add_shortcode("span5", "wellies_scaffold_span_5");

//Create Span6 with Ability to Offset
function wellies_scaffold_span_6($atts, $content = null){
	extract(shortcode_atts(array(
		"span" => 'span6',
		"offset" => '',
		"class" => '',
	), $atts));
	
	return '<div class="'.$class.' '.$span.' '.$offset.'">'.do_shortcode($content).'</div>';
}
add_shortcode("span6", "wellies_scaffold_span_6");

//Create Span7 with Ability to Offset
function wellies_scaffold_span_7($atts, $content = null){
	extract(shortcode_atts(array(
		"span" => 'span7',
		"offset" => '',
		"class" => '',
	), $atts));
	
	return '<div class="'.$class.' '.$span.' '.$offset.'">'.do_shortcode($content).'</div>';
}
add_shortcode("span7", "wellies_scaffold_span_7");

//Create Span8 with Ability to Offset
function wellies_scaffold_span_8($atts, $content = null){
	extract(shortcode_atts(array(
		"span" => 'span8',
		"offset" => '',
		"class" => '',
	), $atts));
	
	return '<div class="'.$class.' '.$span.' '.$offset.'">'.do_shortcode($content).'</div>';
}
add_shortcode("span8", "wellies_scaffold_span_8");

//Create Span9 with Ability to Offset
function wellies_scaffold_span_9($atts, $content = null){
	extract(shortcode_atts(array(
		"span" => 'span9',
		"offset" => '',
		"class" => '',
	), $atts));
	
	return '<div class="'.$class.' '.$span.' '.$offset.'">'.do_shortcode($content).'</div>';
}
add_shortcode("span9", "wellies_scaffold_span_9");

//Create Span10 with Ability to Offset
function wellies_scaffold_span_10($atts, $content = null){
	extract(shortcode_atts(array(
		"span" => 'span10',
		"offset" => '',
		"class" => '',
	), $atts));
	
	return '<div class="'.$class.' '.$span.' '.$offset.'">'.do_shortcode($content).'</div>';
}
add_shortcode("span10", "wellies_scaffold_span_10");

//Create Span11 with Ability to Offset
function wellies_scaffold_span_11($atts, $content = null){
	extract(shortcode_atts(array(
		"span" => 'span11',
		"offset" => '',
		"class" => '',
	), $atts));
	
	return '<div class="'.$class.' '.$span.' '.$offset.'">'.do_shortcode($content).'</div>';
}
add_shortcode("span11", "wellies_scaffold_span_11");

//Create Span12 with Ability to Offset
function wellies_scaffold_span_12($atts, $content = null){
	extract(shortcode_atts(array(
		"span" => 'span12',
		"offset" => '',
		"class" => '',
	), $atts));
	
	return '<div class="'.$class.' '.$span.' '.$offset.'">'.do_shortcode($content).'</div>';
}
add_shortcode("span12", "wellies_scaffold_span_12");


//
//Create Nested Copies
//



//Create Span1 with Ability to Offset
function wellies_scaffold_nested_span_1($atts, $content = null){
	extract(shortcode_atts(array(
		"span" => 'span1',
		"offset" => '',
		"class" => '',
	), $atts));
	
	return '<div class="'.$class.' '.$span.' '.$offset.'">'.do_shortcode($content).'</div>';
}
add_shortcode("=span1", "wellies_scaffold_nested_span_1");


//Create Span2 with Ability to Offset
function wellies_scaffold_nested_span_2($atts, $content = null){
	extract(shortcode_atts(array(
		"span" => 'span2',
		"offset" => '',
		"class" => '',
	), $atts));
	
	return '<div class="'.$class.' '.$span.' '.$offset.'">'.do_shortcode($content).'</div>';
}
add_shortcode("=span2", "wellies_scaffold_nested_span_2");

//Create Span3 with Ability to Offset
function wellies_scaffold_nested_span_3($atts, $content = null){
	extract(shortcode_atts(array(
		"span" => 'span3',
		"offset" => '',
		"class" => '',
	), $atts));
	
	return '<div class="'.$class.' '.$span.' '.$offset.'">'.do_shortcode($content).'</div>';
}
add_shortcode("=span3", "wellies_scaffold_nested_span_3");

//Create Span4 with Ability to Offset
function wellies_scaffold_nested_span_4($atts, $content = null){
	extract(shortcode_atts(array(
		"span" => 'span4',
		"offset" => '',
		"class" => '',
	), $atts));
	
	return '<div class="'.$class.' '.$span.' '.$offset.'">'.do_shortcode($content).'</div>';
}
add_shortcode("=span4", "wellies_scaffold_nested_span_4");

//Create Span5 with Ability to Offset
function wellies_scaffold_nested_span_5($atts, $content = null){
	extract(shortcode_atts(array(
		"span" => 'span5',
		"offset" => '',
		"class" => '',
	), $atts));
	
	return '<div class="'.$class.' '.$span.' '.$offset.'">'.do_shortcode($content).'</div>';
}
add_shortcode("=span5", "wellies_scaffold_nested_span_5");

//Create Span6 with Ability to Offset
function wellies_scaffold_nested_span_6($atts, $content = null){
	extract(shortcode_atts(array(
		"span" => 'span6',
		"offset" => '',
		"class" => '',
	), $atts));
	
	return '<div class="'.$class.' '.$span.' '.$offset.'">'.do_shortcode($content).'</div>';
}
add_shortcode("=span6", "wellies_scaffold_nested_span_6");

//Create Span7 with Ability to Offset
function wellies_scaffold_nested_span_7($atts, $content = null){
	extract(shortcode_atts(array(
		"span" => 'span7',
		"offset" => '',
		"class" => '',
	), $atts));
	
	return '<div class="'.$class.' '.$span.' '.$offset.'">'.do_shortcode($content).'</div>';
}
add_shortcode("=span7", "wellies_scaffold_nested_span_7");

//Create Span8 with Ability to Offset
function wellies_scaffold_nested_span_8($atts, $content = null){
	extract(shortcode_atts(array(
		"span" => 'span8',
		"offset" => '',
		"class" => '',
	), $atts));
	
	return '<div class="'.$class.' '.$span.' '.$offset.'">'.do_shortcode($content).'</div>';
}
add_shortcode("=span8", "wellies_scaffold_nested_span_8");

//Create Span9 with Ability to Offset
function wellies_scaffold_nested_span_9($atts, $content = null){
	extract(shortcode_atts(array(
		"span" => 'span9',
		"offset" => '',
		"class" => '',
	), $atts));
	
	return '<div class="'.$class.' '.$span.' '.$offset.'">'.do_shortcode($content).'</div>';
}
add_shortcode("=span9", "wellies_scaffold_nested_span_9");

//Create Span10 with Ability to Offset
function wellies_scaffold_nested_span_10($atts, $content = null){
	extract(shortcode_atts(array(
		"span" => 'span10',
		"offset" => '',
		"class" => '',
	), $atts));
	
	return '<div class="'.$class.' '.$span.' '.$offset.'">'.do_shortcode($content).'</div>';
}
add_shortcode("=span10", "wellies_scaffold_nested_span_10");

//Create Span11 with Ability to Offset
function wellies_scaffold_nested_span_11($atts, $content = null){
	extract(shortcode_atts(array(
		"span" => 'span11',
		"offset" => '',
		"class" => '',
	), $atts));
	
	return '<div class="'.$class.' '.$span.' '.$offset.'">'.do_shortcode($content).'</div>';
}
add_shortcode("=span11", "wellies_scaffold_nested_span_11");

//Create Span12 with Ability to Offset
function wellies_scaffold_nested_span_12($atts, $content = null){
	extract(shortcode_atts(array(
		"span" => 'span12',
		"offset" => '',
		"class" => '',
	), $atts));
	
	return '<div class="'.$class.' '.$span.' '.$offset.'">'.do_shortcode($content).'</div>';
}
add_shortcode("=span12", "wellies_scaffold_nested_span_12");
?>


