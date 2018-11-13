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

// Home > {Region} > Categories > {Category}
Breadcrumbs::for(
    'category_meta',
    static function (Crumbs $crumbs, Region $region, Category $category): void {
        $crumbs->parent('region', $region);

        if ($category->parent) {
            $crumbs->push($category->name, route('categories.index', $region));
        } else {
            $crumbs->push($category->name);
        }
    }
);

// Home > {Region} > Categories > {Category}
Breadcrumbs::for(
    'category',
    static function (Crumbs $crumbs, Region $region, Category $category): void {
        if ($category->parent) {
            $crumbs->parent('category', $region, $category->parent);
            $crumbs->push($category->name, route('categories.index', $region));
        } else {
            $crumbs->parent('region', $region);
            $crumbs->push($category->name);
        }
    }
);
