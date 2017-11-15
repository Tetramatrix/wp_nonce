<?php

/*
Plugin Name: Nonce Plugin
Plugin URI: git://
Description: test plugin
Version: 1.0
Author: Chi Hoang
Author URI: https://tetramatrix.github.io/bbrb/
License: GPLv2
*/

trait nonce {
	
	public function create_nonce () {
		if ( !function_exists('wp_create_nonce') ) :
			/**
			 * Creates a cryptographic token tied to a specific action, user, user session,
			 * and window of time.
			 *
			 * @since 2.0.3
			 * @since 4.0.0 Session tokens were integrated with nonce creation
			 *
			 * @param string|int $action Scalar value to add context to the nonce.
			 * @return string The token.
			 */
			function wp_create_nonce($action = -1) {
				$user = wp_get_current_user();
				$uid =  (int) $user->ID;
				
				if ( ! $uid ) {
					/** This filter is documented in wp-includes/pluggable.php */
					$uid = apply_filters( 'nonce_user_logged_out', $uid, $action );
				}
			
				$token =  wp_get_session_token();
				$i = wp_nonce_tick();	
			
				return substr( wp_hash( $i . '|' . $action . '|' . $uid . '|' . $token, 'nonce' ), -12, 10 );
			}
		endif;
	}
}

class plugin {	
	use nonce;
}

$mynonce = new plugin();
$mynonce->create_nonce();



