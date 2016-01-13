<?php
locate_template(array('header-special.php'), true);
?>
<?php if (has_post_thumbnail()) { ?>
<br />
<div id="featured-image">
	<?php
	the_post_thumbnail('large');
	$imgdata = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
	echo '<br /><span class="caption-text" style="max-width:'.$imgdata[1].'px;display:block;margin:auto;">'.get_post(get_post_thumbnail_id())->post_excerpt.'</span><br />';
	?>
</div>
<br />&nbsp;
<?php } ?>
<div class="main center-block" id="single-post special">
<?php
if (have_posts()) {
	while (have_posts()) {
		the_post();
		$backdrop_style = "";
		?>
		<div class="text-center">
			<h2><?php the_title(); ?></h2>
			<span class="meta-info"><?php echo get_post_meta($post->ID, 'writer', true); ?> | <?php the_date(); ?></span>
		</div>
		<br />&nbsp;
		<div class="content center-block">
			<?php the_content(); ?>
		</div>
		<?php
	}
}
echo '</div>';
get_footer();
?>