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
//$route['default_controller'] = 'login';
$route['login'] = 'front/Home/login';
$route['signup'] = 'front/Home/register';
$route['ReferredRegister/(:any)'] = 'front/Home/registerReferal/$i';
$route['logout'] = 'front/Home/logout';
$route['home'] = 'front/Home/all_home';
$route['about'] = 'front/Home/about';
$route['myProfile'] = 'front/Home/my_profile';
$route['referdToFriend'] = 'front/Home/ReferdToFriend';
$route['products/(:any)'] = 'front/Product/products/$i';
//$route['courses'] = 'front/Home/courses';
$route['services/(:any)'] = 'front/Home/services/$i';
//$route['main'] = 'front/Home';
$route['services-list'] = 'front/Home/services_details';
$route['checkout'] = 'front/Home/checkout';
$route['appointmentBooking/(:any)'] = 'front/Service/appointment/$i';
$route['appointmentList'] = 'front/Service/appointmentList';
$route['appointmentbookingSlot'] = 'front/Service/bookingSlot';
$route['add_appointment'] = 'front/Service/post_add_appointment';
$route['servicePayment/(:any)'] =  'front/Service/service_payment/$i';
$route['add_to_service'] = 'front/Service/buy_service';
$route['paymentGateService/(:any)'] = 'front/Service/paymentGatewayService/$i';
$route['thanksPaymentService/(:any)'] = 'front/Service/thanksPaymentService/$i';
$route['contactus'] = 'front/Home/contact_us';
$route['contact/form'] =  'front/home/contact_form';
$route['contact/email'] =  'front/home/contact_email';
$route['otpVerify'] =  'front/home/otpadd';
$route['get-services-list/(:any)'] =  'front/Home/setvices_list/$i';
$route['uniqueEmail'] =  'front/home/duplicateEmailCheck';
$route['uniqueContact'] =  'front/home/duplicateCoctactCheck';
$route['wallet'] =  'front/User/wallet';
$route['wishList'] =  'front/product/wishList';
$route['orderlist'] =  'front/product/orderlist';
$route['orderSummary/(:any)'] =  'front/product/orderSummary/$i';
$route['courses'] =  'front/Courses/allcourses';
$route['cartList'] =  'front/product/cartListView';
$route['productOrder'] =  'front/product/productCheckOut';
$route['orderComplete'] =  'front/product/productcompleteorder';
$route['deleteorderProduct/(:any)'] =  'front/product/deleteorderProduct/$i';
$route['enrollCourse/(:any)'] =  'front/Courses/enroll_course/$i';
$route['courseDetails/(:any)'] =  'front/Courses/course_details/$i';
$route['productDetails/(:any)'] =  'front/product/productDetailsView/$i';


$route['front/login'] = 'front/home/post_login';
$route['front/signup'] = 'front/home/signup'; 
$route['front/referredSignup'] = 'front/home/referredsignup'; 
$route['course/add_student'] = 'front/Courses/post_add_student'; 
$route['front/customer_edited'] = 'front/home/post_edit_customer'; 
$route['front/referalCode'] = 'front/home/sentReferalMail'; 
$route['add_to_cart'] = 'front/Product/post_add_tocart'; 



$route['hrms'] = 'hrms/Login';
$route['empdashboard'] = 'hrms/welcome/empdashboard';
$route['admin'] = 'admin/welcome/index';
$route['dashboard'] = 'admin/welcome/dashboard';

/*$route['branch'] = 'admin/welcome/branch';
$route['branch/login'] = 'branch/login';*/

$route['welcome'] = 'admin/welcome';
$route['add_employeeSalary'] = 'admin/employeeManagement/post_add_employeeSalary';
//$route['employee/attendance/counter'] = 'admin/comissionController/attendance_sum';
$route['branch/dashboard'] = 'admin/welcome/dashboard';
$route['users'] = 'admin/welcome/users';
$route['promotion'] = 'admin/welcome/promotion';
$route['appointment'] = 'admin/ServiceCategoryCtl/appointment';
$route['productcategory'] = 'admin/productManagement/all_productcategory';
$route['product'] = 'admin/productManagement/all_product';
$route['studentRegistrationForm'] = 'admin/CourseManagement/all_studentRegistrationForm';
$route['allservice'] = 'admin/ServiceCategoryCtl/service';
$route['allcategory'] = 'admin/ServiceCategoryCtl/all_category';
$route['alltherapists'] = 'admin/ServiceCategoryCtl/all_therapists';
$route['deliveryDetails'] = 'admin/OrderManagement/all_DeliveryDetails';
$route['therapists'] = 'admin/welcome/therapists';
$route['employees'] = 'admin/employeeManagement/all_employees';
$route['leads'] = 'admin/LeadManagement/all_leads';
$route['coupon'] = 'admin/welcome/coupon';
$route['feedback'] = 'admin/welcome/feedback';
$route['timeslot'] = 'admin/welcome/timeslot';
$route['customer'] = 'admin/welcome/customer';
$route['getBookingSlot'] ='admin/welcome/bookingSlot';
$route['package_list'] = 'admin/welcome/package_list';
$route['getServiceByID'] = 'admin/welcome/getServiceByID';
$route['getCustomerByID'] = 'admin/welcome/getCustomerByID';
$route['getAppointmentById']= 'admin/welcome/find';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
