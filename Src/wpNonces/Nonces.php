<?php
namespace WpNonces;

class Nonces{

    /** @var string|int the action the nonce is created for */
    protected $action;
    /** @var string|int the action the nonce is created for */
    protected $name;
    /** @var string|int the action the nonce is created for */
    protected $referer;
    /** @var string|int the action the nonce is created for */
    protected $echo;
	/**
     * Class constructor.
     *
     * @param injecting (passing) the dependencies
     */
    public function __construct($action = -1, $name='_wpnonce', $referer=true, $echo=true,$param_query='_wpnonce'){
        $this->action = $action;
        $this->name=$name;
        $this->referer=$referer;
        $this->echo=$echo;
        $this->param_query=$param_query;
    
	}

	/**
	*Create a nonce
	*@param string $action value of nonce action.
	*@param string $nonce The nonce.
	*@return this function return's a nonce generated token string 
	*/
	function wp_create_nonce( $action ) {
		return substr(md5( $action ), -15, 10 );
    }
    /**
	*Verify a nonce
	*@param string $nonce value of nonce Nonce.
	*@param string $action Optional. Action value. Default value -1..
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
     *Add nonce to a FORM
     *@param $action action name the default value is -1
     *@param $referer a boolean to determine whether the referer hidden form field should be created, the default value is true.
     *@param $name nonce name the default value is _wpnonce.
     *@param $echo  a boolean to determine if the Wordpress should echo. the nonce hidden field or not, the default value is true.
     *@return A nonce hidden form field and also referer is set to true.
    */
    public static function get_wp_nonce_field($action, $name, $referer, $echo) {
        return wp_nonce_field($action, $name, $referer, $echo);
    }

    /**
	*Add nonce to URL 
	*@param string $URL URL to add the nonce created.
	*@param string $action Name to assigned to nonce created
	*@return boolean this function to Add nonce to URL actions.
	*/
	function get_wp_nonce_url($URL, $action) {
         return wp_nonce_url($URL, $action);
    }
    /**
	*Verify nonces alternativly 
	*@param string $action name.
	*@param $param_query Name of nonce that WordPress will check for in the $_REQUEST variable, and the default value is _wpnonce.
	*@return this function return '1' if nonce <= 12hours and '2' if 12hours < nonce < 24hours or 'false' if the an nonce invalid.
	*/
	function wp_check_admin_referer($action, $param_query) {
         return check_admin_referer($action, $param_query);
    }

}