<?php

declare(strict_types=1);

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Category\RegionCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Listing\ContactListingController;
use App\Http\Controllers\Listing\ListingController;
use App\Http\Controllers\Listing\RegionCategoryListingController;
use App\Http\Controllers\Listing\RegionListingController;
use App\Http\Controllers\Listing\ViewedListingController;
use App\Http\Controllers\Region\RegionController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/category', [CategoryController::class, 'index'])
    ->name('category.index');

Route::group(['prefix' => 'listing'], static function (): void {
    Route::get('favorite', [ListingController::class, 'index'])
        ->name('listing.index');

    Route::get('viewed', [ViewedListingController::class, 'index'])
        ->name('viewed_listing.index');

    Route::get('{category}', [ListingController::class, 'show'])
        ->name('listing.show');
});

Route::group(['prefix' => 'region'], static function (): void {
    Route::get('/', [RegionController::class, 'index'])
        ->name('region.index');
    Route::get('/{region}', [RegionController::class, 'store'])
        ->name('region.store');

    Route::group(['prefix' => '{region}/category'], static function (): void {
        Route::get('/', [RegionCategoryController::class, 'show'])
            ->name('region_category.show');

        Route::group(
            ['prefix' => '{category}/listing'],
            static function (): void {
                Route::get('/', [RegionCategoryListingController::class, 'index'])
                    ->name('region_category_listing.index');

                Route::get('{listing}', [RegionCategoryListingController::class, 'show'])
                    ->name('region_category_listing.show');

                Route::post('{listing}/contact', [ContactListingController::class, 'store'])
                    ->name('contact_listing.store');
            }
        );
    });

    Route::group(['prefix' => 'listing/favorite'], static function (): void {
        Route::post('{listing}', [RegionListingController::class, 'store'])
            ->name('region_listing.store');

        Route::delete('{listing}', [RegionListingController::class, 'destroy'])
            ->name('region_listing.destroy');
    });
});
