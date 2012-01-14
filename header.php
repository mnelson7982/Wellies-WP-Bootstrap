<!doctype html>

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php wp_title('', true, 'right'); ?></title>
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/h/apple-touch-icon.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/m/apple-touch-icon.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon-precomposed.png">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon.png">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
    <?php //Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary?>
    <script src="http://code.jquery.com/jquery-1.7.min.js"></script>
    <script>window.jQuery || document.write(unescape('%3Cscript src="<?php echo get_template_directory_uri(); ?>/library/js/libs/jquery-1.6.1.min.js"%3E%3C/script%3E'))</script>
    <script src="<?php echo get_template_directory_uri(); ?>/library/js/modernizr.full.min.js"></script>
    <?php //media-queries.js (fallback)?>
    <!--[if lt IE 9]><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
    <!-- html5.js -->
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php
    //wordpress head functions
    wp_head();

    //Bring In Site Options
    global $current_user;
    get_currentuserinfo();

    //Get the ID for the Front Page
    $front_id = get_option('page_on_front');

    //Set Array to Grab all the pages, Sort them and exclude the UL wrapper
    $networksite_links = array(
	'exclude' => $front_id,
	'echo' => 1,
	'sort_column' => 'menu_order, post_title',
	'title_li' => '',
    );

    $heading_typography = of_get_option('heading_typography');
        if ($heading_typography) {
	    $theme_options_styles = '
		h1, h2, h3, h4, h5, h6{
		    font-family: ' . $heading_typography['face'] . ';
		    font-weight: ' . $heading_typography['style'] . ';
		    color: ' . $heading_typography['color'] . ';
		}';
    }

    $main_body_typography = of_get_option('main_body_typography');
	if ($main_body_typography) {
	    $theme_options_styles .= '
		body{
		    font-family: ' . $main_body_typography['face'] . ';
		    font-weight: ' . $main_body_typography['style'] . ';
		    color: ' . $main_body_typography['color'] . ';
		}';
    }

    $link_color = of_get_option('link_color');
	if ($link_color) {
	    $theme_options_styles .= '
		a{
		    color: ' . $link_color . ';
		}';
	}

    $link_hover_color = of_get_option('link_hover_color');
	if ($link_hover_color) {
	    $theme_options_styles .= '
		a:hover{
		    color: ' . $link_hover_color . ';
		}';
    }

    $link_active_color = of_get_option('link_active_color');
	if ($link_active_color) {
	    $theme_options_styles .= '
		a:active{
		    color: ' . $link_active_color . ';
	    }';
    }

    $topbar_position = of_get_option('nav_position');
	if ($topbar_position == 'scroll') {
	    $theme_options_styles .= '
		.topbar{
		    position: static;
	    }
		#content{
		    padding-top: 20px;
	    }';
    }

    $topbar_bg_color = of_get_option('top_nav_bg_color');
	if ($topbar_bg_color) {
	    $theme_options_styles .= '
		.topbar-inner, .topbar .fill {
		    background-color: ' . $topbar_bg_color . ';
		}';
    }

    $use_gradient = of_get_option('showhidden_gradient');
    	if ($use_gradient) {
	    $topbar_bottom_gradient_color = of_get_option('top_nav_bottom_gradient_color');

	    $theme_options_styles .= '
		.topbar-inner, .topbar .fill {
		    background-image: -khtml-gradient(linear, left top, left bottom, from(' . $topbar_bg_color . '), to(' . $topbar_bottom_gradient_color . '));
		    background-image: -moz-linear-gradient(top, ' . $topbar_bg_color . ', ' . $topbar_bottom_gradient_color . ');
		    background-image: -ms-linear-gradient(top, ' . $topbar_bg_color . ', ' . $topbar_bottom_gradient_color . ');
		    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, ' . $topbar_bg_color . '), color-stop(100%, ' . $topbar_bottom_gradient_color . '));
		    background-image: -webkit-linear-gradient(top, ' . $topbar_bg_color . ', ' . $topbar_bottom_gradient_color . '2);
		    background-image: -o-linear-gradient(top, ' . $topbar_bg_color . ', ' . $topbar_bottom_gradient_color . ');
		    background-image: linear-gradient(top, ' . $topbar_bg_color . ', ' . $topbar_bottom_gradient_color . ');
		    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=\'' . $topbar_bg_color . '\', endColorstr=\'' . $topbar_bottom_gradient_color . '2\', GradientType=0);
		}';
	}
        else {
	    $theme_options_styles .= '.topbar-inner, .topbar .fill { background-image: none; };';
    }

    $topbar_link_color = of_get_option('top_nav_link_color');
	if ($topbar_link_color) {
	    $theme_options_styles .= '
		.topbar a {
		    color: ' . $topbar_link_color . ';
		}';
    }

    $topbar_link_hover_color = of_get_option('top_nav_link_hover_color');
	if ($topbar_link_hover_color) {
	    $theme_options_styles .= '
		.topbar a:hover {
		    color: ' . $topbar_link_hover_color . ';
		}';
    }

    $hero_unit_bg_color = of_get_option('hero_unit_bg_color');
	if ($hero_unit_bg_color) {
	    $theme_options_styles .= '
		.page-template-page-homepage-sectioned-php .hero-unit {
		    background-color: ' . $hero_unit_bg_color . ';
		}';
    }

    //Combine all Styles and wrap in style markup
    if ($theme_options_styles) {
	echo '<style>'
	. $theme_options_styles . '
	</style>';
    }
    ?>
