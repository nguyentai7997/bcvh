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
$route['default_controller'] = 'vhht';
//$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'vhht/login';
$route['check_sign_in'] = 'vhht/check_sign_in';
$route['register'] = 'vhht/register';
$route['check_public_name'] = 'vhht/check_public_name';
$route['check_email'] = 'vhht/check_email';
$route['insert_seller'] = 'vhht/insert_seller';
$route['marketplace'] = 'vhht/marketplace';
$route['pagination_marketplace'] = 'vhht/pagination_marketplace';
$route['marketplace/category/(:any)'] = 'vhht/category/$1';
$route['pagination_category'] = 'vhht/pagination_category';
$route['marketplace/search/(:any)'] = 'vhht/search/$1';
$route['pagination_search'] = 'vhht/pagination_search';
$route['add_to_cart'] = 'vhht/add_to_cart';
$route['cart'] = 'vhht/cart';
$route['update_cart'] = 'vhht/update_cart';
$route['remove_product/(:num)/(:num)/(:any)'] = 'vhht/remove_product/$1/$2/$3';
$route['checkout'] = 'vhht/checkout';
$route['insert_order'] = 'vhht/insert_order';

$route['seller'] = 'seller';
$route['seller/dashboard'] = 'seller/dashboard';
$route['seller/campaigns'] = 'seller/campaigns';
$route['seller/campaign_details/(:any)'] = 'seller/campaign_details/$1';
$route['seller/update_campaign'] = 'seller/update_campaign';
$route['seller/end_campaign'] = 'seller/end_campaign';
$route['seller/get_orders_today'] = 'seller/get_orders_today';
$route['seller/get_orders_yesterday'] = 'seller/get_orders_yesterday';
$route['seller/get_orders_7_days_left'] = 'seller/get_orders_7_days_left';
$route['seller/get_orders_30_days_left'] = 'seller/get_orders_30_days_left';
$route['seller/get_orders_all_time'] = 'seller/get_orders_all_time';
$route['seller/get_orders_custom_day'] = 'seller/get_orders_custom_day';
$route['seller/design'] = 'seller/design';
$route['seller/get_all_color'] = 'seller/get_all_color';
$route['seller/get_color_code'] = 'seller/get_color_code';
$route['seller/get_design'] = 'seller/get_design';
$route['seller/remove_design'] = 'seller/remove_design';
$route['seller/product'] = 'seller/product';
$route['seller/get_product'] = 'seller/get_product';
$route['seller/launch'] = 'seller/launch';
$route['seller/check_url'] = 'seller/check_url';
$route['seller/get_launch'] = 'seller/get_launch';
$route['seller/orders'] = 'seller/orders';
$route['seller/account'] = 'seller/account';
$route['seller/update_info'] = 'seller/update_info';
$route['seller/change_password'] = 'seller/change_password';
$route['seller/payment'] = 'seller/payment';
$route['seller/insert_payment'] = 'seller/insert_payment';
$route['seller/payouts'] = 'seller/payouts';
$route['seller/get_payouts_available'] = 'seller/get_payouts_available';
$route['seller/get_payouts_requested'] = 'seller/get_payouts_requested';
$route['seller/check_payment_method'] = 'seller/check_payment_method';
$route['seller/insert_request'] = 'seller/insert_request';
$route['seller/logout'] = 'seller/logout';

$route['admin'] = 'admin';
$route['admin/login'] = 'admin/login';
$route['admin/check_sign_in'] = 'admin/check_sign_in';
$route['admin/dashboard'] = 'admin/dashboard';
$route['admin/problem'] = 'admin/problem';
$route['admin/user'] = 'admin/user';

$route['admin/get_orders_today'] = 'admin/get_orders_today';
$route['admin/get_orders_yesterday'] = 'admin/get_orders_yesterday';
$route['admin/get_orders_7_days_left'] = 'admin/get_orders_7_days_left';
$route['admin/get_orders_30_days_left'] = 'admin/get_orders_30_days_left';
$route['admin/get_orders_all_time'] = 'admin/get_orders_all_time';
$route['admin/get_orders_custom_day'] = 'admin/get_orders_custom_day';
$route['admin/campaigns'] = 'admin/campaigns';
$route['admin/campaign_details/(:any)'] = 'admin/campaign_details/$1';
$route['admin/mockups'] = 'admin/mockups';
$route['admin/create_mockup'] = 'admin/create_mockup';
$route['admin/update_mockup'] = 'admin/update_mockup';
$route['admin/delete_mockup'] = 'admin/delete_mockup';
$route['admin/categories'] = 'admin/categories';
$route['admin/create_category'] = 'admin/create_category';
$route['admin/update_category'] = 'admin/update_category';
$route['admin/delete_category'] = 'admin/delete_category';
$route['admin/orders'] = 'admin/orders';
$route['admin/update_order'] = 'admin/update_order';
$route['admin/users'] = 'admin/users';
$route['admin/user_details/(:any)'] = 'admin/user_details/$1';
$route['admin/pay'] = 'admin/pay';
$route['admin/get_requestes_of_seller'] = 'admin/get_requestes_of_seller';
$route['admin/get_orders_of_seller'] = 'admin/get_orders_of_seller';
$route['admin/logout'] = 'admin/logout';

$route['(:any)/(:any)'] = 'vhht/view_product/$1/$2';
$route['(:any)'] = 'vhht/error';
