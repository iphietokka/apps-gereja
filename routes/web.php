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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'HomePageController@index');
Route::get('home/berita', 'HomeBeritaController@index')->name('home-berita');
Route::get('home/warta', 'HomeWartaController@index')->name('home-warta');
Route::get('home/kegiatan', 'HomeKegiatanController@index')->name('home-kegiatan');
Route::get('/berita/details/{id}', 'HomePageController@show')->name('berita-details');
Route::get('/warta/details/{id}', 'HomePageController@wartaDetails')->name('warta-details');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('user', 'UserController@index')->name('user');
Route::post('user/store', 'UserController@store')->name('user-store');
Route::post('user/update/{id}', 'UserController@update')->name('user-update');
Route::delete('user/{id}', 'UserController@destroy')->name('user-delete');

Route::get('klasis', 'KlasisController@index')->name('klasis');
Route::post('klasis/store', 'KlasisController@store')->name('klasis-store');
Route::post('klasis/update/{id}', 'KlasisController@update')->name('klasis-update');
Route::delete('klasis/{id}', 'KlasisController@destroy')->name('klasis-delete');

Route::get('unit', 'UnitController@index')->name('unit');
Route::post('unit/store', 'UnitController@store')->name('unit-store');
Route::post('unit/update/{id}', 'UnitController@update')->name('unit-update');
Route::delete('unit/{id}', 'UnitController@destroy')->name('unit-delete');

Route::get('sektor', 'SektorController@index')->name('sektor');
Route::post('sektor/store', 'SektorController@store')->name('sektor-store');
Route::post('sektor/update/{id}', 'SektorController@update')->name('sektor-update');
Route::delete('sektor/{id}', 'SektorController@destroy')->name('sektor-delete');

Route::get('gereja', 'GerejaController@index')->name('gereja');
Route::post('gereja/store', 'GerejaController@store')->name('gereja-store');
Route::post('gereja/update/{id}', 'GerejaController@update')->name('gereja-update');
Route::delete('gereja/{id}', 'GerejaController@destroy')->name('gereja-delete');

Route::get('wadah', 'WadahController@index')->name('wadah');
Route::post('wadah/store', 'WadahController@store')->name('wadah-store');
Route::post('wadah/update/{id}', 'WadahController@update')->name('wadah-update');
Route::delete('wadah/{id}', 'WadahController@destroy')->name('wadah-delete');

Route::get('keluarga', 'KeluargaController@index')->name('keluarga');
Route::get('keluarga/create', 'KeluargaController@create')->name('keluarga-create');
Route::post('keluarga/store', 'KeluargaController@store')->name('keluarga-store');
Route::get('keluarga/edit/{id}', 'KeluargaController@edit')->name('keluarga-edit');
Route::post('keluarga/update', 'KeluargaController@update')->name('keluarga-update');
Route::delete('keluarga/{id}', 'KeluargaController@destroy')->name('keluarga-delete');
Route::get('keluarga/ajaxData', 'KeluargaController@ajaxRequest');
Route::get('keluarga/getsub', 'KeluargaController@getsub');

Route::get('anggota-jemaat', 'AnggotaJemaatController@index')->name('anggota-jemaat');
Route::get('anggota-jemaat/create', 'AnggotaJemaatController@create')->name('anggota-create');
Route::post('anggota-jemaat/store', 'AnggotaJemaatController@store')->name('anggota-store');
Route::get('anggota-jemaat/edit/{id}', 'AnggotaJemaatController@edit')->name('anggota-edit');
Route::post('anggota-jemaat/edit', 'AnggotaJemaatController@update')->name('anggota-update');
Route::delete('anggota-jemaat/{id}', 'AnggotaJemaatController@destroy')->name('anggota-delete');

Route::get('laporan', 'LaporanController@index')->name('laporan');
Route::post('laporan/umat', 'LaporanController@umat')->name('laporan-umat');
Route::post('laporan/baptis', 'LaporanController@baptis')->name('laporan-baptis');
Route::post('laporan/sidi', 'LaporanController@sidi')->name('laporan-sidi');


Route::get('berita', 'BeritaController@index')->name('berita');
Route::get('berita/create', 'BeritaController@create')->name('berita-create');
Route::post('berita/store', 'BeritaController@store')->name('berita-store');
Route::get('berita/edit/{id}', 'BeritaController@edit')->name('berita-edit');
Route::post('berita/edit', 'BeritaController@update')->name('berita-update');
Route::delete('berita/{id}', 'BeritaController@destroy')->name('berita-delete');

Route::get('gallery', 'GalleryController@index')->name('gallery');
Route::post('gallery/store', 'GalleryController@store')->name('gallery-store');
Route::post('gallery/update/{id}', 'GalleryController@update')->name('gallery-update');
Route::delete('gallery/{id}', 'GalleryController@destroy')->name('gallery-delete');

Route::get('kegiatan', 'KegiatanController@index')->name('kegiatan');
Route::get('kegiatan/create', 'KegiatanController@create')->name('kegiatan-create');
Route::post('kegiatan/store', 'KegiatanController@store')->name('kegiatan-store');
Route::get('kegiatan/edit/{id}', 'KegiatanController@edit')->name('kegiatan-edit');
Route::post('kegiatan/update', 'KegiatanController@update')->name('kegiatan-update');
Route::delete('kegiatan/{id}', 'KegiatanController@destroy')->name('kegiatan-delete');

Route::get('pendaftaran-baptis', 'PendaftaranBaptisController@index')->name('pendaftaran-baptis');
Route::get('pendaftaran-baptis/create', 'PendaftaranBaptisController@create')->name('pendaftaran-baptis-create');
Route::post('pendaftaran-baptis/store', 'PendaftaranBaptisController@store')->name('pendaftaran-baptis-store');
Route::get('pendaftaran-baptis/edit/{id}', 'PendaftaranBaptisController@edit')->name('pendaftaran-baptis-edit');
Route::post('pendaftaran-baptis/update', 'PendaftaranBaptisController@update')->name('pendaftaran-baptis-update');
Route::delete('pendaftaran-baptis/{id}', 'PendaftaranBaptisController@destroy')->name('pendaftaran-baptis-delete');

Route::get('jadwal-ibadah', 'JadwalIbadahController@index')->name('jadwal-ibadah');
Route::get('jadwal-ibadah/create', 'JadwalIbadahController@create')->name('jadwal-ibadah-create');
Route::post('jadwal-ibadah/store', 'JadwalIbadahController@store')->name('jadwal-ibadah-store');
Route::get('jadwal-ibadah/edit/{id}', 'JadwalIbadahController@edit')->name('jadwal-ibadah-edit');
Route::post('jadwal-ibadah/update', 'JadwalIbadahController@update')->name('jadwal-ibadah-update');
Route::delete('jadwal-ibadah/{id}', 'JadwalIbadahController@destroy')->name('jadwal-ibadah-delete');

Route::get('warta', 'WartaJemaatController@index')->name('warta');
Route::get('warta/create', 'WartaJemaatController@create')->name('warta-create');
Route::post('warta/store', 'WartaJemaatController@store')->name('warta-store');
Route::get('warta/edit/{id}', 'WartaJemaatController@edit')->name('warta-edit');
Route::post('warta/edit', 'WartaJemaatController@update')->name('warta-update');
Route::delete('warta/{id}', 'WartaJemaatController@destroy')->name('warta-delete');
