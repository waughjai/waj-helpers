<?php

use PHPUnit\Framework\TestCase;
use WaughJ\WPHelpers\WPLog;

class WPLogTest extends TestCase
{
	public function testBasic()
	{
		WPLog::clear();
		$this->assertEquals( "", file_get_contents( get_stylesheet_directory() . '/debug.log' ) );
		$log = new WPLog( 'Here is my message' );
		$log->persist();
		$this->assertEquals( "Here is my message\n", file_get_contents( get_stylesheet_directory() . '/debug.log' ) );
	}
}

function get_stylesheet_directory()
{
	return getcwd() . '/tests';
}

function sanitize_text_field( $text )
{
	return $text;
}
