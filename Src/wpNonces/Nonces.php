<?php
namespace WpNonces;

class Nonces{
	/**
	*Create a nonce
	*@param string $action value of nonce action.
	*@return string $nonce The nonce.
	*@return this function return's a nonce generated token string 
	*/
	function wp_create_nonce( $action ) {
		return substr(md5( $action ), -15, 10 );
	}

}