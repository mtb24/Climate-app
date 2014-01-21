<?php
/**
 * Routes configuration
 *
 */

        Router::mapResources('readings');
        Router::parseExtensions('json');
        Router::connect('/', array('controller' => 'readings', 'action' => 'index', 'index'));


/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
