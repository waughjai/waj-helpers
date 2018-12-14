<?php

declare( strict_types = 1 );
namespace WaughJ\WPHelpers
{
	class WPLog
	{
		public function __construct( string $message )
		{
			$this->message = $message;
		}

		public function __toString()
		{
			return $this->message;
		}

		public function getMessage() : string
		{
			return $this->message;
		}

		public function persist() : void
		{
			file_put_contents( self::getFilename(), sanitize_text_field( $this->message ) . "\n", FILE_APPEND );
		}

		public static function clear() : void
		{
			file_put_contents( self::getFilename(), '' );
		}

		private static function getFilename() : string
		{
			return get_stylesheet_directory() . '/debug.log';
		}

		private $message;
	}
}
