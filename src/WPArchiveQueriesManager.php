<?php

declare( strict_types = 1 );
namespace WaughJ\WPHelpers
{
	use WP_Query;

	class WPArchiveQueriesManager
	{
		public static function init() : void
		{
			add_action( 'pre_get_posts', [ self::class, 'applyQueries' ] );
		}

		public static function addPostTypeQueries( array $queries ) : void
		{
			foreach ( $queries as $type => $args )
			{
				SELF::setPostTypeQuery( $type, $args );
			}
		}

		public static function setPostTypeQuery( string $type, array $args ) : void
		{
			self::$queries[ $type ] = $args;
		}

		public static function applyQueries( WP_Query $query ) : void
		{
			if ( is_array( self::$queries ) && !TestIsAdmin() && $query->is_main_query() )
			{
				foreach ( self::$queries as $type => $args )
				{
					if ( is_post_type_archive( $type ) )
					{
						foreach ( $sets as $set_key => $set_value )
						{
							$query->set( $set_key, $set_value );
						}
					}
				}
			}
		}

		private static $queries = [];
	}
}
