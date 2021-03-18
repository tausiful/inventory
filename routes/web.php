<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\LiftingController;
use App\Http\Controllers\LiftingRecordController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductIssueController;
use App\Http\Controllers\SalesReportController;
use App\Http\Controllers\StockReportController;

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

// Route::get('/', function () {
//     return view('auth.login');
// });

 Route::get('/', 'FrontEndController@index');
 Route::get('/portfolio-details', 'FrontEndController@portfolio')->name('portfolio-details');
 Route::get('/inner-page', 'FrontEndController@innerPage')->name('inner-page');
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('admin.dashboard');

// });
Route::prefix('admin')->group(function () {

    Route::middleware('auth')->group(function () {
    Route::get('/dashboard', 'HomeController@index')->name('admin.index');
    //category setup
    Route::get('/categories', 'CategoryController@index')->name('category.index');
    Route::get('/add-category', 'CategoryController@create')->name('category.add');
    Route::post('/save-category', 'CategoryController@store')->name('category.store');
    Route::get('/delete-category/{id}', 'CategoryController@destroy')->name('category.delete');
    Route::get('/edit-category/{id}', 'CategoryController@edit')->name('category.edit');
    Route::post('/update-category/{id}', 'CategoryController@update')->name('category.update');

    //product setup
    Route::get('/products','ProductController@index')->name('product.index');
    Route::get('/add-product','ProductController@create')->name('product.add');
    Route::post('/save-product','ProductController@store')->name('product.store');
    Route::get('/edit-product/{id}','ProductController@edit')->name('product.edit');
    Route::post('/update-product/{id}','ProductController@update')->name('product.update');
    Route::get('/delete-product/{id}','ProductController@destroy')->name('product.delete');

    //vendor setup
    Route::get('/vendors','VendorController@index')->name('vendor.index');
    Route::get('/add-vendor','VendorController@create')->name('vendor.add');
    Route::post('/save-vendor','VendorController@store')->name('vendor.store');
    Route::get('/edit-vendor/{id}','VendorController@edit')->name('vendor.edit');
    Route::post('/update-vendor/{id}','VendorController@update')->name('vendor.update');
    Route::get('/delete-vendor/{id}','VendorController@destroy')->name('vendor.delete');

    //purchasing
    Route::get('/purchasings','LiftingController@index')->name('lifting.index');
    Route::get('/add-purchasing','LiftingController@create')->name('lifting.add');
    Route::post('/save-purchasing','LiftingController@store')->name('lifting.store');
     Route::get('/edit-purchasing/{id}','LiftingController@edit')->name('lifting.edit');
    Route::post('/update-purchasing/{id}','LiftingController@update')->name('lifting.update');
    Route::get('/delete-purchasing/{id}','LiftingController@destroy')->name('lifting.delete');
    Route::get('/purchasing-product-info', 'LiftingController@liftingProductInfo')->name('lifting.productInfo');

    // Lifting Record
    Route::get('/purchasing-record', 'LiftingRecordController@index')->name('liftingRecord.index');
    Route::post('/purchasing-record', 'LiftingRecordController@index')->name('liftingRecord.index');

     //customer setup
    Route::get('/customers','CustomerController@index')->name('customer.index');
    Route::get('/add-customer','CustomerController@create')->name('customer.add');
    Route::post('/save-customer','CustomerController@store')->name('customer.store');
    Route::get('/edit-customer/{id}','CustomerController@edit')->name('customer.edit');
    Route::post('/update-customer/{id}','CustomerController@update')->name('customer.update');
    Route::get('/delete-customer/{id}','CustomerController@destroy')->name('customer.delete');

    //Product sales
    Route::get('/sales','ProductIssueController@index')->name('productIssue.index');
    Route::get('/add-sales','ProductIssueController@create')->name('productIssue.add');
    Route::post('/save-sales','ProductIssueController@store')->name('productIssue.store');
    Route::get('/edit-sales/{id}','ProductIssueController@edit')->name('productIssue.edit');
    Route::post('/update-sales/{id}','ProductIssueController@update')->name('productIssue.update');
    Route::get('/delete-sales/{id}','ProductIssueController@destroy')->name('productIssue.delete');
    Route::post('/sales/product-info', 'ProductIssueController@productInfo')->name('productIssue.productInfo');
    Route::post('/sales/product-serial-info', 'ProductIssueController@productSerialInfo')->name('productIssue.productSerialInfo');

     // Sales report
    Route::get('/sales-report', 'SalesReportController@index')->name('salesReport.index');
    Route::post('/sales-report', 'SalesReportController@index')->name('salesReport.index');

    //Stock Report
    Route::get('/stock-report', 'StockReportController@index')->name('stockReport.index');
    Route::post('/stock-report', 'StockReportController@index')->name('stockReport.index');
   

});

}); 