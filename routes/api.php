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
Route::post('login', 'Api\AuthController@login');
Route::post('register', 'Api\AuthController@register');
Route::group(['middleware' => 'auth:api'], function(){
	Route::post('getUser', 'Api\AuthController@getUser');
});


Route::post('config','ApiController@factapimob');

Route::post('POST_like','ApiController@POST_like');

Route::post('publicpollresult', 'ApiController@publicpollresult');

Route::post('varun', 'ApiController@varun');


Route::get('publicpoll',			['as'=>'publicpoll',			'uses' =>'ApiController@publicpoll']);
Route::get('factapi',				['as'=>'factapi',				'uses' =>'ApiController@factapi']);
Route::get('surveyapi',				['as'=>'surveyapi',				'uses' =>'ApiController@surveyapi']);
Route::get('inititivesapi',			['as'=>'inititivesapi',			'uses' =>'ApiController@ourinititives']);
Route::get('servicesapi',			['as'=>'servicesapi',			'uses' =>'ApiController@service']);
Route::get('siteapi',			    ['as'=>'siteapi',			    'uses' =>'ApiController@siteapi']);
Route::get('config',				['as'=>'config',				'uses' =>'ApiController@factapimob']);

Route::post('registeruser', 'ApiController@register');
Route::post('getregisteruser', 'ApiController@getUser');

