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
        Route::post('create', 'UnitController@create');
        Route::delete('{id}/delete', 'UnitController@delete');
        Route::post('{id}/update', 'UnitController@update');
        Route::get('{id}', 'UnitController@getByID');
        Route::get('', 'UnitController@getAll');


});

Route::prefix('lessons')->group(function () {
    Route::get('{id}', 'LessonController@getByID');
    Route::get('', 'LessonController@getAll');
    Route::post('create', 'LessonController@create');
    Route::post('{id}/update', 'LessonController@update');
    Route::delete('{id}/delete', 'LessonController@delete');
    Route::get('unit/{id}','LessonController@getByUnitId');
});

Route::prefix('questions')->group(function () {
    Route::get('', 'QuestionController@getAll');
    Route::get('/{id}', 'QuestionController@getOnequestionAndAnswers');
    Route::get('practice/{id}', 'QuestionController@getByPracticeId');
    Route::post('create', 'QuestionController@create');
    Route::post('update/{id}', 'QuestionController@update');
    Route::delete('delete/{id}', 'QuestionController@delete');
});

Route::prefix('practices')->group(function () {
        Route::post('create', 'PracticeController@create');
        Route::delete('{id}/delete', 'PracticeController@delete');
        Route::post('{id}/update', 'PracticeController@update');
        Route::post('/point/create', 'PointController@create');
        Route::get('/point/{id}', 'PointController@getById');
        Route::get('{id}/point', 'PracticeController@getPointByID');
        Route::get('{id}', 'PracticeController@getByID');
        Route::get('', 'PracticeController@getAll');
        Route::get('lesson/{id}','PracticeController@getByLessonId');


});

Route::prefix('users')->group(function () {
    Route::get('', 'UserController@getAll');
    Route::get('{id}', 'UserController@getById');
    Route::post('{id}/update', 'UserController@update');
    Route::put('{id}/edit-info', 'UserController@editInfo');
    Route::post('/change-password', 'UserController@changePassword');
});

Route::prefix('points')->group(function () {
    Route::get('{id}/user', 'PointController@getPointsMaxByUserID');
    Route::get('{id}/time', 'PointController@getPointsByTime');
    Route::get('{id}/practice-sort','PointController@getPointsOfPracticeSort');
    Route::get('{id}/practice-time','PointController@getPointsOrPracticeByTime');

});


Route::get('/images/{nameImage}', function ($nameImage) {
    return response()->make(\Illuminate\Support\Facades\Storage::disk('public')->get('images/' . $nameImage));
});

Route::prefix('roles')->group(function (){
    Route::get('/', 'RoleController@getAll');
});

// code mới
Route::group(['prefix' => 'admin'], function(){

    //danh muc truyen
    Route::group(['prefix' => 'story'], function(){
        Route::get('list', ['as' => 'admin.story.list', 'uses' => 'CateStoryController@getList']);
        Route::get('add', ['as' => 'admin.story.getAdd', 'uses' => 'CateStoryController@getAdd']);
        Route::post('add', ['as' => 'admin.story.postAdd', 'uses' => 'CateStoryController@postAdd']);

        Route::get('delete/{id}', ['as' => 'admin.story.getDelete', 'uses' => 'CateStoryController@getDelete']);
        Route::get('edit/{id}', ['as' => 'admin.story.getEdit', 'uses' => 'CateStoryController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.story.postEdit', 'uses' => 'CateStoryController@postEdit']);
    });

    //truyen chi tiet
    Route::group(['prefix' => 'stories'], function(){
        Route::get('list', ['as' => 'admin.stories.list', 'uses' => 'StoriesController@getList']);
        Route::get('add', ['as' => 'admin.stories.getAdd', 'uses' => 'StoriesController@getAdd']);
        Route::post('add', ['as' => 'admin.stories.postAdd', 'uses' => 'StoriesController@postAdd']);

        Route::get('delete/{id}', ['as' => 'admin.stories.getDelete', 'uses' => 'StoriesController@getDelete']);
        Route::get('edit/{id}', ['as' => 'admin.stories.getEdit', 'uses' => 'StoriesController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.stories.postEdit', 'uses' => 'StoriesController@postEdit']);
    });

    //danh muc video
    Route::group(['prefix' => 'catevideo'], function(){
        Route::get('list', ['as' => 'admin.catevideo.list', 'uses' => 'CateVideoController@getList']);
        Route::get('add', ['as' => 'admin.catevideo.getAdd', 'uses' => 'CateVideoController@getAdd']);
        Route::post('add', ['as' => 'admin.catevideo.postAdd', 'uses' => 'CateVideoController@postAdd']);

        Route::get('delete/{id}', ['as' => 'admin.catevideo.getDelete', 'uses' => 'CateVideoController@getDelete']);
        Route::get('edit/{id}', ['as' => 'admin.catevideo.getEdit', 'uses' => 'CateVideoController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.catevideo.postEdit', 'uses' => 'CateVideoController@postEdit']);
    });

    //videos 
    Route::group(['prefix' => 'videos'], function(){
        Route::get('list', ['as' => 'admin.videos.list', 'uses' => 'VideoController@getList']);
        Route::get('add', ['as' => 'admin.videos.getAdd', 'uses' => 'VideoController@getAdd']);
        Route::post('add', ['as' => 'admin.videos.postAdd', 'uses' => 'VideoController@postAdd']);

        Route::get('delete/{id}', ['as' => 'admin.videos.getDelete', 'uses' => 'VideoController@getDelete']);
        Route::get('edit/{id}', ['as' => 'admin.videos.getEdit', 'uses' => 'VideoController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.videos.postEdit', 'uses' => 'VideoController@postEdit']);
    });
});