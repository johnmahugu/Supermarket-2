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
$route['default_controller'] = 'packageCL';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route[''] = 'PackageCL/domestic_package';

$route['domestic-package'] = 'PackageCL/domestic_package';
$route['outbound-package'] = 'PackageCL/outbound_package';
$route['filter-tour'] = 'PackageCL/filter';
$route['delete-package'] = 'PackageCL/delete_package';
$route['edit-domestic-package'] = 'PackageCL/edit_domestic_package';
$route['edit-domestic-package-condition'] = 'PackageCL/edit_domestic_package_condition';
$route['edit-outbound-package'] = 'PackageCL/edit_outbound_package';
$route['edit-outbound-package-condition'] = 'PackageCL/edit_outbound_package_condition';
$route['update-domestic-package'] = 'PackageCL/update_domestic_package';
$route['update-outbound-package'] = 'PackageCL/update_outbound_package';
$route['update-domestic-package-condition'] = 'PackageCL/update_domestic_package_condition';
$route['update-outbound-package-condition'] = 'PackageCL/update_outbound_package_condition';
$route['upload-cover'] = 'PackageCL/upload_cover';
$route['new-domestic-package'] = 'PackageCL/new_domestic_package';
$route['new-outbound-package'] = 'PackageCL/new_outbound_package';
$route['insert-domestic-package'] = 'PackageCL/insert_domestic_package';
$route['insert-outbound-package'] = 'PackageCL/insert_outbound_package';
$route['change-public'] = 'PackageCL/change_public';
$route['change-highlight'] = 'PackageCL/change_highlight';
$route['update-pdf'] = 'PackageCL/update_pdf';
$route['edit-domestic-package-service'] = 'PackageCL/edit_domestic_package_service';
$route['edit-outbound-package-service'] = 'PackageCL/edit_outbound_package_service';
