<?php

Route::group([
    'middleware'=>'web',
    'as'=>'admin.tags.',
    'prefix'=>'admin/tags',
    'namespace'=>'Leoalmar\CodeTags\Controllers',
],function(){

    Route::get('/',['uses'=>'AdminTagsController@index','as'=>'index']);
    Route::get('create',['uses'=>'AdminTagsController@create','as'=>'create']);
    Route::post('store',['uses'=>'AdminTagsController@store','as'=>'store']);
    Route::get('{id}/edit',['uses'=>'AdminTagsController@edit','as'=>'edit']);
    Route::put('{id}',['uses'=>'AdminTagsController@update','as'=>'update']);
    Route::delete('{id}',['uses'=>'AdminTagsController@destroy','as'=>'delete']);

}); 