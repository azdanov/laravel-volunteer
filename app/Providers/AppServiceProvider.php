<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Category;
use App\Models\Region;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use function preg_match;
use function str_slug;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Region::creating(static function ($region): void {
            $region->slug = str_slug($region->name);
        });

        Category::creating(static function ($category): void {
            $category->slug = str_slug($category->name);
        });

        Paginator::defaultView('vendor.pagination.default');

        Paginator::defaultSimpleView('vendor.pagination.simple-default');
    }

    public function register(): void
    {
    }
}
