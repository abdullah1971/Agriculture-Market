<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/login/custom', 'LonginController@directUserProperPage')->name('custom.login');


Route::middleware(['auth'])->group(function () {

	Route::get('/farmer', 'FarmerController@myProduct')->name('farmer.myProduct');


	Route::get('/farmer/new_request', 'FarmerController@newRequest')->name('farmer.newRequest');

	Route::post('/farmer/new_request', 'FarmerController@storeRequest')->name('farmer.storeRequest');

	Route::get('/farmer/pending_request', 'FarmerController@pendingRequest')->name('farmer.pendingRequest');

	Route::get('/farmer/update_product/{id}', 'FarmerController@updateProduct')->name('farmer.update_product');


	Route::post('/farmer/update_product', 'FarmerController@updateProductRequest')->name('farmer.update_product_request');

	Route::get('/farmer/delete_product/{id}', 'FarmerController@deleteProduct')->name('farmer.delete_product');



	Route::get('/admin', 'AdminController@pendingRequest')->name('admin.pendingRequest');

	Route::post('/admin/accept_request', 'AdminController@acceptRequest')->name('admin.acceptRequest');


	Route::get('/admin/customer_order/pending', 'AdminController@pendingCustomerOrder')->name('admin.customer_request_pending');

	Route::post('/admin/customer_order/pending', 'AdminController@acceptCustomerRequest')->name('admin.customer_request_accept');

	Route::get('/admin/customer_order/pending/delete', 'AdminController@deleteOrderRequest')->name('admin.customer_request_delete');
    
});


Route::get('/shopping/{catagory}', 'CustomerController@productShow')->name('customer.productShow');

Route::post('/shopping/cart', 'CustomerController@addToCart')->name('customer.addToCart');

Route::get('/customer/my_cart', 'CustomerController@myCart')->name('customer.myCart');

Route::get('/customer/message', 'CustomerController@sendMessage')->name('customer.message');

Route::post('/customer/checkout', 'CustomerController@checkOut')->name('customer.checkout');

Route::get('/customer/confirm_address', 'CustomerController@confirmAddress')->name('customer.confirmAddress');

Route::post('/customer/confirm_order', 'CustomerController@confirmOrder')->name('customer.confirmOrder');

Route::get('/customer/order_success', 'CustomerController@orderSuccess')->name('customer.orderSuccess');


Route::post('customer/search', 'CustomerController@searchProduct')->name('customer.search');








