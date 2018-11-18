<?php

declare(strict_types=1);

use App\Http\Controllers\BraintreeGatewayController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Category\RegionCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Listing\ContactListingController;
use App\Http\Controllers\Listing\ListingController;
use App\Http\Controllers\Listing\PaymentListingController;
use App\Http\Controllers\Listing\PublishedListingController;
use App\Http\Controllers\Listing\RegionCategoryListingController;
use App\Http\Controllers\Listing\RegionListingController;
use App\Http\Controllers\Listing\UnpublishedListingController;
use App\Http\Controllers\Listing\ViewedListingController;
use App\Http\Controllers\Region\RegionController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/category', [CategoryController::class, 'index'])
    ->name('category.index');

Route::post('payment/token', [BraintreeGatewayController::class, 'token'])
    ->name('payment_listing.token')->middleware(['auth']);

Route::group(['prefix' => 'listing'], static function (): void {
    Route::group(['middleware' => 'auth'], static function (): void {
        Route::get('unpublished', [UnpublishedListingController::class, 'index'])
            ->name('unpublished_listing.index');
        Route::get('published', [PublishedListingController::class, 'index'])
            ->name('published_listing.index');

        Route::get('create', [ListingController::class, 'create'])
            ->name('listing.create');
        Route::post('create', [ListingController::class, 'store'])
            ->name('listing.store');

        Route::get('{listing}/edit', [ListingController::class, 'edit'])
            ->name('listing.edit');

        Route::get('{listing}/payment', [PaymentListingController::class, 'show'])
            ->name('payment_listing.show');
        Route::post('{listing}/payment', [PaymentListingController::class, 'store'])
            ->name('payment_listing.store');
        Route::patch('{listing}/payment', [PaymentListingController::class, 'update'])
            ->name('payment_listing.update');

        Route::put('{listing}', [ListingController::class, 'update'])
            ->name('listing.update');

        Route::delete('{listing}', [ListingController::class, 'destroy'])
            ->name('listing.destroy');
    });

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
