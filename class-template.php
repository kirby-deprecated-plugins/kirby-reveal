<?php
class reveal {
	public static function kirbytext( $content, $page ) {
		$field = new Field($page, null, $content);
		return $field->kt();
	}
}


class RevealTemplate {
	// Get
	public static function get( $post ) {
		$blueprintfile = self::blueprintFile( $post );
		$html = '{{reveal}}';

		// Blueprint template
		if( ! empty( $post['template_filename'] ) && file_exists( $blueprintfile ) ) {
			$html = tpl::load( $blueprintfile );
		// Fallback
		} elseif( file_exists( self::fallback() ) ) {
			$html = tpl::load( self::fallback(), array( 'post' => $post ) );
		}

		return $html;
	}

	// Has template
	public static function hasTemplate( $filename ) {
		if( file_exists( self::intendedTemplate( $filename ) ) ) {
			return true;
		}
	}

	// Intended template
	public static function intendedTemplate( $filename ) {
		return self::root() . DS . $filename . '.php';
	}

	// Template path
	public static function path( $filename ) {
		if( self::hasTemplate( $filename ) ) {
			$path = self::intendedTemplate( $filename );
		} else {
			$path = self::fallback( $filename );
		}
		return $path;
	}

	// Root
	public static function root() {
		return c::get('plugin.reveal.template.root', kirby()->roots()->snippets() . DS . 'reveal');
	}

	// Fallback
	public static function fallback() {
		return kirby()->roots()->plugins() . DS . 'reveal' . DS . 'fields' . DS . 'reveal' . DS . 'fallback.php';
	}

	// Padding
	public static function padding( $field ) {
		$value = $field->padding();

		if( ! isset( $value ) ) {
			$padding = c::get('plugin.reveal.preview.padding', '1em');
		} else {
			$padding = $value;
		}
		return $padding;
	}
}