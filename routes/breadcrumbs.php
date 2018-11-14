<?php

/** @noinspection PhpUnhandledExceptionInspection */

declare(strict_types=1);

use App\Models\Category;
use App\Models\Region;
use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator as Crumbs;

// Home
Breadcrumbs::for('home', static function (Crumbs $crumbs): void {
    $crumbs->push('Home', route('home'));
});

// Home > Regions
Breadcrumbs::for('regions', static function (Crumbs $crumbs): void {
    $crumbs->parent('home');
    $crumbs->push('Regions', route('region.index'));
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

// Home > Categories
Breadcrumbs::for('categories', static function (Crumbs $crumbs): void {
    $crumbs->parent('home');
    $crumbs->push('Categories', route('category.index'));
});

// Home > {Category}
Breadcrumbs::for('category', static function (Crumbs $crumbs, Category $category): void {
    if ($category->parent) {
        $crumbs->parent('category', $category->parent);
    } else {
        $crumbs->parent('categories');
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