</head>

<body data-spy="scroll" data-target="#site-nav" <?php body_class(); ?>>

<header>
    <div class="navbar navbar-static" >
	<div class="navbar-inner">
	    <div class="container">
		<ul class="nav">
		    <?php
		    //Get the Network Site Title and Create Branding Anchor
			switch_to_blog(1);

			$root_site = get_current_site();

			echo '<a class="site brand" id="logo" href="' . $root_site->path . '">' . $root_site->site_name . '</a>'; //Echo Parent Site Name

			restore_current_blog();
		    ?>
		    <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="caret"></b></a>
			<ul class="dropdown-menu">
			    <li class="divider">Site Pages</li>
			    <?php
				//Get all Page Sections Associated with the Current Page (TODO: Should add if statement to look for PageTemplate)
				$connected = p2p_type('sections_to_page')->get_connected(get_queried_object_id());

				//Use post to post to grab all the page sections
				p2p_list_posts($connected, 'before_list=&after_list=');

				//Get All pages on the Current Site
				wp_list_pages($networksite_links);
			    ?>
			    <li class="divider"></li>
			    <?php
				//Grab all of the other Sites on the Network
				$network_menu = wp_list_sites();

				//Parse a LI for each site
				if ($network_menu):echo $network_menu;

				endif; //List out all Sites in Network
			    ?>
			</ul>
		    </li>
		    <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Applications<b class="caret"></b></a>
			<ul class="dropdown-menu">
			    <?php
				//Grab all of the other Sites on the Network
				$network_menu = wp_list_sites();

				//Parse a LI for each site
				if ($network_menu):echo $network_menu;

				endif; //List out all Sites in Network
			    ?>
			</ul>
		    </li>
		    <?php wp_list_pages($networksite_links); //List out all pages except Front Page	 ?>
		</ul>

		<ul class="nav pull-right">
		    <?php if (is_user_logged_in()): ?>
			<li class="vertical-divider"></li>
			<li><a href="<?php echo admin_url('profile.php') ?>" rel="twipsy" data-placement="bottom" data-original-title="User Profile"><strong>Welcome Back </strong><span class="label success"><?php echo $current_user->display_name; ?></span></a></li>
			<li class="dropdown">
			    <a class="dropdown-toggle" data-toggle="dropdown" href="#" rel="twipsy" data-placement="left" data-original-title="<?php echo $blogname; ?> Dashboard">Dashboard <b class="caret"></b></a>
			    <ul class="dropdown-menu">
				<li class="divider"></li>
				<li>
				    <a href="<?php echo admin_url('profile.php') ?>"><?php echo $current_user->display_name; ?>'s Profile</a>
				</li>
				<li>
				    <a href="<?php echo get_admin_url(); ?>" rel="twipsy" data-placement="left" data-original-title="<?php echo $blogname; ?> Dashboard">Site Dashboard</a>
				</li>
				<li class="divider"></li>
				<li><a href="<?php echo wp_logout_url(get_permalink()); ?>">Log Off</a></li>
			    </ul>
			</li>
		    <?php else: ?>
			<li class="vertical-divider"></li>
			<li><a href="#LoginForm" data-toggle="modal">Login</a></li>
		    <?php endif; ?>
		</ul>
	    </div>
	</div>
    </div>
</header><!--End Header Navigation-->

<?php //Login Modal Hidden By default?>
<div id="LoginForm"  class="modal fade">
    <?php //Login form ;> ?>
    <form action="<?php echo get_option('home'); ?>/wp-login.php" method="post">
	<div class="modal-header">
	    <a href="#" class="close" data-dismiss="modal">×</a>
	    <?php
		switch_to_blog(1);
		$root_site = get_current_site();

		echo ' <h3>Login to:<a href="' . $root_site->path . '">' . $root_site->site_name . '</a></h3>'; //Echo Parent Site Name
		restore_current_blog();
	    ?>
	</div>

	<div class="modal-body">
	    <input type="text" name="log" id="log" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" class="span3" />
	    <input type="password" name="pwd" id="pwd" class="span3"  />
	    <input type="hidden" name="redirect_to" value="<?php echo get_option('siteurl'); ?>" />
	    <label class="checkbox" for="rememberme"><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> Remember me</label>
	    <a href="<?php echo get_option('home'); ?>/wp-login.php?action=lostpassword">Recover password</a>
	</div>
	<div class="modal-footer">
	    <button type="submit" name="submit" value="Send" class="primary btn">Submit</button>
	    <a href="#" class="btn pull-right" data-dismiss="modal">Close</a>
	</div>
    </form>
</div>

	<?php if (is_user_logged_in()):?>
	<div class="container">
	    <div class="alert-message block-message fade in welcome_message">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<h3>Welcome <?php echo $current_user->display_name;?> </h3>
		<p>You have logged into <?php echo $blogname;?>. Thanks for logging in. If you need to access the <span class="label notice">Dashboard</span> or <span class="label notice">Logout</span>, Please take notice of the menu above.</p><br/>
		<h4>Enjoy your stay!</h4>
	    </div>
	</div>
	<?php else: ?>
	<?php endif;?>
