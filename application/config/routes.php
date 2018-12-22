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
$route["login/v1/identifier"]["POST"] 			= "user_controller/verify_access";

//Destroy sessions
$route["logout"] 								= "session_controller";

//User Account: New
$route["register"]["GET"] 						= "user_controller/register";
$route["verify/signup"]["POST"] 				= "user_controller/validate_registration";

$route["activity"]["GET"]						= "auth_controller";

//Goat Management
$route["manage/goat"] 							= "goat_management";
$route["goat/new"]['GET']						= "goat_management/add_goats";
$route["goat/r/(:any)"]['POST']					= "goat_management/validate_goat_info/$1";

//Financial Management: Goat Sales
$route["goat/sales"]['GET']						= "goat_management/sell_index";
$route["goat/sales/new"]['GET']					= "goat_management/sell_goats";
$route["sales/validate"]['POST']				= "goat_management/sell_index";

?>