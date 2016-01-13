<?php
get_header();
get_header();
$sidebarActive = false;
if (is_active_sidebar('sidebar-primary')) {
	echo '<div class="row">';
	get_sidebar();
	$sidebarActive = true;
}
$cat = get_category(get_query_var('cat'))->slug;
?>

<div class="main <?php if ($sidebarActive) { echo 'col-md-8'; } ?>">
<?php
query_posts(
	array(
		'category_name' => $cat,
		'post_type' => 'post',
		'posts_per_page' => '10',
		'paged' => $paged
	)
);
if (have_posts()) {
	while (have_posts()) {
		the_post();
		?>
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<div class="row" id="cat-page-row">
			<?php
			if (has_post_thumbnail()) {
				?>
				<div class="col-md-4">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('slider'); ?></a>
				</div>
				<?
			}
			?>
			<div class="<?php echo (has_post_thumbnail() ? 'col-md-8 thumb' : 'col-md-12'); ?>">
				<span class="meta-info"><?php _e('By', 'theburgh'); ?> <?php echo get_post_meta($post->ID, 'writer', true); ?>&nbsp;<?php echo human_time_diff(get_the_time('U'), current_time('timestamp')).' '.__('ago', 'theburgh').''; ?></span><br />
				<?php the_excerpt(); ?>
				<a class="readmore" href="<?php the_permalink(); ?>"><?php _e('Read More', 'theburgh'); ?></a>
			</div>
		</div>
		<hr />
		<?php
	}
	wp_reset_query();
}

echo '<p class="paginate-links">'.paginate_links(array('mid_size' => 3)).'</p>';
echo '</div>';

if (is_active_sidebar('sidebar-primary')) {
	echo '</div><!--/row (main with sidebar row)-->';
	echo '<div class="clearfix"></div>';
}

get_footer();
?>