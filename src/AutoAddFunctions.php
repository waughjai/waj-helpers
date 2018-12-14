<?php

declare( strict_types = 1 );
namespace WaughJ\WPHelpers
{
	function AutoAddFunctions()
	{
		$functions = scandir( get_stylesheet_directory() . '/functions' );
		foreach ( $functions as $function )
		{
			if ( $function !== '' && $function !== '.' && $function !== '..' )
			{
				require_once( get_stylesheet_directory() . '/functions/' . $function );
			}
		}
	}
}
