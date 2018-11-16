<?php

declare(strict_types=1);

namespace App\Providers;

use App\Http\ViewComposers\RegionComposer;
use App\Models\Category;
use App\Models\Region;
use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
use function compact;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        ViewFacade::composer('*', RegionComposer::class);

        ViewFacade::composer('partials.form.regions', static function (View $view) {
            $regions = Region::get()->toTree();

            return $view->with(compact('regions'));
        });

        ViewFacade::composer('partials.form.categories', static function (View $view) {
            $categories = Category::get()->toTree();

            return $view->with(compact('categories'));
        });
    }

    public function register(): void
    {
        $this->app->singleton(RegionComposer::class);
    }
}
