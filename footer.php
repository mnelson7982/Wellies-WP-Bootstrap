<div class="container">
    <footer role="contentinfo">
	<div id="inner-footer" class="clearfix">
	    <div class="row show-grid">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widgets') ) ?>
	    </div>
	     <p class="attribution">
		&copy; <?php bloginfo('name'); ?> <?php _e("is brought to you by", "bonestheme"); ?>
		<a href="http://www.mattbenimble.com">MattBeNimble</a>,
		<a href="http://320press.com">320press</a>,
		<a href="http://wordpress.org/" title="WordPress">WordPress</a>,
		<a href="http://www.themble.com/bones" title="Bones" class="footer_bones_link">Bones</a>
		<span class="amp">&</span>
		<a href="http://twitter.github.com/bootstrap/" title="Twitter Bootstrap">Twitter Bootstrap</a>.
	    </p>
	</div> <!-- end #inner-footer -->
    </footer> <!-- end footer -->
</div>

<!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
<![endif]-->

<?php wp_footer(); // js scripts are inserted using this function ?>

</body>
</html>