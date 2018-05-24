<?php
namespace WpNonces;

class Nonces{

    /** @var string|int the action the nonce is created for */
    protected $action;
	/**
     * Class constructor.
     *
     * @param injecting (passing) the dependencies
     */
    public function __construct($action = -1)
    {
        $this->action = $action;
    
	}

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
	*Verify a nonce
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
    /**
	*Add nonce to URL 
	*@param string $URL URL to add the nonce created.
	*@return string $action Name to assigned to nonce created
	*@return boolean this function to Add nonce to URL actions.
	*/
	function get_wp_nonce_url($URL, $action) {
         return wp_nonce_url($URL, $action);
    }
    

}