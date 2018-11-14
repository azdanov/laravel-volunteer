<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Auth;

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/region', 'Region\RegionController@index')->name('region.index');
Route::get('/category', 'Category\CategoryController@index')->name('category.index');

Route::group(['prefix' => 'listing', 'namespace' => 'Listing'], static function (): void {
    Route::get('{category}', 'ListingController@show')->name('listing.show');
});

Route::group(['prefix' => '{region}'], static function (): void {
    Route::get('/', 'Region\RegionController@store')->name('region.store');

    Route::group(['prefix' => 'category'], static function (): void {
        Route::get('/', 'Category\RegionCategoryController@show')
            ->name('region_category.show');

        Route::group(
            ['prefix' => '{category}/listing', 'namespace' => 'Listing'],
            static function (): void {
                Route::get('/', 'RegionCategoryListingController@index')
                    ->name('region_category_listing.index');

                Route::get('{listing}', 'RegionCategoryListingController@show')
                    ->name('region_category_listing.show');
            }
        );
    });

    Route::group(['prefix' => 'listing', 'namespace' => 'Listing'], static function (): void {
        Route::post('{listing}/favorite', 'FavoriteListingController@store')
            ->name('listing_favorite.store');
    });
});
