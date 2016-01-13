<?php
get_header();
$sidebarActive = false;
if (is_active_sidebar('sidebar-primary')) {
	echo '<div class="row">';
	get_sidebar();
	$sidebarActive = true;
}
?>
<div class="main <?php if ($sidebarActive) { echo 'col-md-8'; } ?>" id="single-post">
<?php
if (have_posts()) {
	while (have_posts()) {
		the_post();
		?>
		<h2><?php the_title(); ?></h2>
		<span class="meta-info"><?php echo get_post_meta($post->ID, 'writer', true); ?> | <?php the_date(); ?></span>
		<br />&nbsp;
		<?php if (has_post_thumbnail()) { ?>
		<div id="featured-image">
			<?php
			the_post_thumbnail('large');
			$imgdata = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
			echo '<br /><span class="caption-text" style="max-width:'.$imgdata[1].'px;display:block;margin:auto;">'.get_post(get_post_thumbnail_id())->post_excerpt.'</span><br />';
			?>
		</div>
		<br />&nbsp;
		<?php } ?>
		<div class="content">
			<?php the_content(); ?>
		</div>
		<?php
	}
}
echo '</div>';
if (is_active_sidebar('sidebar-primary')) {
	echo '</div><!--/row (main with sidebar row)-->';
	echo '<div class="clearfix"></div>';
}
get_footer();
?>