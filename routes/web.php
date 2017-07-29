<?php

Route::get('/', ['uses' => 'HomeController@getHome', 'as' => 'getHome']);
Route::get('/root', ['uses' => 'HomeController@getHome', 'as' => 'getHome']);
Route::get('/home', ['uses' => 'HomeController@getHome', 'as' => 'getHome']);

Route::get('/api/statuses', ['uses' => 'FeedsController@getStatuses', 'as' => 'getStatuses']);

Route::get('/login', ['uses' => 'AuthController@index', 'as' => 'getLogin']);
Route::post('/login', ['uses' => 'AuthController@postLogin', 'as' => 'postLogin']);
Route::get('/logout', ['uses' => 'AuthController@getLogout', 'as' => 'getLogout']);
Route::get('/register', ['uses' => 'RegisterController@index', 'as' => 'getRegister']);
Route::post('/register', ['uses' => 'RegisterController@postRegister', 'as' => 'postRegister']);

Route::prefix('feed')->group(function() {
    Route::get('/', ['uses' => 'FeedsController@getFeed', 'as' => 'getFeed']);
    Route::post('/status', ['uses' => 'StatusController@postStatus', 'as' => 'postStatus']);
    Route::get('/status/{statusId}/delete/{userId}', ['uses' => 'StatusController@getDeleteStatus', 'as' => 'getDeleteStatus']);
    Route::post('/status/{statusId}/reply', ['uses' => 'StatusController@postReply', 'as' => 'postReply']);
});

Route::prefix('user')->group(function () {
    Route::get('/profile', ['uses' => 'UserController@index', 'as' => 'getUpdateProfile']);
    Route::post('/profile', ['uses' => 'UserController@postUpdateProfile', 'as' => 'postUpdateProfile']);
    Route::post('/profile/password', ['uses' => 'UserController@postUpdatePassword', 'as' => 'postUpdatePassword']);
    Route::post('/profile/picture', ['uses' => 'UserController@postUpdateProfilePicture', 'as' => 'postUpdateProfilePicture']);
    Route::post('/profile/cover', ['uses' => 'UserController@postUpdateProfileCover', 'as' => 'postUpdateProfileCover']);
    Route::get('/{username}', ['uses' => 'UserController@getUserProfile', 'as' => 'getUserProfile']);
});

Route::prefix('follow')->group(function() {
    Route::post('/data', ['uses' => 'FollowController@getFollowData', 'as' => 'getFollowData']);
    Route::post('/create', ['uses' => 'FollowController@createFollower', 'as' => 'createFollower']);
});

Route::get('/following', ['uses' => 'FollowController@getFollowing', 'as' => 'getFollowing']);
Route::get('/followers', ['uses' => 'FollowController@getFollowers', 'as' => 'getFollowers']);

Route::get('/search', ['uses' => 'SearchController@getResults', 'as' => 'getSearchResults']);