<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function (){
    Route::post('/login', 'Auth\LoginController@login');

    Route::post('/register', 'Auth\RegisterController@register');

    // Api routes
    Route::get('/jobs', 'ApiController@jobs');

    Route::post('/jobs/accept', 'ApiController@acceptJob');

    Route::get('/party/{id}/jobs/ongoing', 'ApiController@ongoingJobs');
    
    // Route::get('/test', function() {
    //     return response()->json([
    //         "user" => App\User::find(1)->load('party')
    //     ]);
    // });

});

