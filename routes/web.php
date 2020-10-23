<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'DashboardController@index')->name('dashboard');

// Handymen
Route::get('/handymen', 'HandymenController@index')->name('handymen');

// Clients
Route::get('/clients', 'ClientsController@index')->name('clients');

// Jobs
Route::get('/jobs', 'JobsController@index')->name('jobs');

// Categories
Route::get('/categories', 'CategoriesController@index')->name('categories');

Route::post('/categories/create', 'CategoriesController@store')->name('categories.store');

Route::delete('/categories/{id}', 'CategoriesController@destroy')->name('categories.delete');

// Services
Route::post('/services/create', 'ServicesController@store')->name('services.store');

Route::delete('/services/{id}', 'ServicesController@destroy')->name('services.delete');
