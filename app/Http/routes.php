<?php

/*
  |--------------------------------------------------------------------------
  | Routes File
  |--------------------------------------------------------------------------
  |
  | Here is where you will register all of the routes in an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', function () {
    return view('AccessPublic/index');
});






/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */
Route::resource('test', 'JsonController');
Route::resource('reporter', 'Reports\ReporterController');
Route::resource('refactor', 'Samples\RefactorDBController2');

Route::resource('orderData', 'Order\OrderDataController');
Route::resource('accountData', 'Accounts\AccountDataController');





//Route::resource('/testRegister', 'RegisterTest');

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::resource('order', 'Order\OrderController');
    Route::resource('account', 'Accounts\AccountController');
    Route::resource('dashboard', 'Dashboard\CustomerController');
    Route::resource('dashboardAdmin', 'Dashboard\AdminController');
    Route::get('showOrder', 'Order\OrderController@showOrder');
});
Route::resource('catalog', 'CatalogController');

Route::resource('person', 'Parties\PersonController');
Route::resource('company', 'Parties\CompanyController');

Route::resource('transference', 'TransferenceController');
Route::get('verificateIdentificacition', 'Parties\PartyController@verificate');
