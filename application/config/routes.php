<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
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

// $route['default_controller'] = "c_home/index";
$route['default_controller'] = "c_login/index";
$route['login'] = "c_login/index";
$route['home'] = "c_home/index";
$route['company'] = "c_home/company_form";
$route['weekly'] = "c_home/weekly_form";
$route['list/internship'] = "c_home/magang_list";
$route['list/student'] = "c_home/mhs_lst";
$route['list/employee'] = "c_home/karyawan_list";
$route['list/(:any)/download'] = "c_excel/export";
$route['list/(:any)'] = "c_home/mhs_list_jurusan";

$route['profile/c/pass'] = "c_home/change_password";


$route['create/karyawan'] = "c_create/create_karyawan";
$route['create/mahasiswa'] = "c_create/create_mhs";

$route['detail/mahasiswa/(:any)'] = "c_home/detail_mhs";
$route['detail/(:any)/(:any)'] = "c_root/detail";
$route['edit/(:any)/(:any)'] = "c_root/edit";
$route['delete/(:any)/(:any)'] = "c_root/delete";

$route['verif'] = "c_root/verif";
$route['succ'] = "c_home/succ";
$route['fail'] = "c_home/fail";
$route['logout'] = "c_login/logout";

$route['u'] = "c_excel/index";
$route['u/mhs'] = "c_excel/upload";
$route['export'] = "c_excel/export";
// $route['createacc'] = "c_root/c_r_for_me";
// $route['(:any)'] = "c_home/homepage";
// $route['default_controller'] = "c_home";
$route['404_override'] = '';

/* End of file routes.php */
/* Location: ./application/config/routes.php */
