<div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-xs-6">
			    <span id="footer-ct1">Theme By <a href="http://www.webmonkeydd.com">Web Monkey Design and Development</a></span> 
			</div>

			<div class="col-xs-6" id="footer-ct2">
				<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'menu_class' => 'footer-nav', 'theme_location' => 'footer-menu' ) ); ?>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>