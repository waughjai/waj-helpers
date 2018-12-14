<?php

declare( strict_types = 1 );
namespace WaughJ\WPHelpers
{
	use WP_Post;

	function GetTheSlug( $given_post = null ) : ?string
	{
		if ( $given_post === null )
		{
			global $post;
		}
		else if ( is_numeric( $given_post ) )
		{
			$post = get_post( $given_post );
		}
		return ( is_object( $post ) && is_a( $post, WP_Post::class ) ) ? $post->post_name : null;
	}
}
