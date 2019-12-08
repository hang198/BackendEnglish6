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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'UserController@authenticate');
Route::post('register', 'UserController@register');
Route::middleware('jwt.verify')->get('auth/user', 'UserController@getCurrentUser');


Route::prefix('units')->group(function () {
    Route::middleware('jwt.verify')->group(function () {
        Route::get('{id}', 'UnitController@getByID');
        Route::post('create', 'UnitController@create');
        Route::delete('{id}/delete', 'UnitController@delete');
        Route::post('{id}/update', 'UnitController@update');
    });
    Route::get('', 'UnitController@getAll');
    Route::get('{id}', 'LessonController@getByUnitId');

});
Route::prefix('lessons')->group(function () {
    Route::middleware('jwt.verify')->group(function () {
        Route::get('{id}', 'LessonController@getByID');
        Route::post('create', 'LessonController@create');
        Route::delete('{id}/delete', 'LessonController@delete');
        Route::post('{id}/update', 'LessonController@update');
    });
    Route::get('', 'LessonController@getAll');


});
Route::prefix('questions')->middleware('jwt.verify')->group(function () {
    Route::get('', 'QuestionController@getAll');
    Route::get('/{id}', 'QuestionController@getOnequestionAndAnswers');
    Route::get('practice/{id}', 'QuestionController@getByQuizId');
    Route::post('create', 'QuestionController@create');
    Route::post('update/{id}', 'QuestionController@update');
    Route::delete('delete/{id}', 'QuestionController@delete');
});
Route::prefix('practices')->group(function () {
    Route::middleware('jwt.verify')->group(function () {
        Route::get('{id}', 'PracticeController@getByID');
        Route::post('create', 'PracticeController@create');
        Route::delete('{id}/delete', 'PracticeController@delete');
        Route::post('{id}/update', 'PracticeController@update');
    });
    Route::get('', 'PracticeController@getAll');
    Route::get('lesson/{id}', 'PracticeController@getByLessonId');

});

Route::prefix('roles')->group(function (){
    Route::get('/', 'RoleController@getAll');
});

