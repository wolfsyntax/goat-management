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
$route['default_controller']			= 'sitemap';
$route['404_override'] 					= 'session_controller/error404';
$route['translate_uri_dashes'] 			= FALSE;

//Authentication
$route['login']['GET'] 					= 'auth/logincontroller';
$route['login']['POST'] 				= 'auth/logincontroller/store';

$route['logout']['GET'] 				= 'auth/logincontroller/logout';

$route['register']['GET']				= 'auth/registercontroller/create';
$route['register']['POST']				= 'auth/registercontroller/store';

$route['forgot']['GET'] 				= 'auth/forgotpasswordcontroller/create';
$route['forgot']['POST'] 				= 'auth/forgotpasswordcontroller/store';

/************************************************
**					Modules
*************************************************/

//User Permission: Tenant
$route['dashboard']['GET'] 				= 'tenant_controller';

//User Permission: System Admin
$route['admin']['GET'] 					= 'admin_controller';

//User Permission: Farm Owner
$route['farm']['GET'] 					= 'user_controller/dashboard';

//Other Module: Inventory
$route['inventory/view']['GET'] 		= 'inventory_controller';

//Other Module: Sales
$route['goat/sales']['GET']		 		= 'core_controller/sales';
$route['goat/sales/new']['GET']		 	= 'core_controller/create_sales';

//Other Module: Management
$route['manage/goat']['GET']	 		= 'core_controller';
$route['goat/new']['GET']	 			= 'core_controller/create';

//Other Module: Activities (Breeding)

$route['breeding/view']['GET'] 			= 'activity/breeding_controller';

//Other Module: Activities (Health Check)
$route['health/view']['GET'] 			= 'activity/HealthCheck_controller';

