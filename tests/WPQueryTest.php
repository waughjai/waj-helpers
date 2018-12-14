<?php

use PHPUnit\Framework\TestCase;
use WaughJ\WPHelpers\WPQuery;

class WPQueryTest extends TestCase
{
	public function testBasic()
	{
		$query = new WPQuery();
		$query_content = $query->getQueryContent
		(
			function()
			{
				return get_the_title();
			}
		);
		$this->assertEquals( [ '1st Post', '2nd Post', '3rd Post' ], $query_content );
	}

	public function testPrint()
	{
		$query = new WPQuery();
		ob_start();
		$query_content = $query->printQueryContent
		(
			function()
			{
				return get_the_title();
			}
		);
		$this->assertEquals( '1st Post2nd Post3rd Post', ob_get_clean() );
	}
}

function get_the_title()
{
	global $post;
	return $post->title;
}

function wp_reset_postdata(){}

class WP_Query
{
	public function __construct( $args )
	{
		$this->posts =
		[
			new WP_Post2( '1st Post' ),
			new WP_Post2( '2nd Post' ),
			new WP_Post2( '3rd Post' )
		];
	}

	public function have_posts()
	{
		return !empty( $this->posts );
	}

	public function the_post()
	{
		global $post;
		$post = array_shift( $this->posts );
	}

	private $posts;
}

class WP_Post2
{
	public function __construct( $title )
	{
		$this->title = $title;
	}

	public $title;
}
