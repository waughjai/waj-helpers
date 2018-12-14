<?php

	/*
	Plugin Name:  WAJ Helpers
	Plugin URI:   https://github.com/waughjai/waj-helpers
	Description:  Short functions that simplify common WordPress tasks.
	Version:      1.0.0
	Author:       Jaimeson Waugh
	Author URI:   https://www.jaimeson-waugh.com
	License:      GPL2
	License URI:  https://www.gnu.org/licenses/gpl-2.0.html
	Text Domain:  waj-helpers
	*/

	namespace WaughJ\WPHelpers
	{
		require_once( 'vendor/autoload.php' );

		WPArchiveQueriesManager::init();
	}
?>
