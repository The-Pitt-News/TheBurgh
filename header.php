<?php
$logo = get_theme_mod('theburgh_customizer_logo');
$twitter = get_theme_mod('theburgh_customizer_twitter');
$facebook = get_theme_mod('theburgh_customizer_facebook');
$instagram = get_theme_mod('theburgh_customizer_instagram');
$youtube = get_theme_mod('theburgh_customizer_youtube');
$issue = get_theme_mod('theburgh_customizer_issue');
$favicon = get_theme_mod('theburgh_customizer_favicon');
$gcs = get_theme_mod('theburgh_customizer_search');
$templateURL = get_template_directory_uri();
$home = home_url();
$siteName = get_bloginfo('name');
$siteDescription = get_bloginfo('description');
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width" />
	<?php
	if (!function_exists('_wp_render_title_tag')) {
		add_action('wp_head', 'theme_slug_render_title');
		function theme_slug_render_title() {
			echo '<title>'.wp_title('|', true, 'right').'</title>';
		}
	}
	?>
	<meta name="description" content="<?php echo $siteDescription; ?>" />
	<?php if($favicon) { ?><link rel="icon" href="<?php echo $favicon; ?>" type="image/x-icon" /><?php } ?>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700|Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo $templateURL; ?>/includes/css/publish.css" />
	<?php wp_head(); ?>
</head>
<body>
	<div class="wrapper center-block">
		<div class="header text-center">
			<div class="row" id="banner-ad-top">
				<!--/* OpenX Asynchronous JavaScript tag */-->

				<!-- /*
				 * The tag in this template has been generated for use on a
				 * non-SSL page. If this tag is to be placed on an SSL page, change the
				 * 'http://ox-d.oncampusweb.com/...'
				 * to
				 * 'https://ox-d.oncampusweb.com/...'
				 */ -->

				<div id="538011957_INSERT_SLOT_ID_HERE" style="width:728px;height:90px;margin:0;padding:0">
				  <noscript><iframe id="b0a3382c00" name="b0a3382c00" src="http://ox-d.oncampusweb.com/w/1.0/afr?auid=538011957&cb=INSERT_RANDOM_NUMBER_HERE" frameborder="0" scrolling="no" width="728" height="90"><a href="http://ox-d.oncampusweb.com/w/1.0/rc?cs=b0a3382c00&cb=INSERT_RANDOM_NUMBER_HERE" ><img src="http://ox-d.oncampusweb.com/w/1.0/ai?auid=538011957&cs=b0a3382c00&cb=INSERT_RANDOM_NUMBER_HERE" border="0" alt=""></a></iframe></noscript>
				</div>
				<script type="text/javascript">
				  var OX_ads = OX_ads || [];
				  OX_ads.push({
				     slot_id: "538011957_INSERT_SLOT_ID_HERE",
				     auid: "538011957"
				  });
				</script>
			</div>
			<div class="clearfix"></div>
			<div class="row" id="header">
				<div class="row" id="custom-header">
					<a href=<?php echo $home; ?> class="logo">
						<?php
						if ($logo) {
							?><img src="<?php echo $logo; ?>" alt="<?php echo $siteName; ?>" /><?php
						}
						else {
							?><h1 class="header-text"><?php echo strtoupper($siteName); ?></h1><?php
						}
						?>
					</a>
				</div>
				<div class="clearfix"></div>
				<div class="row" id="description">
					<?php echo $siteDescription; ?>
				</div>
				<div class="clearfix"></div>
				<div class="row" id="header-nextline">
					<div class="col-md-4 center-block">
						<div class="col-md-12" id="info">
							<a href="<?php echo $issue; ?>" target="_blank">Online Edition</a>
						</div>
						<div class="col-md-12" id="date">
							<?php echo date('F j, Y'); ?>
						</div>
					</div>
						
					<div class="col-md-4 center-block" id="social-links">
						<ul>
							<?php
							if ($twitter) {
								?>
								<li id="twitter">
									<a href="<?php echo $twitter; ?>" target="_blank"><img src="<?php echo $templateURL; ?>/includes/img/twitter.png" /></a>
								</li>
								<?php
							}
							if ($facebook) {
								?>
								<li id="facebook">
									<a href="<?php echo $facebook; ?>" target="_blank"><img src="<?php echo $templateURL; ?>/includes/img/facebook.png" /></a>
								</li>
								<?php
							}
							if ($instagram) {
								?>
								<li id="instagram">
									<a href="<?php echo $instagram; ?>" target="_blank"><img src="<?php echo $templateURL; ?>/includes/img/instagram.png" /></a>
								</li>
								<?php
							}
							if ($youtube) {
								?>
								<li id="youtube">
									<a href="<?php echo $youtube; ?>" target="_blank"><img src="<?php echo $templateURL; ?>/includes/img/youtube.png" /></a>
								</li>
								<?php
							}
							?>
						</ul>
					</div>
					<div class="col-md-4 center-block" id="search">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		<div class="clearfix"></div>
			<div class="row" id="nav">
				<?php
				if (has_nav_menu('main')) {
					wp_nav_menu(
						array(
							'theme_location' => 'main',
							'depth' => 2,
							'container' => false,
							'menu_class' => 'nav navbar-nav',
							'walker' => new wp_bootstrap_navwalker()
						)
					);
				}
				?>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="container">