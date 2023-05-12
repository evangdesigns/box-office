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

namespace BoxOffice\Common;

use BoxOffice\App\Frontend\Templates;
use BoxOffice\Common\Abstracts\Base;

/**
 * Main function class for external uses
 *
 * @see box_office()
 * @package BoxOffice\Common
 */
class Functions extends Base {
	/**
	 * Get plugin data by using box_office()->getData()
	 *
	 * @return array
	 * @since 1.0.0
	 */
	public function getData(): array {
		return $this->plugin->data();
	}

	/**
	 * Get the template instantiated class using box_office()->templates()
	 *
	 * @return Templates
	 * @since 1.0.0
	 */
	public function templates(): Templates {
		return new Templates();
	}
}
