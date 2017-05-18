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
    return view('welcome');
});

Route::get('login/vk', 'Social\VkController@redirectToProvider');
Route::get('login/vk/callback', 'Social\VkController@handleProviderCallback');

Route::get('/social', function () {
    return 'success';
});

Route::group(['prefix' => '/parser'], function(){

    Route::get('/index', ['as' => 'parser.index', 'uses' => 'Admin\ParserController@index']);

    Route::get('/work', ['as' => 'parser.work', 'uses' => 'Admin\ParserController@parseAndSave']);

    Route::get('/api', ['as' => 'parser.api', 'uses' => 'Admin\ParserController@api']);

    Route::get('/test/dot', ['as' => 'parser.test.dot', 'uses' => 'Admin\ParserController@testDot']);

    Route::get('/test/psytribe', ['as' => 'parser.test.psytribe', 'uses' => 'Admin\ParserController@testPsyTribe']);

    Route::get('/test/gribych', ['as' => 'parser.test.gribych', 'uses' => 'Admin\ParserController@testGribych']);

    Route::get('/test/test', ['as' => 'parser.test.test', 'uses' => 'Admin\ParserController@testTest']);

});

Route::group(['prefix' => '/admin'], function(){

    # Events routes
    Route::get('/events/index', ['as' => 'admin.events.index', 'uses' => 'Admin\EventsController@index']);

    Route::get('/events/{id}', ['as' => 'admin.events.item', 'uses' => 'Admin\EventsController@item'])-> where('id', '[0-9]+');

    Route::get('/events/list', ['as' => 'admin.events.list', 'uses' => 'Admin\EventsController@eventsList']);

    Route::get('/events/api', ['as' => 'admin.events.api', 'uses' => 'Admin\EventsController@api']);

    Route::post('/events/create', ['as' => 'admin.events.create', 'uses' => 'Admin\EventsController@create']);

    Route::get('/events/update', ['as' => 'admin.events.update', 'uses' => 'Admin\EventsController@update']);

    Route::post('/events/upload', ['as' => 'admin.events.upload', 'uses' => 'Admin\EventsController@upload']);


    # Places routes
    Route::get('/places/index', ['as' => 'admin.places.index', 'uses' => 'Admin\PlacesController@index']);

    Route::get('/places/{id}', ['as' => 'admin.places.item', 'uses' => 'Admin\PlacesController@item'])-> where('id', '[0-9]+');

    Route::get('/places/list', ['as' => 'admin.places.list', 'uses' => 'Admin\PlacesController@eventsList']);

    Route::get('/places/api', ['as' => 'admin.places.api', 'uses' => 'Admin\PlacesController@api']);

    Route::post('/places/create', ['as' => 'admin.places.create', 'uses' => 'Admin\PlacesController@create']);

    Route::get('/places/update', ['as' => 'admin.places.update', 'uses' => 'Admin\PlacesController@update']);


});




Auth::routes();

Route::get('/home', 'HomeController@index');
