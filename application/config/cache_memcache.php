<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * @package  Cache:Memcache
 *
 * memcache server configuration.
 */
$config['servers'] = array
(
	array
	(
		'host' => '10.105.144.68',
		'port' => 11211,
		'persistent' => FALSE,
	)
);

/**
 * Enable cache data compression.
 */
$config['compression'] = FALSE;
