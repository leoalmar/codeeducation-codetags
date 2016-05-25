<?php

Route::group([
    'prefix'=>'admin/tags',
    'as'=>'admin.tags.',
    'namespace'=>'Leoalmar\CodeTags\Controllers',
    'middleware'=>'web'
],function(){

    Route::get('/',['uses'=>'AdminTagsController@index','as'=>'index']);
    Route::get('create',['uses'=>'AdminTagsController@create','as'=>'create']);
    Route::post('store',['uses'=>'AdminTagsController@store','as'=>'store']);

}); 