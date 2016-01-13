<?php

//Content Width
if (!isset($content_width)) {
	$content_width = 720;
}

//Theme Supports
add_theme_support('automatic-feed-links');								//Auto Feed Links
add_theme_support('post-thumbnails', array('post'));					//Featured image
add_theme_support('menus');												//Menus
add_theme_support('html5', array('search-form'));

//include theme options
include(TEMPLATEPATH.'/includes/theme-options.php');

//include bootstrap-navwalker
include(TEMPLATEPATH.'/includes/bootstrap_navwalker/wp_bootstrap_navwalker.php');

//Featured Image supports
set_post_thumbnail_size(300, 224, true);
add_image_size('slider', 260 , 194, true);

//Register Menus
register_nav_menu('main', __('Main Navigation Menu', 'theburgh'));
register_nav_menu('topLeft', __('Top Left Section', 'theburgh'));
register_nav_menu('footer', __('Footer Menu', 'theburgh'));

//Generate Sidebars
add_action('widgets_init', 'theburgh_widgets_init');
function theburgh_widgets_init() {
	register_sidebar(
		array(
			'name' => __('Primary Widgets', 'theburgh'),
			'id' => 'sidebar-primary',
			'before_widget' => '<li id="%1$s" class="%2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>'
		)
	);
}

add_action('template_include', 'theburgh_specials_template');
function theburgh_specials_template($template) {
	$new_template = '';

	if (is_single()) {
		global $post;

		if (has_term('longform', 'category', $post)) {
			$new_template = locate_template(array('single-special.php'));
		}
	}

	if ('' != $new_template) {
		return $new_template;
	}
	return $template;
}

//Custom Metaboxes
add_action('add_meta_boxes', 'theburgh_custom_meta');
function theburgh_custom_meta() {
	add_meta_box('excerpt_meta', 'Excerpt', 'theburgh_custom_meta_text_callback', 'post', 'normal', 'high');
}
function theburgh_custom_meta_text_callback($post) {
	wp_nonce_field(basename(__FILE__), 'theburgh_nonce');
	$theburgh_stored_meta = get_post_meta($post->ID);
	?><textarea rows="5" cols="100" type="text" name="meta-text" id="meta-text" value="<?php if (isset($theburgh_stored_meta['meta-text'])) { echo $theburgh_stored_meta['meta-text'][0]; } ?>"></textarea><?php
}

add_action('save_post', 'theburgh_meta_save');
function theburgh_meta_save($post_id) {
	$is_autosave = wp_is_post_autosave($post_id);
	$is_revision = wp_is_post_revision($post_id);
	$is_valid_nonce = (isset($_POST['theburgh_nonce']) && wp_verify_nonce($_POST['theburgh_nonce'], basename(__FILE__))) ? 'true' : 'false';

	if ($is_autosave || $is_revision || $is_valid_nonce) {
		return;
	}

	if (isset($_POST['meta-text'])) {
		update_post_meta($post_id, 'meta-text', sanitize_text_field($_POST['meta-text']));
	}
}

?>