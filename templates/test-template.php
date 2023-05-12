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
?>
<p>
    <?php
    /**
     * @see \BoxOffice\App\Frontend\Templates
     * @var $args
     */
    echo __( 'This is being loaded inside "wp_footer" from the templates class', 'box-office' ) . ' ' . $args[ 'data' ][ 'text' ];
    ?>
</p>
