<?php get_header(); ?>
<?php
$s=get_search_query();
$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
$args = array(
	's' => $s,
	'posts_per_page' => 10,
	'paged' => $paged
);
$args['meta_query'][] = array(
	'key' => 'writer',
	'value' => $s,
	'compare' => 'LIKE'
);
	// The Query
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
		_e("<h2 style='font-weight:bold;color:#000'>Search Results for: ".get_query_var('s')."</h2>");
		while ( $the_query->have_posts() ) {
		   $the_query->the_post();
				 ?>
					<li class="search-item">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php
						if (has_post_thumbnail()) {
							the_post_thumbnail();
						}
						?>
						</a>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<span class="meta-info"><?php _e('By', 'theburgh'); ?> <?php echo get_post_meta($post->ID, 'writer', true); ?>&nbsp;<?php echo human_time_diff(get_the_time('U'), current_time('timestamp')).' '.__('ago', 'theburgh').''; ?></span>
						<p><?php the_excerpt(); ?></p>
					</li>
				 <?php
		}
	}else{
?>
		<h2 style='font-weight:bold;color:#000'>Nothing Found</h2>
		<div class="alert alert-info">
		  <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
		</div>
<?php } ?>

<?php

$big = 999999999; // need an unlikely integer

echo '<p class="paginate-links">';
echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $the_query->max_num_pages
) );
echo '</p>';

?>

<?php get_footer(); ?>