<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//Create Section Header
function wellies_sc_section_header($atts, $content = null){
	extract(shortcode_atts(array(
		"class" => '',
	), $atts));
	return  '<header>'."\n".
		'<div class="section-header">'."\n".
		'<h1>'.do_shortcode($content).'</h1>'."\n".
		'</div>'."\n".
		'</header>';
}
add_shortcode('section-header', 'wellies_sc_section_header');

function wellies_sc_muted_text($atts, $content = null){
	extract(shortcode_atts(array(
		"class" => '',
	), $atts));
	return  '<span class="muted '.$class.'">'."\n".
		do_shortcode($content)."\n".
		'</span>';
}
add_shortcode('muted', 'wellies_sc_muted_text');



function wellies_sc_pretty_print($atts, $content = null){
	extract(shortcode_atts(array(
		"class" => 'linenums',
	), $atts));
	return  '<pre class="prettyprint '.$class.'">'."\n".
		do_shortcode($content)."\n".
		'</pre>';
}
add_shortcode('prettyprint', 'wellies_sc_pretty_print');

function wellies_sc_label($atts, $content = null){
	extract(shortcode_atts(array(
		"class" => '',
	), $atts));
	return  '<span class="label '.$class.'">'."\n".
		do_shortcode($content)."\n".
		'</span>';
}
add_shortcode('label', 'wellies_sc_label');


?>
