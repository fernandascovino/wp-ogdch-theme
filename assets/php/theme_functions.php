<?php

/**
 * Get localized metafield value.
 *
 * @param int    $post_id   The ID of the post.
 * @param string $meta_name Name of the metafield to return.
 *
 * @return bool
 */
function get_localized_meta( $post_id, $meta_name ) {
	global $language_priority;

	// try to get meta in current language
	$localized_meta = get_post_meta( $post_id, $meta_name . pll_current_language(), true );
	if ( ! empty( $localized_meta ) ) {
		return $localized_meta;
	}

	// use other languages as fallback
	foreach ( $language_priority as $lang ) {
		$localized_meta = get_post_meta( $post_id, $meta_name . $lang, true );
		if ( ! empty( $localized_meta ) ) {
			return $localized_meta;
		}
	}
	return false;
}

/**
 * Add class to current item.
 *
 * @param array $classes Array of CSS classes.
 * @param mixed $item    Item.
 *
 * @return array
 */
function add_class_to_current_item( $classes, $item ) {
	if ( in_array( 'current-menu-item', $classes ) ) {
		$classes[] = 'active ';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class' , 'add_class_to_current_item' , 10 , 2 );

/**
 * Get relative link to page
 *
 * @param string $slug The slug to link to.
 *
 * @return string
 */
function get_page_link_by_slug( $slug ) {
	return '/' . pll_current_language() . '/' . $slug;
}

/**
 * Number of post of specified type
 *
 * @param string $post_type Name of post type.
 *
 * @return int|mixed
 */
function get_localized_post_count( $post_type ) {
	// @codingStandardsIgnoreStart
	$args = array(
		'post_type' => $post_type,
		'posts_per_page' => -1,
	);
	$posts = new WP_Query( $args );
	// @codingStandardsIgnoreEnd
	return $posts->found_posts;
}

/**
 * Get dataset count from CKAN
 *
 * @return int
 */
function get_dataset_count() {
	$transient_name = 'ogdch_dataset_count';
	if ( false === ( $dataset_count = get_transient( $transient_name ) ) ) {
		$endpoint = CKAN_API_ENDPOINT . 'action/ogdch_dataset_count';
		$response = Ckan_Backend_Helper::do_api_request( $endpoint );
		$errors   = Ckan_Backend_Helper::check_response_for_errors( $response );

		if ( 0 === count( $errors ) ) {
			$dataset_count     = $response['result'];

			// save result in transient
			set_transient( $transient_name, $dataset_count, 1 * HOUR_IN_SECONDS );
		} else {
			$dataset_count = array(
				'total_count' => 'N/A',
				'groups' => array(),
			);
		}
	}

	return $dataset_count;
}
