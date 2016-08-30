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

Route::get('/', 'IndexController@index');
Route::get('dashboard', 'DashboardController@index');
Route::get('courses/reorder/{id}/{direction}', 'CoursesController@reorder' );

Route::resource( 'students', 'StudentsController' );
Route::resource( 'courses' , 'CoursesController'  );
Route::resource( 'series'  , 'SeriesController'   );
