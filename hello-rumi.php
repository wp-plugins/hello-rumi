<?php
/*
Plugin Name: Hello Rumi
Plugin URI: http://www.wordpress.org/plugins/hello-rumi/
Description: This plugin shows you a random quote written by the greatest mystic sufi poet of all time Rumi.This is a plugin based on Matt Mullenweg's Hello dolly plugin. When activated you will randomly see a quote in the upper right of your admin screen on every page.
Author: Aqib Gatoo
Version: 1.0
Author URI: http://aqibgatoo.com/
License : GPL2
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

function get_rumi_quote() {
	/** These are random quotes taken from the poems of Rumi (r.a) */
	$quotes = "Whatever you are seeking, is seeking you
	What is planted in each person’s soul will sprout
	Eyes cannot see you. You are the source of sight
	I see my Beauty in you
	I can be without anyone but not without You
	There’s a path from your heart to mine
	Don’t plant anything but love
	Travel brings power and love back into your life
	Only LOVE is infinite
	In every religion there is love,yet love has no religion
	Now’ is where Love Breathes
	With friends you grow wings
	The heart is the secret inside the secret
	You transform all those who are touched by you
	When I am silent, I have thunder hidden inside
	Protect yourself from your own thoughts
	Sit, be still, and listen
	Hear the passage into silence and be that
	I am Lost in God and God is found in me
	Your noise is my silence
	Strip away your pride and put on humble clothes
	Don’t grieve, anything you lose comes round in another form
	Wherever you stand, be the soul of that place
	Stay in the spiritual fire. Let it cook you
	Try something different. Surrender
	I am a farmer of the heart
	Inside you there’s an artist you don’t know about
	We often need to be refreshed
	Every step I take is a Blessing
	If you are looking for a friend who is faultless, you will be friendless
";

	// Here we split it into lines
	$quotes = explode( "\n", $quotes );

	// And then randomly choose a line
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_rumi() {
	$chosen = get_rumi_quote();
//	var_dump( $chosen );
//	wp_die( "die" );
	echo "<p id='rumi'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_rumi' );

// We need some CSS to position the paragraph
function quote_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#rumi {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'quote_css' );

?>
