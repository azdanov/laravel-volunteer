<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Listing;
use App\Models\Region;
use Illuminate\Contracts\View\View;
use function compact;

class HomeController extends Controller
{
    public function index(): View
    {
        $regions = Region::get()->toTree();
        $categories = Category::get()->toTree();
        $listings = Listing::with(['region', 'category'])
            ->isLive()
            ->isLive()
            ->latestFirst()
            ->limit(4)
            ->get();

        $featured = Listing::with(['region', 'category'])
            ->isFeatured()
            ->isLive()
            ->limit(4)
            ->get()
            ->shuffle();

        return view('home.index', compact('regions', 'categories', 'listings', 'featured'));
    }
}
