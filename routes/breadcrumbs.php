<?php

declare(strict_types=1);

// Home
Breadcrumbs::for('home', static function ($trail): void {
    $trail->push('Home', route('home'));
});

// Home > Regions
Breadcrumbs::for('regions', static function ($trail): void {
    $trail->parent('home');
    $trail->push('Regions', route('regions.index'));
});

// Home > {Region}
Breadcrumbs::for('categories', static function ($trail, $region): void {
    $trail->parent('home');
    $trail->push($region->name, route('categories.index', $region));
});
