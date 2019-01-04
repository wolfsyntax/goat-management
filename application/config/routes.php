<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'site_controller';
$route['404_override'] = 'session_controller/page_error';
$route['translate_uri_dashes'] = FALSE;

//Auth Users
$route["dashboard"]["GET"] 						= "user_controller/dashboard";

//Users Account: Login
$route["login"]["GET"] 							= "user_controller/login";
$route["login"]["POST"] 						= "user_controller/verify_access";

//Destroy sessions
$route["logout"] 								= "session_controller";

//User Account: New
$route["register"]["GET"] 						= "user_controller/register";
$route["register"]["POST"] 						= "user_controller/validate_registration";

$route["activity"]["GET"]						= "auth_controller";

/*********************************************************************************
***	Goat Management
**********************************************************************************/

//display table
$route["manage/goat"] 							= "goat_management";					
//display goat profile form (CREATE)
$route["goat/new"]['GET']						= "goat_management/add_goats";			
//validate goat profile: add (CREATE)
$route["goat/r/(:any)"]['POST']					= "goat_management/validate_goat_info/$1";
//view specific goat profile (VIEW)
$route["manage/(:any)/(:num)/view"]['GET']		= "goat_management/manage_view/$1/$2";
//display edit form (UPDATE)
$route["manage/(:any)/(:num)/edit"]['GET']		= "goat_management/view_goat_record/$1/$2";
//validate edit request (UPDATE)
$route["manage/edit"]['POST']					= "goat_management/validate_mod_info";

/*********************************************************************************
***	Financial Management: Goat Sales
**********************************************************************************/

//display table (VIEW)
$route["goat/sales"]['GET']						= "goat_management/sell_index";
//view specific sales record (VIEW)
$route["sales/(:num)/view"]['GET']				= "goat_management/transaction_record/$1";
//display sales form (CREATE)
$route["goat/sales/new"]['GET']					= "goat_management/sell_goats";
//validate new sales record (CREATE)
$route["sales/validate"]['POST']				= "goat_management/validate_transaction";

$route["sales/(:num)/edit"]["GET"]				= "goat_management/modify_sales_info/$1";
$route["sales/(:num)/edit"]["POST"]				= "goat_management/validate_modify_transaction/$1";

$route["sales/(:num)/remove"]["GET"]			= "goat_management/remove_sales/$1";

/***
	Activities
***/

/**
	breed, checkup, loss 
**/

$route["activity/(:any)/new"]					= "goat_management/activity_module/$1";

//Create new Breeding Record
$route["breeding/new"]							= "goat_management/breeding_module";

//Edit Breeding Record
$route["breeding/(:id)/edit"]					= "goat_management/breeding_module/$1";

?>