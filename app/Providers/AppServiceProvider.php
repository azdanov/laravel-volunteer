<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Category;
use App\Models\Region;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use function str_slug;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        /** Add region slug */
        Region::creating(static function ($region): void {
            $prefix = $region->parent ? $region->parent->name . ' ' :'';
            $region->slug = str_slug($prefix . $region->name);
        });

        /** Add categories slug */
        Category::creating(static function ($category): void {
            $prefix = $category->parent ? $category->parent->name . ' ' :'';
            $category->slug = str_slug($prefix . $category->name);
        });

        Paginator::defaultView('vendor.pagination.default');

        Paginator::defaultSimpleView('vendor.pagination.simple-default');
    }

    public function register(): void
    {
    }
}
