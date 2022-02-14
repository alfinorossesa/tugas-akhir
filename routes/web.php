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
Route::get('/', 'HomeController@client');
Route::get('/home', 'HomeController@client')->name('home');

Route::middleware('admin','auth')->group(function() {

    Route::get('/admin', 'AdminController@admin');

    Route::resource('admin/produk','ProdukController');
    Route::resource('admin/brand','BrandController');
    Route::resource('admin/member','MemberController');
    Route::resource('admin/lokasi','LokasiController');
    
    Route::get('editprofileadmin','EditProfileAdminController@edit');
    Route::post('editprofileadmin/{id}','EditProfileAdminController@update')->name('editprofileadmin.update');

});

Route::get('editprofile','EditProfileController@edit');
Route::post('editprofile/{id}','EditProfileController@update')->name('editprofile.update');

Route::get('/produk','ProdukClientController@client');
Route::get('/produk/brand/{brand_id}','ProdukClientController@showBrand')->name('produk.show_brand');
Route::get('/produk/{id}','ProdukClientController@showDetail')->name('produk.show_detail');
Route::get('/produk/beli/{id}','ProdukClientController@beliSekarang')->name('produk.beli_sekarang');
Route::get('/produk/lokasi/{lokasi_id}','ProdukClientController@aturLokasi')->name('produk.atur_lokasi');

Route::resource('client/jualemas','JualEmasController');

Route::get('/about', 'AboutController@index');
