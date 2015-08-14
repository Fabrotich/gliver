<?php namespace Helpers;

/**
 *This class handles php cookie operations
 *
 * @author Fabian Kiprop <fabrotich@gmail.com>
 * @copyright 2015 - 2020 Fabian Kiprop
 * @category Core
 * @package Core\Helpers\Coookie
 * @link https://github.com/gliver-mvc/gliver
 * @license http://opensource.org/licenses/MIT MIT License
 * @version 1.0.1
 */

class Cookie
{

    /**
     *This is the constructor class. We make this private to avoid creating instances of this object
     *
     * @return \Helpers\Cookie
     */
    private function __construct()
    {
    }

    /**
     *This method stops creation of a copy of this object by making it private
     *
     * @param null
     * @return void
     *
     */
    private function __clone()
    {
    }

    /**
     *This method stores data into cookie
     *
     * @param string $name The name with which to store this cookie
     * @param mixed $value The value of the cookie to be stored
     * @param int $time The time the cookie expires should be supplied as number of seconds
     * @param mixed $path The path on the server in which the cookie will be available on
     * @param mixed $domain The domain that the cookie is available to
     * @param bool|string $secure Indicates whether the cookie is transmitted over a secure HTTPS connection from the client.
     * @param bool|string $httponly Indicates whether the cookie is accessible over the HTTP protocol
     * @return bool true | false Returns true if cookie is successfully set and false if not
     */
    public static function set($name, $value = "", $time = 3600, $path = "/", $domain = "", $secure = false, $httponly = true)
    {
        //Call native php setCookie function to set the cookies
        setcookie($name, $value, time() + $time, $path, $domain, $secure, $httponly);

        //Checks if cookie is set
        if ( isset($_COOKIE[$name]) )
        {

            //Returns true if set
            return true;
        }

        else
        {

            //Returns false if cookie failed to set
            return false;
        }

    }

    /**
     * This method returns cookie data by name
     *
     * @param string $name The name with which the cookie was stored
     * @return mixed The value stored in the cookie or false if cookie not found
     */
    public static function get($name)
    {
        //Check if cookie is set
        if ( ! isset($_COOKIE[$name]) )
        {
            //Return false if it cookie isn't set
            return false;

        }

        //Cookie is set so return the value
        else
        {
            //Returns true
            return $_COOKIE[$name];

        }

    }

    /**
     *This method deletes data from a cookie by cookie name
     *
     * @param string $name The name of the cookie to delete
     * @return boolean true | false True if cookie is successfully deleted and False if cookie is not
     */
    public static function delete($name)
    {
        //If a cookie exists delete it
        if (isset($_COOKIE[$name]))
        {
            //Clear both $_COOKIE and browser cookie
            setcookie($name, "", time() - 3600, "/");
            unset($_COOKIE[$name]);
            return true;

        }

        //There is no cookie set
        else{

            //Returns false
            return false;

        }

    }

    /**
     *This method checks if cookies are enabled on the client browser
     *
     * @param NULL
     * @return boolean true | false True if enabled and False if not enabled
     */
    public static function enabled()
    {
        //set a test cookie
        setcookie("test_cookie", "test", time() + 3600, '/');

        //check if test cookie was stored
        $enabled = (count($_COOKIE > 0)) ? true : false;

        return $enabled;
    }

    /**
     *This method updates cookies
     *
     * @param string $name The name of the cookie to be updated
     * @param mixed $value The value of the cookie to be stored
     * @param int $time The time the cookie expires should be supplied as number of seconds
     * @param mixed $path The path on the server in which the cookie will be available on
     * @param mixed $domain The domain that the cookie is available to
     * @param bool|string $secure Indicates whether the cookie is transmitted over a secure HTTPS connection from the client.
     * @param bool|string $httponly Indicates whether the cookie is accessible over the HTTP protocol
     * @return boolean true | false True if cookie is successfully updated and False if not
     */

    public static function update($name, $value, $time = 3600, $path = "/", $domain = "", $secure = false, $httponly = true)
    {
        //Calls the native php 'setcookie' method to update the cookie
        setcookie($name, $value, time() + $time, $path, $domain, $secure, $httponly);

        //Checks if cookie is updated
        if ( isset($_COOKIE[$name]) )
        {

            //Returns true if cookie is updated
            return true;
        }

        else
        {

            //Returns false if cookie failed to update
            return false;
        }

    }



}