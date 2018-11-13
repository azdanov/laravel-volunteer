<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Auth;

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/regions', 'Region\RegionController@index')->name('region.index');

Route::group(['prefix' => '{region}'], static function (): void {
    Route::get('/', 'Region\RegionController@store')->name('region.store');

    Route::group(['prefix' => 'categories'], static function (): void {
        Route::get('/', 'Category\CategoryController@index')->name('categories.index');

        Route::group(['prefix' => '{category}'], static function (): void {
            Route::get('/', 'Listing\ListingController@index')->name('listing.index');
        });
    });
});

