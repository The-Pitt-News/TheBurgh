<?php
$footer = get_theme_mod('theburgh_customizer_footer', 'Site by <a title="Site" href="http://pittnews.com/" target="_blank">The Pitt News</a>');
$templateURL = get_template_directory_uri();
?>

<div class="clearfix"></div>
<div class="row" id="banner-ad-bottom">
	<!--/* OpenX Asynchronous JavaScript tag */-->

	<!-- /*
	 * The tag in this template has been generated for use on a
	 * non-SSL page. If this tag is to be placed on an SSL page, change the
	 * 'http://ox-d.oncampusweb.com/...'
	 * to
	 * 'https://ox-d.oncampusweb.com/...'
	 */ -->

	<div id="538011960_INSERT_SLOT_ID_HERE" style="width:728px;height:90px;margin:0;padding:0">
	  <noscript><iframe id="f2e6dbb88f" name="f2e6dbb88f" src="http://ox-d.oncampusweb.com/w/1.0/afr?auid=538011960&cb=INSERT_RANDOM_NUMBER_HERE" frameborder="0" scrolling="no" width="728" height="90"><a href="http://ox-d.oncampusweb.com/w/1.0/rc?cs=f2e6dbb88f&cb=INSERT_RANDOM_NUMBER_HERE" ><img src="http://ox-d.oncampusweb.com/w/1.0/ai?auid=538011960&cs=f2e6dbb88f&cb=INSERT_RANDOM_NUMBER_HERE" border="0" alt=""></a></iframe></noscript>
	</div>
	<script type="text/javascript">
	  var OX_ads = OX_ads || [];
	  OX_ads.push({
	     slot_id: "538011960_INSERT_SLOT_ID_HERE",
	     auid: "538011960"
	  });
	</script>
</div>
</div> <!--/container-->

<div id="footer">
	<div class="row" id="headline">
		<div class="col-md-2" id="bg-headline"></div>
		<div class="col-md-2" id="text-headline">THE PITT NEWS</div>
		<div class="col-md-8" id="bg-headline"></div>
	</div>
	<div class="clearfix"></div>
	<div class="row" id="footer-nav">
		<?php
		// if (has_nav_menu('footer')) {
		// 	wp_nav_menu(
		// 		array(
		// 			'theme_location' => 'footer',
		// 			'depth' => 2,
		// 			'container' => false,
		// 			'menu_class' => 'footer-menu'
		// 		)
		// 	);
		// }
		?>
	</div>
	<div class="clearfix"></div>
	<div class="row" id="footline">
		<div class="col-md-4" id="newsletter">
			<h3>EMAIL NEWSLETTER</h3>
			<em>Coming soon!!!</em>
		</div>
		<div class="col-md-8 border-left" id="contact-info">
			<p>
				Phone: 412-648-7980
				<br />Email: <a href="mailto:editor@pittnews.com">Editor@PittNews.com</a> | <a href="mailto:advertising@pittnews.com">Advertising@PittNews.com</a>
				<br />Address: 434 William Pitt Union, University of Pittsburgh, Pittsburgh, PA 15260
			</p>
		</div>
	</div>
	<div class="clearfix"></div>
</div>

</div> <!--/wrapper-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://ox-d.oncampusweb.com/w/1.0/jstag"></script> <!--OpenX Analytics-->
<script type="text/javascript" src="<?php echo $templateURL; ?>/includes/js/adproclassad.js"></script> <!--AdPro Server-->
<script type="text/javascript" src="<?php echo $templateURL; ?>/includes/js/script.js"></script>

<?php wp_footer(); ?>

</body>
</html>