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
    /**
	*Create a nonce
	*@param string $nonce value of nonce Nonce.
	*@return string $action Optional. Action value. Default value -1..
	*@return boolean this function will return boolean 'true' if the nonces is valid, else return false.
	*/
	function wp_verify_nonce($nonce, $action=-1) {
         $nonce_calc = substr( md5( $action ), -15, 10 );
            if ( $nonce == $nonce_calc ) {
                return true;
            } else {
                return false;
            }
    }
    

}