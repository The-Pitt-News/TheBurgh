<?php get_header(); ?>

<div id="main">
	<?php
	if (have_posts()) {
		while (have_posts()) {
			the_post();
			?>
			<h2 class="entry-title"><?php the_title(); ?></h2>
			<div class="entry">
				<?php the_content(); ?>
			</div>
			<?php
		}
	}
	?>
</div>

<?php get_footer(); ?>