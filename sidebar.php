<?php
$counter = 0;
$border = 'border';
?>
<div id="sidebar" class="col-md-4 pull-right">
<ul>
<?php if (is_home()) { ?>
	<li id="breaking-wrap-list-item" <?php echo 'class="'.$border.'"'; ?>>
		<h4>Breaking News</h4>
		<?php
		$showBreaking = new WP_Query();
		$showBreaking->query('category_name=breaking&showposts=3');
		if ($showBreaking->have_posts()) {
			while ($showBreaking->have_posts()) {
				$counter++;
				$showBreaking->the_post();
				if ($counter > 2) {
					$border = 'noborder';
				}
				?>
				<div class="breaking-story <?php echo $border; ?>">
					<h4><span id="datetime"><?php echo get_the_date("F j, g:i a - ");  ?></span><a id="breaking-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				</div>
				<?php
			}
		}
		?>
	</li>
	&nbsp;
<?php }
if (!function_exists('dynamic_sidebar') || !dynamic_sidebar(__('Primary Widgets','theburgh'))) : endif; ?>
</ul>
</div><!--end sidebar-->