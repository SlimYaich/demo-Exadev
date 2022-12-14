<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', 'VoitureController@index') ;
Route::resource('/voitures', 'VoitureController') ;
Route::post('/voitures', 'VoitureController@index')->name('voitures.index') ;
Route::post('/add/voitures', 'VoitureController@store')->name('voitures.store') ;
Route::resource('/reservations', 'ReservationController') ;
Route::get('/reservations/{id}/create', 'ReservationController@create')->name('reservation.create') ;
Route::get('/reservations/{reservationId}/{voitureId}/delete', 'ReservationController@deleteUserReservations')->name('reservation.delete') ;
Route::get('/login', 'UsersController@login')->name('users.login') ;
Route::post('/auth', 'UsersController@auth')->name('users.auth') ;
Route::post('/logout', 'UsersController@logout')->name('users.logout') ;
Route::get('/register', 'UsersController@create')->name('users.register') ;
Route::post('/register', 'UsersController@register')->name('users.register') ;
Route::get('/user/{id}/profile', 'UsersController@show')->name('users.profile') ;
Route::get('/admin', 'AdminsController@index')->name('admins.index') ;



