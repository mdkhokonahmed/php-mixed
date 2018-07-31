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




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*
===================
Category-start
===================
*/

Route::get('/addcategory', 'CategoryController@index');
Route::post('/category/save', 'CategoryController@StoreCategory');
Route::get('/listcategory', 'CategoryController@Categorylist');
Route::get('/category/edit/{id}', 'CategoryController@CategoryEdit');
Route::post('/category/update', 'CategoryController@UpdateCategory');
Route::get('/category/delete/{id}', 'CategoryController@DeleteCategory');

/*
===================
Brand-start
===================
*/

Route::get('/addbrand', 'BrandController@index');
Route::post('/brand/save', 'BrandController@StoreBrand');
Route::get('/listbrand', 'BrandController@BrandList');
Route::get('/brand/edit/{id}', 'BrandController@BrandEdit');
Route::post('/brand/update', 'BrandController@UpdateBrand');
Route::get('/brand/delete/{id}', 'BrandController@DeleteBrand');


/*
===================
Costomar-start
===================
*/

Route::get('/addcoustomar', 'CostomarController@index');
Route::post('/coustomar/save', 'CostomarController@StoreCoustomar');
Route::get('/listcoustomar', 'CostomarController@ViewCoustomar');
Route::get('/coustomar/edit/{id}', 'CostomarController@EditCoustomar');
Route::post('/coustomar/update', 'CostomarController@UpdateCoustomar');
Route::get('/coustomar/delete/{id}', 'CostomarController@DeleteCoustomar');

/*
===================
Suppliers-start
===================
*/

Route::get('/addsupplier', 'SupplierController@index');
Route::post('/supplier/save', 'SupplierController@StoreSupplier');
Route::get('/listsupplier', 'SupplierController@ViewSupplier');
Route::get('/supplier/edit/{id}', 'SupplierController@EditSupplier');
Route::post('/supplier/update', 'SupplierController@UpdateSupplier');
Route::get('/supplier/delete/{id}', 'SupplierController@DeleteSupplier');

/*
===================
Stocks-start
===================
*/

Route::get('/addstock', 'StocksController@index');
Route::post('/stock/save', 'StocksController@StoreStocks');
Route::get('/liststock', 'StocksController@StockList');
Route::get('/stock/edit/{id}', 'StocksController@StockEdit');
Route::post('/update/stock', 'StocksController@UpdateStock');
Route::get('/stock/delete/{id}', 'StocksController@DeleteStock');


/*
===================
Purchases Stock-start
===================
*/

Route::get('/purchasesstock', 'PurchasesStocksController@index');
Route::post('/purchases/save', 'PurchasesStocksController@StorePurchases');
Route::get('/viewpurchases', 'PurchasesStocksController@PurchasesList');
Route::get('/Purchase/edit/{id}', 'PurchasesStocksController@PurchasesEdit');
Route::post('/update/save', 'PurchasesStocksController@Purchasesupdate');
Route::get('/Purchase/delete/{id}', 'PurchasesStocksController@PurchasesDelete');


/*
===================
Seles Stock-start
===================
*/

Route::get('/selesstocks', 'SelesController@index');
