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
$route['default_controller']					= 'sitemap';
$route['404_override'] 							= 'session_controller/error404';
$route['translate_uri_dashes'] 					= FALSE;

//Authentication
$route['login']['GET'] 							= 'auth/logincontroller';				//display login form
$route['login']['POST'] 						= 'auth/logincontroller/store';			//validate login details

$route['logout']['GET'] 						= 'auth/logincontroller/logout';		//destroy session

$route['register']['GET']						= 'auth/registercontroller/create';		//display registration form
$route['register']['POST']						= 'auth/registercontroller/store';		//validate registration details

$route['forgot']['GET'] 						= 'auth/forgotpasswordcontroller/create';	
$route['forgot']['POST'] 						= 'auth/forgotpasswordcontroller/store';

$route['account/settings']['GET']				= 'auth/resetpasswordcontroller';
$route['account/settings']['POST']				= 'auth/resetpasswordcontroller/change_password';

/************************************************
**					Modules
*************************************************/

$route['notifications']['GET']					= 'core_controller/notify';

//User Permission: Tenant
$route['dashboard']['GET'] 						= 'tenant_controller';

//User Permission: System Admin -------------------------------------------------------------------
$route['admin']['GET'] 							= 'admin_controller';

//User Permission: Farm Owner ---------------------------------------------------------------------
$route['farm']['GET'] 							= 'user_controller/dashboard';
$route['reports']['GET']						= 'reports_controller';

//Other Module: Inventory -------------------------------------------------------------------------

$route['inventory/view']['GET'] 				= 'inventory_controller';
//$route['inventory/view']['POST'] 				= 'inventory_controller';

$route['inventory/new']['GET']					= 'inventory_controller/create';
$route['inventory/new']['POST']					= "inventory_controller/store";
$route['inventory/(:num)/edit']['POST']			= "inventory_controller/update/$1";

//Other Module: Sales -----------------------------------------------------------------------------

$route['goat/sales']['GET']		 				= 'core_controller/sales'; //display all sales records
$route['goat/sales/new']['GET']		 			= 'core_controller/create_sales'; //display sales form (new)
$route['goat/sales/new']['POST']	 			= 'core_controller/store_sales'; //validate sales form

$route["sales/(:num)/edit"]["GET"]				= "core_controller/modify_sales_info/$1"; //display sales form (update)
$route["sales/(:num)/edit"]["POST"]				= "core_controller/update_sales/$1"; //validate sales form

//view specific sales record (VIEW)
$route["sales/(:num)/view"]['GET']				= "core_controller/show_sales/$1"; 
//validate new sales record (CREATE)


$route["sales/(:num)/remove"]["GET"]			= "core_controller/remove_sales/$1";


//Other Module: Management ---------------------------------------------------------------------------

$route['manage/goat']['GET']	 				= 'core_controller'; //*
$route['manage/goat']['POST']	 				= 'core_controller/manage_revert_status'; //Validate restore or change status

$route['goat/new']['GET']	 					= 'core_controller/create'; //*
$route["goat/r/(:any)"]['POST']					= "core_controller/validate_goat_info/$1";
//view specific goat profile (VIEW)
$route["manage/(:any)/(:num)/view"]['GET']		= "core_controller/manage_view/$1/$2"; //*
//display edit form (UPDATE)
$route["manage/(:any)/(:num)/edit"]['GET']		= "core_controller/view_goat_record/$1/$2";
//validate edit request (UPDATE)
$route["manage/(:any)/(:num)/edit"]['POST']		= "core_controller/validate_mod_info/$1/$2";

//Manage Status View
$route["status/(:num)/edit"]["GET"]				= "core_controller/manageStatus/$1";
//validate change status
$route["status/(:num)/edit"]["POST"]			= "core_controller/manage_status/$1";

//Other Module: Activities (Breeding)

$route['breeding/view']['GET'] 					= 'activity/breeding_controller';
$route['breeding/new']['GET'] 					= 'activity/breeding_controller/create';
$route['breeding/new']['POST'] 					= 'activity/breeding_controller/store';
$route["breeding/(:num)/update"]["POST"]		= "activity/breeding_controller/validate_pregcheck/$1";

//Other Module: Activities (Health Check)
$route['health/view']['GET'] 					= 'activity/HealthCheck_controller';
$route['checkup/(:num)/new']['GET'] 			= 'activity/HealthCheck_controller/create/$1';
$route['checkup/(:num)/new']['POST'] 			= 'activity/HealthCheck_controller/store/$1';


//Sitemap ---------------------------------------------------------------------------------------
$route['about'] = 'sitemap/about'; //Guide