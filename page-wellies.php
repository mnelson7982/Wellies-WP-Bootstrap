<?php
    /*
    Template Name: (W) Page with Sections
    */
    get_header();

    global $current_user;

    get_currentuserinfo();

    $blogname = get_bloginfo('name');

    // Find connected posts
    $connected = new WP_Query( array(
	'connected_type' => 'sections_to_page',
	'connected_items' => get_queried_object_id(),
    ));

    // Display connected posts
    if ( $connected->have_posts() ) :
?>

<div class="masthead container">
    <header>
	<?php
	    //Display the Content of the Parent Page above the sections and Navigation on the Page;
	    the_content();
	?>
    </header>
</div>

<header class="subheader container">
<div id="inner-nav" class="navbar navbar-static">
    <div class="navbar-inner">
	<div class="static-width container">
	    <a class="brand" href="#"><?php echo $blogname;?></a>

	    <ul id="site-nav" class="nav">
		<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
		    <li><a href="#<?php echo the_title();?>"><?php echo the_title();?></a></li>
		<?php endwhile; ?>
	    </ul>
	    <ul class="nav pull-right hide">
		<?php if (is_user_logged_in()): ?>
		    <li class="vertical-divider"></li>
		    <li><a href="<?php echo admin_url('profile.php') ?>" rel="twipsy" data-placement="bottom" data-original-title="User Profile"><strong>Welcome Back </strong><span class="label success"><?php echo $current_user->display_name; ?></span></a></li>
		    <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#" rel="twipsy" data-placement="left" data-original-title="<?php echo $blogname; ?> Dashboard">Dashboard <b class="caret"></b></a>
			<ul class="dropdown-menu">
			    <li class="divider"></li>
			    <li><a href="<?php echo admin_url('profile.php') ?>"><?php echo $current_user->display_name; ?>'s Profile</a></li>
			    <li><a href="<?php echo get_admin_url(); ?>" rel="twipsy" data-placement="left" data-original-title="Remember this is the <?php echo $blogname; ?> Dashboard">Site Dashboard</a></li>
			    <li class="divider"></li>
			    <li><a href="<?php echo wp_logout_url(get_permalink()); ?>">Log Off</a></li>
			</ul>
		    </li>
		<?php else: ?>
		    <li class="vertical-divider"></li>
		    <li id="user"><a href="#LoginForm" data-toggle="modal">Login</a></li>
		<?php endif; ?>
	    </ul>
	</div>
    </div>
</header>

<?php
    while ( $connected->have_posts() ) : $connected->the_post();
    $bg_color = get_post_meta( get_the_ID( ), 'wellies_section_bg_color', true );
?>


<article id="<?php the_title(); ?>" style="background-color:<?php echo $bg_color?>">
    <div class="container wellies-section">
	<div class="section-divider" ></div>
	<section>
	    <?php if (is_user_logged_in()): ?>
		<a href="<?php echo get_edit_post_link();?>" class="btn edit_link" rel="twipsy" data-placement="right" data-original-title="Click here to Edit this Section">
		    <i class="edit"></i>
		</a>
	    <?php endif;?>
	    <?php the_content(); ?>
	</section>
    </div>
</article>

<?php endwhile; ?>

    <?php else : ?>
<div class="container">
<article id="post-not-found" class="span16 clearfix">
    <header>
	<h1>Not Found</h1>
    </header>
    <section class="post_content">
	<p>Sorry, but the requested resource was not found on this site.</p>
    </section>
</article>
</div>
<?php //Prevent weirdness
	endif;
	wp_reset_postdata();
	get_footer();
?>