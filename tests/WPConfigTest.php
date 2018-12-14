<?php

use PHPUnit\Framework\TestCase;
use WaughJ\WPHelpers\WPConfig;

class WPConfigTest extends TestCase
{
	public function testThumbnails()
	{
		$this->assertFalse( WPConfig::testThumbnails() );
		WPConfig::turnOnThumbnails();
		$this->assertTrue( WPConfig::testThumbnails() );
		WPConfig::turnOffThumbnails();
		$this->assertFalse( WPConfig::testThumbnails() );
	}

	public function testAutoP()
	{
		$this->assertTrue( WPConfig::testAutoP() );
		WPConfig::removeAutoP();
		$this->assertFalse( WPConfig::testAutoP() );
		WPConfig::addAutoP();
		$this->assertTrue( WPConfig::testAutoP() );
	}

	public function testErrors()
	{
		$this->assertEquals( ini_get( 'display_errors' ), WPConfig::testShowErrors() );
		WPConfig::turnOffErrors();
		$this->assertFalse( WPConfig::testShowErrors() );
		WPConfig::turnOnErrors();
		$this->assertTrue( WPConfig::testShowErrors() );
	}
}

function add_theme_support() {};
function remove_theme_support() {};
function remove_filter() {};
function add_filter() {};
