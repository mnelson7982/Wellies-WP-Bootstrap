<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

// Get Bones Core Up & Running!
require_once('library/bones.php');            // core functions (don't remove)
require_once('library/plugins.php');          // plugins & extra functions (optional)
require_once('library/cpt-sections.php'); // custom post type example

// Options panel
require_once('library/options-panel.php');

// Shortcodes
require_once('library/shortcodes.php');

// Admin Functions (commented out by default)
require_once('library/admin.php');         // custom admin functions


function wellies_css_loader() {
	wp_enqueue_style('bootstrap.css', get_template_directory_uri().'/library/css/bootstrap.min.css', false ,'1.0', 'all' );
	wp_enqueue_style('themes.css', get_template_directory_uri().'/library/css/theme.css', false ,'1.0', 'all' );
}
add_action('wp_enqueue_scripts', 'wellies_css_loader');

function wellies_js_loader() {
      wp_enqueue_script('dropdown.js', get_template_directory_uri().'/library/js/libs/bootstrap-dropdown.js', array('jquery'),'1.0', false );
      wp_enqueue_script('scrollspy.js', get_template_directory_uri().'/library/js/libs/bootstrap-scrollspy.js', array('jquery'),'1.0', false );
	  wp_enqueue_script('twipsy.js', get_template_directory_uri().'/library/js/libs/bootstrap-twipsy.js', array('jquery'),'1.0', false );
      wp_enqueue_script('popover.js', get_template_directory_uri().'/library/js/libs/bootstrap-popover.js', array('jquery'),'1.0', false );
      wp_enqueue_script('imgload.js', get_template_directory_uri().'/library/js/libs/wellies-imgload.js', array('jquery'),'1.0', false );
      wp_enqueue_script('alert.js', get_template_directory_uri().'/library/js/libs/bootstrap-alert.js', array('jquery'),'1.0', false );
	  wp_enqueue_script('carousel.js', get_template_directory_uri().'/library/js/libs/bootstrap-carousel.js', array('jquery'),'1.0', false );
	  wp_enqueue_script('transition.js', get_template_directory_uri().'/library/js/libs/bootstrap-transition.js', array('jquery'),'1.0', false );
	  wp_enqueue_script('modals.js', get_template_directory_uri().'/library/js/libs/bootstrap-modal.js', array('jquery'),'1.0',false );
	  wp_enqueue_script('scripts.js', get_template_directory_uri().'/library/js/scripts.js', array('jquery'),'1.0', true );
}
add_action('wp_enqueue_scripts', 'wellies_js_loader');

//disable wpautop
remove_filter ('the_content', 'wpautop');

//disable wptexturize
remove_filter('the_content', 'wptexturize');

/**
 * Build a list of all websites in a network
 */
function wp_list_sites( $expires = 7200 ) {
   if( !is_multisite() ) return false;

   // Because the get_blog_list() function is currently flagged as deprecated
   // due to the potential for high consumption of resources, we'll use
   // $wpdb to roll out our own SQL query instead. Because the query can be
   // memory-intensive, we'll store the results using the Transients API
   if ( false === ( $site_list = get_transient( 'multisite_site_list' ) ) ) {
      global $wpdb;
      $site_list = $wpdb->get_results( $wpdb->prepare('SELECT * FROM wp_blogs WHERE blog_id > 1 ORDER BY blog_id') );
      // Set the Transient cache to expire every two hours
      set_site_transient( 'multisite_site_list', $site_list, $expires );
   }

   $current_site_url = get_site_url( get_current_blog_id() );

   $html = '';

   foreach ( $site_list as $site ) {
      switch_to_blog( $site->blog_id );
      $class = ( home_url() == $current_site_url ) ? ' class="current-site-item"' : '';
      $html .= '<li><a href="'.get_bloginfo('wpurl').'">'.get_bloginfo('name').'</a></li>'."\n";
      restore_current_blog();
   }

   $html .= '';

   return $html;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'wpbs-featured', 580, 300, true );
