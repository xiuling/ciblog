<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

/*$route['default_controller'] = "welcome";
$route['404_override'] = '';*/

$route['about'] = 'blog/about';
$route['category'] = 'blog/category';
$route['category_insert'] = 'blog/category_insert';
$route['label'] = 'blog/label';
$route['label_insert'] = 'blog/label_insert';
$route['delete/(:any)'] = 'blog/delete/$i';
$route['login'] = 'blog/login';
$route['logout'] = 'blog/logout';
$route['check_login'] = 'blog/check_login';
$route['comments/(:any)'] = 'blog/comments/$i';
$route['comments_insert'] = 'blog/comments_insert';
$route['create'] = 'blog/create';
$route['insert'] = 'blog/insert';
$route['edit/(:any)'] = 'blog/edit/$i';
$route['update'] = 'blog/update';
$route['admin'] = 'blog/admin';
$route['view/(:any)'] = 'blog/view/$1';
$route['index'] = 'blog/index';
//$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'blog/index';


/* End of file routes.php */
/* Location: ./application/config/routes.php */