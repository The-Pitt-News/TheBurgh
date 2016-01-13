<?php
/*
 * Template Name: Contact Page
 * Author Name: Steven Roomberg
*/
?>

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
	<?php
	if (have_posts()) {
		while (have_posts()) {
			the_post();
			the_content();
		}
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