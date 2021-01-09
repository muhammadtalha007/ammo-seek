<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    $caliber = \Illuminate\Support\Facades\DB::table('Calibers')->limit(9)->get();
    return view('welcome')->with(['caliber' => $caliber]);
});
Route::get('/working-tutorial', "DomainsController@tutorialWorking")->middleware('dashboard')->name('home')->middleware('dashboard');
Route::get('add-password', "PasswordsController@addPassword")->middleware('dashboard');
Route::post('add-password', "PasswordsController@savePassword")->middleware('dashboard');
Route::post('/domain/update', "DomainsController@updateDomain")->middleware('dashboard');
Route::post('/domain/delete', "DomainsController@deleteDomain")->middleware('dashboard');
Route::get('edit/domain/{id}', "DomainsController@editDomain")->middleware('dashboard');
Auth::routes();
Route::get('/admin', "AdminController@loginPage");
Route::post('/admin/login', "AdminController@login")->name('admin.login');
Route::get('admin-dashboard', "AdminController@adminDashboard");
Route::post('admin-logout', "AdminController@logout")->name('admin.logout');

Route::get('fbx', function () {
    return view('fbx');
});

Route::get('logout-user', function () {
    \Illuminate\Support\Facades\Session::flush();
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/');
})->name('logout-user');


Route::get('category', 'CategoryController@getCategoryView')->middleware('dashboard');
Route::get('add-category', "CategoryController@getAddCategoryView")->middleware('dashboard');
Route::post('save-category', "CategoryController@saveCategory")->middleware('dashboard');
Route::get('delete-category/{id}', "CategoryController@deleteCategory")->middleware('dashboard');
Route::get('edit-category/{id}', "CategoryController@editCategory")->middleware('dashboard');
Route::post('save-edited-category', "CategoryController@saveEditedCategory")->middleware('dashboard');

Route::get('events', 'EventsController@getEventListView')->middleware('dashboard');
Route::get('add-event', "EventsController@getAddEventView")->middleware('dashboard');
Route::post('save-event', "EventsController@saveEvent")->middleware('dashboard');
Route::get('delete-event/{id}', "EventsController@deleteEvent")->middleware('dashboard');
Route::get('edit-event/{id}', "EventsController@editEvent")->middleware('dashboard');
Route::post('save-edited-event', "EventsController@saveEditedEvent")->middleware('dashboard');

Route::get('calender', 'CalenderController@getCalenderView')->middleware('dashboard');
Route::get('get-calender', 'CalenderController@getCalendarData')->middleware('dashboard');
Route::post('calendar/create', 'CalenderController@create');
Route::post('calendar/update', 'CalenderController@update');
Route::post('calendar/delete', 'CalenderController@destroy');

//new work
Route::post('login-admins', "AdminController@login")->name('login-admins');

Route::get('/home', "HomeController@showDashboard");

Route::get('staff', 'StaffController@getStaffListView');
Route::get('add-staff', "StaffController@getAddStaffView");
Route::post('save-staff', "StaffController@saveStaff");
Route::get('delete-staff/{id}', "StaffController@deleteStaff");
Route::get('edit-staff/{id}', "StaffController@editStaff");
Route::post('save-edited-staff', "StaffController@saveEditedStaff");

Route::get('customer', 'CustomerController@getCustomerListView');
Route::get('add-customer', "CustomerController@getAddCustomerView");
Route::post('save-customer', "CustomerController@saveCustomer");
Route::get('delete-customer/{id}', "CustomerController@deleteCustomer");
Route::get('edit-customer/{id}', "CustomerController@editCustomer");
Route::post('save-edited-customer', "CustomerController@saveEditedCustomer");

Route::get('message-template', 'MessageTemplateController@getMessageTemplateListView');
Route::get('add-message-template', "MessageTemplateController@getAddMessageTemplateView");
Route::post('save-message-template', "MessageTemplateController@saveMessageTemplate");
Route::get('delete-message-template/{id}', "MessageTemplateController@deleteMessageTemplate");
Route::get('edit-message-template/{id}', "MessageTemplateController@editMessageTemplate");
Route::post('save-edited-message-template', "MessageTemplateController@saveEditedMessageTemplate");

