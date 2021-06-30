<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Abilities
    Route::apiResource('abilities', 'AbilitiesController', ['only' => ['index']]);

    // Locales
    Route::get('locales/languages', 'LocalesController@languages')->name('locales.languages');
    Route::get('locales/messages', 'LocalesController@messages')->name('locales.messages');

    // Dashboard
    Route::get('dashboard', 'DashboardApiController@index')->name('dashboard');

    // Permissions
    Route::resource('permissions', 'PermissionsApiController');

    // Roles
    Route::resource('roles', 'RolesApiController');

    // Users
    Route::resource('users', 'UsersApiController');

    // Resume
    Route::post('resumes/media', 'ResumeApiController@storeMedia')->name('resumes.storeMedia');
    Route::resource('resumes', 'ResumeApiController');

    // Company
    Route::resource('companies', 'CompanyApiController');

    // Jobs
    Route::resource('jobs', 'JobsApiController');

    // Interviews
    Route::resource('interviews', 'InterviewsApiController');
});
