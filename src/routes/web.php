<?php

Route::group(['namespace'=>'Kayise\Test\Http\Controllers'],function(){

    Route::get('test','TestController@index')->name('test');
    Route::post('addtest','TestController@add')->name('addtest');
});