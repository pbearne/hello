<?php
/**
 * @package Hello_Dolly
 * @version 1.7
 */
/*
* Plugin Name: Hello Dolly
* Plugin URI: http://wordpress.org/plugins/hello-dolly/
* Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
* Author: Matt Mullenweg
* Version: 1.8
* Author URI: http://ma.tt/
* Text Domain: hello-dolly
*/




class Hello_Dolly {

	public function __construct() {

		// load langauge
		load_plugin_textdomain( 'hello-dolly', false, basename( dirname( __FILE__ ) ) . '/languages' );

		// load needed CSS into admin head
		add_action( 'admin_head', array( __CLASS__, 'dolly_css' ) );
		// Now we set that function up to execute when the admin_notices action is called
		add_action( 'admin_notices',  array( __CLASS__, 'hello_dolly' ) );
	}

	/**
	 * @return string
	 */
	private static function hello_dolly_get_lyric() {
		/** These are the lyrics to Hello Dolly */
		$lyrics = _x( "Hello, Dolly
Well, hello, Dolly
It's so nice to have you back where you belong
You're lookin' swell, Dolly
I can tell, Dolly
You're still glowin', you're still crowin'
You're still goin' strong
We feel the room swayin'
While the band's playin'
One of your old favourite songs from way back when
So, take her wrap, fellas
Find her an empty lap, fellas
Dolly'll never go away again
Hello, Dolly
Well, hello, Dolly
It's so nice to have you back where you belong
You're lookin' swell, Dolly
I can tell, Dolly
You're still glowin', you're still crowin'
You're still goin' strong
We feel the room swayin'
While the band's playin'
One of your old favourite songs from way back when
Golly, gee, fellas
Find her a vacant knee, fellas
Dolly'll never go away
Dolly'll never go away
Dolly'll never go away again", 'hello-dolly', 'lyrics: Hello, Dolly by Louis Armstrong' );

		// Here we split it into lines
		$lyrics = explode( "\n", $lyrics );

		// And then randomly choose a line
		return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
	}

	/**
	 * This just echoes the chosen line, we'll position it later
	 */
	public static function hello_dolly() {
		$chosen = self::hello_dolly_get_lyric();
		printf( '<p id="dolly"><span class="screen-reader-text">%1$s</span>%2$s</p>',
			_x( 'A random lyric from Hello, Dolly by Louis Armstrong: ','hello-dolly', 'a11n aria-label' ),
			esc_html( $chosen )
		);
	}

	/**
	 *  We need some CSS to position the paragraph
	 */
	public static function dolly_css() {
		// This makes sure that the positioning is also good for right-to-left languages
		$rtl = is_rtl() ? 'left' : 'right';

		printf('
	<style type="text/css">
	#dolly {
		float: %1$s;
		padding-%1$s: 15px;
		padding-top: 5px;
		margin: 0;
		font-size: 11px;
	}
	</style>
	', esc_attr( $rtl ) );
	}
}

// load plugin
new Hello_Dolly();
