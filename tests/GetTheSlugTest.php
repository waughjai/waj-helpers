<?php

use PHPUnit\Framework\TestCase;
use function WaughJ\WPHelpers\GetTheSlug;

class GetTheSlugTest extends TestCase
{
	public function testBasic()
	{
		$this->assertEquals( 'current-post', GetTheSlug() );
		$this->assertEquals( '1st-post', GetTheSlug( 1 ) );
	}
}

class WP_Post
{
	public function __construct( $slug )
	{
		$this->post_name = $slug;
	}

	public $post_name;
}

global $post;
$post = new WP_Post( 'current-post' );

function get_post( $id )
{
	$posts =
	[
		new WP_Post( '1st-post' )
	];
	return $posts[ $id - 1 ];
}
