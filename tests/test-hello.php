<?php

class HelloTest extends WP_UnitTestCase {

	protected $lyrics;

	/**
	 * setup variables for tests
	 */
	public function setUp() {
		if( class_exists( '\WP_Mock' ) ){
			\WP_Mock::setUp();
		}
		$this->lyrics[] = "Hello, Dolly";
		$this->lyrics[] = "Well, hello, Dolly";
		$this->lyrics[] = "It&#8217;s so nice to have you back where you belong";
		$this->lyrics[] = "You&#8217;re lookin&#8217; swell, Dolly";
		$this->lyrics[] = "I can tell, Dolly";
		$this->lyrics[] = "You&#8217;re still glowin&#8217;, you&#8217;re still crowin&#8217;";
		$this->lyrics[] = "You&#8217;re still goin&#8217; strong";
		$this->lyrics[] = "We feel the room swayin&#8217;";
		$this->lyrics[] = "While the band&#8217;s playin&#8217;";
		$this->lyrics[] = "One of your old favourite songs from way back when";
		$this->lyrics[] = "So, take her wrap, fellas";
		$this->lyrics[] = "Find her an empty lap, fellas";
		$this->lyrics[] = "Dolly&#8217;ll never go away again";
		$this->lyrics[] = "Hello, Dolly";
		$this->lyrics[] = "Well, hello, Dolly";
		$this->lyrics[] = "It&#8217;s so nice to have you back where you belong";
		$this->lyrics[] = "You&#8217;re lookin&#8217; swell, Dolly";
		$this->lyrics[] = "I can tell, Dolly";
		$this->lyrics[] = "You&#8217;re still glowin&#8217;, you&#8217;re still crowin&#8217;";
		$this->lyrics[] = "You&#8217;re still goin&#8217; strong";
		$this->lyrics[] = "We feel the room swayin&#8217;";
		$this->lyrics[] = "While the band&#8217;s playin&#8217;";
		$this->lyrics[] = "One of your old favourite songs from way back when";
		$this->lyrics[] = "Golly, gee, fellas";
		$this->lyrics[] = "Find her a vacant knee, fellas";
		$this->lyrics[] = "Dolly&#8217;ll never go away";
		$this->lyrics[] = "Dolly&#8217;ll never go away";
		$this->lyrics[] = "Dolly&#8217;ll never go away again";
	}

	/**
	 * tear down after tests
	 */
	public function tearDown() {
		if( class_exists( '\WP_Mock' ) ) {
			\WP_Mock::tearDown();
		}
		$this->lyrics = null;
	}


	/**
	 * makes sure a string is returned
	 */
	function test_is_string() {
		// replace this with some actual testing code

		$maybe_string = hello_dolly_get_lyric();
		$this->assertInternalType( 'string', $maybe_string );
	}

	/**
	 * make sure don't get an empty string
	 */
	function test_is_not_empty() {
		// replace this with some actual testing code

		$maybe_empty = hello_dolly_get_lyric();
		$this->assertNotEmpty( trim( $maybe_empty ) );
	}

	/**
	 * tests that the string we get matches the possible string in the array
	 */
	function test_is_in_array() {
		$maybe_found = hello_dolly_get_lyric();
		$this->assertContains( $maybe_found, $this->lyrics );
	}
}