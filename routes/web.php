<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;


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

Route::resource('beritaw', 'WebController');
Route::get('pengurusw', 'WebController@index2');
// Admin/Petugas
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function() {
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::resource('pengaduans', 'PengaduanController');
        Route::resource('katpeng', 'KatpengController');
        Route::resource('tanggapan', 'TanggapanController');
        Route::resource('berita', 'BeritaController');
        Route::resource('kategori', 'KatberitaController');
        Route::resource('lembaga', 'LembagaController');
        Route::resource('pengurus', 'PengurusController');
        Route::get('pengurus/index2/{id}', 'PengurusController@index2')->name('peng');
        Route::get('pengurus/create2/{id}', 'PengurusController@create2')->name('pengc');
        Route::get('pengurus/edit2/{peng}/{id}', 'PengurusController@edit2')->name('pengd');
        Route::post('pengurus/destroy2/{peng}/{id}', 'PengurusController@destroy2')->name('pengx');

        Route::get('masyarakat', 'AdminController@masyarakat');
        Route::resource('petugas', 'PetugasController');

        Route::get('laporan', 'AdminController@laporan');
        Route::get('laporan/cetak', 'AdminController@cetak');
        Route::get('pengaduan/cetak/{id}', 'AdminController@pdf');
});


// Masyarakat
Route::prefix('user')
    ->middleware(['auth', 'MasyarakatMiddleware'])
    ->group(function() {
				Route::get('/', 'MasyarakatController@index')->name('masyarakat-dashboard');
                Route::resource('pengaduan', 'MasyarakatController');
                Route::get('pengaduan', 'MasyarakatController@lihat');
});





require __DIR__.'/auth.php';
