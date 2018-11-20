<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Listing;
use App\Models\Region;
use Illuminate\Contracts\View\View;
use SEO;
use function compact;

class HomeController extends Controller
{
    public function index(): View
    {
        SEO::setTitle('Home');

        $regions = Region::get()->toTree();
        $categories = Category::get()->toTree();
        $listings = Listing::with(['region', 'category'])
            ->isLive()
            ->isLive()
            ->latestFirst()
            ->limit(4)
            ->get();

        $featured = Listing::with(['region', 'category'])
            ->isPaid()
            ->isFeatured()
            ->isLive()
            ->limit(5)
            ->get()
            ->shuffle();

        return view('home.index', compact('regions', 'categories', 'listings', 'featured'));
    }
}
