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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['what-we-do'] = 'home/whatwedo';
$route['about-us'] = 'home/aboutUs';
$route['blog'] = 'home/blog';
$route['join-us'] = 'home/joinUs';
$route['contact-us'] = 'home/contactUs';
$route['blog/view/(:num)'] = 'home/blogView/$1';
$route['join-us/view/(:num)'] = 'home/joinUsView/$1';

//Admin Page

$route['admin'] = 'manageLogin';
$route['admin/home/title'] = 'manageHome/title';
$route['admin/home/who-we-serve'] = 'manageHome/whoweserve';
$route['admin/what-we-do'] = 'manageWhatWeDo';
$route['admin/about-us'] = 'manageAboutUs';
$route['admin/blog'] = 'manageBlog';
$route['admin/blog/edit/(:num)'] = 'manageBlog/edit/$1';
$route['admin/join-us'] = 'manageJoinUs';
$route['admin/join-us/edit/(:num)'] = 'manageJoinUs/edit/$1';
$route['admin/logout'] = 'manageLogin/logout';


// Apis

$route['api/home/updateTitle'] = 'manageHome/updateTitle';
$route['api/home/addService'] = 'manageHome/addNewService';
$route['api/home/deleteService'] = 'manageHome/deleteService';
$route['api/home/updateService'] = 'manageHome/updateService';

$route['api/whatwedo/add'] = 'manageWhatWeDo/addNewService';
$route['api/whatwedo/edit'] = 'manageWhatWeDo/updateService';
$route['api/whatwedo/delete'] = 'manageWhatWeDo/deleteService';

$route['api/about-us/update'] = 'manageAboutUs/updateTitle';
$route['api/about-us/coreValue/add'] = 'manageAboutUs/addCoreValue';
$route['api/about-us/coreValue/delete'] = 'manageAboutUs/deleteCoreValue';

$route['api/blog/delete'] = 'manageBlog/deleteBlog';
$route['api/blog/edit'] = 'manageBlog/updateBlog';

$route['api/job/edit'] = 'manageJoinUs/updateJob';
$route['api/job/delete'] = 'manageJoinUs/deleteJob';

$route['api/sendEmail'] = 'home/sendEmail';
