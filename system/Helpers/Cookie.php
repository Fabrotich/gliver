<?php namespace Helpers;

class Cookie {

    /**
     *This class handles php cookie operations
     *
     *@author Fabian Kiprop <fabrotich@gmail.com>
     *@copyright 2015 - 2020 Fabian Kiprop
     *@category Core
     *@package Core\Helpers\Coookie
     *@link https://github.com/gliver-mvc/gliver
     *@license http://opensource.org/licenses/MIT MIT License
     *@version 1.0.1
     */
	private function __construct() {}

	/**
	 *This method stops creation of a copy of this object by making it private
	 *
	 *@param null
	 *@return void
	 *
	 */
	private function __clone(){}

    /**
     *This method stores data into cookie
     *
     *@param string $name The name with which to store this cookie
     *@param mixed $value The value of the cookie to be stored
     *@param int $time The time the cookie expires should be supplied as number of day(s)
     *@param mixed $path The path on the server in which the cookie will be available on
     *@param mixed $domain The domain that the cookie is available to
     * @params boolean $secure Indicates whether the cookie is transmitted over a secure HTTPS connection from the client.
     * @params boolean $httponly Indicates whether the cookie is accessible over the HTTP protocol
     *@return void
     */
    public static function set($name, $value = "", $time = 3600, $path = "" ,$domain = "", $secure = "", $httponly = ""){

        setcookie($name, $value, $time, $path, $domain, $secure, $httponly);
        echo($name);
    }

    /**This method returns cookie data by name
     *@params string $value the value with which to search cookie data
     *@return mixed the value stored in the cookie
     */
    public static function get($name){
        //Check if cookie is set/exists
        if(! isset($_COOKIE[$name])){
            $exists = false;
            return $exists;
        }else{
            //return if the cookie is set/$exists is true
            return $_COOKIE[$name];
        }
    }

    /**
     *This method deletes data from a cookie
     *
     *@param string $value the value with which to delete cookie data
     *@return void
     */
    public static  function delete($name){
        //Set the cookie expiry data to an hour ago inoreder to delete it
        setcookie($name, "", time() - 3600);
    }

    /**
     *This method checks if cookies are enabled
     *@return boolean
     */
    public static function enabled(){
        //set a test cookie
        setcookie("test_cookie", "test", time() + 3600, '/');

        $enabled = (count($_COOKIE > 0)) ? true : false;

        return $enabled;
    }

	
}