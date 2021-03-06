<?php namespace Controllers;

/**
 *This class loads the purchase history for all user types.
 *@author Geoffrey Oliver <geoffrey.oliver2@gmail.com>
 *@copyright 2015 - 2020 Geoffrey Oliver
 *@category Marketplace
 *@package Marketplace\Controllers\Home
 *@link mobeoffice.com
 */

use Helpers\View;
use Helpers\Cookie;

class HomeController extends BaseController {

	/**
	 *This method loads the homepage 
	 *
	 *@param null
	 *@return void
     *@throws This method doesn't throw any error.
	 */
	public function index()
	{
		//define the page title
		$data['title'] = 'Gliver MVC PHP Framework';

		//get the ending date today
		View::render('index', $data);
        
	}

    /**
     *This method tests the cookie class
     *
     *@param null
     *@return void
     *@throws null This method doesn't throw any error.
     */
    public function cookie(){
        Cookie::set("Home", "play");
        $cookieValue1 = Cookie::get("Home");
        echo $cookieValue1;
    }

}

