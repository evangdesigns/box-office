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

namespace BoxOffice\Compatibility\Siteground;

/**
 * Class Example
 *
 * @package BoxOffice\Compatibility\Siteground
 * @since 1.0.0
 */
class Example {

	/**
	 * Initialize the class.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		/**
		 * Add 3rd party compatibility code here.
		 * Compatibility classes instantiates after anything else
		 *
		 * @see Bootstrap::__construct
		 */
		add_filter( 'sgo_css_combine_exclude', [ $this, 'excludeCssCombine' ] );
	}

	/**
	 * Siteground optimizer compatibility.
	 *
	 * @param array $exclude_list
	 *
	 * @return array
	 * @since 1.0.0
	 */
	public function excludeCssCombine( array $exclude_list ): array {
		$exclude_list[] = 'plugin-name-frontend-css';

		return $exclude_list;
	}
}
