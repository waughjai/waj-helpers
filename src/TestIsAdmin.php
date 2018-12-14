<?php

declare( strict_types = 1 );
namespace WaughJ\WPHelpers
{
	function TestIsAdmin() : bool
	{
		return current_user_can( 'manage_options' );
	}
}