add_image_size( 'bones-thumb-600', 600, 150, false );
add_image_size( 'bones-thumb-300', 300, 100, true );
/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
    register_sidebar(array(
    	'id' => 'sidebar1',
    	'name' => 'Sidebar 1',
    	'description' => 'The first (primary) sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
    register_sidebar(array(
    	'id' => 'footer_widgets',
    	'name' => 'Footer Widgets',
    	'description' => 'Footer Widgets. (Max. 3)',
    	'before_widget' => '<div class="span4">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));


    /*
    to add more sidebars or widgetized areas, just copy
    and edit the above sidebar code. In order to call
    your new sidebar just use the following code:

    Just change the name to whatever your new
    sidebar's id is, for example:

    register_sidebar(array(
    	'id' => 'sidebar2',
    	'name' => 'Sidebar 2',
    	'description' => 'The second (secondary) sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));

    To call the sidebar in your template, you can just copy
    the sidebar.php file and rename it to your sidebar's name.
    So using the above example, it would be:
    sidebar-sidebar2.php

    */
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<div class="comment-author vcard row clearfix">
				<div class="avatar span2">
					<?php echo get_avatar($comment,$size='75',$default='<path_to_url>' ); ?>
				</div>
				<div class="span8">
					<?php printf(__('<h4 class="span8">%s</h4>'), get_comment_author_link()) ?>
					<?php edit_comment_link(__('Edit'),'<span class="edit-comment btn small info">','</span>') ?>

                    <?php if ($comment->comment_approved == '0') : ?>
       					<div class="alert-message success">
          				<p><?php _e('Your comment is awaiting moderation.') ?></p>
          				</div>
					<?php endif; ?>

                    <?php comment_text() ?>

                    <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time('F jS, Y'); ?> </a></time>

                    <!-- removing reply link on each comment since we're not nesting them -->
					<?php //comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                </div>
			</div>
		</article>
    <!-- </li> is added by wordpress automatically -->
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __('Search for:', 'bonestheme') . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search the Site..." />
    <input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    </form>';
    return $form;
} // don't remove this bracket!

/****************** password protected post form *****/

add_filter( 'the_password_form', 'custom_password_form' );

function custom_password_form() {
	global $post;
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$o = '<div class="clearfix"><form class="protected-post-form" action="' . get_option('siteurl') . '/wp-pass.php" method="post">
	' . __( "<p>This post is password protected. To view it please enter your password below:</p>" ) . '
	<label for="' . $label . '">' . __( "Password:" ) . ' </label><div class="input"><input name="post_password" id="' . $label . '" type="password" size="20" /><input type="submit" name="Submit" class="btn primary" value="' . esc_attr__( "Submit" ) . '" /></div>
	</form></div>
	';
	return $o;
}

/*********** update standard wp tag cloud widget so it looks better ************/

add_filter( 'widget_tag_cloud_args', 'my_widget_tag_cloud_args' );

function my_widget_tag_cloud_args( $args ) {
	$args['number'] = 20; // show less tags
	$args['largest'] = 9.75; // make largest and smallest the same - i don't like the varying font-size look
	$args['smallest'] = 9.75;
	$args['unit'] = 'px';
	return $args;
}

add_filter('wp_tag_cloud','wp_tag_cloud_filter', 10, 2);

function wp_tag_cloud_filter($return, $args)
{
  return '<div id="tag-cloud">'.$return.'</div>';
}

// Enable shortcodes in widgets
add_filter('widget_text', 'do_shortcode');

// Disable jump in 'read more' link
function remove_more_jump_link($link) {
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');

// Remove height/width attributes on images so they can be responsive
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}


function remove_dashboard_widgets() {
	global $wp_meta_boxes;

	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // Plugins widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPress Blog widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // Other WordPress News widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // Right Now widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // Quick Press widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // Incoming Links widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // Recent Drafts widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // Recent Comments widget
}

?>