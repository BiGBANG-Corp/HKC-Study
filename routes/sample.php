<?php

Route::get('dashboard', 'DashboardController@getDashboard')->name('sample.dashboard');


Route::prefix('post')->namespace('Post')->group(function() {

    Route::get('archive',       'PostController@getArchive')->name('sample.post.archive');

    Route::get('create',        'CreateController@getCreate')->name('sample.post.create');
    Route::post('create',       'CreateController@postCreate');

    Route::get('update',        'UpdateController@getUpdate')->name('sample.post.update');
    Route::post('update',       'UpdateController@postUpdate')->name('sample.post.update');

    Route::get('read',          'ReadController@getRead')->name('sample.post.read');
    Route::post('add-comment',  'ReadController@postAddComment');

    Route::post('delete',       'DeleteController@postDelete')->name('sample.post.delete');
    
});