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

Auth::routes(["register" => false]);

Route::get('/', 'Auth\LoginController@showLoginForm');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/handymen', 'DashboardController@index')->name('handymen');

Route::get('/clients', 'DashboardController@index')->name('clients');

Route::get('/jobs', 'DashboardController@index')->name('jobs');