Route::post('login-staff', "StaffController@login");

Route::post('/import_excel/import', 'ImportExcelController@import');

//new

Route::get('/login-register-page', function () {
    return view('auth/register');
});
Route::post('register', "AuthController@registerCustomer");
Route::post('login', "AuthController@loginCustomer");
Route::get('/add-ammo', function () {
    return view('add-ammo');
});
Route::get('/retailer', function () {
    $retailer = \App\Retailer::all();
    return view('retailer')->with(['retailer' => $retailer]);
});
Route::get('/caliber', function () {
    $caliber = \App\Caliber::all();
    return view('caliber')->with(['caliber' => $caliber]);
});
Route::get('/add-retailer', function () {
    return view('add-retailer');
});
Route::get('/add-caliber', function () {
    return view('add-caliber');
});
Route::post('save-caliber-data', "CaliberController@saveCaliberData");
Route::get('delete-caliber/{id}', "CaliberController@deleteCaliber");
Route::post('save-retailer-data', "RetailerController@saveRetailerData");
Route::get('delete-retailer/{id}', "RetailerController@deleteRetailer");
Route::post('save-ammo-data', "AmmoController@saveAmmoData");
Route::get('/ammo', function () {
    $ammo = \App\Ammo::all();
    return view('ammo')->with(['ammo' => $ammo]);
});
Route::get('delete-ammo/{id}', "AmmoController@deleteAmmo");
Route::get('/users', function () {
    $users = \App\User::all();
    return view('users')->with(['users' => $users]);
});
Route::get('block-user/{id}', "UserController@blockUser");
Route::get('unblock-user/{id}', "UserController@unblockUser");
Route::post('search/keyword', "AmmoController@searchAmmo");
Route::post('seek-by-caliber', "AmmoController@seekByCaliber");
Route::post('seek-by-handgun', "AmmoController@seekByHandgun");
Route::post('seek-by-rifle', "AmmoController@seekByRifle");
Route::post('seek-by-rimfire', "AmmoController@seekByRimfire");
Route::post('seek-by-shotgun', "AmmoController@seekByShotgun");
Route::get('/about-us', function () {
    return view('about-us');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::post('add-ammo-fav', "AmmoController@addAmmoFavourite");
Route::get('favourites', "AmmoController@showFavourite");
Route::post('subscribe-now', "UserController@userSubscribed");
Route::post('contact-us', "UserController@contactUs");
Route::get('/subscribed-users', function () {
    $subscribedUsers = \App\SubscribedUser::all();
    return view('subscribed-users')->with(['subscribedUsers' => $subscribedUsers]);
});
Route::get('/contact-us', function () {
    $contactUs = \App\ContactUs::all();
    return view('contact-us')->with(['contactUs' => $contactUs]);
});
Route::post('click/record', "UserController@recordClick");
Route::get('/ammo-tracking', function () {
    $ammoTracking = \App\Ammo::all();
    foreach ($ammoTracking as $item) {
        $item['clicked'] = \App\TrackAmmoClick::where('ammo_id', $item->id)->count();
    }
    return view('ammo-tracking')->with(['ammoTracking' => $ammoTracking]);
});
Route::post('/import_excel/import', 'ImportExcelController@import');
Route::get('seek-by-caliber/{id}', "AmmoController@getSeekByCaliber");
Route::get('/retailer-reviews',"RetailerController@reviews");
Route::get('/share-ammo',"AmmoController@getAmmo");
Route::post('/save-rating',"RetailerController@saveReviews");
Route::post('click/record/retailer', "UserController@recordRetailerClick");
Route::get('/retailer-tracking', function () {
    $retailerTracking = \App\Retailer::all();
    foreach ($retailerTracking as $item) {
        $item['clicked'] = \App\TrackRetailerClick::where('retailer_id', $item->id)->count();
    }
    return view('retailer-tracking')->with(['retailerTracking' => $retailerTracking]);
});
