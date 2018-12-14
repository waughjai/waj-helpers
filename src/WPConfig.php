<?php

declare( strict_types = 1 );
namespace WaughJ\WPHelpers
{
	class WPConfig
	{
		public static function turnOnThumbnails() : void
		{
			add_theme_support( 'post-thumbnails' );
			self::$thumbnails = true;
		}

		public static function turnOffThumbnails() : void
		{
			remove_theme_support( 'post-thumbnails' );
			self::$thumbnails = false;
		}

		public static function testThumbnails() : bool
		{
			return self::$thumbnails;
		}

		public static function removeAutoP() : void
		{
			remove_filter( 'the_content', 'wpautop' );
			self::$auto_p = false;
		}

		public static function addAutoP() : void
		{
			add_filter( 'the_content', 'wpautop' );
			self::$auto_p = true;
		}

		public static function testAutoP() : bool
		{
			return self::$auto_p;
		}

		public static function turnOffErrorsForPublicSite() : void
		{
			if ( TestIsAdmin() )
			{
				self::turnOffErrors();
			}
		}

		public static function turnOffErrors() : void
		{
			self::setErrors( 'off' );
			self::$errors = false;
		}

		public static function turnOnErrors() : void
		{
			self::setErrors( 'on' );
			self::$errors = true;
		}

		public static function testShowErrors() : bool
		{
			if ( self::$errors === null )
			{
				self::$errors = ( bool )( ini_get( 'display_errors' ) );
			}
			return self::$errors;
		}

		private static function setErrors( $value ) : void
		{
			ini_set( 'display_errors', $value );
			ini_set( 'display_warnings', $value );
		}

		private static $thumbnails = false;
		private static $auto_p = true;
		private static $errors = null;
	}
}
