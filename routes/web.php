<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Auth;

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/regions', 'Region\RegionController@index')->name('region.index');
Route::get('/category', 'Category\CategoryController@index')->name('category.index');

Route::group(['prefix' => 'listings'], static function (): void {
    Route::get('{category}', 'Listing\ListingController@show')->name('listing.show');
});

Route::group(['prefix' => '{region}'], static function (): void {
    Route::get('/', 'Region\RegionController@store')->name('region.store');

    Route::group(['prefix' => 'category'], static function (): void {
        Route::get('/', 'Category\RegionCategoryController@show')->name('region_category.show');

        Route::group(['prefix' => '{category}'], static function (): void {
            Route::get('/', 'Listing\RegionCategoryListingController@index')->name('region_category_listing.index');
        });
    });
});
