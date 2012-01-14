<?php
    /*
    Template Name: Blog Page
    */
    get_header();
    $posts = array(
	'post_type'=> 'post',
	'order'    => 'DESC',
	'posts_per_page' => 2,
	'paged' => get_query_var('paged'),
    );
    query_posts($posts);
    global $more;
    $more = 0;

?>
<div class="container">
<div id="content" class="clearfix row">

<div id="main" class="span9 clearfix" role="main">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

<header>
<?php if (is_user_logged_in()): ?>
    <a href="<?php echo get_edit_post_link();?>" class="btn edit_link" rel="twipsy" data-placement="right" data-original-title="Click here to Edit this Section">
	<i class="edit"></i>
    </a>
<?php endif;?>

<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

<p class="meta"><?php _e("Posted", "bonestheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time></p>
<span class="cat-title">Categories:</span>
    <?php
	foreach((get_the_category()) as $cat) {
	    $nameOfCategory = $cat->cat_name;
	    echo $nameOfCategory.', ';
	}
    ?>
<?php the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ', ', '</p>');?>
</header> <!-- end article header -->

<section class="post_content clearfix" itemprop="articleBody">
<?php the_content('Read the full post »'); ?>

</section> <!-- end article section -->

<footer>
 <?php _e("by", "bonestheme"); ?> <?php the_author_posts_link(); ?>.
</footer> <!-- end article footer -->

</article> <!-- end article -->

<?php comments_template(); ?>

<?php endwhile; ?>
<div class="navigation"><p><?php posts_nav_link(); ?></p></div>
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

<?php get_sidebar(); // sidebar 1 ?>

</div> <!-- end #content -->
</div>
<?php get_footer(); ?>