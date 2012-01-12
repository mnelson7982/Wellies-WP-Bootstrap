<?php
/* Bones Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a seperate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/

function sections_register() { 
	// creating (registering) the custom type 
	register_post_type( 'sections', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Page Sections', 'post type general name'), /* This is the Title of the Group */
			'singular_name' => __('section', 'post type singular name'), /* This is the individual type */
			'add_new' => __('Add New', 'custom post type item'), /* The add new menu item */
			'add_new_item' => __('Add New Page Section'), /* Add New Display Title */
			'edit' => __( 'Edit' ), /* Edit Dialog */
			'edit_item' => __('Edit Page Sections'), /* Edit Display Title */
			'new_item' => __('New Page Section'), /* New Display Title */
			'view_item' => __('View Page Section'), /* View Display Title */
			'search_items' => __('Search Page Sections'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'For Single Page Website, Use these Sections to Fill Page' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'menu_position' => 20, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/post-sections.png', /* the icon for the custom post type menu */
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' =>true,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor','thumbnail')
	 	) /* end of options */
	); /* end of register post type */
} 
// adding the function to the Wordpress init
add_action( 'init', 'sections_register');

//register Connections
function sections_in_page_connection() {
	// Make sure the Posts 2 Posts plugin is active.
	if ( !function_exists( 'p2p_register_connection_type' ) )
		return;

	p2p_register_connection_type( array(
		'name' => 'sections_to_page',
		'from' => 'sections',
		'to' => 'page',
		'sortable' => 'any'
	) );
}
add_action( 'init', 'sections_in_page_connection', 100 );

//MetaBoxes
$prefix = 'wellies_';

global $meta_boxes;

$meta_boxes = array();

// Third meta box
$meta_boxes[] = array(
	'id' => 'bg_options',
	'title' => 'Backgound Options',
	'pages' => array( 'sections'),

	'fields' => array(
		array(
			'name' => 'Background Color',
			'id' => $prefix . 'section_bg_color',
			'type' => 'color'                // Field type: color
		),
		array(
			'name' => 'Background Image',
			'desc' => 'Background Image (Patterns)',
			'id' => $prefix . 'section_bg_image',
			'type' => 'image'                // Field type: image upload
		),
		array(
			'name' => 'Section Divider Image',
			'desc' => 'Image to divide sections apart (Optional)',
			'id' => $prefix . 'section_divider_image',
			'type' => 'image'                // Field type: image upload
		),
	)
);


// Hook to 'admin_init' to make sure the meta box class is loaded before (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'wellies_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * @return void
 */
function wellies_register_meta_boxes() {
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if (class_exists('RW_Meta_Box')) {
		foreach ($meta_boxes as $meta_box) {
			new RW_Meta_Box($meta_box);
		}
	}
}


?>