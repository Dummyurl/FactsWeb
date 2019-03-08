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

Route::get('/', function () {
    return view('app');
});

// Route::post('admin/update/{id}',			['as'=>'category.update',		'uses' =>'Admin\CategoryController@update']);
// Route::get('admin/update', 				['as' =>'admin.siteprofile',    'uses'=>'Admin\SiteProfileController@index']);


Route::group(['prefix' => 'admin/', 'as' => 'admin.', 'middleware' => 'auth'], function (){
	Route::get('dashboard',   				['as' =>'dashboard',   	    			'uses'=>'Admin\DashboardController@index']);
	Route::get('siteprofile', 				['as' =>'siteprofile', 	    			'uses'=>'Admin\SiteProfileController@index']);

	Route::get('siteprofile/edit',	    	['as'=>'siteprofile.edit',				'uses' =>'Admin\SiteProfileController@edit']);
	Route::post('siteprofile/update',		['as'=>'siteprofile.update',			'uses' =>'Admin\SiteProfileController@update']);
	// Route::post('admin/update/{id}',		['as'=>'category.update',				'uses' =>'Admin\CategoryController@update']);
	// Route::get('admin/update', 			['as' =>'admin.siteprofile',    		'uses'=>'Admin\SiteProfileController@index']);

	Route::get('slider',					['as'=>'slider',						'uses' =>'Admin\SliderController@index']);
	Route::get('slider/add',				['as'=>'slider.add',					'uses' =>'Admin\SliderController@add']);
	Route::post('slider/store',				['as'=>'slider.store',					'uses' =>'Admin\SliderController@store']);
	// Route::get('slider/edit/{id}',			['as'=>'slider.edit',				'uses' =>'Admin\SliderController@edit']);
	// Route::post('slider/update/{id}',		['as'=>'slider.update',				'uses' =>'Admin\SliderController@update']);
	// Route::get('slider/delete/{id}',		['as'=>'slider.delete',					'uses' =>'Admin\SliderController@delete']);

	Route::get('facts',						['as'=>'facts',						'uses' =>'Admin\FactsController@index']);
	Route::get('facts/add',				    ['as'=>'facts.add',			    	'uses' =>'Admin\FactsController@add']);
	Route::post('facts/store',				['as'=>'facts.store',				'uses' =>'Admin\FactsController@store']);
	Route::get('facts/edit/{id}',			['as'=>'facts.edit',				'uses' =>'Admin\FactsController@edit']);
	Route::get('facts/delete/{id}',		    ['as'=>'facts.delete',				'uses' =>'Admin\FactsController@delete']);
	Route::post('facts/update/{id}',		['as'=>'facts.update',				'uses' =>'Admin\FactsController@update']);


	Route::get('factscategory',				['as'=>'factscategory',				'uses' =>'Admin\FactsController@addcat']);
	// Route::get('factscategory/add',		['as'=>'facts.add',					'uses' =>'Admin\FactsController@add']);
	Route::post('facts/storecat',			['as'=>'facts.storecat',			'uses' =>'Admin\FactsController@storecat']);
	Route::get('facts/catlist',					['as'=>'facts.catlist',		    'uses' =>'Admin\FactsController@catlist']);
	Route::get('sliderfacts/deletecat/{id}',	['as'=>'facts.deletecat',		'uses' =>'Admin\FactsController@deletecat']);

});	


Route::get('config',				['as'=>'config',				'uses' =>'ApiController@index']);























//git ignore vendor /.idea  .env public/storage
// /node_modules
// /public/storage
// /public/image
// /storage/* .key
// /vendor
// Homestead.json
// Homestead.yaml
// .env
// # JetBrains IDE family #
// ########################
// .idea
// config/ide-helper.php
// _ide_helper.php
// ideconfig
// _ide_helper*
// .phpstrome.meta.php

// # OS  #
// #######
// .DS_Store

// /ref this is onnly for ref folder

// this is for first time clone people to generate env file and update all devepedencies into project 

//copy from composer file and   @php -r \"file_exists('.env') || copy('.env.example', '.env') and it create env file 
// and composer update  and after update 
// php artasian key:generation
// don't upload .env file in live server  change database file in live server


//  change app file in live server url to live url 
//  change debug to false to hide error




// after delete manually delete table  run this // composer dump-autoload 

// unsigned integer start form 0


// php artisan migrate -- add or create table 

// php artisan rollback -- to remove tables  // if there is any changes in tables field or some filde are mistake then we use this command

// php artisan migrate refresh   migrate and rollback sabai garchha  if sabai refresh garnu parne chha vane matra chalaune

//  existance database ma add garda chai new batch add hunchha tes ra tei lao matri migratr garchha 

// live code change app.php key = "randomrefsndfsdbgsjk";

// this is used for added new column php artisan migrate:refresh --seed


//if we we hsve data then we need to add columnn then  
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

///  don't change vandor file because vender is replace by composer with every new library added. if we don't use composer update then its right  