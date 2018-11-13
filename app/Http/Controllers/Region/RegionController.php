<?php

declare(strict_types=1);

namespace App\Http\Controllers\Region;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use function compact;

class RegionController extends Controller
{
    public function index(): View
    {
        $regions = Region::get()->toTree();

        return view('regions.index', compact('regions'));
    }

    public function store(Region $region): RedirectResponse
    {
        session(['region' => $region->slug]);

        return redirect()->route('categories.index', compact('region'));
    }
}
