<?php
/*
Plugin Name: php-console
Plugin URI: http://bueltge.de/
Text Domain: php-console
Domain Path: /languages
Description: <a href="http://code.google.com/p/php-console/">php-console</a> - Google Chrome extension for displaying PHP errors/exceptions/debug messages in browser console or notification popups
Author: Frank B&uuml;ltge
Version: 0.0.1
Author URI: http://bueltge.de/
Donate URI: http://bueltge.de/wunschliste/
License: GNU v3
Last change: 29.03.2011
*/ 

/* load php-console functionality */
require_once('inc/PhpConsole.php');
PhpConsole::start( TRUE, TRUE, dirname(__FILE__) );

class Wp_Php_Console {
	
	public function __construct() {
		
		$this->messages();
		
		$this->get_contents( 'GNU GENERAL PUBLIC LICENSE' );
	}
	
	public function messages() {
		global $wpdb, $pagenow;
		
		debug( $pagenow, 'Var Pagenow' );
		$sql = "SELECT * FROM $wpdb->options";
		debug( $sql, 'sql-options' );
	}
	
	public function get_contents( $string ) {
		
		$content = file_get_contents( '../license.txt', NULL, NULL, 0, 100 );
		$pos = strpos( $content, $string );
		
		debug( $pos , 'Position' );
		if ( ! $pos )
			debug( $content, 'Content' );
	}
}
new Wp_Php_Console();

?>