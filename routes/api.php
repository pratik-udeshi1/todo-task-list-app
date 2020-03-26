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

// Optional Parameter for Category id
Route::get('category/{id?}', 'CategoryController@getCategories');
Route::post('category', 'CategoryController@addCategory');
Route::put('category/{id}', 'CategoryController@updateCategory');
Route::delete('category/{id}', 'CategoryController@deleteCategory');

// Optional Parameter for Task id
Route::get('task/{id?}', 'TaskController@getTasks');
Route::post('task', 'TaskController@addTask');
Route::put('task/{id}', 'TaskController@updateTask');
Route::put('task/mark-complete/{id}', 'TaskController@completeTask');
Route::delete('task/{id}', 'TaskController@deleteTask');
