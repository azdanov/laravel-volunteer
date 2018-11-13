<?php

declare(strict_types=1);

namespace App\Providers;

use App\Region;
use Illuminate\Support\ServiceProvider;
use function str_slug;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        /** Add slug */
        Region::creating(static function ($region): void {
            $prefix = $region->parent ? $region->parent->name . ' ' :'';
            $region->slug = str_slug($prefix . $region->name);
        });
    }

    public function register(): void
    {
    }
}
