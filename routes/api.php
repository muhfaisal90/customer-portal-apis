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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

// Endpoints for User
Route::prefix('/cp/v1')->group( function (){

    Route::post('/login', 'api\v1\LoginController@login');

    Route::post('/register', 'api\v1\RegistrationController@register');

    Route::middleware('auth:api')->get('/all', 'api\v1\UserController@index');

    Route::middleware('auth:api')->post('/getRootDirectoriesAndFiles', 'api\v1\UserController@rootDirectoriesAndFiles');

    Route::middleware('auth:api')->post('/getDirectoriesAndFiles', 'api\v1\UserDirectoryDetailController@directoriesAndFiles');

    Route::middleware('auth:api')->post('/getRecentFiles', 'api\v1\UserController@recentFiles');

    Route::middleware('auth:api')->post('/searchDirectoriesAndFiles', 'api\v1\UserController@searchInDirectoriesAndFiles');

    Route::middleware('auth:api')->post('/getTrashedFile', 'api\v1\UserController@getTrashedFile');

    Route::middleware('auth:api')->post('/getNotifications', 'api\v1\UserNotificationController@getNotifications');

    Route::middleware('auth:api')->post('/getFileDetails', 'api\v1\UserFileDetailController@getFileDetails');

});

// Endpoints for admin
Route::prefix('/cp/admin/v1')->group( function (){

    Route::middleware('auth:api')->post('/trashFile', 'api\v1\UserFileDetailController@trashFile');

    Route::middleware('auth:api')->post('/restoreTrashedFile', 'api\v1\UserFileDetailController@restoreTrashedFile');

    Route::middleware('auth:api')->post('/getTrashedFile', 'api\v1\UserController@getTrashedFile');



});
