<?php
	/*
	Template Name: (W) Page with Sections
	*/
	get_header(); 

	global $current_user;
	
	get_currentuserinfo();
	
	$blogname = get_bloginfo('name');
		
	/*
	 * 
	 $args = array(
		'post_type'=> 'sections',
		'meta_key' => 'wellies_section_order', 
		'orderby' => 'meta_value_num',
		'order' => 'ASC',
	);
	query_posts( $args );
	
	 */	
// Find connected posts
$connected = new WP_Query( array(
  'connected_type' => 'sections_to_page',
  'connected_items' => get_queried_object_id(),
) );

// Display connected posts
if ( $connected->have_posts() ) :

?>
<header id="header">
<div class="header container inner">
<?php if (is_user_logged_in()):?>
<div id="welcome_message" class="alert-message block-message fade in">
	<a class="close" data-dismiss="alert" href="#">×</a>
	<h3>Welcome <?php echo $current_user->display_name;?> </h3>
    <p>You have logged into <?php echo $blogname;?>. Thanks for logging in. If you need to access the <span class="label notice">Dashboard</span> or <span class="label notice">Logout</span>, Please take notice of the menu above.</p><br/>
    <h4>Enjoy your stay!</h4>

</div>
<?php else: ?>

<?php endif;?>	
<div id="myCarousel" class="thumbnail carousel slide">
			<div class="carousel-inner">
				<div class="item active">
					<img src="http://placehold.it/1100x400" alt="">
					<div class="caption">
						<h5>First Thumbnail label</h5>
						<p>
							Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
						</p>
					</div>
				</div>
				<div class="item">
					<img src="http://placehold.it/1100x400" alt="">
					<div class="caption">
						<h5>Second Thumbnail label</h5>
						<p>
							Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
						</p>
					</div>
				</div>
				<div class="item">
					<img src="http://placehold.it/1100x400" alt="">
					<div class="caption">
						<h5>Third Thumbnail label</h5>
						<p>
							Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
						</p>
					</div>
				</div>
			</div>
			<a class="left nav" href="#myCarousel" data-slide="prev">&laquo;</a>
			<a class="right nav" href="#myCarousel" data-slide="next">&raquo;</a>
		</div>

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
				<?php if (is_user_logged_in()):?>
					<li class="vertical-divider"></li>
					<li id="user"><a href="<?php echo admin_url( 'profile.php' )?>" rel="twipsy" data-placement="bottom" data-original-title="User Profile"><strong>Welcome Back </strong><span class="label success"><?php echo $current_user->display_name;?></span></a></li>
					<li class="dropdown">
			            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Dashboard <b class="caret"></b></a>
			            <ul class="dropdown-menu">
			             	<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
								<li class="mobile"><a href="#<?php echo the_title();?>"><?php echo the_title();?></a></li>
							<?php endwhile; ?>
							<li class="mobile" class="divider"></li>
			             	<a href="<?php echo admin_url( 'profile.php' )?>"><?php echo $current_user->display_name;?>'s Profile</a></li>
			             	<li><a href="<?php echo get_admin_url();?>" rel="twipsy" data-placement="left" data-original-title="Remember this is the <?php echo $blogname;?> Dashboard">Site Dashboard</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo wp_logout_url( get_permalink());?>">Log Off</a></li>
			            </ul>
			          </div>
					</li>
				<?php else: ?>
					<li class="vertical-divider"></li>
					<li class="dropdown">
			            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Dashboard <b class="caret"></b></a>
			            <ul class="dropdown-menu">
			             	<?php while ( have_posts() ) : the_post();?>
								<li class="mobile"><a href="#<?php echo the_title();?>"><?php echo the_title();?></a></li>
							<?php endwhile; ?>
							<li class="divider"></li>
							<li><a href="<?php echo wp_login_url( get_permalink());?>">Log In</a></li>
			            </ul>
			          </div>
					</li>
				<?php endif;
				wp_reset_postdata();?>
			</ul>
			
		</div>
	</div>
</div>

</header>

<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
	
<?php $bg_color = get_post_meta( get_the_ID( ), 'wellies_section_bg_color', true );?>	
<div style="background-color:<?php echo $bg_color?>">
	<section class="container" id="<?php the_title(); ?>">
		<div class="section-divider" ></div>
		<div class="clearfix page-section">
			
			<header style="display:none;">
				<h1><?php the_title(); ?></h1>							
				<p class="meta"><?php _e("Posted", "bonestheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time> <?php _e("by", "bonestheme"); ?> <?php the_author_posts_link(); ?>.</p>
			</header> <!-- end article header -->
			
				<div class="post_content">
					<?php 
						edit_post_link('Click to Edit Section', '<p>', '</p>'); 
						the_content(); 
					?>				
				</div> <!-- end article section -->
			
		</div>
	</section>
</div>	
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
		    <footer>
		    </footer>
		</article>
		</div>
	<?php // Prevent weirdness
		endif;
		wp_reset_postdata();
?>

<?php get_footer(); ?>