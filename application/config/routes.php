<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'homepageCL';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route[''] = 'HomepageCL/index';
$route['about'] = 'AboutCL/about';
$route['_signin'] = 'AuthenticationCL/signin_page';
$route['signin'] = 'AuthenticationCL/signin';
$route['signup-page'] = 'AuthenticationCL/signup_page';
$route['signout'] = 'AuthenticationCL/signout';
$route['thai-tour'] = 'HomepageCL/thai_tour';
$route['international-tour'] = 'HomepageCL/international_tour';
$route['thai-tour/(:num)'] = 'HomepageCL/thai_tour';
$route['international-tour/(:num)'] = 'HomepageCL/international_tour';
$route['readmore'] = 'ReadmoreCL/readmore';
$route['series-booking'] = 'SeriesBookingCL/series_booking';
$route['series-booking-info'] = 'SeriesBookingCL/series_booking_info';
$route['check-email'] = 'SeriesBookingCL/check_email';
$route['series-booking-submit'] = 'SeriesBookingCL/series_booking_submit';
$route['booking-list'] = 'BookingListCL/booking_list';
$route['cancel-booking'] = 'BookingListCL/cancel_booking';
$route['user-edit-profile'] = 'UserCL/user_edit_profile';
$route['user-update-profile'] = 'UserCL/user_update_profile';
$route['filter-tour'] = 'HomepageCL/filter';
