<?php

//Theme customizer Menu Item
add_action('admin_menu', 'theburgh_customizer_admin');
function theburgh_customizer_admin() {
	add_theme_page(
		__('Theme Options', 'theburgh'),
		__('Theme Options', 'theburgh'),
		'edit_theme_options',
		'customize.php'
	);
}

//Theme Customizer Settings
add_action('customize_register', 'theburgh_customizer_register');
function theburgh_customizer_register($wp_customize) {
	
	//Create textarea option
	class Example_Customize_Textarea_Control extends WP_Customize_Control {
		public $type = 'textarea';

		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
				<textarea rows="5" style="width:100%;" <?php $this->link(); ?>> <?php echo esc_textarea($this->value()); ?></textarea>
			</label>
			<?php
		}
	}
	
	//Create category dropdown
	$options_categories = array();
	$options_categories_obj = get_categories();
	$options_categories[''] = 'Select A Category';
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	//Sanitization
	function theburgh_sanitize_text($input) {
		return wp_kses_post($input);
	}
	function theburgh_sanitize_checkbox($input) {
		if ($input == 1) {
			return 1;
		}
		return '';
	}
	function theburgh_sanitize_number($input) {
		if (is_numeric($input)) {
			return $input;
		}
		return ''; 
	}
	function theburgh_sanitize_category($input) {
		$options_categories = array();
		$options_categories_obj = get_categories();
		$options_categories[''] = 'Select a Category';
		foreach ($options_categories_obj as $category) {
			$options_categories[$category->cat_ID] = $category->cat_name;
		}

		$valid = $options_categories;
		if (array_key_exists($input, $valid)) {
			return $input;
		}
		return '';
	}

	//Logo Section
	$wp_customize->add_setting('theburgh_customizer_logo', array('sanitize_callback' => 'esc_url_raw'));
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'theburgh_customizer_logo',
			array(
				'label' => __('Logo', 'theburgh'),
				'section' => 'title_tagline',
				'settings' => 'theburgh_customizer_logo',
				'priority' => 1
			)
		)
	);

	//Colors Section
	$wp_customize->add_setting(
		'theburgh_customizer_link_color',
		array(
			'default' => '#0A67B3',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'theburgh_customizer_link_color',
			array(
				'label' => __('Link Color', 'theburgh'),
				'section' => 'colors',
				'settings' => 'theburgh_customizer_link_color'
			)
		)
	);

	//General Section
	$wp_customize->add_section(
		'theburgh_customizer_general_section',
		array(
			'title' => __('General', 'theburgh'),
			'priority' => 195
		)
	);

	//Link for Today's Paper Issue
	$wp_customize->add_setting(
		'theburgh_customizer_issue',
		array(
			'sanitize_callback' => 'esc_url_raw'
		)
	);
	$wp_customize->add_control(
		'theburgh_customizer_issue',
		array(
			'label' => __('Issue URL', 'theburgh'),
			'section' => 'theburgh_customizer_general_section',
			'settings' => 'theburgh_customizer_issue',
			'type' => 'text',
			'priority' => 2
		)
	);

	//Google Custom search script
	$wp_customize->add_setting(
		'theburgh_customizer_search',
		array()
	);
	$wp_customize->add_control(
		'theburgh_customizer_search',
		array(
			'label' => __('Google Custom Search Script', 'theburgh'),
			'section' => 'theburgh_customizer_general_section',
			'settings' => 'theburgh_customizer_search',
			'type' => 'theme_mod',
			'priority' => 3
		)
	);

	//Favicon
	$wp_customize->add_setting(
		'theburgh_customizer_favicon',
		array(
			'sanitize_callback' => 'esc_url_raw'
		)
	);
	$wp_customize->add_control(
		'theburgh_customizer_favicon',
		array(
			'label' => __('Favicon URL (optional)', 'theburgh'),
			'section' => 'theburgh_customizer_general_section',
			'settings' => 'theburgh_customizer_favicon',
			'type' => 'text',
			'priority' => 8
		)
	);

	//Social Section
	$wp_customize->add_section(
		'theburgh_customizer_social_section',
		array(
			'title' => __('Social Links', 'theburgh'),
			'priority' => 197
		)
	);

	//Twitter
	$wp_customize->add_setting(
		'theburgh_customizer_twitter',
		array(
			'sanitize_callback' => 'esc_url_raw'
		)
	);
	$wp_customize->add_control(
		'theburgh_customizer_twitter',
		array(
			'label' => __('Twitter URL', 'theburgh'),
			'section' => 'theburgh_customizer_social_section',
			'settings' => 'theburgh_customizer_twitter',
			'type' => 'text',
			'priority' => 3
		)
	);

	//Facebook
	$wp_customize->add_setting(
		'theburgh_customizer_facebook',
		array(
			'sanitize_callback' => 'esc_url_raw'
		)
	);
	$wp_customize->add_control(
		'theburgh_customizer_facebook',
		array(
			'label' => __('Facebook URL', 'theburgh'),
			'section' => 'theburgh_customizer_social_section',
			'settings' => 'theburgh_customizer_facebook',
			'type' => 'text',
			'priority' => 4
		)
	);

	//Instagram
	$wp_customize->add_setting(
		'theburgh_customizer_instagram',
		array(
			'sanitize_callback' => 'esc_url_raw'
		)
	);
	$wp_customize->add_control(
		'theburgh_customizer_instagram',
		array(
			'label' => __('Instagram URL', 'theburgh'),
			'section' => 'theburgh_customizer_social_section',
			'settings' => 'theburgh_customizer_instagram',
			'type' => 'text',
			'priority' => 5
		)
	);

	//Youtube
	$wp_customize->add_setting(
		'theburgh_customizer_youtube',
		array(
			'sanitize_callback' => 'esc_url_raw'
		)
	);
	$wp_customize->add_control(
		'theburgh_customizer_youtube',
		array(
			'label' => __('Youtube URL', 'theburgh'),
			'section' => 'theburgh_customizer_social_section',
			'settings' => 'theburgh_customizer_youtube',
			'type' => 'text',
			'priority' => 6
		)
	);

	//Home Section
	$wp_customize->add_section(
		'theburgh_customizer_home_section',
		array(
			'title' => __('Home Page', 'theburgh'),
			'priority' => 198
		)
	);

	//No. of items
	$wp_customize->add_setting(
		'theburgh_customizer_items',
		array(
			'deafult' => 8,
			'sanitize_callback' => 'theburgh_sanitize_number'
		)
	);
	$wp_customize->add_control(
		'theburgh_customizer_items',
		array(
			'label' => __('Number of items to display', 'theburgh'),
			'section' => 'theburgh_customizer_home_section',
			'settings' => 'theburgh_customizer_items',
			'type' => 'text',
			'priority' => 1
		)
	);

	//Category 1
	$wp_customize->add_setting(
		'theburgh_posts_category_1',
		array(
			'capability' => 'edit_theme_options',
			'type' => 'option',
			'sanitize_callback' => 'theburgh_sanitize_category'
		)
	);
	$wp_customize->add_control(
		'theburgh_posts_category_1',
		array(
			'settings' => 'theburgh_posts_category_1',
			'label' => __('Category 1', 'theburgh'),
			'section' => 'theburgh_customizer_home_section',
			'type' => 'select',
			'choices' => $options_categories,
			'priority' => 2
		)
	);

	//Category 2
	$wp_customize->add_setting(
		'theburgh_posts_category_2',
		array(
			'capability' => 'edit_theme_options',
			'type' => 'option',
			'sanitize_callback' => 'theburgh_sanitize_category'
		)
	);
	$wp_customize->add_control(
		'theburgh_posts_category_2',
		array(
			'settings' => 'theburgh_posts_category_2',
			'label' => __('Category 2', 'theburgh'),
			'section' => 'theburgh_customizer_home_section',
			'type' => 'select',
			'choices' => $options_categories,
			'priority' => 3
		)
	);

	//Category 3
	$wp_customize->add_setting(
		'theburgh_posts_category_3',
		array(
			'capability' => 'edit_theme_options',
			'type' => 'option',
			'sanitize_callback' => 'theburgh_sanitize_category'
		)
	);
	$wp_customize->add_control(
		'theburgh_posts_category_3',
		array(
			'settings' => 'theburgh_posts_category_3',
			'label' => __('Category 3', 'theburgh'),
			'section' => 'theburgh_customizer_home_section',
			'type' => 'select',
			'choices' => $options_categories,
			'priority' => 4
		)
	);

	//Category 4
	$wp_customize->add_setting(
		'theburgh_posts_category_4',
		array(
			'capability' => 'edit_theme_options',
			'type' => 'option',
			'sanitize_callback' => 'theburgh_sanitize_category'
		)
	);
	$wp_customize->add_control(
		'theburgh_posts_category_4',
		array(
			'settings' => 'theburgh_posts_category_4',
			'label' => __('Category 4', 'theburgh'),
			'section' => 'theburgh_customizer_home_section',
			'type' => 'select',
			'choices' => $options_categories,
			'priority' => 5
		)
	);

	//Category 5
	$wp_customize->add_setting(
		'theburgh_posts_category_5',
		array(
			'capability' => 'edit_theme_options',
			'type' => 'option',
			'sanitize_callback' => 'theburgh_sanitize_category'
		)
	);
	$wp_customize->add_control(
		'theburgh_posts_category_5',
		array(
			'settings' => 'theburgh_posts_category_5',
			'label' => __('Category 5', 'theburgh'),
			'section' => 'theburgh_customizer_home_section',
			'type' => 'select',
			'choices' => $options_categories,
			'priority' => 6
		)
	);

	//Category 6
	$wp_customize->add_setting(
		'theburgh_posts_category_6',
		array(
			'capability' => 'edit_theme_options',
			'type' => 'option',
			'sanitize_callback' => 'theburgh_sanitize_category'
		)
	);
	$wp_customize->add_control(
		'theburgh_posts_category_6',
		array(
			'settings' => 'theburgh_posts_category_6',
			'label' => __('Category 6', 'theburgh'),
			'section' => 'theburgh_customizer_home_section',
			'type' => 'select',
			'choices' => $options_categories,
			'priority' => 7
		)
	);

	//Category 7
	$wp_customize->add_setting(
		'theburgh_posts_category_7',
		array(
			'capability' => 'edit_theme_options',
			'type' => 'option',
			'sanitize_callback' => 'theburgh_sanitize_category'
		)
	);
	$wp_customize->add_control(
		'theburgh_posts_category_7',
		array(
			'settings' => 'theburgh_posts_category_7',
			'label' => __('Category 7', 'theburgh'),
			'section' => 'theburgh_customizer_home_section',
			'type' => 'select',
			'choices' => $options_categories,
			'priority' => 8
		)
	);

	//Footer Section
	$wp_customize->add_section(
		'theburgh_customizer_footer_section',
		array(
			'title' => __('Footer', 'theburgh'),
			'priority' => 199
		)
	);
}

?>