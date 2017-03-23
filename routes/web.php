<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();
Route::get('/logout',"Auth\LoginController@logout");
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/invitations/{ref_code}','InvitationsController@index');
Route::post('/invitations/register','InvitationsController@store');

Route::group(['middleware'=>['auth','web']],function (){

	Route::resource('/profile','ProfileController');
	Route::resource('/user','UsersController');
	Route::resource('/restaurant','RestaurantController');
	Route::resource('/branch','BranchController');
	Route::resource('/menu','MenuController');
	Route::get('/available-menu','MenuController@available');
	Route::resource('/inventory','InventoryController');
	Route::resource('/suppliers','SuppliersController');
	Route::resource('/ingredients','IngredientsController');
	Route::resource('/storages','StoragesController');
	Route::resource('/purchase-restrictions','PurchaseRestrictionsController');
	Route::resource('/supplier-purchase-period','SupplierPurchasePeriodController');
	Route::resource('/shopping-cart','ShoppingCartController');
	Route::get('/sales/top-items/{filter?}','SalesController@top_items');
	Route::get('/sales/quick-stats/{filter?}','SalesController@quick_stats');
	Route::get('/sales/top-items-percentage/{filter?}','SalesController@top_items_percentage');
	Route::get('/sales/import-data','SalesController@import_data');
	Route::get('/sales/forecast/{filter?}','SalesController@forecast');

});

