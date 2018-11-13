<?php

declare(strict_types=1);

namespace App\Providers;

use App\Http\ViewComposers\RegionComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::composer('*', RegionComposer::class);
    }

    public function register(): void
    {
        $this->app->singleton(RegionComposer::class);
    }
}
