<?php
get_header();
$sidebarActive = false;
if (is_active_sidebar('sidebar-primary')) {
	echo '<div class="row">';
	get_sidebar();
	$sidebarActive = true;
}
$counter = 0;
$border = 'border';
?>
<div id="main" class="border-right <?php if ($sidebarActive) { echo 'col-md-8'; } ?>">
	<div class="row border">
		<div class="col-md-8 pull-right" id="featured-wrap">
			<?php
			$showFeatured = new WP_Query();
			$args = array(
				'category_name' => 'featured',
				'showposts' => 1,
				'meta_key' => '_thumbnail_id');
			$showFeatured->query($args);
			if ($showFeatured->have_posts()) {
				while ($showFeatured->have_posts()) {
					$showFeatured->the_post();
					?>
					<div class="featured-story">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php
							if (has_post_thumbnail()) {
								the_post_thumbnail('small');
							}
							else {
								?><img src="<?php echo get_template_directory_uri();?>/includes/img/tpnfiller.jpg" /><?php
							}
							?>
						</a>
						<h2 id="featured-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<span class="meta-info"><?php _e('By', 'theburgh'); ?> <?php echo get_post_meta($post->ID, 'writer', true); ?>&nbsp;<?php echo human_time_diff(get_the_time('U'), current_time('timestamp')).' '.__('ago', 'theburgh').''; ?></span>
						<br /><?php echo substr(get_the_excerpt(), 0, 175); echo '...'; ?>
						<br /><a class="readmore" href="<?php the_permalink(); ?>"><?php _e('Read More', 'theburgh'); ?></a>
					</div>
					<?php
				}
			}
			?>
		</div>
		<div class="col-md-4 border-right" id="top-stories-wrap">
			<?php
			$showTopStories = new WP_Query();
			$args = array(
				'category_name' => 'top-stories',
				'showposts' => 2,
				'meta_key' => '_thumbnail_id');
			$showTopStories->query('category_name=top-stories&showposts=2');
			if ($showTopStories->have_posts()) {
				while ($showTopStories->have_posts()) {
					$counter++;
					if ($counter > 1) {
						$border = 'noborder';
					}
					$showTopStories->the_post();
					?>
					<div class="top-stories <?php echo $border; ?>">
						<h2 id="top-stories-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<span class="meta-info"><?php _e('By', 'theburgh'); ?> <?php echo get_post_meta($post->ID, 'writer', true); ?>&nbsp;<?php echo human_time_diff(get_the_time('U'), current_time('timestamp')).' '.__('ago', 'theburgh').''; ?></span>
						<br /><?php echo substr(get_the_excerpt(), 0, 175); echo '...'; ?>
						<br /><a class="readmore" href="<?php the_permalink(); ?>"><?php _e('Read More', 'theburgh'); ?></a>
					</div>
					<?php
				}
			}
			$counter = 0;
			?>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row border center-block" id="multimedia">
		<h2 id="multimedia-title">Multimedia</h2>
		<?php echo do_shortcode('[wonderplugin_slider id="1"]'); ?>
	</div>
	<div class="clearfix"></div>
	<?php
	$counter = 0;
	$border = 'border';
	$showPosts = get_theme_mod('theburgh_customizer_items');
	$homeCats = array(
					$cat1 = get_option('theburgh_posts_category_1', '0'),
					$cat2 = get_option('theburgh_posts_category_2'),
					$cat3 = get_option('theburgh_posts_category_3'),
					$cat4 = get_option('theburgh_posts_category_4'),
					$cat5 = get_option('theburgh_posts_category_5'),
					$cat6 = get_option('theburgh_posts_category_6'),
					$cat7 = get_option('theburgh_posts_category_7')
				);

	foreach ($homeCats as $homeCat) {
		if ($homeCat) {
			$catName = get_cat_name($homeCat);
			?>
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-6">
					<h2 class="catname">
						<a title="<?php _e('View All', 'theburgh'); ?> <?php echo $catName; ?> <?php _e('Articles', 'theburgh'); ?>" href="<?php echo get_category_link($homeCat); ?>"><?php echo $catName; ?></a>
					</h2>
				</div>
				<div class="col-md-6">
					<ul class="sub-cat-list">
						<?php //wp_list_categories('orderby=id&show_count=0&use_desc_for_title=0&child_of='.$homeCat); ?>
					</ul>
				</div>
			</div>
			<div class="cat-section-wrap border row">
				<?php
				$showPostsInCategory = new WP_Query();
				$args = array(
					'cat' => $homeCat,
					'showposts' => $showPosts,
					/*'meta_key' => '_thumbnail_id'*/);
				$showPostsInCategory->query($args);
				if ($showPostsInCategory->have_posts()) {
					while ($showPostsInCategory->have_posts()) {
						$showPostsInCategory->the_post();
						if ($counter == 0) {
							$counter++;
							?>
							<div class="cat-section-preview col-md-8">
								<div class="cat-section-content">
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<?php
									if (has_post_thumbnail()) {
										the_post_thumbnail('small');
									}
									else {
										?><img src="<?php echo get_template_directory_uri();?>/includes/img/tpnfiller.jpg" rel="TPN Image Filler" /><?php
									}
									?>
									</a>
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								</div>
							</div>
							<div class="cat-section-list col-md-4">
								<ul>
							<?php
						}
						else {
							$counter++;
							if ($counter >= $showPosts) {
								$border = 'noborder';
							}
							else {
								$border = 'border';
							}
							?>
							<li class="cat-section-list-item <?php echo $border; ?>">
								<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
								<span class="meta-info"><?php _e('By', 'theburgh'); ?> <?php echo get_post_meta($post->ID, 'writer', true); ?>&nbsp;<?php echo human_time_diff(get_the_time('U'), current_time('timestamp')).' '.__('ago', 'theburgh').''; ?></span>
							</li>
							<?php
						}
					}
					?>
					</ul>
					</div><?php
				}
				?>
				<br />
			</div>
			<?php
		}
		$counter = 0;
	}
	?>

</div>


<?php
if (is_active_sidebar('sidebar-primary')) {
	echo '</div><!--/row (main with sidebar row)-->';
	echo '<div class="clearfix"></div>';
}
get_footer();
?>