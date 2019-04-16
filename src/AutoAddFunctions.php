<?php

declare( strict_types = 1 );
namespace WaughJ\WPHelpers
{
	use WaughJ\Directory\Directory;
	use WaughJ\File\File;

	function AutoAddFunctions( string $directory_string )
	{
		$directory = new Directory([ get_stylesheet_directory(), $directory_string ]);
		$functions = scandir( $directory->getString() );
		foreach ( $functions as $function )
		{
			if ( $function !== '' && $function !== '.' && $function !== '..' )
			{
				$file = new File( $function, null, $directory );
				require_once( $file->getFullFilename() );
			}
		}
	}
}
