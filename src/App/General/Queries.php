<?php
/**
 * Box Office
 *
 * @package   box-office
 * @author    Evan G <evangdesigns@gmail.com>
 * @copyright 2023 Box Office
 * @license   MIT
 * @link      https://evangdesigns.com
 */

declare( strict_types = 1 );

namespace BoxOffice\App\General;

use BoxOffice\Common\Abstracts\Base;
use BoxOffice\App\General\PostTypes;

/**
 * Class Queries
 *
 * @package BoxOffice\App\General
 * @since 1.0.0
 */
class Queries extends Base {

	/**
	 * Initialize the class.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		/**
		 * This general class is always being instantiated as requested in the Bootstrap class
		 *
		 * @see Bootstrap::__construct
		 *
		 * Add plugin code here
		 */
	}

	/**
	 * @param $posts_count
	 * @param string $orderby
	 * @return \WP_Query
	 */
	public function getPosts( $posts_count, $orderby = 'date' ): \WP_Query {
		return new \WP_Query(
			[
				'post_type'      => PostTypes::POST_TYPE['id'],
				'post_status'    => 'publish',
				'order'          => 'DESC',
				'posts_per_page' => $posts_count,
				'orderby'        => $orderby,
			]
		);
	}

	/**
	 * Example
	 *
	 * @return array
	 */
	public function getPostIds(): array {
		global $wpdb;
		return $wpdb->get_col( "select ID from {$wpdb->posts} LIMIT 3" );
	}
}
