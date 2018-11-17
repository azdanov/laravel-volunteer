<?php

declare(strict_types=1);

namespace App\Http\ViewComposers;

use App\Models\Region;
use Illuminate\View\View;

class RegionComposer
{
    /** @var Region */
    private $region;

    public function compose(View $view): View
    {
        if (!$this->region) {
            $this->region = Region::where(
                'slug',
                session('region', config('volunteer.default.region'))
            )->first();
        }

        return $view->with('global_region', $this->region);
    }
}
