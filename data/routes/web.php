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

//route login
Route::get('login', function () {
	    return view('login');
	});
Route::post('masuk','LoginController@login');
//sampai sini

//keamanan login
Route::group(['middleware' => 'auth'], function() {
Route::get('keluar','LoginController@logout');
Route::get('/','HomeController@home');
Route::post('cari_grafik','HomeController@cari_grafik');

// Route::get('/','PelangganController@home');
Route::get('oc_fcc','PelangganController@oc_fcc');
Route::get('order','PelangganController@pelanggan');
Route::get('oc_ms2','PelangganController@oc_ms2');
Route::get('oc_starclick','PelangganController@oc_starclick');

//progress
Route::post('sortir_progress','FollowController@sortir_progress');

//sales
Route::post('tambah_sales','SalesController@tambah');
Route::post('cari_regional','SalesController@cari_regional');
Route::post('cari_witel','SalesController@cari_witel');
Route::post('cari_datel','SalesController@cari_datel');
Route::post('cari_agency','SalesController@cari_agency');
Route::post('cari_sales','SalesController@cari_sales');
Route::post('cari_username','SalesController@cari_username');

//sales ubah password
Route::post('ubah_password_sales/{id}','SalesController@ubah_password_sales');
Route::post('ubah_data/{id}','SalesController@ubah_data');
Route::get('hapus/{id}','SalesController@hapus');
Route::post('sortir_witel_sales','SalesController@sortir_witel_sales');


//teknisi
Route::post('tambah_teknisi','TeknisiController@tambah');
Route::post('ubah_teknisi/{id}','TeknisiController@ubah_data');
Route::get('hapus_teknisi/{id}','TeknisiController@hapus');
Route::post('cari_regional_teknisi','TeknisiController@cari_regional');
Route::post('cari_witel_teknisi','TeknisiController@cari_witel');
Route::post('cari_datel_teknisi','TeknisiController@cari_datel');
Route::post('sortir_witel_technician','TeknisiController@sortir_witel_technician');

//profil
Route::get('profil','UserController@profil');

//download(export)
Route::post('export_sales','SalesController@export_sales');
Route::post('export_technician','TeknisiController@export_technician');
Route::post('export_activity','LogController@export_activity');
Route::post('export_progress','FollowController@export_progress');
Route::post('export_report','SalesController@export_report');


Route::get('about_us', function () {
	    return view('about_us');
	});

Route::get('report_witel','SalesController@report_witel');

Route::post('ubah_password_profil/{id}','UserController@ubah_password_profil');
Route::post('ubah_profil/{id}','UserController@update_profil');

//akses super admin
Route::group(['middleware' => 'admin'], function() {

//progress
	Route::get('progress_witel', 'FollowController@progress_witel');
//sales
	Route::get('sales_witel','SalesController@data_witel');
//teknisi
	Route::get('technician_witel','TeknisiController@data_witel');
//report
	Route::get('report_admin','SalesController@report_admin');
	Route::get('report_witel_admin','SalesController@report_witel_admin');
	Route::get('report_point_admin','SalesController@report_point_admin');	


});	

//akses super admin
Route::group(['middleware' => 'super'], function() {
	
Route::get('admin','UserController@data');
Route::post('tambah_admin','UserController@tambah');
Route::get('hapus_admin/{id}','UserController@hapus');
Route::post('ubah_password_admin/{id}','UserController@ubah_password');

//progress
Route::get('progress', 'FollowController@progress');

//sales
Route::get('sales','SalesController@data');

//teknisi
Route::get('technician','TeknisiController@data');

//report
Route::get('report','SalesController@report');
Route::post('sortir_report','SalesController@sortir_report');
Route::get('report_point','SalesController@report_point');
Route::post('sortir_report_point','SalesController@sortir_report_point');

//hapus_progress
Route::get('hapus_progress/{id}','FollowController@hapus');

//master
Route::get('master', 'MasterController@data');
Route::post('tambah_regional','MasterController@tambah_regional');
Route::post('tambah_witel','MasterController@tambah_witel');
Route::post('tambah_datel','MasterController@tambah_datel');
Route::post('tambah_sto','MasterController@tambah_sto');
Route::post('tambah_agency','MasterController@tambah_agency');
Route::post('tambah_kode_agency','MasterController@tambah_kode_agency');
Route::get('hapus_agency/{id}','MasterController@hapus_agency');
Route::get('hapus_kode_agency/{id}','MasterController@hapus_kode_agency');
Route::get('hapus_regional/{id}','MasterController@hapus_regional');
Route::get('hapus_witel/{id}','MasterController@hapus_witel');
Route::get('hapus_datel/{id}','MasterController@hapus_datel');
Route::get('hapus_sto/{id}','MasterController@hapus_sto');

//notif
Route::get('notif','HomeController@notif');
//activity
Route::get('activity','LogController@data_activity');
Route::get('log/{id}','LogController@data');
Route::post('cari_log/{id}','LogController@cari');
Route::post('sortir_witel_activity','LogController@sortir_witel_activity');

//about-us editor
Route::get("about-us","ApiController@aboutUsForm");
Route::post("about-us","ApiController@aboutUsSave");

});

});
