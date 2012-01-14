<?php
/*
Template Name: Full Width Page
*/
?>

<?php get_header(); ?>
<div class="container">
<div id="content" class="clearfix row">

<div id="main" class="span12 clearfix" role="main">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

<header>
<?php if (is_user_logged_in()): ?>
    <a href="<?php echo get_edit_post_link();?>" class="btn edit_link" rel="twipsy" data-placement="right" data-original-title="Click here to Edit this Section">
	<i class="edit"></i>
    </a>
<?php endif;?>
<h1><?php the_title(); ?></h1>

<p class="meta"><?php _e("Posted", "bonestheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time> <?php _e("by", "bonestheme"); ?> <?php the_author_posts_link(); ?>.</p>

</header> <!-- end article header -->

<section class="post_content">
<?php the_content(); ?>

</section> <!-- end article section -->

<footer>

<p class="clearfix"><?php the_tags('<span class="tags">Tags: ', ', ', '</span>'); ?></p>

</footer> <!-- end article footer -->

</article> <!-- end article -->

<?php comments_template(); ?>

<?php endwhile; ?>

<?php else : ?>

<article id="post-not-found">
<header>
<h1>Not Found</h1>
</header>
<section class="post_content">
<p>Sorry, but the requested resource was not found on this site.</p>
</section>
<footer>
</footer>
</article>

<?php endif; ?>

</div> <!-- end #main -->

<?php //get_sidebar(); // sidebar 1 ?>

</div> <!-- end #content -->
</div>
<?php get_footer(); ?>