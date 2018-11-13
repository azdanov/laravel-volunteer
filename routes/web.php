<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Auth;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/regions', 'RegionsController@index')->name('regions');
Route::get('user/region/{region}', 'User\RegionController@store')->name('user.region.store');

Auth::routes();
