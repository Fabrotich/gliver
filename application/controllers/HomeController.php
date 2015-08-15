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

    public function cookie(){
        $number = 1;

        Cookie:set($number);

//        Cookie::set("Home", "Cookie");
//        $cookieValue1 = Cookie::get("Home");
////        $cookieValue2 = Cookie::get("Glivers");
//        echo $cookieValue1;
    }

}

