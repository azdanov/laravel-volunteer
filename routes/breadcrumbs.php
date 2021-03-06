<?php

/** @noinspection PhpUnhandledExceptionInspection */

declare(strict_types=1);

use App\Models\Category;
use App\Models\Listing;
use App\Models\Region;
use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator as Crumbs;

// Home
Breadcrumbs::for('home', static function (Crumbs $crumbs): void {
    $crumbs->push('Home', route('home'));
});


// Home > [Generic]
Breadcrumbs::for('generic', static function (Crumbs $crumbs, string $name): void {
    $crumbs->parent('home');
    $crumbs->push($name);
});

// Home > {Region}
Breadcrumbs::for('region', static function (Crumbs $crumbs, Region $region): void {
    if ($region->parent) {
        $crumbs->parent('region', $region->parent);
    } else {
        $crumbs->parent('home');
    }
    $crumbs->push($region->name, route('region.store', $region));
});

// Home > {Category}
Breadcrumbs::for('category', static function (Crumbs $crumbs, Category $category): void {
    if ($category->parent) {
        $crumbs->parent('category', $category->parent);
    } else {
        $crumbs->parent('generic', 'Categories');
    }
    $crumbs->push($category->name, route('listing.show', $category));
});

// Home > {Region} > Categories > {Category}
Breadcrumbs::for(
    'region_category',
    static function (Crumbs $crumbs, Region $region, Category $category): void {
        if ($category->parent) {
            $crumbs->parent('region_category', $region, $category->parent);
            $crumbs->push($category->name, route('region_category.show', $region));
        } else {
            $crumbs->parent('region', $region);
            $crumbs->push(
                $category->name,
                route('region_category_listing.index', compact('region', 'category'))
            );
        }
    }
);

// Home > {Region} > Categories > {Category} > Listings > {Listing}
Breadcrumbs::for(
    'region_category_listing',
    static function (Crumbs $crumbs, Region $region, Category $category, Listing $listing): void {
        $crumbs->parent('region_category', $region, $category->parent);
        $crumbs->push(
            $category->name,
            route('region_category_listing.index', compact('region', 'category'))
        );
        $crumbs->push($listing->title, route('region_category_listing.show', compact('region', 'category', 'listing')));
    }
);

// Home > Listing Share
Breadcrumbs::for('share_listing', static function (Crumbs $crumbs, Listing $listing): void {
    $crumbs->parent('region_category_listing', $listing->region, $listing->category, $listing);
    $crumbs->push('Share', route('share_listing.index', $listing));
});

// Home > {Listing} Edit
Breadcrumbs::for('listing_edit', static function (Crumbs $crumbs, Listing $listing): void {
    $crumbs->parent('home');
    if ($listing->live) {
        $crumbs->push('Published', route('published_listing.index'));
    } else {
        $crumbs->push('Unpublished', route('unpublished_listing.index'));
    }
    $crumbs->push($listing->title . ' (Edit)', route('listing.edit', $listing));
});

// Home > {Listing} Pay
Breadcrumbs::for('payment_listing', static function (Crumbs $crumbs, Listing $listing): void {
    $crumbs->parent('listing_edit', $listing);
    $crumbs->push($listing->title . ' (Pay)');
});
