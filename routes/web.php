<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Auth;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/regions', 'RegionsController@index')->name('regions.index');
Route::get('user/region/{region}', 'User\RegionController@store')->name('user.region.store');

Route::group(['prefix' => '/{region}'], static function (): void {
    Route::group(['prefix' => '/categories'], static function (): void {
        Route::get('/', 'Category\CategoriesController@index')->name('categories.index');
    });
});

Auth::routes();
