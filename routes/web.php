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
    return redirect('login');
});

Route::middleware('guest')->group(function(){
    Route::get('login', 'LoginController@index')->name('login');
    Route::post('cek_login', 'LoginController@cek_login')->name('cek_login');
    
    
});

Route::middleware('auth:web')->group(function(){

Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
Route::get('getData', 'DashboardController@getData')->name('dashboard.getData');

Route::get('logout', 'LoginController@logout');
Route::get('divisi', 'DivisiController@index')->name('divisi.index');
Route::POST('divisi_input', 'DivisiController@store');
Route::GET('divisi_edit', 'DivisiController@getUbah');
Route::POST('divisi_update', 'DivisiController@update');
Route::GET('divisi_delete/{uid}', 'DivisiController@destroy');
Route::POST('divisi_view', 'DivisiController@view');
Route::POST('divisiData', 'DivisiController@divisiData');

Route::get('users', 'UsersController@index')->name('users.index');
Route::POST('users_input', 'UsersController@store');
Route::GET('users_edit', 'UsersController@getUbah');
Route::POST('users_update', 'UsersController@update');
Route::GET('users_delete/{uid}', 'UsersController@destroy');
Route::POST('users_view', 'UsersController@view');


// PENGAWASAN

Route::get('pengawasan/{id}', 'pengawasan\PengawasanController@index')->name('pengawasan.index');
Route::POST('pengawasan_input', 'pengawasan\PengawasanController@store')->name('pengawasan_input');
Route::GET('pengawasan_edit', 'pengawasan\PengawasanController@getUbah');
Route::POST('pengawasan_update', 'pengawasan\PengawasanController@update')->name('pengawasan_update');
Route::GET('pengawasan_delete', 'pengawasan\PengawasanController@destroy');
Route::POST('pengawasan_view', 'pengawasan\PengawasanController@view');

Route::get('download_paslon/{uid}', 'pengawasan\PengawasanController@paslon')->name('pengawasan.download_paslon');
Route::get('download_pengguna_hak_pilih/{uid}', 'pengawasan\PengawasanController@pengguna_hak_pilih')->name('pengawasan.download_pengguna_hak_pilih');
Route::get('download_rekapitulasi/{uid}', 'pengawasan\PengawasanController@rekapitulasi')->name('pengawasan.download_rekapitulasi');
Route::get('download_rekomendasi/{uid}', 'pengawasan\PengawasanController@rekomendasi')->name('pengawasan.download_rekomendasi');


Route::get('laporan_pengawasan/{id}', 'pengawasan\LaporanAkhirPengawasanController@index')->name('laporan_pengawasan.index');
Route::POST('laporan_pengawasan_input', 'pengawasan\LaporanAkhirPengawasanController@store')->name('laporan_pengawasan_input');
Route::GET('laporan_pengawasan_edit', 'pengawasan\LaporanAkhirPengawasanController@getUbah');
Route::POST('laporan_pengawasan_update', 'pengawasan\LaporanAkhirPengawasanController@update')->name('laporan_pengawasan_update');
Route::GET('laporan_pengawasan_delete', 'pengawasan\LaporanAkhirPengawasanController@destroy');
Route::POST('laporan_pengawasan_view', 'pengawasan\LaporanAkhirPengawasanController@view');
Route::get('download_laporan_pengawasan/{uid}', 'pengawasan\LaporanAkhirPengawasanController@download')->name('laporan_pengawasan.download');

// ------------------------------------------

// PELANGGARAN
Route::get('pelanggaran/{id}', 'pelanggaran\PelanggaranController@index')->name('pelanggaran.index');
Route::POST('pelanggaran_input', 'pelanggaran\PelanggaranController@store')->name('pelanggaran_input');
Route::GET('pelanggaran_edit', 'pelanggaran\PelanggaranController@getUbah');
Route::POST('pelanggaran_update', 'pelanggaran\PelanggaranController@update')->name('pelanggaran_update');
Route::GET('pelanggaran_delete', 'pelanggaran\PelanggaranController@destroy');
Route::GET('pelanggaran_view/{uid_parent}', 'pelanggaran\PelanggaranController@view');
Route::GET('pelanggaran_edit_detail', 'pelanggaran\PelanggaranController@getUbahDetail');

Route::group(['namespace' => 'pelanggaran'], function () {
Route::get('penanganan_pelanggaran/{id}', 'PenangananPelanggaranController@index')->name('penanganan_pelanggaran.index');
Route::POST('penanganan_pelanggaran_input', 'PenangananPelanggaranController@store')->name('penanganan_pelanggaran_input');
Route::GET('penanganan_pelanggaran_edit', 'PenangananPelanggaranController@getUbah');
Route::POST('penanganan_pelanggaran_update', 'PenangananPelanggaranController@update')->name('penanganan_pelanggaran_update');
Route::GET('penanganan_pelanggaran_delete', 'PenangananPelanggaranController@destroy');
Route::POST('penanganan_pelanggaran_view', 'PenangananPelanggaranController@view');
Route::GET('penanganan_pelanggaran_downldoad/{uid}', 'PenangananPelanggaranController@download')->name('PenangananPelanggaran.download');
Route::GET('penanganan_pelanggaran_cek', 'PenangananPelanggaranController@cek')->name('PenangananPelanggaran.cek');

Route::get('rekapitulasi_pelanggaran/{id}', 'RekapitulasiPelanggaranController@index')->name('rekapitulasi_pelanggaran.index');
Route::POST('rekapitulasi_pelanggaran_input', 'RekapitulasiPelanggaranController@store')->name('rekapitulasi_pelanggaran_input');
Route::GET('rekapitulasi_pelanggaran_edit', 'RekapitulasiPelanggaranController@getUbah');
Route::POST('rekapitulasi_pelanggaran_update', 'RekapitulasiPelanggaranController@update')->name('rekapitulasi_pelanggaran_update');
Route::GET('rekapitulasi_pelanggaran_delete/{uid}', 'RekapitulasiPelanggaranController@destroy');
Route::POST('rekapitulasi_pelanggaran_view', 'RekapitulasiPelanggaranController@view');

Route::get('laporan_pelanggaran/{id}', 'LaporanPelanggaranController@index')->name('laporan_pelanggaran.index');
Route::POST('laporan_pelanggaran_input', 'LaporanPelanggaranController@store')->name('laporan_pelanggaran_input');
Route::GET('laporan_pelanggaran_edit', 'LaporanPelanggaranController@getUbah');
Route::POST('laporan_pelanggaran_update', 'LaporanPelanggaranController@update')->name('laporan_pelanggaran_update');
Route::GET('laporan_pelanggaran_delete', 'LaporanPelanggaranController@destroy');
Route::POST('laporan_pelanggaran_view', 'LaporanPelanggaranController@view');
Route::get('download_lap_pelanggaran/{uid}', 'LaporanPelanggaranController@download')->name('laporan_pelanggaran.download');

});

// SENGKETA

Route::group(['namespace' => 'sengketa'], function () {


    Route::get('sengketa/{id}', 'SengketaController@index')->name('sengketa.index');
    Route::POST('sengketa_input', 'SengketaController@store')->name('sengketa_input');
    Route::GET('sengketa_edit', 'SengketaController@getUbah');
    Route::POST('sengketa_update', 'SengketaController@update')->name('sengketa_update');
    Route::GET('sengketa_delete/', 'SengketaController@destroy');
    Route::get('putusan_penyelesaian_sengketa/{uid}', 'SengketaController@putusan_penyelesaian_sengketa')->name('sengketa.putusan_penyelesaian_sengketa');
    Route::get('tindak_lanjut_sengketa/{uid}', 'SengketaController@tindak_lanjut_sengketa')->name('sengketa.tindak_lanjut_sengketa');

    Route::get('laporan_sengketa/{id}', 'LaporanSengketaController@index')->name('laporan_sengketa.index');
    Route::POST('laporan_sengketa_input', 'LaporanSengketaController@store')->name('laporan_sengketa_input');
    Route::GET('laporan_sengketa_edit', 'LaporanSengketaController@getUbah');
    Route::POST('laporan_sengketa_update', 'LaporanSengketaController@update')->name('laporan_sengketa_update');
    Route::GET('laporan_sengketa_delete', 'LaporanSengketaController@destroy');
    Route::get('download_laporan_sengketa/{uid}', 'LaporanSengketaController@download')->name('laporan_sengketa.download_laporan_sengketa');

  
});
    
});

