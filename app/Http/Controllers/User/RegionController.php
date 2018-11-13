<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Region;
use Illuminate\Http\RedirectResponse;
use function compact;

class RegionController extends Controller
{
    public function store(Region $region): RedirectResponse
    {
        session(['region' => $region->slug]);

        return redirect()->route('categories.index', compact('region'));
    }
}
