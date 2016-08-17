<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::auth();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index');
    Route::get('admin','AdminController@index');
    Route::get('admin/stats/{id}','AdminController@stats');
    Route::resource('survey','SurveyController');
    Route::resource('question','QuestionController');
    Route::resource('choice','ChoiceController');
    Route::resource('response','ResponseController');
    Route::get('/survey/exit_message/{id}','SurveyController@exit_message');
});

// Display all SQL executed in Eloquent
//Event::listen('illuminate.query', function($query)
//{
//    var_dump($query);
//});