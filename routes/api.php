<?php

use Illuminate\Http\Request;

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


//show all posts
Route::get('articles','ArticleController@index');



//show single posts
Route::get('article/{id}','ArticleController@show');



//Create new posts
Route::post('article','ArticleController@store');



//Create update posts
Route::put('article','ArticleController@store');



//Create update posts
Route::delete('article/{id}','ArticleController@destroy');