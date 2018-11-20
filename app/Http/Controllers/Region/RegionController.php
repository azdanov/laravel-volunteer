<?php

declare(strict_types=1);

namespace App\Http\Controllers\Region;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use function compact;
use SEO;

class RegionController extends Controller
{
    public function index(): View
    {
        SEO::setTitle('Region');

        $regions = Region::get()->toTree();

        return view('region.index', compact('regions'));
    }

    public function store(Region $region): RedirectResponse
    {
        session(['region' => $region->slug]);

        return redirect()->route('region_category.show', compact('region'));
    }
}
