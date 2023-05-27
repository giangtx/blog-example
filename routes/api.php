<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::namespace('Api')->group(function () {
    Route::get('/blogs', 'BlogController@getAll');
    Route::post('/blogs', 'BlogController@createBlog');
    Route::put('/blogs', 'BlogController@updateBlog');
    Route::delete('/blogs', 'BlogController@deleteBlog');
    Route::get('/blogs/user/{id}', 'BlogController@findByUser');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
