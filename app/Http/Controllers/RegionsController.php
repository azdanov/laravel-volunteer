<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Region;
use Illuminate\View\View;
use function compact;

class RegionsController extends Controller
{
    public function index(): View
    {
        $regions = Region::get()->toTree();

        return view('regions.index', compact('regions'));
    }
}
