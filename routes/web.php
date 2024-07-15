<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/','App\Http\Controllers\myController@index')->name('home');
Route::get('/home','App\Http\Controllers\myController@index');
Route::get('/repertoar','App\Http\Controllers\myController@repertoar')->name('repertoar');
Route::get('/o_nama','App\Http\Controllers\myController@index2')->name('about');
Route::get('/predstave','App\Http\Controllers\myController@index3');
Route::get('/login','App\Http\Controllers\AuthManager@login')->name('login');
Route::get('/registration','App\Http\Controllers\AuthManager@register')->name('register');
Route::get('/admin','App\Http\Controllers\AuthManager@adminLogin')->name('adminLogin');
Route::get('/admin/predstave','App\Http\Controllers\AdminController@adminPredstave')->name('adminPredstave');
Route::get('/admin/repertoar','App\Http\Controllers\AdminController@adminRepertoar')->name('adminRepertoar');
Route::get('/admin/glumci','App\Http\Controllers\GlumciController@adminGlumci')->name('adminGlumci');
Route::get('/admin/nalozi','App\Http\Controllers\NaloziController@adminNalozi')->name('adminNalozi');
Route::get('/admin/users','App\Http\Controllers\NaloziController@userNalozi')->name('userNalozi');
Route::get('/admin/predstave/{id}/istakni', 'App\Http\Controllers\AdminController@adminPredstavaIstakni')->name('adminPredstavaIstakni');
Route::get('/admin/predstave/{id}/izbaci', 'App\Http\Controllers\AdminController@adminPredstavaIzbaci')->name('adminPredstavaIzbaci');
Route::get('/admin/dodaj_glumca/{id}', 'App\Http\Controllers\AdminController@adminDodajeGlumcePredstavi')->name('adminDodajeGlumcePredstavi');
Route::get('/predstave/{id}', 'App\Http\Controllers\myController@oPredstavi')->name('oPredstavi');
Route::get('/rezervisi/{id}', 'App\Http\Controllers\myController@show')->name('rezervisi.show');
Route::get('/rezervacije', 'App\Http\Controllers\myController@rezervacije')->name('rezervacije')->middleware('auth');

Route::post('/rezervisi','App\Http\Controllers\myController@reserve')->name('rezervisi');
Route::post('/login','App\Http\Controllers\AuthManager@loginPost')->name('loginPost');
Route::post('/registration','App\Http\Controllers\AuthManager@registerPost')->name('registerPost');
Route::post('/logout','App\Http\Controllers\AuthManager@logout')->name('logout');
Route::post('/admin','App\Http\Controllers\AuthManager@adminLoginPost')->name('adminLoginPost');
Route::post('/admin/predstave','App\Http\Controllers\AdminController@adminPredstavePost')->name('adminPredstavePost');
Route::post('/admin/predstave/{id}','App\Http\Controllers\AdminController@adminPredstaveIzbrisi')->name('adminPredstaveIzbrisi');
Route::post('/admin/glumci','App\Http\Controllers\GlumciController@adminGlumciPost')->name('adminGlumciPost');
Route::post('/admin/glumci/{id}','App\Http\Controllers\GlumciController@adminGlumciIzbrisi')->name('adminGlumciIzbrisi');
Route::post('/admin/nalozi','App\Http\Controllers\NaloziController@adminNaloziPost')->name('adminNaloziPost');
Route::post('/admin/nalozi/{id}','App\Http\Controllers\NaloziController@adminNaloziIzbrisi')->name('adminNaloziIzbrisi');
Route::post('/admin/users','App\Http\Controllers\NaloziController@userNaloziPost')->name('userNaloziPost');
Route::post('/admin/users/{id}','App\Http\Controllers\NaloziController@userNaloziIzbrisi')->name('userNaloziIzbrisi');
Route::post('/admin/repertoar/{id}','App\Http\Controllers\AdminController@adminRepertoarIzbrisi')->name('adminRepertoarIzbrisi');
Route::post('/admin/dodaj_glumca/{id}/dodaj', 'App\Http\Controllers\AdminController@adminDodajeGlumcePredstaviDodaj')->name('adminDodajeGlumcePredstaviDodaj');
Route::post('/admin/repertoar','App\Http\Controllers\AdminController@adminRepertoarDodaj')->name('adminRepertoarDodaj');
Route::post('/admin/dodaj_glumca/{id}/{id2}', 'App\Http\Controllers\AdminController@adminDodajeGlumcePredstaviIzbrisi')->name('adminDodajeGlumcePredstaviIzbrisi');
Route::post('/rezervacije/{id}', 'App\Http\Controllers\myController@otkazi')->name('otkazi');