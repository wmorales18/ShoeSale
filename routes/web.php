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
    return redirect()->route('product.index');
});

Route::resource('audit','AuditController')->middleware('auth');
Route::resource('supplier','SupplierController')->middleware('auth');
Route::resource('color','ColorController')->middleware('auth');
Route::resource('typeproduct','TypeProductController')->middleware('auth');
Route::resource('size','SizeController')->middleware('auth');
Route::resource('shipping','ShippingController')->middleware('auth');
Route::resource('typeshipping','TypeShippingController')->middleware('auth');
Route::resource('typeactive','TypeActiveController')->middleware('auth');
Route::resource('typepay','TypePayController')->middleware('auth');
Route::resource('client','ClientController')->middleware('auth');
Route::resource('branchoffice','BranchOfficeController')->middleware('auth');
Route::resource('role','RoleController')->middleware('auth');

Route::resource('employee','EmployeeController')->middleware('auth');
Route::resource('active','ActiveController')->middleware('auth');
Route::resource('bill','BillController')->middleware('auth');
Route::resource('detailpay','DetailPayController')->middleware('auth');
Route::resource('product','ProductController')->middleware('auth');
Route::resource('productinventory','ProductInventoryController')->middleware('auth');
Route::resource('detailbill','DetailBillController')->middleware('auth');
Route::resource('shippingproduct','ShippingProductController')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
