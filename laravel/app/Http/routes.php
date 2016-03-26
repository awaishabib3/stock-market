<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api'], function () {
    Route::post('login', 'AuthenticateController@login');
    Route::post('register', 'AuthenticateController@register');
    Route::get('profile', 'ProfileController@index');

    Route::get('stocks', 'StockController@index');
    Route::get('stocks/{symbol}', 'StockController@show');
    Route::get('stocks/{symbol}/history', 'StockController@history');

    Route::get('pages', 'PageController@index');
    Route::get('pages/{uri}', 'PageController@show');
    Route::post('pages', 'PageController@store');
    Route::put('pages/{id}', 'PageController@update');
    Route::delete('pages/{id}', 'PageController@destroy');

    Route::get('market/inventory', 'MarketController@inventory');
});
